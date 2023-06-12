<?php
// Database connection parameters
$servername = 'localhost';
$dbname = 'employee';
$username = 'root';
$password = '';

// Pagination variables
$recordsPerPage = 10;
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$offset = ($page - 1) * $recordsPerPage;

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve data from the database with pagination
$sql = "SELECT * FROM employee_hours ORDER BY `date` DESC LIMIT $offset, $recordsPerPage";
$result = $conn->query($sql);

// Get total number of records for pagination
$totalRecords = $conn->query("SELECT COUNT(*) FROM employee_hours")->fetch_row()[0];
$totalPages = ceil($totalRecords / $recordsPerPage);

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>View Employee Hours</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
 
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="#">
                    <img src="images/logo.png" alt="Portal Logo" class="logo">
                </a>
                <div class="navbar-collapse justify-content-end">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="index.html">Add</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="view.php">View</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main>
        <div class="container text-center">
            <h2>Employee Hours</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email ID</th>
                        <th>Employee ID</th>
                        <th>Department</th>
                        <th>Date</th>
                        <th>Hours Worked</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($result->num_rows > 0) {
                        $serialNo = $offset + 1; // Initialize serial number
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $serialNo . "</td>";
                            echo "<td>" . $row['first_name'] . "</td>";
                            echo "<td>" . $row['last_name'] . "</td>";
                            echo "<td>" . $row['email'] . "</td>";
                            echo "<td>" . $row['employee_id'] . "</td>";
                            echo "<td>" . $row['department'] . "</td>";
                            echo "<td>" . $row['date'] . "</td>";
                            echo "<td>" . $row['hours'] . "</td>";
                            echo "</tr>";
                            $serialNo++; // Increment serial number
                        }
                    } else {
                        echo "<tr><td colspan='8'>No records found</td></tr>";
                    }
                    ?>
                </tbody>
            </table>

            <nav aria-label="Pagination">
                <ul class="pagination">
                    <?php
                    for ($i = 1; $i <= $totalPages; $i++) {
                        $active = ($i == $page) ? "active" : "";
                        echo "<li class='page-item $active'><a class='page-link' href='view.php?page=$i'>$i</a></li>";
                    }
                    ?>
                </ul>
            </nav>
        </div>
    </main>

    <footer>
        <div class="container">
            <div class="footer-content">
                <p>&copy; 2023 Georgian College. All rights reserved.</p>
                <p>Designed by Pardeep Kaur</p>
            </div>
        </div>
    </footer>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
