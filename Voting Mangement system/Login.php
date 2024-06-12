<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Voting Management System</title>
    <link rel="stylesheet" href="login.css">
    <link rel="icon" href="./Images/Vote box.png" type="image/x-icon">
</head>
<body>
    <div class="container">
        <h1>Login</h1>
        <form action="log.php" method="post">
            <div class="form-group">
                <label for="Voterid">Email ID:</label>
                <input type="email" id="username" name="username" required style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;">

            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit">Login</button>
        </form>
        <p style="text-align: center; color: <?php echo isset($_SESSION['no']) ? 'red' : 'black'; ?>">
    <?php 
    if(isset($_SESSION['done'])){
        echo $_SESSION['done'];
        unset($_SESSION['done']);
    } elseif(isset($_SESSION['no'])) {
        echo $_SESSION['no'];
        unset($_SESSION['no']);
    }
    ?>
</p>

        <p>Don't have an account? <a href="Sign-up.php">Sign up here</a></p>
    </div>
</body>
</html>
