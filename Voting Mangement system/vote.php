<?php
include("db.php");
session_start();
$id = $_GET['id'];

// Increment the vc field for the specified ID
$sql = "UPDATE parties SET vc = vc + 1 WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);

// Check if the update was successful
if ($stmt->execute()) {
    $id = $_SESSION['id']; // Assuming you're getting the ID from somewhere, like a query string

    $sql = "UPDATE users SET voted = 1 WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    
    if ($stmt->execute()) {
        header("Location: voting.php");
    exit();
    } else {
        echo "Error updating voted status: " . $conn->error;
    }
} else {
    echo "Error updating vote count: " . $conn->error;
}

// Close the statement and database connection
$stmt->close();
$conn->close();
?>
