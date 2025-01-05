<?php
require 'vendor/autoload.php'; // Include Composer's autoloader

use Twilio\Rest\Client;

// Twilio credentials
$account_sid = 'ACa895b67360ed4eb70296a1b20c28391c';
$auth_token = 'e245d838d4ad9246653c27e8a1c662d0';
$twilio_number = '+12394714501';

// Create a new Twilio client
$client = new Client($account_sid, $auth_token);

// Generate a random OTP (e.g., a 6-digit number)
$otp = rand(100000, 999999);



// User's phone number (replace with the actual phone number)
$to_phone_number = '+91XXXXXXXXXX';

// Send OTP via SMS
try {
    $message = $client->messages->create(
        $to_phone_number,
        [
            'from' => $twilio_number,
            'body' => "Your OTP is $otp"
        ]
    );
    echo "OTP sent: $otp";
} catch (Exception $e) {
    echo 'Error: ' . $e->getMessage();
}
?>
