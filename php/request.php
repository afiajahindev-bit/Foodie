<?php
require_once('database.php');
?>

<div>

    <form action="request.php" method="POST" enctype="multipart/form-data">

        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" data-bs-backdrop="static" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Request</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="profile-pic mb-3">
                            <img id="preview" src="" alt="" width="200px">
                        </div>
                        <div class="text-center mb-5 m-auto text-end">
                            <input type="file" id="upload-img" class="form-control" name="image" accept="image/png, image/jpg, image/jpeg" onchange="getImagePreview(event)" required>
                        </div>
                        <!-- Food name -->
                        <div class="mb-3 mx-2 form-text">
                            <label class="form-label" for="foodname">Food Name</label>
                            <input type="text" id="foodname" name="foodname" class="form-control" required>
                        </div>
                        <!-- Restaurant -->
                        <div class="mb-3 mx-2 form-text">
                            <label class="form-label" for="resname">Restaurant Name</label>
                            <input type="text" class="form-control add-select" id="resname" name="resname" list="scripts" placeholder="Select Restaurant" required>
                            <?php
                            $sql = "SELECT DISTINCT `restaurant_name` From `food_info`";
                            $sql_result = mysqli_query($connect, $sql);
                            ?>
                            <datalist id="scripts">
                                <?php
                                while ($row = mysqli_fetch_assoc($sql_result)) {
                                ?>
                                    <option value="<?= $row['restaurant_name']; ?>"><?= $row['restaurant_name']; ?></option>

                                <?php
                                }
                                ?>
                            </datalist>
                        </div>
                        <!-- Inside your existing form -->
                        <div class="mb-3 mx-2 form-text">
                            <label class="form-label" for="location">Set Location</label>
                            <iframe id="mapFrame" src="map3.php" style="border: 0; width: 100%; height: 300px;"></iframe>
                        </div>
                        <div>
                            <p>
                                <span style="color: rgb(135, 0, 0);">[Note: You must confirm your location before pressing
                                    Serve]</span>
                            </p>
                        </div>
                        <div class="mb-3 mx-2 form-text">
                            <label class="form-label" for="price">Price</label>
                            <input type="text" id="price" name="price" class="form-control" required>
                        </div>
                        <div class="mb-3 mx-2 form-text">
                            <label class="form-label" for="desc">Description</label>
                            <textarea class="form-control" id="desc" name="desc" id="" cols="30" rows="4" required></textarea>
                        </div>
                        <div class="d-grid gap-2 d-sm-flex mt-4 mb-3 float-end">
                            <input type="submit" class="list-btn py-2 px-3" value="Request" name="request">
                        </div>
                    </div>
    </form>

    <script>
        function getImagePreview(event) {
            var image = URL.createObjectURL(event.target.files[0]);
            var imagediv = document.getElementById('preview');
            imagediv.src = image;
        }


        var mapVisible = false; // Track the map's visibility state

        function redirectToMap() {
            var mapFrame = document.getElementById("mapFrame");

            if (!mapVisible) {
                mapFrame.style.display = "block";
                mapVisible = true;
            } else {
                mapFrame.style.display = "none";
                mapVisible = false;
            }
        }
    </script>
    <?php

    $sql = "SELECT latitude, longitude,locationName FROM locations WHERE id = 1";
    $result = $connect->query($sql);
    if ($result->num_rows > 0) {
        // Fetch the result row as an associative array
        $row = $result->fetch_assoc();

        // Store the values in PHP variables
        $latitude = $row['latitude'];
        $longitude = $row['longitude'];
        $locationName = $row['locationName'];
    } else {
        echo "No results found";
    }

    if (isset($_POST["request"])) {
        $folder = "../admin/Img/";
        $image = $_FILES['image']['name'];
        $tmp = $_FILES['image']['tmp_name'];
        $path = $folder . $image;
        $imageType = pathinfo($path, PATHINFO_EXTENSION);

        $userId = $user_value['id'];
        $userEmail = $user_value['email'];
        $foodname = $_POST["foodname"];
        $resname = $_POST["resname"];
        $price = $_POST["price"];
        $desc = $_POST["desc"];
        $errors = array();

        if ($imageType != "jpg" && $imageType != "jpeg" && $imageType != "png" && $imageType != "JPG" && $imageType != "JPEG" && $imageType != "PNG") {
            array_push($errors, "Image Format not supported");
        } else {
            if ($_FILES['image']['size'] > 2097152) {
                array_push($errors, "Image must be less than 5 MB.");
            }
        }
        if (count($errors) > 0) {
            foreach ($errors as $error) {
                echo "<div class='alert alert-danger' style='padding-left:40%; margin:5px 10px ; border-radius:0'>$error</div>";
            }
        } else {
            if ($tmp) {
                move_uploaded_file($tmp, $path);
                $sql = "INSERT INTO request(food_name, image, res_name, locationName, price, description, latitude, longitude, user_id, user_email) VALUES (?,?,?,?,?,?,?,?,?,?)";
                $stmtinsert = $connect->prepare($sql);
                if ($stmtinsert) {
                    $result = $stmtinsert->execute([ $foodname, $image, $resname, $locationName, $price, $desc, $latitude, $longitude,$userId, $userEmail,]);

                    if ($result) {
                        echo "<script>window.location='food.php';</script>";
                    } else {
                        echo "<div class='alert alert-danger' style='padding-left:40%; margin:5px 10px ; border-radius:0'>An error Occured</div>";
                    }
                } else {
                    echo "<div class='alert alert-danger' style='padding-left:40%; margin:5px 10px ; border-radius:0'>An error Occured</div>";
                }
            }
        }
    }
    ?>