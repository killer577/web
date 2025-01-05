<?php 
include 'header.php'; 
session_start();

// Check if user is logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: login.html');
    exit;
}

// Fetch complaint details if 'id' is provided in the URL
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    // Database connection
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "complaint_db"; // Replace with your actual database name

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and execute SQL statement
    $sql = "SELECT * FROM complaints WHERE id = ?";
    $stmt = $conn->prepare($sql);
    if ($stmt === false) {
        die("Prepare failed: " . $conn->error);
    }
    
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $complaint = $result->fetch_assoc();

    $stmt->close();
    $conn->close();
} else {
    echo "Invalid request.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complaint Details</title>

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <!-- AOS CSS -->
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <style>
        .complaint-detail {
            background-color: #f8f9fa;
            padding: 1.5rem;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        h2 {
            margin-top: 30px;
            margin-bottom: 1rem;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 data-aos="fade-down">Complaint Details</h2>
        <?php if ($complaint): ?>
            <div class="complaint-detail" data-aos="fade-up" data-aos-delay="100">
                <p><strong>Name:</strong> <?php echo htmlspecialchars($complaint['name']); ?></p>
                <p><strong>Gender:</strong> <?php echo htmlspecialchars($complaint['gender']); ?></p>
                <p><strong>Age:</strong> <?php echo htmlspecialchars($complaint['age']); ?></p>
                <p><strong>Address:</strong> <?php echo htmlspecialchars($complaint['address']); ?></p>
                <p><strong>Phone:</strong> <?php echo htmlspecialchars($complaint['phone']); ?></p>
                <p><strong>Email:</strong> <?php echo htmlspecialchars($complaint['email']); ?></p>
                <p><strong>Subject:</strong> <?php echo htmlspecialchars($complaint['subject']); ?></p>
                <p><strong>Date:</strong> <?php echo htmlspecialchars($complaint['date']); ?></p>
                <p><strong>Place:</strong> <?php echo htmlspecialchars($complaint['place']); ?></p>
                <p><strong>Description:</strong> <?php echo htmlspecialchars($complaint['description']); ?></p>                
                <!-- Display image with a link to open in a new tab -->
                <?php if (!empty($complaint['image_path']) && $complaint['image_path'] != 'none'): ?>
                    <p><strong>Image:</strong> <a href="<?php echo htmlspecialchars($complaint['image_path']); ?>" target="_blank">View Image</a></p>
                    <!-- Debug output: Display the actual image path -->
                <?php else: ?>
                    <p><strong>Image:</strong> No image available.</p>
                <?php endif; ?>
            </div>
        <?php else: ?>
            <p data-aos="fade-up" data-aos-delay="200">Complaint not found.</p>
        <?php endif; ?>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- AOS JS -->
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>
</html>
