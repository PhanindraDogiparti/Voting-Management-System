
<?php 
session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registration Form</title>
    <link rel="stylesheet" href="Registration.css">
    
</head>
<body>

<section class="container">
    <header>
        <header>
            <h1>Registration Form</h1>
        </header>
    </header>
    <!-- Displaying session messages -->
    <div>
        <?php 
        if(isset($_SESSION['done'])){
            echo $_SESSION['done'];
            unset($_SESSION['done']);
        } elseif(isset($_SESSION['no'])){
            echo $_SESSION['no'];
            unset($_SESSION['no']);
        }
        ?>
    </div>

    <form class="form" action="Register.php" method="post" enctype="multipart/form-data" onsubmit="return validateForm()">
        <div class="input-box">
            <label>First Name</label>
            <input type="text" name="fname" placeholder="Enter first name" required>
        </div>

        <div class="input-box">
            <label>Last Name</label>
            <input type="text" name="lname" placeholder="Enter last name" required>
        </div>

        <div class="input-box">
            <label>Email Address</label>
            <input type="email" name="email" placeholder="Enter email address" required>
        </div>

        <div class="column">
            <div class="input-box">
                <label>Phone Number</label>
                <input type="tel" name="phno" placeholder="Enter phone number" required maxlength="10">
            </div>
            
            <div class="input-box">
                <label>Birth Date</label>
                <input type="date" name="dob" placeholder="Enter birth date" required>
            </div>
        </div>

        <div class="gender-box">
            <h3>Gender</h3>
            <div class="gender-option">
                <div class="gender">
                    <input type="radio" id="check-male" name="gender" value="male" checked>
                    <label for="check-male">Male</label>
                </div>
                <div class="gender">
                    <input type="radio" id="check-female" name="gender" value="female">
                    <label for="check-female">Female</label>
                </div>
                <div class="gender">
                    <input type="radio" id="check-other" name="gender" value="other">
                    <label for="check-other">Prefer not to say</label>
                </div>
            </div>
        </div>

        <div class="input-box address">
            <label>Address</label>
            <input type="text" name="addr1" placeholder="Enter street address" required>
            
            <div class="column">
                <div class="select-box">
                    <select name="country" id="country" required>
                        <option hidden>Select Country</option>
                    </select>
                </div>
                <input type="text" name="city" placeholder="Enter your city" required>
            </div>
            <div class="column">
                <input type="text" name="state" placeholder="Enter your region" required>
                <input type="text" name="postal_code" placeholder="Enter postal code" required maxlength="6" pattern="\d{6}" title="Postal code must be exactly six digits">
            </div>
            <div class="input-box">
    <label>Password</label>
    <input id="pass" type="password" name="pass" placeholder="password" required>
</div>
<div class="input-box">
    <label>Confirm Password</label>
    <input id="cpass" type="password" name="cpass" placeholder="Confirm password" required oninput="checkPassword()">
</div>
<div class="input-box">
        <label for="imageInput">Upload Document as JPG/PNG</label>
        <input type="file" id="imageInput" accept="image/jpeg, image/png" name="image">
    </div>

<div id="message"></div>
        </div>
        <button type="submit">Submit</button>
    </form>
</section>
<script>
    function checkPassword() {
        var pass = document.getElementById("pass").value;
        var cpass = document.getElementById("cpass").value;
        var message = document.getElementById("message");
        var submitBtn = document.getElementById("submitBtn");

        if (pass === cpass) {
            message.innerHTML = "Passwords match";
            message.style.color = "green";
            submitBtn.disabled = false;
        } else {
            message.innerHTML = "Passwords do not match";
            message.style.color = "red";
            submitBtn.disabled = true;
        }
    }
</script> 

<script>
    // Fetching countries data and populating the dropdown
    var countryDropdown = document.getElementById("country");
    fetch('country.json')
        .then(function(response) {
            return response.json();
        })
        .then(function(data) {
            var countries = data.countries;
            countries.forEach(function(countryObj) {
                var option = document.createElement("option");
                option.text = countryObj.country;
                option.value = countryObj.country;
                countryDropdown.add(option);
            });
        })
        .catch(function(error) {
            console.log(error);
        });

    // Validation functions
    function validateForm() {
        // Your validation logic here
        return true; // Return true to allow form submission, false to prevent it
    }
</script>

</body>
</html>





