<?php
// Database connection parameters
$servername = "#"; // Change this to your database server address (localhost)
$username = "#"; // Change this to your database username (root)
$password = "#"; // Change this to your database password (Root)
$database = "#"; // Change this to your database name (vms)

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
