<?php
include '../db_connect.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = trim($_POST['password'] ?? '');
    $confirmPassword = trim($_POST['confirmPassword'] ?? '');
    $termsCheck = isset($_POST['termsCheck']);
    $role = 'admin';
    $message = '';

    // Validation
    if (!$termsCheck) {
        $message = 'You must agree to the Terms and Conditions.';
    } elseif (empty($username) || empty($email) || empty($password) || empty($confirmPassword)) {
        $message = 'Please fill in all required fields.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $message = 'Please enter a valid email address.';
    } elseif (strlen($password) < 8 || !preg_match('/[a-zA-Z]/', $password)) {
        $message = 'Password must be at least 8 characters and include letters.';
    } elseif ($password !== $confirmPassword) {
        $message = 'Passwords do not match.';
    } else {
        // Check duplicates
        $stmt = mysqli_prepare($conn, "SELECT id FROM users WHERE username = ? OR email = ?");
        mysqli_stmt_bind_param($stmt, 'ss', $username, $email);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);

        if (mysqli_stmt_num_rows($stmt) > 0) {
            $message = 'Username or email already exists.';
        } else {
            // Generate OTP
            $otp = random_int(100000, 999999);
            $expires = date("Y-m-d H:i:s", strtotime("+5 minutes"));

            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            // Insert with OTP
            $stmt = mysqli_prepare($conn, 
                "INSERT INTO users (username, email, password_hash, role, verificationCode, otpExpiresAt, isVerified) 
                 VALUES (?, ?, ?, ?, ?, ?, 0)"
            );
            mysqli_stmt_bind_param($stmt, 'ssssss', 
                $username, 
                $email, 
                $hashedPassword, 
                $role, 
                $otp, 
                $expires
            );

            if (mysqli_stmt_execute($stmt)) {

                // --- SEND EMAIL (PHPMailer) ---
                require '../phpmailer/PHPMailer.php';
                require '../phpmailer/SMTP.php';
                require '../phpmailer/Exception.php';

                $mail = new PHPMailer\PHPMailer\PHPMailer(true);

                try {
                    $mail->isSMTP();
                    $mail->Host = 'smtp.gmail.com';
                    $mail->SMTPAuth = true;
                    $mail->Username = 'ljlabianao@gmail.com';
                    $mail->Password = 'samd eobd jxey kjyd';
                    $mail->SMTPSecure = 'tls';
                    $mail->Port = 587;

                    $mail->setFrom('ljlabianao@gmail.com', 'WorkHop Verification');
                    $mail->addAddress($email);

                    $mail->Subject = 'Your WorkHop Verification Code';
                    $mail->Body = "Your verification code is: $otp\nThis code expires in 5 minutes.";

                    $mail->send();
                } catch (Exception $e) {
                    // Optional: Log error but still continue
                }

                $_SESSION['email_to_verify'] = $email;

                header('Location: verify-otp.php');
                exit();

            } else {
                $message = 'Database error: ' . mysqli_error($conn);
            }
        }
        mysqli_stmt_close($stmt);
    }

    if (!empty($message)) {
        echo '<div class="alert alert-danger">' . htmlspecialchars($message) . '</div>';
    }
}

mysqli_close($conn);
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>WorkHop Register</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
  <?php include '../externalphp/head.php'; ?>

  <style>
    small {
      font-size: 12px;
      color: #666;
      margin-top: 4px;
      display: block;
    }

    @keyframes gradientMove {
      0% {
        background-position: 0% 50%;
      }

      50% {
        background-position: 100% 50%;
      }

      100% {
        background-position: 0% 50%;
      }
    }
  </style>
</head>

<body>
  <?php include '../externalphp/navabar_login.php'; ?>

  <div class="container d-flex justify-content-center align-items-center vh-100">
    <div class="content-box login-card">
      <h1 class="mb-2 text-center fw-bold title">WORK <i>HOP</i></h1>
      <p class="text-center text-muted mb-4"><i>Create Employers Account</i></p>

      <!-- Dynamic message area for success/error feedback -->
      <div id="message" class="mb-3"></div>

      <form id="registerForm" method="post" action="signup.php" novalidate>

        <!-- Added username field (required for database) -->
        <div class="mb-3 position-relative">
          <input type="text" id="username" name="username" class="form-control ps-5" placeholder="Company Name" required>
          <i class="bi bi-person-fill position-absolute top-50 start-0 translate-middle-y ms-3 text-muted"></i>
        </div>
        <div class="mb-3 position-relative">
          <input type="email" id="email" name="email" class="form-control ps-5" placeholder="Email" required>
          <i class="bi bi-envelope-fill position-absolute top-50 start-0 translate-middle-y ms-3 text-muted"></i>
        </div>
        <small class="ms-3">Must contain at least 8 characters and letters.</small>
        <div class="mb-3 position-relative">
          <input type="password" id="password" name="password" class="form-control ps-5 pe-5" placeholder="Password" required minlength="8">
          <i class="bi bi-lock-fill position-absolute top-50 start-0 translate-middle-y ms-3 text-muted"></i>
          <i class="bi bi-eye-slash position-absolute top-50 end-0 translate-middle-y me-3 text-muted togglePass" data-target="password" style="cursor:pointer;"></i>
        </div>
        <!-- Added confirm password field -->
        <div class="mb-3 position-relative">
          <input type="password" id="confirmPassword" class="form-control ps-5 pe-5" placeholder="Confirm Password" required minlength="8">
          <i class="bi bi-lock-fill position-absolute top-50 start-0 translate-middle-y ms-3 text-muted"></i>
          <i class="bi bi-eye-slash position-absolute top-50 end-0 translate-middle-y me-3 text-muted togglePass" data-target="confirmPassword" style="cursor:pointer;"></i>
        </div>
        <div class="form-check mb-4">
          <input class="form-check-input" type="checkbox" id="termsCheck" required>
          <label class="form-check-label" for="termsCheck">
            I agree to the <a href="#" data-bs-toggle="modal" data-bs-target="#termsModal">Terms and Conditions</a>
          </label>
        </div>

        <button type="submit" class="btn btn-warning w-100 fw-bold">Register</button>
        <a onclick="history.back()" type="submit" class="btn btn-outline-secondary mt-2 w-100 fw-bold">Go Back</a>
      </form>

      <div class="d-flex justify-content-between small mt-4">
        <span class="text-muted">Create Employer account?</span>
        <a href="a-registration.php" class="link-custom fw-bold">Employee Registration</a>
      </div>
      <div class="d-flex justify-content-between small mt-2">
        <span class="text-muted">Already have an account?</span>
        <a href="a-login.php" class="link-custom fw-bold">Log in</a>
      </div>
      <div class="d-flex justify-content-between small mt-2">
        <span></span>
        <a href="Index.php" class="link-custom fw-bold">Go to Home</a>
      </div>
    </div>
  </div>

  <div class="modal fade" id="termsModal" tabindex="-1" aria-labelledby="termsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="termsModalLabel">Terms and Conditions</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" style="max-height: 70vh; overflow-y: auto;">
          <p><strong>Welcome to WorkHop!</strong></p>
          <p>By creating an account, you agree to abide by these Terms and Conditions:</p>
          <ul>
            <li>You shall provide accurate, current, and complete registration information.</li>
            <li>Your account is personal and non-transferable. You are responsible for all activities under your account.</li>
            <li>WorkHop reserves the right to modify or terminate accounts that violate our policies.</li>
            <li>Personal data is collected and processed according to the <strong>Data Privacy Act of 2012 (RA 10173)</strong>.</li>
            <li>By registering, you consent to the collection and use of your data for legitimate business purposes.</li>
            <li>You agree not to use the platform for any unlawful or fraudulent activities.</li>
          </ul>
          <p>For more details on how we handle your data, please read our <strong>Privacy Policy</strong>.</p>
          <p class="text-muted small">Effective as of October 2025.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  <?php include '../externalphp/footer.php'; ?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    // Password visibility toggle (updated for both password fields)
    document.querySelectorAll(".togglePass").forEach(icon => {
      icon.addEventListener("click", function() {
        const targetId = this.getAttribute("data-target");
        const input = document.getElementById(targetId);
        if (input.type === "password") {
          input.type = "text";
          this.classList.replace("bi-eye-slash", "bi-eye");
        } else {
          input.type = "password";
          this.classList.replace("bi-eye", "bi-eye-slash");
        }
      });
    });

    // Form submission handler with AJAX integration

  </script>
</body>

</html>