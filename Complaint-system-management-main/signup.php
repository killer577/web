<?php
// Connect to the database
$conn = new mysqli('localhost', 'root', '', 'complaint_db');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$email = $_POST['username'];
$password = $_POST['password'];

// Hash the password for security
$hashed_password = password_hash($password, PASSWORD_BCRYPT);

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO users (email, password) VALUES (?, ?)");
$stmt->bind_param("ss", $email, $hashed_password);

// Execute and check for success
if ($stmt->execute()) {
    header('Location: login.html'); // Redirect to login page after successful registration
} else {
    echo "<script>alert('Error: Could not register. Please try again.');</script>";
}

$stmt->close();
$conn->close();
?>
