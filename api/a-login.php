<!DOCTYPE html>
<html lang="en">
<head>
      <?php include '../externalphp/head.php'; ?>

</head>

<body class="bg-dark-green">
  <?php include '../externalphp/navabar_login.php'; ?>
 

        
  <div class="container d-flex justify-content-center w-100 align-items-center vh-100">
    <div class="content-box login-card">
  
        
      
     
      <h1 class="center text-center fw-bold title">WORK <i>HOP</i></h1>
      <p class="text-center text-muted mb-4"><i>Excellence in Professional Growth</i></p>

    
    
      
      
      <form id="loginForm" >
     
        <div class="mb-3 position-relative">
          <input type="text" id="username" class="form-control ps-5" placeholder="Email or Username" required>
          <i class="bi bi-person-fill position-absolute top-50 start-0 translate-middle-y ms-3 text-muted"></i>
        </div>
        <div class="mb-4 position-relative">
          <input type="password" id="password" class="form-control ps-5 pe-5" placeholder="Password" required>
          <i class="bi bi-lock-fill position-absolute top-50 start-0 translate-middle-y ms-3 text-muted"></i>
          <i class="bi bi-eye-slash position-absolute top-50 end-0 translate-middle-y me-3 text-muted" id="eyeIcon" style="cursor:pointer;"></i>
        </div>

        <div class="d-flex justify-content-between align-items-center mb-4">
          <div class="form-check">
            <input type="checkbox" class="form-check-input" id="rememberMe">
            <label for="rememberMe" class="form-check-label small">Remember me</label>
          </div>
          <a href="a-forgotPassword.php" class="link-custom small fw-bold">Forgot Password?</a>
        </div>

   
         <button type="submit" class="btn btn-warning w-100 fw-bold">Login</button>
          <a onclick="history.back()" type="submit" class="btn btn-outline-secondary mt-2 w-100 fw-bold">Go Back</a>
         
      </form>


 
      <div class="d-flex justify-content-between small mt-4">
        <span class="text-muted">New here?</span>
        <a href="a-registration.php" class="link-custom fw-bold">Create an Account</a>
      </div>
      <div class="d-flex justify-content-between small mt-2 ">
        <span></span>
   
        <a href="index.php" class="link-custom fw-bold">Go to Home</a>
      </div>
    </div>
  </div>

        <?php include '../externalphp/footer.php'; ?>


  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script>

    document.getElementById("eyeIcon").addEventListener("click", function () {
  const passwordField = document.getElementById("password");
  const eyeIcon = document.getElementById("eyeIcon");

  if (passwordField.type === "password") {
    passwordField.type = "text";
    eyeIcon.classList.remove("bi-eye-slash");
    eyeIcon.classList.add("bi-eye"); // open eye when visible
  } else {
    passwordField.type = "password";
    eyeIcon.classList.remove("bi-eye");
    eyeIcon.classList.add("bi-eye-slash"); // closed eye when hidden
  }
});

document.getElementById('loginForm').addEventListener('submit', function (e) {
  e.preventDefault();
  const username = document.getElementById('username').value;
  const password = document.getElementById('password').value;

  if (username === 'admin' && password === 'admin') {
    alert('Login successful!');
    window.location.href = 'dashboard.html';
  } else {
    alert('Invalid username or password');
  }
});
  </script>
</body>
</html>