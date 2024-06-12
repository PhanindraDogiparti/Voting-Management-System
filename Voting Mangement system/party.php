<?php 
include("db.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="admin.css">
    <!-- <link rel="stylesheet" href="modal.css"> -->
    <style>
        /* Style for the wrapper div */
        .heading-container {
            text-align: center; /* Align text to center */
            margin-bottom: 20px; /* Add some space below the heading */
        }

        /* Style for the heading box */
        .heading-box {
            display: inline-block; /* Display as a block element */
            padding: 10px 20px; /* Add padding */
            background-color: #f0f0f0; /* Background color */
            border: 1px solid #ccc; /* Border */
            border-radius: 5px; /* Rounded corners */
        }
    </style>
</head>
<body>
<div class="h" style="background-color: #333; text-align: center;">
        <h1 style="color: #fff; padding: 20px;">Admin Panel</h1>
    </div>

    <nav>
        
        <ul>
            <li><a href="admin.php">Dashboard</a></li>
            <li><a href="#manage-users">Manage Users</a></li>
            <li><a href="#manage-votes">Registrations</a></li>
            <li><a href="#manage-votes">Votecount</a></li>
            <li><a href="#manage-votes">Parties</a></li>


            <!-- Add more navigation links as needed -->
        </ul>
    </nav>

    <main>
        <!-- Main content area -->
        <!-- <section id="dashboard">
            <h2>Dashboard</h2>
            Add dashboard content here 
        </section>-->

        <!-- <section id="manage-users">
            <h2>Manage Users</h2>
            <!-Add manage users content here -->
       

        <section id="Regisation">
           <div class="heading-container">
        <div class="heading-box">
            <h2>Parties</h2>
        </div>
    </div>
            <table>
                <thead>
                    <tr>
                        <?php 
                        $tableName = 'parties'; // Replace 'users' with your actual table name

                        // SQL query to fetch column names
                        $sql = "SHOW COLUMNS FROM $tableName";
                        
                        // Execute the query
                        $result = $conn->query($sql);
                        
                        // Check if the query was successful
                        if ($result) {
                            // Fetch column names
                            $columnNames = array();
    while ($row = $result->fetch_assoc()) {
        $columnNames[] = $row['Field'];
    }
                            // Print column names
                            foreach ($columnNames as $columnName) {
                                echo "<th>$columnName</th>";
                            }
                        }
                        ?>
                        
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT * FROM parties";

                    // Execute the query
                    $result = $conn->query($sql);
                    
                    // Check if the query was successful
                    if ($result && $result->num_rows > 0) {
                        // Output table rows for each row in the result set
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            // Iterate over each row's columns and print them dynamically
                            foreach ($row as $column => $value) {
                                if($column == "image_url"){
                                    echo "<td><img src='" . $row['image_url'] . "' alt='' onclick='showImage(this)' width='100' height='100'></td>";
                                    

                                }else
                                echo "<td>$value</td>";
                            }
                           
                            // Additional columns like image and button
                           
        echo "</tr>";
                        }
                    } else {
                        echo "No users found.";
                    } 
                    ?>
                    <!-- Add more rows for other votes -->
                </tbody>
            </table>
            <div class="heading-container" style="margin-top: 30px">
        <div class="heading-box">
            <h2><a href="presults.php?" style="color: inherit; text-decoration: none;">Public Results</a></h2>
        </div>
    </div>
        </section>
    </main>

   

    <!-- <script >// Function to approve a vote
        function approveVote(button) {
            // Find the row containing the button
            var row = button.closest('tr');
            
            // Change the status to Approved
            row.querySelector('td:nth-child(3)').textContent = 'Approved';
            
            // Disable the button
            button.disabled = true;
        }
        
        // Function to show the image in a modal
        function showImage(img) {
            // Get the modal
            var modal = document.getElementById("myModal");
        
            // Get the image and insert it inside the modal - use its "alt" text as a caption
            var modalImg = document.getElementById("img01");
            modal.style.display = "block";
            modalImg.src = img.src;
        }
        
        // Function to close the modal
        function closeModal() {
            document.getElementById("myModal").style.display = "none";
        }
        
        // Get the modal element
        var modal = document.getElementById("myModal");
        
        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
        

    </script>
     -->
</body>
</html>
