<?php
// Load config safely
$config = require_once __DIR__ . '/../config/config.php';

// BASE URL
define('BASE_URL', $config['BASE_URL']);

// Database connection
$conn = mysqli_connect(
    $config['DB_HOST'],
    $config['DB_USER'],
    $config['DB_PASS'],
    $config['DB_NAME']
);

if (!$conn) {
    error_log("Database connection failed: " . mysqli_connect_error());
    exit('Database connection error. Please try again later.');
}

// Set charset
mysqli_set_charset($conn, 'utf8mb4');
