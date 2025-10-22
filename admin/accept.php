<?php
require_once('../php/database.php');
?>

<!-- admin-food-detail.php?id= -->
<form action="request-update.php?id=<?= $food_value['id']; ?>" method="POST" enctype="multipart/form-data">

    <div class="modal fade" id="accept<?= $food_value['id']; ?>" tabindex="-1" aria-labelledby="header<?= $food_value['id']; ?>" data-bs-backdrop="static" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5 text-dark" id="header<?= $food_value['id']; ?>">Edit Food Details</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-start accept">
                    <!-- Image -->
                    <div class="profile-pic text-center">
                        <img id="preview" class="mb-3" src="Img/<?=$food_value['image'];?>" alt="" width="200px">
                        <p class="text-dark"><?= $food_value['image']; ?></p>
                        <input type="hidden" name="org_image" value="C:/xampp/htdocs/Foodie/admin/Img/<?=$food_value['image'];?>">
                    </div>
                    <!-- Type -->
                    <div class="mb-3 mx-2 form-text row align-items-center">
                        <label class="col-5" for="type">Food Type <span class="text-danger">*</span></label>
                        <input type="text" class="col-7" id="type" name="type" list="scripts1" placeholder="Select Type" value="" required>
                        <span class="text-icon"><i class="fa-solid fa-chevron-down fa-2xs"></i></span>
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
                    <div class="mb-4 mx-2 form-text row align-items-center">
                        <label class="col-5" for="catagory">Catagory <span class="text-danger">*</span></label>
                        <input type="text" class="col-7" id="catagory" name="catagory" list="scripts2" placeholder="Select Catagory" value="" required>
                        <span class="text-icon"><i class="fa-solid fa-chevron-down fa-2xs"></i></span>
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
                    <hr class="mt-4 hr-blurry" style="background: radial-gradient(rgb(0, 0, 0), #ffffff00); height:2px">
                    <!-- Food name -->
                    <div class="mb-3 mx-2 form-text row align-items-center">
                        <label class="col-5" for="foodname">Food Name</label>
                        <input type="text" id="foodname" name="foodname" class=" col-7" value="<?= $food_value['food_name']; ?>" disabled>
                    </div>
                    <!-- Restaurant -->
                    <div class="mb-3 mx-2 form-text row align-items-center">
                        <label class="col-5" for="resname">Restaurant Name</label>
                        <input type="text" class="col-7" name="resname" value="<?= $food_value['res_name']; ?>" disabled>
                        <?php
                        $sql = "SELECT DISTINCT `restaurant_name` From `food_info`";
                        $sql_result = mysqli_query($connect, $sql);
                        ?>
                    </div>
                    <!-- Price -->
                    <div class="mb-3 mx-2 form-text row align-items-start">
                        <label class="col-5" for="price">Price</label>
                        <input type="text" id="price" name="price" class="col-7" value="Tk. <?= $food_value['price']; ?>" disabled>
                    </div>

                    <!-- Location -->
                    <div class="mb-1 mx-2 form-text row align-items-start">
                        <label class="col-5" for="location">Location</label>
                        <textarea type="text" id="location" name="location" class="col-7 text-secondary" value="" disabled><?= $food_value['locationName']; ?></textarea>
                    </div>
                    <a id="map-btn-<?= $food_value['id']; ?>" class="float-end mb-3 p-2 me-4" style="cursor: pointer;" onclick="mapDisplay(this.id)">View Location</a>
                    <div class="mapVisible">
                        <iframe id="mapFrame" src="map.php" style="border: 0; width: 100%; height: 300px;"></iframe>
                        <?php
                        $loc_sql = "SELECT latitude, longitude,locationName FROM locations WHERE id = 1";
                        $loc_result = $connect->query($loc_sql);
                        if ($loc_result->num_rows > 0) {
                            // Fetch the result row as an associative array
                            $loc_row = $loc_result->fetch_assoc();

                            // Store the values in PHP variables
                            $latitude = $loc_row['latitude'];
                            $longitude = $loc_row['longitude'];
                            $locationName = $loc_row['locationName'];
                        } else {
                            echo "No results found";
                        }
                        ?>
                    </div>
                    <!-- Description -->
                    <div class="mb-3 mx-2 form-text row align-items-start">
                        <label class="col-5" for="desc">Description</label>
                        <textarea class="col-7" id="desc" name="desc" id="" cols="30" rows="2" disabled><?= $food_value['description']; ?></textarea>
                    </div>
                    <div class="d-grid gap-2 d-sm-flex mt-4">
                        <input id="2" type="submit" class="list-btn px-5" value="Accept" name="accept">
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<script>
    function mapDisplay(buttonId) {
        console.log(buttonId);
        var id = buttonId + '+.mapVisible'
        var map = document.querySelector('#' + buttonId + '+.mapVisible')
        console.log(map)
        map.classList.toggle("map_view");
    }

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