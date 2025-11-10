<?php
session_start(); // Start the session

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    // Simple check (replace with database validation in production)
    if ($username === 'admin' && $password === 'admin') {
        $_SESSION['logged_in'] = true;
        $_SESSION['username'] = $username; // Store username for personalization
        header('Location: dashboard.html'); // Redirect to dashboard
        exit();
    } else {
        // Invalid login
        $_SESSION['error'] = 'Invalid username or password';
        header('Location: a-login.php'); // Redirect back to login with error
        exit();
    }
} else {
    // If not a POST request, redirect to login
    header('Location: login.php');
    exit();
}
?>