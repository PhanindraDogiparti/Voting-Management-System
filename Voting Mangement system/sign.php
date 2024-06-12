<?php 
include("db.php");
session_start();
$stmt = $conn->prepare("INSERT INTO users (fname, lname, email, pin, phno, gender, dob, hno, city, addr, country, state, password) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sssssssssssss", $fname, $lname, $email, $pin, $phno, $gender, $dob, $hno, $city, $addr, $country, $state, $password);

// Set parameters
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'];
$pin = $_POST['pin'];
$phno = $_POST['phno'];
$gender = $_POST['gender'];
$dob = $_POST['dob'];
$hno = $_POST['hno'];
$city = $_POST['city'];
$addr = $_POST['addr'];
$country = $_POST['country'];
$state = $_POST['state'];
$password = $_POST['password'];

// Execute the statement
if ($stmt->execute()) {
    $_SESSION['done'] = "User Successfully Regiestered";
    header("Location: Sign-up.php");
    exit();
} else {
    $_SESSION['no'] = "User Already Exist/ Duplicate details found";
    header("Location: Sign-up.php");
    exit();
}
?>