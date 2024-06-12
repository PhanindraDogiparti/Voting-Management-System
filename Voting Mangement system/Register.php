<?php
session_start();
include("db.php");
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Connect to the database (replace these values with your actual database credentials)
   

    // Prepare and bind the insert statement
    $stmt = $conn->prepare("INSERT INTO users (fname, lname, email, phno, gender, dob, city, addr, country, state, password, image_url) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?,?)");
    $stmt->bind_param("ssssssssssss", $fname, $lname, $email, $phno, $gender, $dob, $city, $addr1, $country, $state,$pass,$targetFile);

    // Set parameters and execute the statement
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $email = $_POST["email"];
    $phno = $_POST["phno"];
    $gender = $_POST["gender"];
    $dob = $_POST["dob"];
    $addr1 = $_POST["addr1"];
    $country = $_POST["country"];
    $city = $_POST["city"];
    $state = $_POST["state"];
    $pass = $_POST["pass"];
    echo print_r($_POST);
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
       
        header("Location: index.php"); // Redirect back to the form page or any other page you prefer
        exit();
    } else {
        // If unsuccessful, set session message and redirect
      
        header("Location: index.php");
        exit();
    }

    // Close the statement and database connection
    $stmt->close();
    $conn->close();
} else {
    // If the form is not submitted via POST method, redirect to the form page
    $_SESSION['no'] = "Access denied!";
    header("Location: index.php");
    exit();
}
?>
