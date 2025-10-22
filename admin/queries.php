<?php
require_once("../php/database.php");
$res = array();
$type = array();
$cat = array();

$sql = "SELECT DISTINCT restaurant_name FROM food_info";
$result = mysqli_query($connect, $sql);
while ($row = mysqli_fetch_assoc($result)){
       array_push($res, $row['restaurant_name']);   
}

$sql1 = "SELECT DISTINCT `type` FROM food_info";
$result = mysqli_query($connect, $sql1);
while ($row = mysqli_fetch_assoc($result)){
    array_push($type, $row['type']);   
}

$sql2 = "SELECT DISTINCT catagory FROM food_info";
$result = mysqli_query($connect, $sql2);
while ($row = mysqli_fetch_assoc($result)){
    array_push($cat, $row['catagory']);   
}

$res_all = '\'' . implode('\' , \'', $res) . '\'';
$type_all = '\'' . implode('\' , \'', $type) . '\'';
$cat_all = '\'' . implode('\' , \'', $cat) . '\'';

$sql4 = 'SELECT MAX(`price`) as max FROM food_info ';
$result = mysqli_query($connect, $sql4);
$row = mysqli_fetch_assoc($result);
