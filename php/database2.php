<?php
session_start();

$connect = mysqli_connect("localhost", "root", "", "foodie");

if (!$connect) {
    die("Something is wrong!");
} else {
    if ((isset($_SESSION['logged']))) {
        $email =  $_SESSION['user_email'];
        $user_sql = "SELECT * FROM registration where email='$email'";
        $user_result = mysqli_query($connect, $user_sql);
        $user_value = mysqli_fetch_assoc($user_result);
    }
}
?>