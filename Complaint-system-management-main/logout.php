<?php
session_start();
session_destroy(); // Destroy all session data
echo 'logged_out'; // Response to indicate the user is logged out
?>
