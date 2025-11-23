<?php
// Load config safely
$config = include __DIR__ . '/../config/config.php';

// Check if config loaded correctly
if (!$config || !is_array($config)) {
    die("Error: Configuration file missing or invalid.");
}

// BASE URL define only once
if (!defined('BASE_URL')) {
    define('BASE_URL', $config['BASE_URL']);
}

// Database connection
$conn = mysqli_connect(
    $config['DB_HOST'] ?? '',
    $config['DB_USER'] ?? '',
    $config['DB_PASS'] ?? '',
    $config['DB_NAME'] ?? ''
);

// Check DB connection
if (!$conn) {
    error_log("Database connection failed: " . mysqli_connect_error());
    exit("Database connection failed.");
}

// Set charset
mysqli_set_charset($conn, 'utf8mb4');
?>
