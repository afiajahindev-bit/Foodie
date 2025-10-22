<?php
    require_once("../php/database.php");
    $userID = $_POST['user_id'];
    echo $foodID;
    $sql = "DELETE FROM `registration` WHERE id = $userID ";
    $result = mysqli_query($connect, $sql);

    if ($result) {
        echo "<div class='alert alert-success' style='padding-left:40%; margin:5px 10px ; border-radius:0'>Successfully Deleted</div>";
    } else {
        echo "<div class='alert alert-danger' style='padding-left:40%; margin:5px 10px ; border-radius:0'>There is an error</div>";
    }
?>