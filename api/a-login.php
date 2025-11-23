<?php
session_start();
include '../db_connect.php'; // contains $conn

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    header('Content-Type: text/plain; charset=utf-8'); // ensure plain text response

    $username = trim($_POST['username'] ?? '');
    $password = trim($_POST['password'] ?? '');

    if ($username === '' || $password === '') {
        echo "empty";
        exit;
    }

    // Fetch user using username or email
    $sql = "SELECT id, username, email, password_hash, role, isVerified 
            FROM users 
            WHERE username = ? OR email = ?
            LIMIT 1";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $username, $username);
    $stmt->execute();
    $result = $stmt->get_result();

    // No user found
    if ($result->num_rows === 0) {
        echo "invalid";
        exit;
    }

    $user = $result->fetch_assoc();

    // Check if account is verified
    if ($user['isVerified'] == 0) {
        echo "not_verified";
        exit;
    }

    // Verify password using bcrypt
    if (!password_verify($password, $user['password_hash'])) {
        echo "invalid";
        exit;
    }

    // Save login session
    $_SESSION['user_id']   = $user['id'];
    $_SESSION['username']  = $user['username'];
    $_SESSION['email']     = $user['email'];
    $_SESSION['role']      = $user['role'];

    echo "success";
    exit; // prevent HTML from being appended to the response
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
      <?php include '../include/head.php'; ?>

</head>

<body class="bg-dark-green">
  <?php include '../include/navabar_login.php'; ?>
 

        
  <div class="container d-flex justify-content-center w-100 align-items-center my-5">
    <div class="content-box login-card">
  
        
      
     
      <h1 class="center text-center fw-bold title">WORK <i>HOP</i></h1>
      <p class="text-center text-muted mb-4"><i>Excellence in Professional Growth</i></p>

    
    
      
      
      <form id="loginForm" method="post" >
     
        <div class="mb-3 position-relative">
          <input type="text" id="username" name="username" class="form-control ps-5" placeholder="Email or Username" required>
          <i class="bi bi-person-fill position-absolute top-50 start-0 translate-middle-y ms-3 text-muted"></i>
        </div>
        <div class="mb-4 position-relative">
          <input type="password" id="password" name="password" class="form-control ps-5 pe-5" placeholder="Password" required>
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

        <?php include '../include/footer.php'; ?>


  
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

document.getElementById('loginForm').addEventListener('submit', async function (e) {
    e.preventDefault();

    const data = new FormData(this);

    const res = await fetch(window.location.href, { // post to same file
        method: "POST",
        body: data
    });

    const response = await res.text();

    if (response === "success") {
        window.location.href = "../index.php";
    } 
    else if (response === "not_verified") {
        alert("Your account is not verified. Please check your email.");
    }
    else if (response === "invalid") {
        alert("Incorrect username or password.");
    }
    else if (response === "empty") {
        alert("Please fill in all fields.");
    }
    else {
        alert("Server error.");
    }
});

  </script>
</body>
</html>