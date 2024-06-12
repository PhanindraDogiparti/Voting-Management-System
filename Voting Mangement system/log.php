<?php 
session_start();
foreach ($_POST as $key => $value) {
    // Print the key and value
    echo "Key: " . $key . ", Value: " . $value . "<br>";
}
include("db.php");
$username = $_POST['username'];
$password = $_POST['password'];
$sql = "SELECT * FROM users WHERE email = '$username' AND password = '$password'";
$result = $conn->query($sql);

// Check if any rows were returned
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $_SESSION['id'] = $row['id'];
    $_SESSION['name'] = ucfirst($row['fname'])." ".ucfirst($row['lname']);
    $_SESSION['done'] = "User Successfully LogedIn";
    header("Location: voting.php");
    exit();
} else {
    $_SESSION['no'] = "Invalid Credentials";
    header("Location: Login.php");
    exit();
}
?>