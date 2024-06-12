<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="Parties.css">
<title>Party Nominee Registration</title>

</head>
<body>

<div class="container">
    <h2>Party Nominee Registration Form</h2>
    <form class="form" action="addp.php" method="post" enctype="multipart/form-data">

        <label for="name">Name:</label>
        <input type="text" id="name" name="lname" required>

        <label for="address">Address:</label>
        <input type="text" id="address" name="addr" required>

        <label for="party_name">Party Name:</label>
        <input type="text" id="party_name" name="pname" required>

        <label for="party_symbol">Party Symbol:</label>
        <input type="file" id="party_symbol" name="image" accept="image/jpeg, image/png" required>

        <label for="phone">Phone Number:</label>
        <input type="tel" id="phone" name="phno" required>
        
        <input type="submit" value="Submit" >
    </form>
</div>


</body>
</html>
