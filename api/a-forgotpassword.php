<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>WorkHop Forgot Password</title>
      <?php include '../externalphp/head.php'; ?>

</head>

<body class="bg-dark-green">
    <?php include '../externalphp/navabar_login.php'; ?>


  <div class="overlay"></div>
  <div class="container d-flex justify-content-center align-items-center vh-100">
    <div class="content-box login-card">
      <h1 class="mb-2 text-center fw-bold title">WORK <i>HOP</i></h1>
      <p class="text-center text-muted mb-4"><i>Reset your password</i></p>
      <p class="text-center text-muted mb-4">Enter your email address and we'll send you a link to reset your password.</p>

      <form id="forgotPasswordForm">
        <div class="mb-3 position-relative">
          <input type="email" id="email" class="form-control ps-5" placeholder="Email Address" required>
          <i class="bi bi-envelope-fill position-absolute top-50 start-0 translate-middle-y ms-3 text-muted"></i>
        </div>

        <button type="submit" class="btn btn-warning w-100 fw-bold">Send Reset Link</button>
        <a href="index.php"  type="submit" class="btn btn-outline-secondary mt-2 w-100 fw-bold">Go Back</a>
      </form>

      <div class="d-flex justify-content-between small mt-4">
        <span class="text-muted">Remember your password?</span>
        <a href="a-login.php" class="link-custom fw-bold">Log in</a>
      </div>
      <div class="d-flex justify-content-between small mt-2">
        <span class="text-muted"></span>
        <a href="index.php" class="link-custom fw-bold">Go to home</a>
      </div>
    </div>
  </div>

  <!-- Bootstrap 5.0 JS CDN (optional, for any interactive components if needed) -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    
      <?php include '../externalphp/footer.php'; ?>


</body>
</html>
