<?php
require_once('database.php');


// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $new_password = $_POST["new_password"];
    $confirm_password = $_POST["confirm_password"];
    
    // Check if the passwords match
    if ($new_password == $confirm_password) {
        // Passwords match, proceed with the password update

        // Add your connection code
        require_once('database.php');

        // Get the user's email from the session
        $email = $_SESSION["email"];

        // Hash the new password (you should always hash passwords before storing them)
        $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

        // Update the password in the database
        $query = $db->prepare('UPDATE registration SET password = :password WHERE email = :email');
        $query->bindParam(':password', $hashed_password);
        $query->bindParam(':email', $email);
        $result = $query->execute();


        // Password updated successfully
        if ($result) {
        $_SESSION['newPass'] = "reset";
        header("Location: login.php");
        }
    } else {
        // echo "Passwords do not match. Please try again.";
        header('Location: passchange.php?passwordMatch=error');
    }
}
