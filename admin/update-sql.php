<?php
require_once('../php/database.php');
if (isset($_GET['id'])) {
    $food_id = $_GET['id'];
    $sql_loc = "SELECT latitude,longitude,location_name FROM `food_info` WHERE `food_id`='$food_id' ";
    $result_loc = mysqli_query($connect, $sql_loc);
    $row_loc = mysqli_fetch_assoc($result_loc);
}
?>


<?php
if (isset($_POST["edit"])) {
    echo $food_id;
    $foodname = $_POST["foodname"];
    $resname = $_POST["resname"];
    $type = $_POST["type"];
    $catagory = $_POST["catagory"];
    $latitude = $_POST["latitude"];
    $longitude =  $_POST["longitude"];
    $locationName = $_POST["locationName"];
    $price = $_POST["price"];
    $desc = $_POST["desc"];
    if($latitude == ""|| $longitude == "" || $locationName =="") {
        $latitude = $row_loc["latitude"];
        $longitude =  $row_loc["longitude"];
        $locationName = $row_loc["location_name"];
    }


    $errors = array();

    if ($_FILES['image']['name']) {
        $folder = "../image/";
        $image = $_FILES['image']['name'];
        $tmp = $_FILES['image']['tmp_name'];
        $path = $folder . $image;
        $imageType = pathinfo($path, PATHINFO_EXTENSION);

        if ($imageType != "jpg" && $imageType != "jpeg" && $imageType != "png" && $imageType != "JPG" && $imageType != "JPEG" && $imageType != "PNG") {
            array_push($errors, "Image Format not supported");
        } else {
            if ($_FILES['image']['size'] > 2097152) {
                array_push($errors, "Image must be less than 2 MB.");
            } else {
                move_uploaded_file($tmp, $path);
            }
        }
    } else {
        $image = $_POST["img-add"];
    }

    if (count($errors) > 0) {
        foreach ($errors as $error) {
            echo "<div class='alert alert-danger' style='padding-left:40%; margin:5px 10px ; border-radius:0'>$error</div>";
        }
    } else {
        $sql = "UPDATE `food_info` SET `food_name`='$foodname',`restaurant_name`='$resname',`image`='$image',`type`='$type',`catagory`='$catagory',`latitude`='$latitude',`longitude`='$longitude',`location_name`='$locationName',`price`='$price',`description`='$desc' WHERE `food_id`='$food_id'";
        echo $sql;
        $query = mysqli_query($connect, $sql);
        if (!$query) {
            echo "<div class='alert alert-danger' style='padding-left:40%; margin:5px 10px ; border-radius:0'>An error Occured</div>";
        }
        else{
            header("Location:food-list.php");
        }
    }
}
?>