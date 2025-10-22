<?php
    require_once("../php/database.php");
    $foodID = $_POST['id'];
    $sql1 = "SELECT `image` FROM `request` WHERE `id`= $foodID";
    $result1 = mysqli_query($connect, $sql1);
    $row = mysqli_fetch_assoc($result1);
    $img = $row['image'];

    $sql = "DELETE FROM `request` WHERE id = $foodID ";
    $result = mysqli_query($connect, $sql);

    if ($result) {
        echo "<div class='alert alert-success' style='padding-left:40%; margin:5px 10px ; border-radius:0'>Successfully Deleted</div>";
        unlink("Img/".$img);
    } else {
        echo "<div class='alert alert-danger' style='padding-left:40%; margin:5px 10px ; border-radius:0'>There is an error</div>";
    }
?>