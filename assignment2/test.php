<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database configuration
$host = 'localhost';
$db = 'registration_db';
$user = 'root';
$password = '';

// Test database connection
$conn = new mysqli($host, $user, $password, $db);

if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}
echo "PHP and Database connection are working correctly!";
?>
