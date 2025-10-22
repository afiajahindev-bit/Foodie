<?php
require_once('database.php');
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Foodie</title>
    <!--Google Font-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Ubuntu&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <!--Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <!--CSS-->
    <!-- <link rel="stylesheet" href="../css/reg-log.css"> -->
</head>

<body>

    <?php

    if (isset($_POST["request"])) {
        $folder = "../image/";
        $image = $_FILES['image']['name'];
        $tmp = $_FILES['image']['tmp_name'];
        $path = $folder . $image;
        $imageType = pathinfo($path, PATHINFO_EXTENSION);

        $foodname = $_POST["foodname"];
        $resname = $_POST["resname"];
        $location = $_POST["location"];
        $type = $_POST["type"];
        $catagory = $_POST["catagory"];
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

                $sql = "INSERT INTO food_info(food_name, image, restaurant_name, location,type,catagory, price, description ) VALUES (?,?,?,?,?,?,?,?)";
                $stmtinsert = $connect->prepare($sql);
                if ($stmtinsert) {
                    $result = $stmtinsert->execute([$foodname, $image, $resname, $location, $type, $catagory, $price, $desc]);

                    if ($result) {
                        echo "<div class='alert alert-success' style='padding-left:40%; margin:5px 10px ; border-radius:0'>Successful</div>";
                        header("Location: admin-upload.php");
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
    <section style="width: 50%;" class="m-5">
        <form action="admin-upload.php" method="POST" enctype="multipart/form-data">
            <div>
                <div class="profile-pic mb-3">
                    <img id="preview" src="" alt="" width="200px">
                </div>
                <div class="text-center mb-5 m-auto text-end">
                    <input type="file" id="upload-img" class="form-control" name="image" accept="image/png, image/jpg, image/jpeg" onchange="getImagePreview(event)" required>
                </div>
                <div class="mb-3 mx-2 form-text">
                    <label class="form-label" for="foodname">Food Name</label>
                    <input type="text" id="foodname" name="foodname" class="form-control" required>
                </div>
                <div class="mb-3 mx-2 form-text">
                    <label class="form-label" for="resname">Restaurant Name</label>
                    <input type="text" id="resname" name="resname" class="form-control" required>
                </div>
                <div class="mb-3 mx-2 form-text">
                    <label class="form-label" for="location">Set Location</label>
                    <input type="submit" id="location" name="location" class="rounded-pill px-5" value="Set-location">
                </div>
                <div class="mb-3 mx-2 form-text">
                    <label class="form-label" for="type">Type</label>
                    <input type="text" id="type" name="type" class="form-control" required>
                </div>
                <div class="mb-3 mx-2 form-text">
                    <label class="form-label" for="type">Catagory</label>
                    <input type="text" id="catagory" name="catagory" class="form-control" required>
                </div>
                <div class="mb-3 mx-2 form-text">
                    <label class="form-label" for="price">Price</label>
                    <input type="text" id="price" name="price" class="form-control" required>
                </div>
                <div class="mb-3 mx-2 form-text">
                    <label class="form-label" for="desc">Description</label>
                    <textarea class="form-control" id="desc" name="desc" id="" cols="30" rows="4" required></textarea>
                </div>
                <div class="d-grid gap-2 d-sm-flex mt-4">
                    <input type="submit" class="btn btn-dark rounded-pill px-5" value="Upload" name="request">
                </div>
            </div>
        </form>
    </section>
</body>
<script>
    function getImagePreview(event) {
        var image = URL.createObjectURL(event.target.files[0]);
        var imagediv = document.getElementById('preview');
        imagediv.src = image;
    }
</script>

</html>