<?php

// Database configuration (replace with your database credentials)
$host = "localhost";
$username = "root";
$password = "";
$database = "omar";

// Define the latitude, longitude, and locationName variables
$latitude = $_POST['latitude'];
$longitude = $_POST['longitude'];
$locationName = $_POST['locationName'];
if($latitude==null){
   echo "no value received";
}

// Prepare a statement to insert the data into the database
$conn = new mysqli($host, $username, $password, $database);
$sql = "INSERT INTO locations (latitude, longitude, location_name) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);

// Bind the parameters to the statement
$stmt->bind_param("dds", $latitude, $longitude, $locationName);

// Execute the statement
if ($stmt->execute()) {
    echo "Location data saved successfully.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the statement and connection
$stmt->close();
$conn->close();

?>
