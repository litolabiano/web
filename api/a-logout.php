<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>WorkHop Logout</title>
  
      <?php include '../externalphp/head.php'; ?>


  <style>
  
  </style>
</head>

<body class="bg-dark-green">
    <div class="overlay"></div>
  <div class="container d-flex justify-content-center align-items-center vh-100">
    <div class="card login-card shadow-lg p-5">
      <h1 class="mb-2 text-center fw-bold title">WORK <i>HOP</i></h1>
      <div class="text-center mb-4">
        <i class="bi bi-box-arrow-right display-1 text-success mb-3"></i>
        <h2 class="text-success fw-bold">Logged Out Successfully</h2>
        <p class="text-muted">You have been signed out of your account. Thank you for using WorkHop!</p>
      </div>

      <div class="d-grid gap-2">
        <a href="a-login.php" class="btn btn-warning fw-bold">Log In Again</a>
        <a href="a-registration.php" class="btn btn-outline-secondary fw-bold">Create New Account</a>
        <a href="index.php" class="btn btn-outline-secondary fw-bold">Go to Home</a>
      </div>

      <div class="text-center mt-4">
        <small class="text-muted">This page will redirect to home in <span id="countdown">5</span> seconds.</small>
      </div>
    </div>
  </div>
        <?php include '../externalphp/footer.php'; ?>

 
  <!-- Bootstrap 5.0 JS CDN (optional, for any interactive components if needed) -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script>
    // Auto-redirect countdown to login page after 5 seconds
    let timeLeft = 5;
    const countdownElement = document.getElementById('countdown');
    const timer = setInterval(() => {
      timeLeft--;
      countdownElement.textContent = timeLeft;
      if (timeLeft <= 0) {
        clearInterval(timer);
        window.location.href = 'index.php'; // Redirect to login page
      }
    }, 1000);
  </script>
</body>
</html>
