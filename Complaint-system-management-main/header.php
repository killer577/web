<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>

    <!-- Include necessary icons for logout icon (e.g., Boxicons) -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <style>
        /* Navbar styling */
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 20px;
            background-color: #ffffff;
            color: #333;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
            box-sizing: border-box;
        }

        /* Left section of the navbar */
        .navbar-left h1 {
            margin: 0;
            font-size: 1.5rem;
            color: #333;
        }

        /* Right section of the navbar */
        .navbar-right {
            display: flex;
            align-items: center;
        }

        /* Logout icon styling */
        .logout {
            color: #333;
            text-decoration: none;
            font-size: 1.5rem;
            margin-left: 20px;
            display: flex;
            align-items: center;
        }

        .logout:hover {
            color: #1a73e8;
        }
    </style>
</head>
<body>
    <nav class="navbar">
        <div class="navbar-left">
            <h1>Admin Dashboard</h1>
        </div>
        <div class="navbar-right">
            <a href="#" onclick="logout()" class="logout" title="Logout">
                <i class='bx bx-log-out'></i>
            </a>
        </div>
    </nav>

    <script>
        function logout() {
            // Add your logout logic here
            window.location.href = 'login.html'; // Redirect to login page after logout
        }
    </script>
</body>
</html>
