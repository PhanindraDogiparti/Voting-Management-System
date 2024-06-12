<?php
include("db.php"); // Include your database connection file

// Query to select the top two rows ordered by vote count (vc)
$sql = "SELECT * FROM parties ORDER BY vc DESC";
$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    // Fetch the top two rows
    $row1 = $result->fetch_assoc();
    $row2 = $result->fetch_assoc();

    // Check if the vote counts of the top two rows are equal
    if ($row1['vc'] != $row2['vc'] and ($row1['vc'] > 0 or $row2['vc'] > 0) )  {

        $pname = $row1['pname']; // Assuming pname is in $row1
$vc = $row1['vc']; // Assuming vc is in $row1

// Update the results table with data from $row1
$sql = "INSERT INTO results (pname, vc, pyear) VALUES ('$pname', '$vc', CURRENT_TIMESTAMP)";

if ($conn->query($sql) === TRUE) {
    $sql = "UPDATE parties SET vc = 0";
    $result = $conn->query($sql);
    $sql = "UPDATE users SET voted = 0";
    $result = $conn->query($sql);
    header("Location: party.php");
    exit();

// Execute the query
if ($conn->query($sql) === TRUE) {
    header("Location: party.php");
    exit();echo "All rows in the vc column updated successfully.";
} else {
    echo "Error updating rows: " . $conn->error;
}

} else {
    echo "Error updating record: " . $conn->error;
}
    } else {
        echo "Top two rows do not have equal vote counts.";
    }
} else {
    echo "Not enough rows found in the table.";
}

// Close the database connection
$conn->close();
?>
