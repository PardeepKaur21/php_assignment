<?php
// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve form data
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $employeeID = $_POST['employeeID'];
    $department = $_POST['department'];
    $date = $_POST['date'];
    $hours = $_POST['hours'];

    // Database connection parameters
    $servername = 'localhost';
    $dbname = 'employee';
    $username = 'root';
    $password = '';
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare SQL statement
    $sql = "INSERT INTO employee_hours (first_name, last_name, email, employee_id, department, date, hours)
    VALUES (?, ?, ?, ?, ?, ?, ?)";

    // Prepare and bind parameters
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssss", $firstName, $lastName, $email, $employeeID, $department, $date, $hours);

    
    // Execute statement
    if ($stmt->execute()) {
        // Redirect back to the add.html page after successful data insertion
        header('Location: view.php');
        exit();
    } else {
        // Handle error if data insertion fails
        echo "Error: " . $sql . "<br>" . $stmt->error;
    }
}
?>
