<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title >Voting Management system</title>
    <link rel="stylesheet" href="./style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rakkas&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1>E-Vote</h1>
        <img src="./images/india.jpg" alt="Your Image">
        <div class="navbar">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="">About</a></li>
                <li><a class="login" href="Login.php">Login</a></li>
                <li><a class="sign-up" href="Sign-up.php">Sign-up</a></li>
                <li><a class="sign-up" href="admin.php">Admin Login</a></li>
            </ul>
        </div>
    </div>
    <div class="content">
        <h2>" Think twice Vote wise"</h2>
        <p>Vote your valuable vote here</p>
    </div>
    
    
        <!-- Register -->
<div class="registerContainer1">
    <div class="registerImg1">
        <div class="RegisterButton1">
        <button class="button-style" onclick="window.location.href='Registration.php'">Registration</button>
    </div>
    </div>
    <div class="papa">
    <h2>Register Here</h2>
    <p style="max-width: 800px; margin: 0 auto; font-size: 18px;">Enabling users to create secure accounts, facilitating their participation in the democratic process. Seamlessly integrating individuals into the electoral system for fair and transparent voting.</p>

</div>
</div>


    <!-- Voting -->
    <div class="registerContainer right" style="text-align: center;">
    <div class="papa1">
    <h2>Vote Here</h2>
    <p style="max-width: 800px; margin: 0 auto; font-size: 18px;"> Voting is just when people pick their favorite options or candidates in elections. It's how we decide who's going to represent us and make decisions about stuff that affects our lives.</p>

</div>
    <div class="registerImg3" style="margin-bottom: 20px;">
        <div class="RegisterButton3">
            <button class="button-style" style="background-color: #007bff; color: #fff; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer;" onclick="window.location.href='Login.php'">Voting</button>
        </div>
    </div>
</div>


    
    <!-- Parties -->
    <div class="registerContainer2">
    <div class="registerImg2">
        <div class="RegisterButton2">
        <button class="button-style" onclick="window.location.href='Parties.php'">Parties</button>
    </div>
    </div>
    <div class="papa">
    <h2>Add Your Party Here</h2>
    <p style="max-width: 800px; margin: 0 auto; font-size: 18px;">An organized group of individuals or organizations that want to win political power through elections in order to govern a nation.</p>

</div>
</div>
    
<!-- Footer -->
    <footer>
        <div class="footer-section">
            <div class="footer-1">
                <img src="Images/india.jpg" class="logo" alt="Election Commission of India Logo">
                <h2>Election Commission of India</h2>
                <p>The Election Commission of India is an autonomous constitutional authority responsible for administering election processes in India. The body administers elections to the Lok Sabha, Rajya Sabha, State Legislative Assemblies in India, and the offices of the President and Vice President in the country.</p>
            </div>
            <div class="footer-1 quick-links">
                <h3>Quick Links</h3>
                <ul>
                    <li><a href="#">Privacy Policy</a></li>
                    <li><a href="#">Terms of Service</a></li>
                    <li><a href="#">Contact Us</a></li>
                    <li><a href="#">Feedback</a></li>
                </ul>
            </div>
            <div class="social-icons">
                <a href="https://www.facebook.com/?locale2=en_GB&_rdr" class="fa-brands fa-facebook-f"></a>
                <a href="https://www.instagram.com/" class="fa-brands fa-instagram"></a>
                <a href="#" class="fa-brands fa-twitter"></a>
                <a href="#" class="fa-brands fa-whatsapp"></a>
            </div>
        </div>
        <hr>
        <p class="copyright">© Copyright Election Commission of India 2024</p>
    </footer>
    <script src="https://kit.fontawesome.com/83822ccbb5.js" ></script>
</body>
</html>
