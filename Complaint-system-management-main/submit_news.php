<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "complaint_db"; // Replace with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO news_updates (content) VALUES (?)");
$stmt->bind_param("s", $content);

// Get the content from the form
$content = $_POST['news_content'];

// Execute the statement
if ($stmt->execute()) {
    echo "New record created successfully";
} else {
    echo "Error: " . $stmt->error;
}

// Close the statement and connection
$stmt->close();
$conn->close();
?>
