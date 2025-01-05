<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Village Council Panchayat - OTP Verification</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
    background-color: #f8f9fa;
    margin-top: 60px; /* To account for fixed navbar */
}
.navbar {
    background-color: #007bff;
}
.navbar-brand {
    color: #fff !important;
}
.main-content {
    display: flex;
    flex-direction: column;
    align-items: center;
    margin-top: 20px;
    padding: 20px;
}
.left-content,
.right-content {
    width: 100%;
    max-width: 600px;
    padding: 20px;
    box-sizing: border-box;
}
.left-content img {
    width: 100%;
    height: auto;
    border-radius: 8px;
}
.right-content {
    background: #fff;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}
.form-control {
    border-radius: 25px;
}
.btn-custom {
    border-radius: 25px;
    background-color: #007bff;
    color: #fff;
}
.btn-custom:hover {
    background-color: #0056b3;
}        
.point-to-remember {
    margin-top: 20px;
    padding: 20px;
    background: #fff;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}
.point-to-remember ul {
    list-style-type: none;
    padding-left: 0;
}
.point-to-remember li {
    position: relative;
    padding-left: 25px;
    margin-bottom: 10px;
}
.point-to-remember li::before {
    content: '\2022'; /* Unicode for bullet point */
    position: absolute;
    left: 0;
    color: #007bff; /* Bullet point color */
    font-size: 20px;
    top: 0;
}
.footer {
    background-color: #007bff;
    color: #fff;
    text-align: center;
    line-height: 1.5;
    padding: 5px;
    position: relative;
    bottom: 0;
    width: 100%;
    box-sizing: border-box;
}
.footer a {
    color: #fff;
    text-decoration: none;
}
.footer a:hover {
    text-decoration: underline;
}

/* Responsive Styles */
@media (max-width: 767px) {
    .main-content {
        padding: 10px;
    }
    .left-content, .right-content {
        padding: 10px;
    }
    .point-to-remember {
        padding: 15px;
    }
}
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark fixed-top">
    <a class="navbar-brand" href="#">Village Council Panchayat</a>
</nav>

<!-- News Marquee -->
<div class="news-marquee mt-3">
    <?php
    // Database connection details
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

    // Fetch news content from the database
    $sql = "SELECT content FROM news_updates";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo '<marquee behavior="scroll" direction="left">';
        // Output data of each row
        while ($row = $result->fetch_assoc()) {
            echo $row['content'] . " &nbsp;&nbsp;&nbsp; "; // Display each news item with some spacing
        }
        echo '</marquee>';
    }

    // Fetch the latest image from the database
    $sql = "SELECT image_name FROM images ORDER BY uploaded_on DESC LIMIT 1";
    $result = $conn->query($sql);

    $image_name = "";
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $image_name = $row['image_name'];
    }

    // Close the database connection
    $conn->close();
    ?>
</div>

<div class="container mt-5">
    <h2 class="mt-3">ONLINE COMPLAINT</h2>

    <div class="main-content">
        <div class="left-content">
            <!-- Add your council image here -->
            <img src="council.png" alt="Council Image" class="img-fluid">
        </div>
        <div class="right-content">
            <!-- Updated Form Action -->
            <form method="post" action="verify.php">
                <div class="form-group">
                    <label for="phone_number">Enter your phone number (excluding country code):</label>
                    <input type="text" id="phone_number" name="phone_number" class="form-control" required>
                </div>
                <button type="submit" name="submit" class="btn btn-custom btn-block">Send OTP</button>
            </form>
        </div>
    </div>

    <!-- POINT TO REMEMBER Container -->
    <div class="point-to-remember mt-5">
        <h3>POINT TO REMEMBER</h3>
        <ul>
            <li>Do not share your OTP with anyone for security reasons.</li>
            <li>If you don't receive the OTP, please check your network and try again.</li>
            <li>Contact support if you continue to experience issues with OTP verification.</li>
        </ul>
    </div>
</div>

<!-- Image Popup Modal -->
<?php if ($image_name) : ?>
<div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="imageModalLabel">Important Notice</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">
                <img src="uploads/<?php echo $image_name; ?>" class="img-fluid" alt="Popup Image">
            </div>
        </div>
    </div>
</div>
<?php endif; ?>

<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<!-- Script to trigger the image modal -->
<script>
$(document).ready(function() {
    <?php if ($image_name) : ?>
        $('#imageModal').modal('show');
    <?php endif; ?>
});
</script>

<footer class="footer mt-5">
    <p>© 2024 <a href="#">Company name</a> All rights reserved. Website design and content are protected by copyright law.</p>
</footer>

</body>
</html>
