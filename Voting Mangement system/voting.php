<!DOCTYPE html>
<?php 
include("db.php");
session_start();
?>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Voting</title>
    <link rel="stylesheet" href="voting.css" />
    <script src="index.js"></script>
  </head>
  <body class="container">
    <h1>VOTE</h1>
    <div id="user">
      <span class="user">
        <img class="profile" src="Images/MaleUser.png" height="200" width="200" />
      </span>
      <span id="userInfo">
      <?php 
      $sql = "SELECT * FROM users WHERE id = '{$_SESSION['id']}'";
      $result = $conn->query($sql);
      $row = $result->fetch_assoc();
      ?>
        <p class="name">Name : <?php echo $_SESSION['name']?></p>
        <p class="name">Mobile : <?php echo $row['phno']?></p>
        <p class="name">gender : <?php echo $row['gender']?></p>
        <p class="name">Address : <?php echo $row['addr']?></p>
        <p id="stat">Status : <?php
        if($row['voted'] == 0)
          echo "Not Voted";
        else 
         echo "voted"?></p>
         <?php 
           echo "<button id=\"results\" onclick=\"location.href='logout.php'\" style=\"cursor: pointer;\">Logout</button>";


         ?>
      </span>
    </div>
    <div id="parties">
     <?php 
     if($row['vid'] != "" and $row['voted'] != 1){
      $sql = "SELECT * FROM results ORDER BY id DESC ";
// Execute the query
$result = $conn->query($sql);

// Check if the query was successful
if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo $row['pname']; // Print the last row
} 
      $sql = "SELECT * FROM results";

// Execute the query
$result = $conn->query($sql);

// Get the number of rows returned by the query
$rowCount = $result->num_rows;
      $sqli = "SELECT * FROM parties";

                    // Execute the query
                    $results = $conn->query($sqli);
                    
                    // Check if the query was successful
                    if ($results && $results->num_rows > 0 && $rowCount == 0) {
                        // Output table rows for each row in the result set
                        while ($rows = $results->fetch_assoc()) {
                            echo '<span id="party">
                            <label id="partySymbol"><img src="'.$rows['image_url'].'" width="40" height="40"></label>
                            <label id="candidate1"> '.$rows['lname'].'</label>
                            <button id="votebutton1" onclick="myFun1()"><a href="vote.php?id='.$rows['id'].'" style="color: inherit; text-decoration: none;">Click</a></button>
                            <label id="redCircle1">🔴</label>
                          </span>';

                        }
                      }
     
     }else if($row['vid'] == ""){
      echo "Voter ID not generated";
     }else{
      
      $sql = "SELECT * FROM results ORDER BY id DESC ";

// Execute the query
$result = $conn->query($sql);

// Check if the query was successful
if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo $row['pname']; // Print the last row
} else if($row['voted'] == 1){
  echo "You have used your voted";
}
     }
     ?>
    </div>
  </body>
</html>
