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
            <?php
            require 'vendor/autoload.php'; // Include Composer's autoloader

            use Twilio\Rest\Client;

            session_start(); // Start session to store OTP

            $account_sid = 'ACa895b67360ed4eb70296a1b20c28391c';
            $auth_token = 'e245d838d4ad9246653c27e8a1c662d0';
            $twilio_number = '+12394714501';

            $client = new Client($account_sid, $auth_token);

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                if (isset($_POST['phone_number'])) {
                    $local_phone_number = $_POST['phone_number'];
                    $to_phone_number = '+91' . preg_replace('/[^0-9]/', '', $local_phone_number);

                    if (!preg_match('/^\+\d{10,15}$/', $to_phone_number)) {
                        echo '<p class="text-danger">Invalid phone number format. Please enter a valid phone number.</p>';
                        showPhoneNumberForm();
                        exit();
                    }

                    $otp = rand(100000, 999999);
                    $_SESSION['otp'] = $otp;
                    $_SESSION['phone_number'] = $to_phone_number;

                    try {
                        $message = $client->messages->create(
                            $_SESSION['phone_number'],
                            [
                                'from' => $twilio_number,
                                'body' => "Your OTP from [RAIBS InfoTech] is $otp. Use this code to verify your phone number."
                            ]
                        );
                        echo '<h3 class="text-success">OTP has been sent to your phone number.</h3>';
                        showOtpForm();
                    } catch (Exception $e) {
                        echo '<p class="text-danger">Error: ' . $e->getMessage() . '</p>';
                    }
                } elseif (isset($_POST['verify'])) {
                    $entered_otp = $_POST['otp'];
                    if ($entered_otp == $_SESSION['otp']) {
                        session_destroy();
                        echo '<h3 class="text-success">OTP verified successfully!</h3>';
                        echo '<p>You will be redirected shortly...</p>';
                        header("refresh:3;url=sample.html");
                        exit();
                    } else {
                        echo '<p class="text-danger">Incorrect OTP. Please try again.</p>';
                        showOtpForm();
                    }
                }
            } else {
                showPhoneNumberForm();
            }

            function showPhoneNumberForm() {
                echo '<form method="post" action="">
                        <div class="form-group">
                            <label for="phone_number">Enter your phone number (excluding country code):</label>
                            <input type="text" id="phone_number" name="phone_number" class="form-control" required>
                        </div>
                        <button type="submit" name="submit" class="btn btn-custom btn-block">Send OTP</button>
                      </form>';
            }

            function showOtpForm() {
                echo '<form method="post" action="">
                        <div class="form-group">
                            <label for="otp">Enter OTP:</label>
                            <input type="text" id="otp" name="otp" class="form-control" required>
                        </div>
                        <button type="submit" name="verify" class="btn btn-custom btn-block">Verify OTP</button>
                      </form>';
            }
            ?>
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

<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<footer class="footer mt-5">
    <p>© 2024 <a href="#">RaibsInfo.com</a> All rights reserved. Website design and content are protected by copyright law.</p>
</footer>

</body>
</html>
