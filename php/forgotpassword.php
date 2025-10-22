<?php

// To Remove unwanted errors
error_reporting(0);

// Add your connection Code
require_once('database.php');

// Important Files (Please check your file path according to your folder structure)
require "./PHPMailer-master/src/PHPMailer.php";
require "./PHPMailer-master/src/SMTP.php";
require "./PHPMailer-master/src/Exception.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

// Email From Form Input
$email = $_POST["email"];
$_SESSION["email"] = $email;
// Generate Random 6-Digit OTP
$verification_otp = random_int(100000, 999999);
$_SESSION["otp"] = $verification_otp;
// Full Name of User
$query = $db->prepare('SELECT COUNT(*) AS count FROM registration WHERE email = :email');

// Bind the email parameter
$query->bindParam(':email', $email);

// Execute the query
$query->execute();

// Get the number of rows returned
$count = $query->fetchColumn();

// Check if the email exists
if ($count > 0) {
 
  sendMail($email, $verification_otp, $send_to_name);
  header('Location: reset.php');
  
} else {
  // Email does not exist
  header('Location: forgotpassform.php?email=notFound');
}





function sendMail($send_to, $otp, $name) {
    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = "tls";
    $mail->Host = "smtp.gmail.com";
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    // Enter your email ID
    $mail->Username = "kaziratun2020@gmail.com";
    $mail->Password = "uqujpnxpqsaplyvv";

    // Your email ID and Email Title
    $mail->setFrom("kaziratun2020@gmail.com", "Foodie");

    $mail->addAddress($send_to);

    // You can change the subject according to your requirement!
    $mail->Subject = "Password Reset";

    // You can change the Body Message according to your requirement!
    $mail->Body = "Hello, Your account password reseting OTP is:  {$otp}.";
    $mail->send();
}


?>
<input type="hidden" id="otp" value="<?php echo $verification_otp; ?>">
