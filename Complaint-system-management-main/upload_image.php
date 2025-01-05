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

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_FILES['complaintImage']) && $_FILES['complaintImage']['error'] === UPLOAD_ERR_OK) {
        $image_name = basename($_FILES['complaintImage']['name']);
        $target_dir = "uploads/";
        $target_file = $target_dir . $image_name;

        // Create uploads directory if not exists
        if (!is_dir($target_dir)) {
            mkdir($target_dir, 0777, true);
        }

        if (move_uploaded_file($_FILES['complaintImage']['tmp_name'], $target_file)) {
            // Store image name in the database
            $sql = "INSERT INTO images (image_name) VALUES ('$image_name')";
            if ($conn->query($sql) === TRUE) {
                echo "Image uploaded successfully!";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    } else {
        echo "No file uploaded or there was an upload error.";
    }
}

$conn->close();
?>
