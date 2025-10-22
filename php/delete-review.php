<?php
$remove_id = $_POST['rid'];
// echo ''. $remove_id;
require_once('database.php');
$remove_sql = "DELETE FROM food_review where rev_id='$remove_id'";
$remove_query = mysqli_query($connect,$remove_sql);
// header("Location: account.php");
?>