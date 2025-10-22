<?php
require_once('database.php');
$oldemail = $user_value['email'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Foodie</title>
  <!--Google Font-->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Ubuntu&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
  <!--Bootstrap-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
  <!--Font Awesome-->
  <script src="https://kit.fontawesome.com/d4c58442e3.js" crossorigin="anonymous"></script>
  <!--CSS-->
  <link rel="stylesheet" href="../css/account.css">
</head>

<body>
  <!--Header-->

  <!--Navigation-->
  <?php
  require('Navigation.php');
  ?>

  <section class="my-5" id="info">
    <!--PHP code-->
    <div>
      <?php

      if (isset($_POST["update"])) {
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
            }
          }
        } else {
          $image = $user_value['image'];
        }

        $newemail = $_POST["email"];
        $firstname = $_POST["firstname"];
        $lastname = $_POST["lastname"];
        $address = $_POST["address"];
        $username = $_POST["username"];
        $contact = $_POST["contact"];
        $youtube = $_POST["youtube"];
        $instagram = $_POST["instagram"];
        $facebook = $_POST["facebook"];
        $twitter = $_POST["twitter"];

        $sql_us = "SELECT username FROM registration WHERE username='$username'";
        $value = mysqli_query($connect, $sql_us);
        $row_us = mysqli_num_rows($value);

        $sql_s = "SELECT * FROM registration WHERE email='$newemail'";
        $search = mysqli_query($connect, $sql_s);
        $row = mysqli_num_rows($search);

        if (empty($newemail) or empty($firstname) or empty($lastname) or empty($address) or empty($contact)) {
          array_push($errors, "All fields are required");
        }
        if ($row_us > 0) {
          array_push($errors, "Username already exists");
        }
        if (!filter_var($newemail, FILTER_VALIDATE_EMAIL)) {
          array_push($errors, "Email is not valid");
        }
        if ($newemail != $oldemail) {
          if ($row > 0) {
            array_push($errors, "Email already exists");
          }
        }

        if (preg_match("/^([0-9]{11})$/", $contact) !== 1) {
          array_push($errors, "Wrong Phone Number");
        }

        if (count($errors) > 0) {
          foreach ($errors as $error) {
            echo "<div class='alert alert-danger' style='padding-left:40%; margin:5px 10px ; border-radius:0'>$error</div>";
          }
        } else {
          $sql = "UPDATE registration SET email= '$newemail',username= '$username', firstname='$firstname',lastname='$lastname',address='$address', image='$image',
                              contact='$contact', youtube='$youtube', instagram='$instagram', facebook='$facebook' ,twitter='$twitter' WHERE email='$oldemail'";
          $update_result = mysqli_query($connect, $sql);
          if ($update_result) {
            $_SESSION['updated'] = "1";
            echo '<script>window.location.href= "account.php"</script>';
          }
        }
      }
      ?>
    </div>
    <div>
      <h2>Account Information</h2>
      <form class="my-4 pt-1 px-5" action="update.php" method="POST" enctype="multipart/form-data">
        <div class="profile-pic mb-3">
          <img id="preview" src="../image/<?= $user_value['image']; ?>" alt="">
        </div>
        <div class="text-center mb-5 w-25 m-auto text-end"><input type="file" id="upload-img" class="form-control" name="image" accept="image/png, image/jpg, image/jpeg" onchange="getImagePreview(event)">
          <small class="text-warning">Image must be less than 2 MB</small>
        </div>

        <div class="row mb-3 mx-2 form-text">
          <div class="col-sm-3 col-form-label"><label for="username">User Name</label></div>
          <div style="position: relative;" class="col-sm-9"><input type="text" name="username" id="username" value="<?= $user_value['username']; ?>" class="form-control">
            <small style="position:absolute; top:15%; right:5%;" id="result"></small>
          </div>
        </div>
        <hr>
        <div class="row mb-3 mx-2 form-text">
          <div class="col-sm-3 col-form-label"><label for="email">Email</label></div>
          <div class="col-sm-9"><input type="text" name="email" value="<?= $user_value['email']; ?>" class="form-control"></div>
        </div>
        <hr>
        <div class="row mb-3 mx-2 form-text">
          <div class="col-sm-3 col-form-label"><label for="firstname">First Name</label></div>
          <div class="col-sm-9"><input type="text" name="firstname" value="<?= $user_value['firstname']; ?>" class="form-control"></div>
        </div>
        <hr>
        <div class="row mb-3 mx-2 form-text">
          <div class="col-sm-3 col-form-label"><label for="lasttname">Last Name</label></div>
          <div class="col-sm-9"><input type="text" name="lastname" value="<?= $user_value['lastname']; ?>" class="form-control"></div>
        </div>
        <hr>
        <div class="row mb-3 mx-2 form-text">
          <div class="col-sm-3 col-form-label"><label for="contact">Contact</label></div>
          <div class="col-sm-9"><input type="text" name="contact" value="<?= $user_value['contact']; ?>" class="form-control"></div>
        </div>
        <hr>
        <div class="row mb-3 mx-2 form-text">
          <div class="col-sm-3 col-form-label"><label for="address">Address</label></div>
          <div class="col-sm-9"><textarea type="text" name="address" cols="60" class=" form-control"><?= $user_value['address']; ?></textarea></div>
        </div>
        <hr>
        <p class="mx-3">Social Media Information (if exists):</p>
        <div class="row mb-3 mx-2 form-text">
          <div class="col-sm-3 col-form-label"><label for="contact">Youtube</label></div>
          <div class="col-sm-9"><input type="text" name="youtube" value="<?= $user_value['youtube']; ?>" class="form-control"></div>
        </div>
        <div class="row mb-3 mx-2 form-text">
          <div class="col-sm-3 col-form-label"><label for="contact">Instagram</label></div>
          <div class="col-sm-9"><input type="text" name="instagram" value="<?= $user_value['instagram']; ?>" class="form-control"></div>
        </div>
        <div class="row mb-3 mx-2 form-text">
          <div class="col-sm-3 col-form-label"><label for="contact">Facebook</label></div>
          <div class="col-sm-9"><input type="text" name="facebook" value="<?= $user_value['facebook']; ?>" class="form-control"></div>
        </div>
        <div class="row mb-3 mx-2 form-text">
          <div class="col-sm-3 col-form-label"><label for="contact">Twitter</label></div>
          <div class="col-sm-9"><input type="text" name="twitter" value="<?= $user_value['twitter']; ?>" class="form-control"></div>
        </div>
        <br>
        <div class="d-grid gap-2 d-sm-flex mt-4">
          <input type="submit" class="btn btn-outline-light custom-button rounded-pill px-5" value="Save Changes" name="update">
          <a href="account.php">
            <button class="btn btn-outline-light custom-button rounded-pill px-5" type="button">Go back</button></a>
        </div>

      </form>

    </div>
  </section>


  <!--Footer-->

  <section class="white-section" id="footer">
    <?php
    require('footer.php');
    ?>
  </section>

  <?php
  $sql_us = "SELECT username FROM registration";
  $value = mysqli_query($connect, $sql_us);
  $array = array();
  while ($res = mysqli_fetch_assoc($value)) {
    $array[] = $res['username'];
  }
  ?>
  <script>
    var user = <?php echo json_encode($array); ?>;
    let username = document.getElementById("username");
    username.addEventListener("input", () => {
      if (user.includes(username.value)) {
        document.getElementById('result').innerHTML = "username is already in use";
      } else if (username.value == '') {
        document.getElementById('result').innerHTML = "";
      } else {
        document.getElementById('result').innerHTML = "<span>&#10004;</span>";
      }
    });
  </script>
</body>

<script>
  function getImagePreview(event) {
    var image = URL.createObjectURL(event.target.files[0]);
    var imagediv = document.getElementById('preview');
    imagediv.src = image;
    console.log(imagediv.src);
  }
</script>

</html>