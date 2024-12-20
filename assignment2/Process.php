<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$host = 'localhost';
$db = 'registration_db';
$user = 'root';
$password = '';

// Connect to the database
$conn = new mysqli($host, $user, $password, $db);
if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = isset($_POST['name']) ? $conn->real_escape_string($_POST['name']) : '';
    $email = isset($_POST['email']) ? $conn->real_escape_string($_POST['email']) : '';
    $phone = isset($_POST['phone']) ? $conn->real_escape_string($_POST['phone']) : '';
    $dob = isset($_POST['dob']) ? $conn->real_escape_string($_POST['dob']) : '';
    $gender = isset($_POST['gender']) ? $conn->real_escape_string($_POST['gender']) : '';

    if (empty($name) || empty($email) || empty($phone) || empty($dob) || empty($gender)) {
        echo json_encode(["status" => "error", "message" => "All fields are required."]);
        exit;
    }

    $sql = "INSERT INTO registrations (name, email, phone, dob, gender) VALUES ('$name', '$email', '$phone', '$dob', '$gender')";
    if ($conn->query($sql) === TRUE) {
        echo json_encode(["status" => "success", "message" => "Registration successful."]);
    } else {
        echo json_encode(["status" => "error", "message" => $conn->error]);
    }
} else {
    echo json_encode(["status" => "error", "message" => "Invalid request method."]);
}

$conn->close();
?>
