<?php
// Secure session settings BEFORE session_start()
if (session_status() === PHP_SESSION_NONE) {

    session_set_cookie_params([
        'lifetime' => 3600, // 1 hour
        'path' => '/',
        'domain' => '',
        'secure' => isset($_SERVER['HTTPS']), // only over HTTPS
        'httponly' => true, 
        'samesite' => 'Strict'
    ]);

    session_start();

    // Prevent session fixation (VERY IMPORTANT)
    if (empty($_SESSION['initiated'])) {
        session_regenerate_id(true);
        $_SESSION['initiated'] = true;
    }
}

// Expose simple helpers
$loggedIn = !empty($_SESSION['user_id']);
$username = $_SESSION['username'] ?? '';
$role = $_SESSION['role'] ?? '';

function is_logged_in() {
    return !empty($_SESSION['user_id']);
}

function require_login() {
    if (!is_logged_in()) {
        header('Location: /web/api/a-login.php');
        exit();
    }
}
?>
