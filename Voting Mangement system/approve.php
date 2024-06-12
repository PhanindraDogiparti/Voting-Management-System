<?php
include("db.php");
// Retrieve the ID from the URL parameter
$id = $_GET['id'];
$mail = $_GET['mail'];


// Function to generate a string with 3 alphabets followed by 7 integers
function generateString() {
    $result = '';
    $alphabet = range('A', 'Z'); // Array of alphabets from A to Z

    // Generate 3 random alphabets
    for ($i = 0; $i < 3; $i++) {
        $result .= $alphabet[array_rand($alphabet)]; // Append a random alphabet from the range
    }

    // Generate 7 random numbers
    for ($i = 0; $i < 7; $i++) {
        $result .= mt_rand(0, 9); // Append a random number between 0 and 9
    }

    return $result;
}

// Generate a single string
$string = generateString();


// Update the users table with the generated string
$sql = "UPDATE users 
        SET vid = '$string'
        WHERE id = $id";
        
// Assuming you have a database connection already established
// Replace 'your_connection' with your actual database connection variable
if ($conn->query($sql) === TRUE) {
    // Redirect back to your page after updating the record
    // 
// Set up Gmail SMTP settings
// $smtpUsername = 'your@gmail.com'; // Your Gmail address
// $smtpPassword = 'your_password'; // Your Gmail password
// $smtpHost = 'smtp.gmail.com';
// $smtpPort = 587; // Gmail SMTP port (TLS)

// // Set email subject and message
// $subject = "Your subject here";
// $message = "Your message here";

// // Additional headers
// $headers = "From: your@gmail.com" . "\r\n" .
//            "Reply-To: your@gmail.com" . "\r\n" .
//            "X-Mailer: PHP/" . phpversion();

// // Set up SMTP configuration
// ini_set('SMTP', $smtpHost);
// ini_set('smtp_port', $smtpPort);
// ini_set('sendmail_from', $smtpUsername);

// // Set PHPMailer
// require 'PHPMailer/PHPMailerAutoload.php';
// $mail = new PHPMailer;
// $mail->isSMTP();
// $mail->Host = $smtpHost;
// $mail->Port = $smtpPort;
// $mail->SMTPAuth = true;
// $mail->Username = $smtpUsername;
// $mail->Password = $smtpPassword;
// $mail->SMTPSecure = 'tls'; // Enable TLS encryption, `ssl` also accepted
// $mail->setFrom('your@gmail.com', 'Your Name');
// $mail->addAddress('recipient@example.com'); // Add recipient email address
// $mail->Subject = $subject;
// $mail->Body = $message;

// // Send email
// if ($mail->send()) {
//     echo "Email sent successfully.";
// } else {
//     echo "Failed to send email. Error: " . $mail->ErrorInfo;
// }


    header("Location: admin.php");
    exit();
} else {
    echo "Error updating record: " . $your_connection->error;
}
?>
