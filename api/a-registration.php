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
      <p class="text-center text-muted mb-4"><i>Create Employee Account</i></p>

      <!-- Dynamic message area for success/error feedback -->
      <div id="message" class="mb-3"></div>

      <form id="registerForm" method="post" action="signup.php" novalidate>
        <div class="mb-3 position-relative">
          <input type="text" id="lastName" name="lastName" class="form-control ps-5" placeholder="Last Name" required>
          <i class="bi bi-person-fill position-absolute top-50 start-0 translate-middle-y ms-3 text-muted"></i>
        </div>
        <div class="mb-3 position-relative">
          <input type="text" id="firstName" name="firstName" class="form-control ps-5" placeholder="First Name" required>
          <i class="bi bi-person-fill position-absolute top-50 start-0 translate-middle-y ms-3 text-muted"></i>
        </div>
        <div class="mb-3 position-relative">
          <input type="text" id="mi" name="mi" maxlength="1" class="form-control ps-5" placeholder="M.I.">
          <i class="bi bi-person-badge-fill position-absolute top-50 start-0 translate-middle-y ms-3 text-muted"></i>
        </div>
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
    document.getElementById("registerForm").addEventListener("submit", function(e) {
      e.preventDefault(); // Prevent default form submission (page reload)

      const username = document.getElementById('username').value.trim();
      const email = document.getElementById('email').value.trim();
      const password = document.getElementById('password').value.trim();
      const confirmPassword = document.getElementById('confirmPassword').value.trim();
      const termsCheck = document.getElementById('termsCheck').checked;
      const messageDiv = document.getElementById('message');

      // Clear previous messages
      messageDiv.innerHTML = '';

      // Client-side validation
      if (!username || !email || !password || !confirmPassword) {
        messageDiv.innerHTML = '<div class="alert alert-danger">Please fill in all required fields.</div>';
        return;
      }
      if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
        messageDiv.innerHTML = '<div class="alert alert-danger">Please enter a valid email address.</div>';
        return;
      }
      if (password.length < 8 || !/[a-zA-Z]/.test(password)) {
        messageDiv.innerHTML = '<div class="alert alert-danger">Password must be at least 8 characters and include letters.</div>';
        return;
      }
      if (password !== confirmPassword) {
        messageDiv.innerHTML = '<div class="alert alert-danger">Passwords do not match!</div>';
        return;
      }
      if (!termsCheck) {
        messageDiv.innerHTML = '<div class="alert alert-danger">You must agree to the Terms and Conditions.</div>';
        return;
      }

      // Prepare data to send to signup.php (only required fields for backend)
      const formData = new FormData();
      formData.append('username', username);
      formData.append('email', email);
      formData.append('password', password);
      formData.append('role', 'user'); // Default to 'user' for employees; change if needed

      // Send AJAX request to signup.php
      fetch('signup.php', {
          method: 'POST',
          body: formData
        })
        .then(response => response.json()) // Parse JSON response from PHP
        .then(data => {
          if (data.success) {
            // Registration successful: Show message and redirect
            messageDiv.innerHTML = '<div class="alert alert-success">' + data.message + '</div>';
            setTimeout(() => {
              window.location.href = 'a-login.php'; // Redirect to login page
            }, 1000); // Delay for user to see the message
          } else {
            // Registration failed: Show error message
            messageDiv.innerHTML = '<div class="alert alert-danger">' + data.message + '</div>';
          }
        })
        .catch(error => {
          // Handle network or other errors
          console.error('Error:', error);
          messageDiv.innerHTML = '<div class="alert alert-danger">An error occurred. Please try again.</div>';
        });
    });
  </script>
</body>

</html>