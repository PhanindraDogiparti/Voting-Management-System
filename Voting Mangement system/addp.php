<?php 
include("db.php");
echo print_r($_POST);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
// Store the value 0 in a variable
$vc = 0;

// Prepare the SQL statement
$stmt = $conn->prepare("INSERT INTO parties (lname, addr, pname, image_url, phno, vc) VALUES (?, ?, ?, ?, ?, ?)");

// Bind parameters to the prepared statement
$stmt->bind_param("sssssi", $lname, $addr1, $pname, $targetFile, $phno, $vc);

// Set parameters and execute the statement

$lname = $_POST["lname"];
$addr1 = $_POST["addr"];
$pname = $_POST["pname"];
$phno = $_POST["phno"];

$targetDir ="";
$targetFile  = "";
    if (isset($_FILES["image"]) && $_FILES["image"]["error"] == 0) {
    $targetDir = "./images/"; // Specify the target directory where you want to move the file
    $targetFile = $targetDir . basename($_FILES["image"]["name"]); // Specify the path to the file in the target directory

    // Move the uploaded file to the target directory
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
        echo "The file " . basename($_FILES["image"]["name"]) . " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

// Execute the statement
if ($stmt->execute()) {
    // If successful, set session message and redirect
    $_SESSION['done'] = "Registration successful!";
    header("Location: Parties.php"); // Redirect back to the form page or any other page you prefer
    exit();
} else {
    // If unsuccessful, set session message and redirect
    $_SESSION['no'] = "Registration failed!";
    header("Location: Parties.php");
    exit();
}

// Close the statement and database connection
$stmt->close();
$conn->close();
} else {
// If the form is not submitted via POST method, redirect to the form page
$_SESSION['no'] = "Access denied!";
header("Location: Parties.php");
exit();
}


?>