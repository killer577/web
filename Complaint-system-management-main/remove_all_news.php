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

// Delete all records
$sql = "DELETE FROM news_updates";

if ($conn->query($sql) === TRUE) {
    echo "All records deleted successfully";
} else {
    echo "Error deleting records: " . $conn->error;
}

// Close the connection
$conn->close();
?>
