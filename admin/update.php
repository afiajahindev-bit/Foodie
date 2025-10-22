<?php
require_once('../php/database.php');
if (isset($_GET['id'])) {
    $food_id = $_GET['id'];
}
?>

<?php
// if (isset($_POST["edit"])) {
//     echo $food_id;
//     $foodname = $_POST["foodname"];
//     $resname = $_POST["resname"];
//     $type = $_POST["type"];
//     $catagory = $_POST["catagory"];

//     $price = $_POST["price"];
//     $desc = $_POST["desc"];

//     $errors = array();

//     if ($_FILES['image']['name']) {
//         $folder = "../image/";
//         $image = $_FILES['image']['name'];
//         $tmp = $_FILES['image']['tmp_name'];
//         $path = $folder . $image;
//         $imageType = pathinfo($path, PATHINFO_EXTENSION);

//         if ($imageType != "jpg" && $imageType != "jpeg" && $imageType != "png" && $imageType != "JPG" && $imageType != "JPEG" && $imageType != "PNG") {
//             array_push($errors, "Image Format not supported");
//         } else {
//             if ($_FILES['image']['size'] > 2097152) {
//                 array_push($errors, "Image must be less than 2 MB.");
//             } else {
//                 move_uploaded_file($tmp, $path);
//             }
//         }
//     } else {
//         $image = $food_value['image'];
//     }

//     if (count($errors) > 0) {
//         foreach ($errors as $error) {
//             echo "<div class='alert alert-danger' style='padding-left:40%; margin:5px 10px ; border-radius:0'>$error</div>";
//         }
//     } else {
//         $sql = "UPDATE `food_info` SET `food_name`='$foodname',`restaurant_name`='$resname',`image`='$image',`type`='$type',`catagory`='$catagory',`price`='$price',`description`='$desc' WHERE `food_id`='$food_id'";
//         $query = mysqli_query($connect, $sql);
//         if (!$query) {
//             echo "<div class='alert alert-danger' style='padding-left:40%; margin:5px 10px ; border-radius:0'>An error Occured</div>";
//         }
//     }
// }
?>
<!-- admin-food-detail.php?id= -->
<form action="update-sql.php?id=<?= $food_value['food_id']; ?>" method="POST" enctype="multipart/form-data">
    <div class="modal fade" id="edit<?= $food_value['food_id']; ?>" tabindex="-1" aria-labelledby="edit" data-bs-backdrop="static" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5 text-dark" id="edit">Edit Food Details</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-start">
                    <!-- Image -->
                    <div class="text-center mb-2">
                        <div class="profile-pic">
                            <img id="preview-<?= $food_value['food_id']; ?>" src="../image/<?= $food_value['image']; ?>" alt="" width="200px">
                            <input type="hidden" name="img-add" value="<?= $food_value['image']; ?>">
                        </div>
                    </div>
                    <div id="img-file-<?= $food_value['food_id']; ?>" class="text-center mb-3 m-auto text-end">
                        <input type="file" id="upload-img-<?= $food_value['food_id']; ?>" name="image" accept="image/png, image/jpg, image/jpeg" onchange="getImagePreview(event,<?= $food_value['food_id']; ?>)">
                        <label class="upload-img-label" for="upload-img-<?= $food_value['food_id']; ?>">
                            <span class="upload-img-title">Change Image</span>
                            <span id="upload-img-box-<?= $food_value['food_id']; ?>" class="upload-img-box"><?= $food_value['image']; ?></span>
                        </label>
                        <small class="text-warning">Image must be less than 2 MB</small>
                    </div>
                    <!-- Food name -->
                    <div class="mb-3 mx-2 form-text">
                        <label class="form-label" for="foodname">Food Name</label>
                        <input type="text" id="foodname" name="foodname" class="form-control input-file" value="<?= $food_value['food_name']; ?>" required>
                    </div>
                    <!-- Restaurant -->
                    <div class="mb-3 mx-2 form-text">
                        <label class="form-label" for="resname">Restaurant Name</label>
                        <input type="text" class="form-control add-select input-file" id="resname" name="resname" list="scripts" placeholder="Select Restaurant" value="<?= $food_value['restaurant_name']; ?>" required>
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
                    <!-- Type -->
                    <div class="mb-3 mx-2 form-text">
                        <label class="form-label" for="type">Food Type</label>
                        <input type="text" class="form-control add-select input-file" id="type" name="type" list="scripts1" placeholder="Select Type" value="<?= $food_value['type']; ?>" required>
                        <?php
                        $sql = "SELECT DISTINCT `type` From `food_info`";
                        $sql_result = mysqli_query($connect, $sql);
                        ?>
                        <datalist id="scripts1">
                            <?php
                            while ($row = mysqli_fetch_assoc($sql_result)) {
                            ?>
                                <option value="<?= $row['type']; ?>"><?= $row['type']; ?></option>

                            <?php
                            }
                            ?>
                        </datalist>
                    </div>
                    <!-- Catagory -->
                    <div class="mb-3 mx-2 form-text">
                        <label class="form-label" for="catagory">Catagory</label>
                        <input type="text" class="form-control add-select input-file" id="catagory" name="catagory" list="scripts2" placeholder="Select Catagory" value="<?= $food_value['catagory']; ?>" required>
                        <?php
                        $sql = "SELECT DISTINCT `catagory` From `food_info`";
                        $sql_result = mysqli_query($connect, $sql);
                        ?>
                        <datalist id="scripts2">
                            <?php
                            while ($row = mysqli_fetch_assoc($sql_result)) {
                            ?>
                                <option value="<?= $row['catagory']; ?>"><?= $row['catagory']; ?></option>

                            <?php
                            }
                            ?>
                        </datalist>
                    </div>
                    <!-- Location -->
                    <div class="mb-3 mx-2 form-text">
                        <label class="form-label" for="location">Previous Location</label>
                        <textarea type="text" id="location" name="location" class="form-control text-secondary" value="" disabled><?= $food_value['location_name']; ?></textarea>
                        <button id="loc-btn-<?= $food_value['food_id']; ?>" type="button" class="list-btn mt-3" onclick="locDisplay(this.id)">Change Location</button>
                        <div class="mapFrame">
                            <!--  -->
                            <iframe id="mapFrame" src="map.php" style="border: 0; width: 100%; height: 300px;"></iframe>
                            <p>
                                <span style="color: rgb(135, 0, 0);">[Note: You must confirm your location before confirming edit]</span>
                            </p>
                        </div>
                    </div>
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
                    ?>
                    <?php
                    } else {
                        echo "No results found";
                    }
                    ?>
                    <!-- Price -->
                    <div class="mb-3 mx-2 form-text">
                        <label class="form-label" for="price">Price</label>
                        <input type="number" id="price" name="price" class="form-control input-file" min="0" value="<?= $food_value['price']; ?>" required>
                    </div>
                    <!-- Description -->
                    <div class="mb-3 mx-2 form-text">
                        <label class="form-label" for="desc">Description</label>
                        <textarea class="form-control input-file" id="desc" name="desc" id="" cols="30" rows="4" required><?= $food_value['description']; ?></textarea>
                    </div>
                    <div class="d-grid gap-2 d-sm-flex mt-4">
                        <?php
                        if (isset($input)) {
                        ?>
                            <input formaction="admin-food-detail.php?id=<?= $input; ?>" id="1" type="submit" class="btn list-btn rounded-pill px-5" value="Edit" name="add">
                        <?php
                        } else {
                        ?>
                            <input id="2" type="submit" class="btn list-btn px-5" value="Edit" name="edit">
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<script>
    function locDisplay(buttonId) {
        console.log(buttonId);
        var id = buttonId + '+.mapFrame'
        var map = document.querySelector('#' + buttonId + '+.mapFrame')
        console.log(map)
        map.classList.toggle("loc_view");

    }

    function getImagePreview(event, id) {
        var image = URL.createObjectURL(event.target.files[0]);
        var imagediv = document.getElementById('preview-' + id);
        imagediv.src = image;
        var fileName = document.getElementById('upload-img-box-' + id);
        fileName.innerHTML = event.target.files[0].name;
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