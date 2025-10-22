<?php

$db = new mysqli('localhost', 'root', '', 'foodie');

// Check connection
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

//Get all coordinates from the database

// $food_id=1;
$result1="SELECT food_id FROM getfood_id WHERE id=1";
$result2 = mysqli_query($db, $result1);
$result3 = mysqli_fetch_assoc($result2); 
$food_id = $result3['food_id']; 

$query = "SELECT latitude, longitude FROM food_info WHERE food_id=$food_id";
$result = $db->query($query);

$coordinates = array();
while ($row = $result->fetch_assoc()) {
    $coordinates[] = $row;
}

// Close the database connection
// $db->close();

// Return data as JSON
header('Content-Type: application/json');
echo json_encode($coordinates);
?>
