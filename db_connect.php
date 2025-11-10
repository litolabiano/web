<?php
// MySQL database credentials
$host = 'localhost';       // your MySQL host
$user = 'root';   // your MySQL username
$password = ''; // your MySQL password
$database = 'kld_jobs';    // your MySQL database name

// Create connection
$conn = mysqli_connect($host, $user, $password, $database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Create jobs table if it doesn't exist
$table_sql = "CREATE TABLE IF NOT EXISTS jobs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    budget VARCHAR(100) NOT NULL,
    posted_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if (!mysqli_query($conn, $table_sql)) {
    die("Error creating table: " . mysqli_error($conn));
}
?>
