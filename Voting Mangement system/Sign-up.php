<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Fastkart">
    <meta name="keywords" content="Fastkart">
    <meta name="author" content="Fastkart">
    <link rel="icon" href="./Images/Vote box.png" type="image/x-icon">
    <title>sign-up</title>

    <!-- Google font -->
    <link rel="preconnect" href="https://fonts.gstatic.com/">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap">

    <!-- bootstrap css -->
    <link id="rtl-link" rel="stylesheet" type="text/css" href="bootstrap.css">

    <!-- Template css -->
    <link id="color-link" rel="stylesheet" type="text/css" href="Sign-up.css">
    <style>
        body {
            background-image: url('./Images/vote\ tick.jpg');
            background-attachment : fixed;
            background-size: cover;
            background-position: center;
            margin: 0;
            padding: 0;
        }
    </style>
</head>

<body>

    <!-- log in section start -->
    <section class="log-in-section section-b-space">
        <div class="container-fluid-lg w-100">
            <div class="row">
                <div class="col-xxl-6 col-xl-5 col-lg-6 d-lg-block d-none ms-auto">
                    <div class="image-contain">
                        <img src="./Images/vote\ tick.jpg" class="img-fluid" alt="">
                    </div>
                </div>
                <div class="col-xxl-6 col-xl-5 col-lg-6 col-sm-12 mx-auto">
                    <div class="log-in-box">
                        <div class="log-in-title">
                            <h3>Welcome Voting Management </h3>
                            <h4>Create New Account</h4>
                            <div>
                                    <?php 
                                    if(isset($_SESSION['done'])){
                                        echo $_SESSION['done'];
                                        unset($_SESSION['done']);
                                    }elseif(isset($_SESSION['no'])){
                                        echo $_SESSION['no'];
                                        unset($_SESSION['no']);
                                    }
                                    ?>
                            </div>
                        </div>

                        <div class="input-box">
                        <form class="row g-4" action="sign.php" method="post" onsubmit="return validateForm()">
 
                                <div class="col-6">
                                    <div class="form-floating theme-form-floating">
                                        <input type="text" name="fname" class="form-control" id="fullname" placeholder="Full Name" required>
                                        <label for="fullname" >First Name</label>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-floating theme-form-floating">
                                        <input type="text" name="lname" class="form-control" id="last" placeholder="Full Name" required>
                                        <label for="last" >Last Name</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating theme-form-floating">
                                        <input type="email" name="email" class="form-control" id="email" placeholder="Email Address" required>
                                        <label for="email" >Email Address</label>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-floating theme-form-floating">
                                        <select class="form-control form-select" id="pin" name="pin"  required style="font-family: 'Public Sans', sans-seri;" placeholder="Select Gender" required>
                                            <option value="-">-</option>
                                        </select>
                                        <label> Select Country Code</label>
                                    
                                    </div>
                                </div>
                                
                    
                                <div class="col-6">
                                    <div class="form-floating theme-form-floating">
                                        <input type="number" class="form-control" required name="phno" id="exampleFormControlInput3"
                                            placeholder="Enter Your Phone Number" maxlength="10" oninput="javascript: if (this.value.length > this.maxLength) this.value =
                                            this.value.slice(0, this.maxLength);">
                                        
                                        <label for="exampleFormControlInput3" required>Enter Phone Number</label>
                                    </div>
                            
                                </div>
                                <script>
                                    // Get the dropdown elements
                                        var countryDropdown = document.getElementById("pin");   
                                            fetch('CountryCodes.json')
                                            .then(function(response) {
                                                      return response.json();
                                            }).then(function(data) {
                                                    var countries = data.countries;
                                                    countries.forEach(function(countryObj) {
                                                    var country = countryObj.name;
                                                    var code = countryObj.dial_code;
                                                    var option = document.createElement("option");
                                                    option.text = country+" ("+code+")";
                                                    option.value = code;
                                                     countryDropdown.add(option);
                                                });
                                            countryDropdown.dataset.states = JSON.stringify(data.countries);
                                            })
                                        .catch(function(error) {
                                            console.log(error);
                                    });       
                                </script>
                                <div class="col-6">
                                    <div class="form-floating theme-form-floating">
                                        <select class="form-control form-select" required name="gender" id="gender" style="font-family: 'Public Sans', sans-seri;" placeholder="Select Gender" required>
                                            <option value="-">-</option>
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                            <option value="others">Others</option>
                                        </select>
                                        <label> Select Gender</label>
                                    </div>
                                </div>
                                
                               <div class="col-6">
                                <div class="form-floating theme-form-floating date-box">
                                        <input type="date" name="dob" required class="form-control">
                                        <label>Select Date</label>
                                    </div>
                                </div>
                                <div class="col-6">
                                <div class="form-floating theme-form-floating">
                                        <input type="text" name="hno" required class="form-control" id="dno" placeholder="Full Name">
                                        <label for="dno" >House No. / Flat No.</label>
                                </div>
                                </div>
                                <div class="col-6">
                                <div class="form-floating theme-form-floating">
                                        <input type="text" name="city" required class="form-control" id="cty" placeholder="Full Name">
                                        <label for="cty" >City</label>
                                </div>
                                </div>
                                <div class="col-12">
                                <div class="form-floating theme-form-floating">
                               
                                        <textarea class="form-control" required name="addr" id="exampleFormControlTextarea1" rows="4"
                                            placeholder="Comments"></textarea>
                                            <label for="dno" >Address / Land Marks</label>
                                </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-floating theme-form-floating">
                                        <select class="form-control form-select" required name="country" id="country" onchange="updateStates()" style="font-family: 'Public Sans', sans-seri;" required>
                                        <option value="-">-</option>
                                        </select>
                                        <label> Select Country</label>
                                    </div>
                                </div>
                                <script>
                                    // Get the dropdown elements
                                        var x = document.getElementById("country");   
                                            fetch('country.json')
                                            .then(function(response) {
                                                      return response.json();
                                            }).then(function(data) {
                                                    var countries = data.countries;
                                                    countries.forEach(function(countryObj) {
                                                    var country = countryObj.country;
                                                    var option = document.createElement("option");
                                                    option.text = country;
                                                    option.value = country;
                                                     x.add(option);
                                                });
                                            x.dataset.states = JSON.stringify(data.countries);
                                            })
                                        .catch(function(error) {
                                            console.log(error);
                                    });       
                                </script>
                                <div class="col-6">
                                    <div class="form-floating theme-form-floating">
                                        <select class="form-control form-select" required name="state" id="state" style="font-family: 'Public Sans', sans-seri;"  required>
                                            <!-- <option value="-">-</option> -->
                                        </select>
                                        <label> Select State</label>
                                    </div>
                                </div>
                                <script>
                                    var stateDropdown = document.getElementById("state");
                                    function updateStates() {
                                        var selectedCountry = x.value;
                                        var states = [];
                                        var countryStateData = JSON.parse(x.dataset.states);
                                var selectedCountryObj = countryStateData.find(function(countryObj) {
                                        return countryObj.country === selectedCountry;
                                        });

                                if (selectedCountryObj) {
                                             states = selectedCountryObj.states;
                                    }        
                                stateDropdown.innerHTML = "";
                                var nullOption = document.createElement("option");
                                nullOption.text = "-"; // Text for the null option
                                nullOption.value = ""; // Value for the null option (can be empty or any desired value)
                                stateDropdown.add(nullOption);
                               
                            stateDropdown.add(nullOption);
                            states.forEach(function(state) {
                             var option = document.createElement("option");
                            option.text = state;
                            option.value = state;
                            stateDropdown.add(option);
                             });
                            }
                                </script>
                        <div class="col-6">
                                    <div class="form-floating theme-form-floating">
                                        <input type="number" required class="form-control" id="cpin"
                                            placeholder="Enter Your Phone Number" maxlength="6" oninput="javascript: if (this.value.length > this.maxLength) this.value =
                                            this.value.slice(0, this.maxLength);">
                                        
                                        <label  >Enter City Pin Code</label>
                                    </div>
                            
                                </div>
                                <div class="col-12">
        <div class="form-floating theme-form-floating">
            <input type="password" required name="password" class="form-control" id="password"
                placeholder="Password" onkeyup="validatePassword()">
            <label for="password">Password</label>
            <div id="passwordValidationMsg"></div> <!-- Placeholder for password validation message -->
        
        </div>
    </div>
    <div class="col-12">
        <div class="form-floating theme-form-floating">
            <input type="password" required class="form-control" id="cpassword"
                placeholder="Confirm Password" onkeyup="checkPasswordMatch()">
            <label for="cpassword">Confirm Password</label>
            <div id="passwordMatch"></div> <!-- Placeholder for password match message -->
        </div>
    </div>

                                <div class="col-12">
                                    <div class="forgot-box">
                                        <div class="form-check ps-0 m-0 remember-box">
                                            <input class="checkbox_animated check-box" type="checkbox"
                                                id="flexCheckDefault" >
                                            <label class="form-check-label" for="flexCheckDefault">I agree with
                                                <span>Terms</span> and <span>Privacy</span></label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <button name="submit" value="submit" id="submit" class="btn btn-animation w-100" style="display: none;" type="submit">Sign Up</button>
                                    <div class="sign-up-box" id="formexception">
                                    </div>
                                    <div ></div> 
                                </div>
                            </form>
                        <script>
                                 function validatePassword() {
        var password = document.getElementById("password").value;
        var passwordValidationMsg = document.getElementById("passwordValidationMsg");

        // Validate password format
        var passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[^\da-zA-Z]).{8,}$/;
        if (!passwordRegex.test(password)) {
            passwordValidationMsg.innerHTML = "Password must be at least 8 characters long, contain at least one uppercase letter, one special character, and one digit.";
            passwordValidationMsg.style.color = "red";
        } else {
            passwordValidationMsg.innerHTML = "Password meets the criteria.";
            passwordValidationMsg.style.color = "green";
        }
        checkPasswordMatch()
    }

    function checkPasswordMatch() {
        var password = document.getElementById("password").value;
        var confirmPassword = document.getElementById("cpassword").value;
        var passwordMatchDiv = document.getElementById("passwordMatch");
        var sub = document.getElementById("submit");
        if (confirmPassword != "" && password !="") {
            if (password === confirmPassword) {
            sub.style.display = "block";
            passwordMatchDiv.innerHTML = "Passwords match.";
            passwordMatchDiv.style.color = "green";
        } else {
            sub.style.display = "none";
            passwordMatchDiv.innerHTML = "Passwords do not match.";
            passwordMatchDiv.style.color = "red";
        }
        }
    }
    function validateForm() {
    var password = document.getElementById("password").value;
    var pin = document.getElementById("pin").value;
    var confirmPassword = document.getElementById("cpassword").value;
    var alter = document.getElementById("formexception");
    var message = document.createElement("h4");
    var state = document.getElementById("state").value;
    var country = document.getElementById("country").value;
    var gender = document.getElementById("gender").value;
    var f = 0, s = "";
    if (pin === "-") {
        f = 1;
        s += "Invalid Mobile Pin code<br>";
    }
    if( state === "-" || state == "") {
        f = 1;
        s += "Invalid State<br>";
    }
    if( country === "-") {
        f = 1;
        s += "Invalid Country<br>";
    }
    if( gender === "-") {
        f = 1;
        s += "Invalid Gender<br>";
    }
    if (f === 1) {
        alter.innerHTML = "";
        message.innerHTML = s;
        message.style.color = "red";
        alter.appendChild(message); // Append the error message to the 'formexception' element
        return false; // Prevent form submission
    }

    return true; // Allow form submission
}

</script>
                        </div>

                       
                       
                        <div class="other-log-in">
                            <h6></h6>
                        </div>

                        <div class="sign-up-box">
                            <h4>Already have an account?</h4>
                            <a href="Login.php">Log In</a>
                        </div>
                    </div>
                </div>
                

                <div class="col-xxl-7 col-xl-6 col-lg-6"></div>
            </div>
        </div>
    </section>
</body>
</html>