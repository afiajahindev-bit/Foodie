<?php
    require_once("../php/database.php");
    $foodID = $_POST['food_id'];
    echo $foodID;
    $sql = "DELETE FROM `food_info` WHERE food_id = $foodID ";
    $result = mysqli_query($connect, $sql);

    if ($result) {
        echo "<div class='alert alert-success' style='padding-left:40%; margin:5px 10px ; border-radius:0'>Successfully Deleted</div>";
    } else {
        echo "<div class='alert alert-danger' style='padding-left:40%; margin:5px 10px ; border-radius:0'>There is an error</div>";
    }
?>
