<?php
// Start a session
session_start();

// Connect to the database
$conn = new mysqli('localhost', 'root', '', 'complaint_db');

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$email = $_POST['username'];
$password = $_POST['password'];

// Prepare and execute query
$stmt = $conn->prepare("SELECT password FROM users WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$stmt->store_result();

// Check if the user exists
if ($stmt->num_rows > 0) {
    $stmt->bind_result($hashed_password);
    $stmt->fetch();

    // Verify password
    if (password_verify($password, $hashed_password)) {
        // Password is correct, set session variable
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $email; // Optional: store username in session

        // Redirect to admin page
        header('Location: index.php');
        exit();
    } else {
        // Incorrect password
        echo "<script>alert('Incorrect password. Please try again.'); window.location.href = 'login.html';</script>";
    }
} else {
    // Email not found
    echo "<script>alert('Email not found. Please sign up.'); window.location.href = 'signup.html';</script>";
}

// Close statement and connection
$stmt->close();
$conn->close();
?>

?>