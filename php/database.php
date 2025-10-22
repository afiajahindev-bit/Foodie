<?php
session_start();
global $db;
$connect = mysqli_connect("localhost", "root", "", "foodie");

if (!$connect) {
    die("Something is wrong!");
} else {
    if (isset($_SESSION['logged'])) {
        $email =  $_SESSION['user_email'];
        $user_sql = "SELECT * FROM registration where email='$email'";
        $user_result = mysqli_query($connect, $user_sql);
        $user_value = mysqli_fetch_assoc($user_result);
    }
    if (isset($_SESSION['admin_logged'])) {
        $admin_email =  $_SESSION['admin_email'];
    }
}
define('DBNAME','foodie');
define('DBUSER','root');
define('DBPASS','');
define('DBHOST','localhost');
try {
  $db = new PDO("mysql:host=".DBHOST.";dbname=".DBNAME, DBUSER, DBPASS);
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  //echo "Your page is connected with database successfully..";
} catch(PDOException $e) {
  echo "Issue -> Connection failed: " . $e->getMessage();
}
?>
