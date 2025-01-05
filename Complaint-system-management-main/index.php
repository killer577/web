<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: login.html');
    exit;
}

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "complaint_db"; // Replace with your database name

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch complaints in descending order
$sql = "SELECT * FROM complaints ORDER BY id DESC";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
    <style>
        
        .yellow-dot {
            width: 10px;
            height: 10px;
            background-color: #66ccff;
            border-radius: 50%;
            margin-left: 10px;
            display: inline-block;
        }
        /* Your existing styles for sidebar, navbar, etc. */
         /* General body style */
    body {
        margin: 0;
        padding: 0;
        font-family: Arial, sans-serif;
        background: linear-gradient(135deg, #f3f3f3 25%, #e0e0e0 100%);
        transition: background 0.3s ease;
    }

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
        transition: background-color 0.3s ease;
    }

    /* Left section of the navbar */
    .navbar-left {
        display: flex;
        align-items: center;
    }

    .navbar-left h1 {
        margin: 0;
        font-size: 1.5rem;
        color: #333;
        text-align: center;
        flex: 1;
    }

    /* Sidebar toggle button */
    .sidebar-toggle {
        font-size: 1.5rem;
        cursor: pointer;
        margin-right: 20px;
        color: #333;
        transition: color 0.3s ease;
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
        transition: color 0.3s ease;
    }

    .logout:hover {
        color: #1a73e8;
    }

    /* Main content styling */
    .content {
        padding-top: 70px;
        max-width: 1200px;
        margin: 3rem auto;
        padding: 2rem;
        background-color: #ffffff;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
        text-align: left;
        animation: fadeIn 1s ease-out;
    }

    /* Complaints section */
    .complaint {
        background-color: #f9f9f9;
        border-radius: 8px;
        padding: 1rem;
        margin-bottom: 1rem;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        position: relative;
        cursor: pointer;
        text-align: left;
        animation: slideIn 0.5s ease-out;
    }

    .complaint h2 {
        margin: 0;
        color: #333;
        position: relative;
    }

    .close-icon {
        position: absolute;
        top: 2px;
        right: 8px;
        font-size: 1.2rem;
        cursor: pointer;
        color: #888;
        padding: 8px;
        transition: color 0.3s ease;
    }

    .close-icon:hover {
        color: #d9534f;
    }

    .complaint p {
        margin: 0.5rem 0 0;
        color: #555;
    }

    /* Sidebar styling */
    .sidebar {
        position: fixed;
        top: 0;
        left: -250px;
        width: 250px;
        height: 100%;
        background-color: #f3f3f3;
        box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
        transition: left 0.3s ease;
        z-index: 999;
        display: flex;
        flex-direction: column;
        padding-top: 70px;
    }

    .sidebar a {
        padding: 15px 20px;
        text-decoration: none;
        font-size: 1.1rem;
        color: #333;
        transition: background 0.3s, color 0.3s;
    }

    .sidebar a:hover {
        background-color: #ddd;
    }

    /* Sidebar open state */
    .sidebar-open {
        left: 0;
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {
        .navbar-left h1 {
            font-size: 1.2rem;
        }

        .logout {
            font-size: 1.2rem;
        }

        .content {
            padding: 1.5rem;
            margin: 1.5rem auto;
        }

        .complaint {
            padding: 0.8rem;
            margin-bottom: 0.8rem;
        }

        .close-icon {
            font-size: 1rem;
            padding: 6px;
        }
    }

    /* CSS Animations */
    @keyframes fadeIn {
        from { opacity: 0; }
        to { opacity: 1; }
    }

    @keyframes slideIn {
        from { transform: translateX(-10%); opacity: 0; }
        to { transform: translateX(0); opacity: 1; }
    }
    </style>
    <title>Admin Page</title>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <a href="index.php">Home</a>
        <a href="send_otp.php">User Interface</a>
        <a href="sample.html">Complaint Form</a>
        <a href="news.html">News</a>
    </div>

    <!-- Navbar -->
    <nav class="navbar">
        <div class="navbar-left">
            <i class='bx bx-menu sidebar-toggle' id="sidebarToggle"></i>
            <h1>Admin Dashboard</h1>
        </div>
        <div class="navbar-right">
            <a href="#" onclick="logout()" class="logout" title="Logout">
                <i class='bx bx-log-out'></i>
            </a>
        </div>
    </nav>

    <div class="content" data-aos="fade-up">
        <h2>Welcome to the Admin Dashboard</h2>
        <p>This is your admin control panel. Manage your complaints here.</p>

        <?php if ($result && $result->num_rows > 0): ?>
            <?php while ($row = $result->fetch_assoc()): ?>
                <div class="complaint" data-aos="fade-up" data-aos-delay="100" data-id="<?php echo $row['id']; ?>" onclick="viewDetails(<?php echo $row['id']; ?>)">
                    <h2>
                        <?php echo htmlspecialchars($row['name']); ?>
                        <?php echo $row['viewed'] == 0 ? '<span class="yellow-dot"></span>' : ''; ?>
                    </h2>
                    <p><?php echo htmlspecialchars($row['subject']); ?></p>
                    <span class="close-icon" onclick="deleteComplaint(event, <?php echo $row['id']; ?>)">&times;</span>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <p>No complaints found.</p>
        <?php endif; ?>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script>
    document.addEventListener('DOMContentLoaded', () => {
        // Initialize AOS
        AOS.init();

        // Toggle Sidebar
        const sidebarToggle = document.getElementById('sidebarToggle');
        const sidebar = document.getElementById('sidebar');
        sidebarToggle.addEventListener('click', function() {
            sidebar.classList.toggle('sidebar-open');
            this.classList.toggle('bx-menu');
            this.classList.toggle('bx-x');
        });

        // Close sidebar when a link is clicked
        document.querySelectorAll('.sidebar a').forEach(link => {
            link.addEventListener('click', function() {
                sidebar.classList.remove('sidebar-open');
                sidebarToggle.classList.add('bx-menu');
                sidebarToggle.classList.remove('bx-x');
            });
        });
    });

    // Logout functionality
    function logout() {
        fetch('logout.php')
            .then(response => response.text())
            .then(data => {
                if (data === 'logged_out') {
                    window.location.href = 'login.html';
                }
            });
    }

    // Delete complaint
    function deleteComplaint(event, id) {
        event.stopPropagation();
        if (confirm("Are you sure you want to delete this complaint?")) {
            fetch(`delete_complaint.php?id=${id}`, { method: 'DELETE' })
                .then(response => response.text())
                .then(data => {
                    if (data === 'deleted') {
                        event.target.closest('.complaint').remove();
                    }
                });
        }
    }

    // View complaint details
    function viewDetails(id) {
        // Mark the complaint as viewed when clicked
        fetch(`mark_viewed.php?id=${id}`, { method: 'POST' })
            .then(response => response.text())
            .then(data => {
                if (data === 'marked') {
                    const complaintDiv = document.querySelector(`[data-id="${id}"]`);
                    const dot = complaintDiv.querySelector('.yellow-dot');
                    if (dot) {
                        dot.remove();
                    }
                }
            });
        window.location.href = `complaint_details.php?id=${id}`;
    }
    </script>
</body>
</html>

<?php $conn->close(); ?>
