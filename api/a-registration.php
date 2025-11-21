   <?php
include '../db_connect.php';
session_start();

$showOtpModal = false; // Controls OTP modal visibility
$message = '';

// --- REGISTRATION PROCESS ---
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['register'])) {

    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $confirmPassword = trim($_POST['confirmPassword']);
    $termsCheck = isset($_POST['termsCheck']);
    $role = 'user';

    // VALIDATIONS
    if (!$termsCheck) {
        $message = 'You must agree to the Terms and Conditions.';
    } elseif (empty($username) || empty($email) || empty($password) || empty($confirmPassword)) {
        $message = 'Please fill in all required fields.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $message = 'Invalid email address.';
    } elseif (strlen($password) < 8 || !preg_match('/[a-zA-Z]/', $password)) {
        $message = 'Password must be at least 8 characters and include letters.';
    } elseif ($password !== $confirmPassword) {
        $message = 'Passwords do not match.';
    } else {
        // CHECK DUPLICATES
        $stmt = mysqli_prepare($conn, "SELECT id FROM users WHERE username = ? OR email = ?");
        mysqli_stmt_bind_param($stmt, "ss", $username, $email);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);

        if (mysqli_stmt_num_rows($stmt) > 0) {
            $message = 'Username or email already exists.';
        } else {
            // CREATE OTP
            $otp = random_int(100000, 999999);
            $expires = date("Y-m-d H:i:s", strtotime("+5 minutes"));
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            // INSERT USER WITH OTP
            $stmt = mysqli_prepare($conn,
                "INSERT INTO users (username, email, password_hash, role, verificationCode, otpExpiresAt, isVerified)
                 VALUES (?, ?, ?, ?, ?, ?, 0)"
            );
            mysqli_stmt_bind_param($stmt, "ssssss",
                $username, $email, $hashedPassword, $role, $otp, $expires
            );

            if (mysqli_stmt_execute($stmt)) {

                // SEND OTP EMAIL
                require __DIR__ . '/PHPMailer-7.0.0/src/PHPMailer.php';
                require __DIR__ . '/PHPMailer-7.0.0/src/SMTP.php';
                require __DIR__ . '/PHPMailer-7.0.0/src/Exception.php';

                $mail = new PHPMailer\PHPMailer\PHPMailer(true);
                $mailSent = false; // track whether mail actually sent

                try {
                  // Load SMTP configuration (edit web/api/smtp_config.php or set env vars)
                  require __DIR__ . '/smtp_config.php';

                  $mail->isSMTP();
                  $mail->Host = $smtpHost;
                  $mail->SMTPAuth = true;
                  $mail->Username = $smtpUser;
                  $mail->Password = $smtpPass;
                  // Use PHPMailer's constants for encryption where available
                  if (strtolower($smtpSecure) === 'ssl') {
                    $mail->SMTPSecure = PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_SMTPS;
                  } else {
                    $mail->SMTPSecure = PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_STARTTLS;
                  }
                  $mail->Port = (int) $smtpPort;

                  // Optional: allow self-signed certs when testing (not recommended for production)
                  if (!empty($smtpAllowSelfSigned)) {
                    $mail->SMTPOptions = [
                      'ssl' => [
                        'verify_peer' => false,
                        'verify_peer_name' => false,
                        'allow_self_signed' => true,
                      ],
                    ];
                  }

                  $mail->setFrom($smtpFrom, $smtpFromName);
                  $mail->addAddress($email);

                  $mail->Subject = 'Your WorkHop Verification Code';
                  $mail->Body = "Your verification code is: $otp\nThis code expires in 5 minutes.";

                  $mail->send();
                  $mailSent = true;
                } catch (Exception $e) {
                  // Surface mailing errors so user or dev can see them in the UI
                  $message = 'Mail error: ' . ($mail->ErrorInfo ?: $e->getMessage());
                }

                if ($mailSent) {
                    // STORE EMAIL FOR OTP CHECK
                    $_SESSION['email_to_verify'] = $email;
                    $showOtpModal = true;
                } else {
                    // If mail failed, remove the just-created (unverified) user to avoid orphaned accounts
                    $del = mysqli_prepare($conn, "DELETE FROM users WHERE email = ? AND isVerified = 0");
                    if ($del) {
                        mysqli_stmt_bind_param($del, "s", $email);
                        mysqli_stmt_execute($del);
                        mysqli_stmt_close($del);
                    }
                }

            } else {
                $message = 'Database error: ' . mysqli_error($conn);
            }
        }
    }
}

// --- OTP VERIFICATION PROCESS ---
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['verifyOtp'])) {

    $otp = trim($_POST['otp']);
    $email = $_SESSION['email_to_verify'];

    $stmt = mysqli_prepare($conn,
        "SELECT verificationCode, otpExpiresAt FROM users WHERE email = ? AND isVerified = 0"
    );
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);

    if (mysqli_stmt_num_rows($stmt) === 1) {
        mysqli_stmt_bind_result($stmt, $dbOtp, $expires);
        mysqli_stmt_fetch($stmt);

        if ($otp != $dbOtp) {
            $message = "Incorrect OTP.";
            $showOtpModal = true;
        } elseif (date("Y-m-d H:i:s") > $expires) {
            $message = "OTP expired. Please register again.";
        } else {
            // VERIFY USER
            $update = mysqli_prepare($conn,
                "UPDATE users SET isVerified = 1, verificationCode=NULL, otpExpiresAt=NULL WHERE email = ?"
            );
            mysqli_stmt_bind_param($update, "s", $email);
            mysqli_stmt_execute($update);

            unset($_SESSION['email_to_verify']);
            header("Location: a-login.php?verified=1");
            exit();
        }
    }

    mysqli_stmt_close($stmt);
}

// --- JSON RESPONSE FOR AJAX ---

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>WorkHop Register</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
  <?php include '../include/head.php'; ?>

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
  <?php include '../include/navabar_login.php'; ?>

  <div class="container d-flex justify-content-center align-items-center vh-100">
    <div class="content-box login-card">
      <h1 class="mb-2 text-center fw-bold title">WORK <i>HOP</i></h1>
      <p class="text-center text-muted mb-4"><i>Create Employee Account</i></p>

      <!-- Dynamic message area for success/error feedback -->
      <div id="message" class="mb-3">
        <?php if (!empty($message) && !$showOtpModal) : ?>
          <div class="alert alert-danger"><?php echo $message; ?></div>
        <?php endif; ?>
      </div>

      <form id="registerForm" method="post" action="a-registration.php" >
        <input type="hidden" name="register" value="1">
        <!-- Added username field (required for database) -->
        <div class="mb-3 position-relative">
          <input type="text" id="username" name="username" class="form-control ps-5" placeholder="Username" required>
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
          <input type="password" id="confirmPassword" name="confirmPassword" class="form-control ps-5 pe-5" placeholder="Confirm Password" required minlength="8">
          <i class="bi bi-lock-fill position-absolute top-50 start-0 translate-middle-y ms-3 text-muted"></i>
          <i class="bi bi-eye-slash position-absolute top-50 end-0 translate-middle-y me-3 text-muted togglePass" data-target="confirmPassword" style="cursor:pointer;"></i>
        </div>
        <div class="form-check mb-4">
          <input class="form-check-input" type="checkbox" name="termsCheck" required>
          <label class="form-check-label" for="termsCheck">
            I agree to the <a href="#" data-bs-toggle="modal" data-bs-target="#termsModal">Terms and Conditions and Data Privacy act</a>
          </label>
        </div>

        <button type="submit" class="btn btn-warning w-100 fw-bold">Register</button>
        <a onclick="history.back()" type="submit" class="btn btn-outline-secondary mt-2 w-100 fw-bold">Go Back</a>
      </form>

      <div class="d-flex justify-content-between small mt-4">
        <span class="text-muted">Create Employer account?</span>
        <a href="a-registrationAdmin.php" class="link-custom fw-bold">Employer Registration</a>
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

  <!-- OTP Verification Modal -->
<div class="modal fade" id="otpModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content p-3">
      <h4 class="text-center fw-bold">Enter Verification Code</h4>
      <p class="text-center text-muted">We sent a 6-digit code to your email.</p>

      <form id="otpForm" method="post">
        <input type="hidden" name="verifyOtp" value="1">

        <div class="mb-3">
          <input type="text" id="otp" name="otp" class="form-control text-center" maxlength="6" placeholder="000000" required>
        </div>

        <button type="submit" class="btn btn-warning w-100 fw-bold">Verify</button>
      </form>

      <div id="otpMessage" class="mt-2">
        <?php if (!empty($message) && $showOtpModal) : ?>
          <p class="text-danger text-center"><?php echo $message; ?></p>
        <?php endif; ?>
      </div>
          <div class="d-flex justify-content-between align-items-center mt-2">
            <small id="timer" class="text-muted"></small>
            <button type="button" id="resendBtn" class="btn btn-link p-0" disabled>Resend</button>
          </div>
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
  <?php include '../include/footer.php'; ?>

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

    // Show OTP modal if PHP sets $showOtpModal (fallback for non-AJAX)
    <?php if ($showOtpModal) : ?>
    document.addEventListener('DOMContentLoaded', function() {
      var modalEl = document.getElementById('otpModal');
      if (modalEl && typeof bootstrap !== 'undefined') {
        var otpModal = new bootstrap.Modal(modalEl);
        otpModal.show();
        console.log('OTP modal shown');
      } else {
        console.log('OTP modal not shown - missing element or bootstrap', modalEl, typeof bootstrap);
      }
    });
    <?php endif; ?>

    let timerDuration = 60; // seconds
    let countdown;

    function startTimer() {
      let timeLeft = timerDuration;
      const resendBtn = document.getElementById("resendBtn");
      const timerEl = document.getElementById("timer");

      if (resendBtn) resendBtn.disabled = true;
      if (!timerEl) return; // nothing to do on this page

      timerEl.textContent = `Resend OTP in ${timeLeft}s`;

      countdown = setInterval(() => {
        timeLeft--;
        if (timeLeft >= 0) {
          if (timerEl) timerEl.textContent = `Resend OTP in ${timeLeft}s`;
        }

        if (timeLeft < 0) {
          clearInterval(countdown);
          if (timerEl) timerEl.textContent = "";
          if (resendBtn) resendBtn.disabled = false;
        }
      }, 1000);
    }

    // Call timer on page load (safe — startTimer returns early if timer element missing)
   
   startTimer();

    // RESEND OTP ACTION (guarded)
    const resendBtnEl = document.getElementById("resendBtn");
    if (resendBtnEl) {
      resendBtnEl.addEventListener("click", () => {
        resendBtnEl.disabled = true;

        fetch("resend_otp.php", {
          method: "POST"
        })
        .then(res => res.text())
        .then(data => {
          console.log('resend_otp response:', data); // for debugging
          // Restart countdown
          startTimer();
        })
        .catch(err => {
          console.error(err);
          resendBtnEl.disabled = false;
        });
      });
    }







  </script>
</body>

</html>