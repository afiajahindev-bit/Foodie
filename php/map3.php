<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Location Finder</title>
    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <!-- Leaflet-Geocoder CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet-control-geocoder@1.13.0/dist/Control.Geocoder.css" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <style>
        /* Style the map container */
        #map {
            height: 400px;
            width: 100%;
        }
    </style>
</head>

<body>
    <!-- Create a map container with id 'map' -->
    <form action="map3.php" method="POST">
        <input placeholder="latitude" type="text" name="latitude" id="latitude" />
        <input placeholder="longitude" type="text" name="longitude" id="longitude" />
        <input placeholder="locationName" type="text" name="locationName" id="locationName" />
        <input type="submit" value="Confirm Location" id="submit-map" name="confirm" />

    </form>
    <?php
    require_once('database.php');


    $id = 1;
    if (isset($_POST['confirm'])) {
        $latitude = $_POST['latitude'];
        $longitude = $_POST['longitude'];
        $locationName = $_POST['locationName'];

        // Now you can use $latitude, $longitude, and $locationName in your PHP code
        // For example, you can save them to a database or perform other actions.

        // Respond with a success message (optional)
        if (($connect->query("SELECT id FROM locations"))->num_rows > 0) {
            $updatelocation = "UPDATE locations SET latitude = $latitude, longitude=$longitude,locationName='$locationName' WHERE id = $id";
            $updatelocation_result = mysqli_query($connect, $updatelocation);
        } else {
            $updatelocation = "INSERT INTO `locations`(`id`, `latitude`, `longitude`, `locationName`) VALUES (?,?,?,?)";
            $updatelocation_result = $connect->prepare($updatelocation);
            if ($updatelocation_result) {
                $result = $updatelocation_result->execute([$id, $latitude, $longitude, $locationName]);
            }
        }
        echo "location Set To: <br>";
        echo "latitude: $latitude<br>";
        echo "longitude: $longitude<br>";
        echo "locationName: $locationName<br>";
    }


    ?>
    <div id="map"></div>

    <!-- Add an input field for location search -->

    <!-- Add a form to collect the location data -->





    <!-- Include Leaflet and Leaflet-Geocoder libraries -->
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <script src="https://unpkg.com/leaflet-control-geocoder@1.13.0/dist/Control.Geocoder.js"></script>

    <!-- JavaScript code for the map and location storage -->
    <script>
        // Initialize the map
        var map = L.map('map').setView([0, 0], 2);

        // Add a tile layer
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        // Add a search control to the map
        var searchControl = L.Control.geocoder().addTo(map);

        // Handle the search result
        searchControl.on('markgeocode', function(e) {
            const latlng = e.geocode.center; // Get the coordinates of the found location
            const locationName = e.geocode.name;

            // Create a marker on the map
            L.marker(latlng).addTo(map)
                .bindPopup(locationName)
                .openPopup();
            console.log('Latitude:', latlng.lat);
            console.log('Longitude:', latlng.lng);
            console.log('Location Name:', locationName);


            document.getElementById('latitude').value = latlng.lat;
            document.getElementById('longitude').value = latlng.lng;
            document.getElementById('locationName').value = locationName;

            // $.ajax({
            //     type: "POST",
            //     url: "request.php",
            //     data: {
            //         latitude: latlng.lat,
            //         longitude: latlng.lng,
            //         locationName: locationName
            //     },
            //     success: function (response) {
            //         // Handle the response from request.php if needed
            //         console.log("Data sent successfully to request.php");
            //     },
            //     error: function () {
            //         // Handle any errors that occur during the AJAX request
            //         console.error("Error sending data to request.php");
            //     }
            // });



        });
    </script>
</body>