<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "complaint_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Delete images from the server
$sql = "SELECT image_name FROM images";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $file = 'uploads/' . $row['image_name'];
        if (file_exists($file)) {
            unlink($file); // Delete the file
        }
    }
}

// Delete all records from the database
$sql = "DELETE FROM images";
if ($conn->query($sql) === TRUE) {
    echo "All images deleted successfully!";
} else {
    echo "Error deleting records: " . $conn->error;
}

$conn->close();
?>
