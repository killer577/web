<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    echo "unauthorized";
    exit;
}

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    // Database connection
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "complaint_db"; // Replace with your database name

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Delete the specific complaint
    $sql = "DELETE FROM complaints WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "deleted";
    } else {
        echo "error";
    }

    $stmt->close();
    $conn->close();
} else {
    echo "invalid";
}
?>
