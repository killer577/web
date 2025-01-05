<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "complaint_db"; // Replace with your actual database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$name = $_POST['comp-name'] ?? '';
$gender = $_POST['gender'] ?? '';
$age = $_POST['age'] ?? '';
$address = $_POST['address'] ?? '';
$phone = $_POST['phone'] ?? '';
$email = $_POST['email'] ?? '';
$subject = $_POST['subject'] ?? '';
$date = $_POST['date'] ?? '';
$place = $_POST['place'] ?? '';
$description = $_POST['description'] ?? '';

// Handle image upload
$image_path = 'none'; // Default value if no image is uploaded

if (isset($_FILES['complaintImage']) && $_FILES['complaintImage']['error'] == 0) {
    // Check file type
    $allowed_types = ['jpg', 'jpeg', 'png', 'gif'];
    $file_extension = strtolower(pathinfo($_FILES['complaintImage']['name'], PATHINFO_EXTENSION));

    if (in_array($file_extension, $allowed_types)) {
        // Define upload directory and file path
        $upload_dir = 'uploads/';
        if (!is_dir($upload_dir)) {
            mkdir($upload_dir, 0777, true); // Create directory if not exists
        }

        $image_path = $upload_dir . uniqid() . '.' . $file_extension;

        // Move the uploaded file to the server directory
        if (!move_uploaded_file($_FILES['complaintImage']['tmp_name'], $image_path)) {
            die("Error uploading the file.");
        }
    } else {
        die("Invalid file type. Only JPG, JPEG, PNG, and GIF are allowed.");
    }
}

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO complaints (name, gender, age, address, phone, email, subject, date, place, description, image_path) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
if ($stmt === false) {
    die("Prepare failed: " . $conn->error);
}

$stmt->bind_param("ssissssssss", $name, $gender, $age, $address, $phone, $email, $subject, $date, $place, $description, $image_path);

// Execute the statement
if ($stmt->execute()) {
    echo "Complaint registered successfully.";
} else {
    echo "Error: " . $stmt->error;
}

// Close connections
$stmt->close();
$conn->close();
?>
