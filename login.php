<?php
// Establish a connection to the database
$host = "localhost";
$username = "root";
$password = "root123";
$database = "node";
$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve the username and password from the AJAX request
$username = $_POST["Name"];
$password = $_POST["Password"];

// Perform the login validation
$sql = "SELECT * FROM admin WHERE Name = '$username' AND Password = '$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Login successful
    echo "success";
} else {
    // Login failed
    echo "failure";
}

$conn->close();
?>
