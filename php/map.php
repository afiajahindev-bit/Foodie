<!DOCTYPE html>
<html>
<head>
    <title>Leaflet Map with Routing</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet-routing-machine/3.2.12/leaflet-routing-machine.css" />
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet-routing-machine/3.2.12/leaflet-routing-machine.js"></script>
    <style>
        /* Style the map container */
        #map {
            height: 400px;
            width: 100%;
        }
    </style>
</head>
<body>
    <div id="map"></div>
    <div id="distance"></div>

    <script>
        // Create a Leaflet map
        var map = L.map('map').setView([0, 0], 2);

        // Create a tile layer (e.g., OpenStreetMap)
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
        }).addTo(map);

        // Create a routing control and add it to the map
        var control = L.Routing.control({
            waypoints: [],
        }).addTo(map);

        // Get the user's current location
        navigator.geolocation.getCurrentPosition(function(position) {
            var myLocation = new L.LatLng(position.coords.latitude, position.coords.longitude);

            // Add a marker for the user's current location
            var myLocationMarker = new L.Marker(myLocation);
            map.addLayer(myLocationMarker);

            // Fetch coordinates from the database using a PHP script
            fetch('./db.php')
                .then(function(response) {
                    return response.json();
                })
                .then(function(coordinates) {
                    // Add a marker for each coordinate
                    for (var i = 0; i < coordinates.length; i++) {
                        var marker = new L.Marker([coordinates[i]['latitude'], coordinates[i]['longitude']]);
                        map.addLayer(marker);
                    }

                    // Set waypoints for routing (from the user's location to the first coordinate in the database)
                    control.setWaypoints([myLocation, [coordinates[0]['latitude'], coordinates[0]['longitude']]]);
                });
        });
    </script>
</body>
</html>
