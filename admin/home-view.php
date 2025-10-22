<?php
require_once('../php/database.php');
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
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css" rel="stylesheet">
  <!--CSS-->
  <link rel="stylesheet" href="css/home-view.css">
  <!-- JavaScript -->
  <script src="jQuery.js"></script>
</head>

<body>
  <section id="title">
    <div class="container-fluid">
      <!--Navigation-->
      <?php
      require_once('../php/Navigation.php');
      ?>
    </div>
  </section>
  <section id="content" class="layout">
    <?php
    require_once('sidebar.php');
    ?>
    <div id="content-body">
      <section class="colored-section">
        <div class="container-fluid">
          <!--Title-->
          <div class="row align-items-center">
            <div class="col-lg-6">
              <h1>Foodies' Time !</h1>
              <div>
                <form action="admin-food.php" method="post" class="d-flex" role="search">
                  <input id="search-field" class="form-control me-2" name="searchVal" type="search" placeholder="Find Your Favourite Restaurant or Food" aria-label="Search">
                  <button id="search-btn" class="btn btn-dark" name="search" type="submit">Search</button>
                </form>
              </div>
            </div>
            <div class="col-lg-6 text-center align-middle">
              <img class="title-image align-middle" href="" src="../image/cover.png" alt="">
            </div>
          </div>
        </div>
      </section>
      <!-- Scroll -->
  <section id="scroll">
    <div class="d-flex justify-content-center flex-wrap mx-auto" id="simple-list-example">
      <?php
      $sql = "SELECT DISTINCT `catagory` FROM `food_info` ORDER BY catagory ASC";
      $sql_query = mysqli_query($connect, $sql);
      while ($row = mysqli_fetch_assoc($sql_query)) {
      ?>
        <a href="#<?= $row['catagory']; ?>"><button class="btn scrollBtn"><?= $row['catagory']; ?></button></a>
      <?php
      }
      ?>
    </div>
  </section>

  <!--Features-->

      <section id="features" data-bs-spy="scroll" data-bs-target="#simple-list-example" data-offset="100" data-bs-smooth-scroll="true" class="scrollspy-example" tabindex="0">
        <!-- Part1 -->
        <section class="scroll-section mb-5" id="Appetizers">
          <?php
          $query = "SELECT * FROM `food_info` WHERE `catagory`='Appetizers' ORDER BY`rating` DESC";
          $result = mysqli_query($connect, $query);
          ?>
          <div class="part d-flex mt-3 mb-2">
            <h2 class="fw-bold text-start px-2"> Appetizers</h2>
            <img src="../image/a.png" width="6%" alt="">
          </div>
          <div id="carouselExample1Indicators" class="carousel slide">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <div class="cards-wrapper">
                  <?php
                  for ($i = 0; $i < 3; $i++) {
                    $row = mysqli_fetch_assoc($result);
                    if ($row == null) {
                      break;
                    }
                  ?>
                    <div class="card">
                      <?php
                      $data = $row['food_id'];
                      $input = ($data * 123456789);
                      $encrypt = base64_encode($input);
                      ?>
                      <div class="wrapper">
                        <a class="p-0 m-0" href="admin-food-detail.php?id=<?= $encrypt; ?>">
                          <div class="img-size"><img src="../image/<?= $row['image']; ?>" class="img-top" alt="...">
                            <div class="content">
                              <h4>View Details</h4>
                            </div>
                          </div>
                        </a>
                      </div>
                      <div class="card-body">
                        <h5 class="card-title fw-bold"><?= $row['food_name']; ?></h5>
                        <div class=" text-start">
                          <p class="mb-0"><?= $row['restaurant_name']; ?></p>
                          <small class="text-secondary">Price: Tk. <?= $row['price']; ?></small><br>
                          <small class="text-secondary">Rating: </small>

                          <?php
                          for ($j = 0; $j < intval($row['rating']); $j++) { ?>
                            <span class="fa fa-star checked"></span>
                          <?php
                          }
                          for ($j = 0; $j < 5 - intval($row['rating']); $j++) { ?>
                            <span class="fa fa-star"></span>
                          <?php
                          }
                          ?>

                        </div>
                      </div>
                    </div>
                  <?php
                  }
                  ?>
                </div>
              </div>
              <div class="carousel-item">
                <div class="cards-wrapper">
                  <?php
                  for ($i = 3; $i < 6; $i++) {
                    $row = mysqli_fetch_assoc($result);
                    if ($row == null) {
                      break;
                    }
                  ?>
                    <div class="card">
                      <?php
                      $data = $row['food_id'];
                      $input = ($data * 123456789);
                      $encrypt = base64_encode($input);
                      ?>
                      <div class="wrapper">
                        <a class="p-0 m-0" href="admin-food-detail.php?id=<?= $encrypt; ?>">
                          <div class="img-size"><img src="../image/<?= $row['image']; ?>" class="img-top" alt="...">
                            <div class="content">
                              <h4>View Details</h4>
                            </div>
                          </div>
                        </a>
                      </div>
                      <div class="card-body">
                        <h5 class="card-title fw-bold"><?= $row['food_name']; ?></h5>
                        <div class=" text-start">
                          <p class="mb-0"><?= $row['restaurant_name']; ?></p>
                          <small class="text-secondary">Price: Tk. <?= $row['price']; ?></small><br>
                          <small class="text-secondary">Rating: </small>

                          <?php
                          for ($j = 0; $j < intval($row['rating']); $j++) { ?>
                            <span class="fa fa-star checked"></span>
                          <?php
                          }
                          for ($j = 0; $j < 5 - intval($row['rating']); $j++) { ?>
                            <span class="fa fa-star"></span>
                          <?php
                          }
                          ?>

                        </div>
                      </div>
                    </div>
                  <?php
                  }
                  ?>
                </div>
              </div>
              <?php
              if (mysqli_num_rows($result) > 3) {
              ?>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample1Indicators" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExample1Indicators" data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Next</span>
                </button>
              <?php
              }
              ?>
            </div>

        </section>
        <hr>
        <!-- Part2 -->
        <section class="scroll-section mt-5" id="Main-Course">
          <?php
          $query = "SELECT * FROM `food_info` WHERE `catagory`='Main-Course' ORDER BY`rating` DESC";
          $result = mysqli_query($connect, $query);
          ?>
          <div class="part d-flex my-3">
            <h2 class="fw-bold text-start px-2"> Main Course</h2>
            <img src="../image/b.png" width="6%" alt="">
          </div>
          <div id="carouselExample2Indicators" class="carousel slide">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <div class="cards-wrapper">
                  <?php
                  for ($i = 0; $i < 3; $i++) {
                    $row = mysqli_fetch_assoc($result);
                    if ($row == null) {
                      break;
                    }
                  ?>
                    <div class="card">
                      <?php
                      $data = $row['food_id'];
                      $input = ($data * 123456789);
                      $encrypt = base64_encode($input);
                      ?>
                      <div class="wrapper">
                        <a class="p-0 m-0" href="admin-food-detail.php?id=<?= $encrypt; ?>">
                          <div class="img-size"><img src="../image/<?= $row['image']; ?>" class="img-top" alt="...">
                            <div class="content">
                              <h4>View Details</h4>
                            </div>
                          </div>
                        </a>
                      </div>
                      <div class="card-body">
                        <h5 class="card-title fw-bold"><?= $row['food_name']; ?></h5>
                        <div class=" text-start">
                          <p class="mb-0"><?= $row['restaurant_name']; ?></p>
                          <small class="text-secondary">Price: Tk. <?= $row['price']; ?></small><br>
                          <small class="text-secondary">Rating: </small>

                          <?php
                          for ($j = 0; $j < intval($row['rating']); $j++) { ?>
                            <span class="fa fa-star checked"></span>
                          <?php
                          }
                          for ($j = 0; $j < 5 - intval($row['rating']); $j++) { ?>
                            <span class="fa fa-star"></span>
                          <?php
                          }
                          ?>

                        </div>
                      </div>
                    </div>
                  <?php
                  }
                  ?>
                </div>
              </div>
              <div class="carousel-item">
                <div class="cards-wrapper">
                  <?php
                  for ($i = 3; $i < 6; $i++) {
                    $row = mysqli_fetch_assoc($result);
                    if ($row == null) {
                      break;
                    }
                  ?>
                    <div class="card">
                      <?php
                      $data = $row['food_id'];
                      $input = ($data * 123456789);
                      $encrypt = base64_encode($input);
                      ?>
                      <div class="wrapper">
                        <a class="p-0 m-0" href="admin-food-detail.php?id=<?= $encrypt; ?>">
                          <div class="img-size"><img src="../image/<?= $row['image']; ?>" class="img-top" alt="...">
                            <div class="content">
                              <h4>View Details</h4>
                            </div>
                          </div>
                        </a>
                      </div>
                      <div class="card-body">
                        <h5 class="card-title fw-bold"><?= $row['food_name']; ?></h5>
                        <div class=" text-start">
                          <p class="mb-0"><?= $row['restaurant_name']; ?></p>
                          <small class="text-secondary">Price: Tk. <?= $row['price']; ?></small><br>
                          <small class="text-secondary">Rating: </small>

                          <?php
                          for ($j = 0; $j < intval($row['rating']); $j++) { ?>
                            <span class="fa fa-star checked"></span>
                          <?php
                          }
                          for ($j = 0; $j < 5 - intval($row['rating']); $j++) { ?>
                            <span class="fa fa-star"></span>
                          <?php
                          }
                          ?>

                        </div>
                      </div>
                    </div>
                  <?php
                  }
                  ?>
                </div>
              </div>
              <?php
              if (mysqli_num_rows($result) > 3) {
              ?>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample2Indicators" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExample2Indicators" data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Next</span>
                </button>
              <?php
              }
              ?>
            </div>
        </section>
        <hr>
        <!-- Part3 -->
        <section class="scroll-section mt-5" id="Pizza">
          <?php
          $query = "SELECT * FROM `food_info` WHERE `catagory`='Pizza' ORDER BY`rating` DESC";
          $result = mysqli_query($connect, $query);
          ?>
          <div class="part d-flex my-3">
            <h2 class="fw-bold text-start px-1">Pizza</h2>
            <img src="../image/c.png" width="5%" alt="">
          </div>
          <div id="carouselExample3Indicators" class="carousel slide">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <div class="cards-wrapper">
                  <?php
                  for ($i = 0; $i < 3; $i++) {
                    $row = mysqli_fetch_assoc($result);
                    if ($row == null) {
                      break;
                    }
                  ?>
                    <div class="card">
                      <?php
                      $data = $row['food_id'];
                      $input = ($data * 123456789);
                      $encrypt = base64_encode($input);
                      ?>
                      <div class="wrapper">
                        <a class="p-0 m-0" href="admin-food-detail.php?id=<?= $encrypt; ?>">
                          <div class="img-size"><img src="../image/<?= $row['image']; ?>" class="img-top" alt="...">
                            <div class="content">
                              <h4>View Details</h4>
                            </div>
                          </div>
                        </a>
                      </div>
                      <div class="card-body">
                        <h5 class="card-title fw-bold"><?= $row['food_name']; ?></h5>
                        <div class=" text-start">
                          <p class="mb-0"><?= $row['restaurant_name']; ?></p>
                          <small class="text-secondary">Price: Tk. <?= $row['price']; ?></small><br>
                          <small class="text-secondary">Rating: </small>

                          <?php
                          for ($j = 0; $j < intval($row['rating']); $j++) { ?>
                            <span class="fa fa-star checked"></span>
                          <?php
                          }
                          for ($j = 0; $j < 5 - intval($row['rating']); $j++) { ?>
                            <span class="fa fa-star"></span>
                          <?php
                          }
                          ?>

                        </div>
                      </div>
                    </div>
                  <?php
                  }
                  ?>
                </div>
              </div>
              <div class="carousel-item">
                <div class="cards-wrapper">
                  <?php
                  for ($i = 3; $i < 6; $i++) {
                    $row = mysqli_fetch_assoc($result);
                    if ($row == null) {
                      break;
                    }
                  ?>
                    <div class="card">
                      <?php
                      $data = $row['food_id'];
                      $input = ($data * 123456789);
                      $encrypt = base64_encode($input);
                      ?>
                      <div class="wrapper">
                        <a class="p-0 m-0" href="admin-food-detail.php?id=<?= $encrypt; ?>">
                          <div class="img-size"><img src="../image/<?= $row['image']; ?>" class="img-top" alt="...">
                            <div class="content">
                              <h4>View Details</h4>
                            </div>
                          </div>
                        </a>
                      </div>
                      <div class="card-body">
                        <h5 class="card-title fw-bold"><?= $row['food_name']; ?></h5>
                        <div class=" text-start">
                          <p class="mb-0"><?= $row['restaurant_name']; ?></p>
                          <small class="text-secondary">Price: Tk. <?= $row['price']; ?></small><br>
                          <small class="text-secondary">Rating: </small>

                          <?php
                          for ($j = 0; $j < intval($row['rating']); $j++) { ?>
                            <span class="fa fa-star checked"></span>
                          <?php
                          }
                          for ($j = 0; $j < 5 - intval($row['rating']); $j++) { ?>
                            <span class="fa fa-star"></span>
                          <?php
                          }
                          ?>

                        </div>
                      </div>
                    </div>
                  <?php
                  }
                  ?>
                </div>
              </div>
              <?php
              if (mysqli_num_rows($result) > 3) {
              ?>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample3Indicators" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExample3Indicators" data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Next</span>
                </button>
              <?php
              }
              ?>
            </div>
        </section>
        <hr>
        <!-- Part4 -->

        <section class="scroll-section mt-5" id="Burgers">
          <?php
          $query = "SELECT * FROM `food_info` WHERE `catagory`='Burgers' ORDER BY`rating` DESC";
          $result = mysqli_query($connect, $query);
          ?>
          <div class="part d-flex my-3">
            <h2 class="fw-bold text-start px-2"> Burgers</h2>
            <img src="../image/d.png" width="6%" alt="">
          </div>
          <div id="carouselExample1Indicators" class="carousel slide">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <div class="cards-wrapper">
                  <?php
                  for ($i = 0; $i < 3; $i++) {
                    $row = mysqli_fetch_assoc($result);
                    if ($row == null) {
                      break;
                    }
                  ?>
                    <div class="card">
                      <?php
                      $data = $row['food_id'];
                      $input = ($data * 123456789);
                      $encrypt = base64_encode($input);
                      ?>
                      <div class="wrapper">
                        <a class="p-0 m-0" href="admin-food-detail.php?id=<?= $encrypt; ?>">
                          <div class="img-size"><img src="../image/<?= $row['image']; ?>" class="img-top" alt="...">
                            <div class="content">
                              <h4>View Details</h4>
                            </div>
                          </div>
                        </a>
                      </div>
                      <div class="card-body">
                        <h5 class="card-title fw-bold"><?= $row['food_name']; ?></h5>
                        <div class=" text-start">
                          <p class="mb-0"><?= $row['restaurant_name']; ?></p>
                          <small class="text-secondary">Price: Tk. <?= $row['price']; ?></small><br>
                          <small class="text-secondary">Rating: </small>

                          <?php
                          for ($j = 0; $j < intval($row['rating']); $j++) { ?>
                            <span class="fa fa-star checked"></span>
                          <?php
                          }
                          for ($j = 0; $j < 5 - intval($row['rating']); $j++) { ?>
                            <span class="fa fa-star"></span>
                          <?php
                          }
                          ?>

                        </div>
                      </div>
                    </div>
                  <?php
                  }
                  ?>
                </div>
              </div>
              <div class="carousel-item">
                <div class="cards-wrapper">
                  <?php
                  for ($i = 3; $i < 6; $i++) {
                    $row = mysqli_fetch_assoc($result);
                    if ($row == null) {
                      break;
                    }
                  ?>
                    <div class="card">
                      <?php
                      $data = $row['food_id'];
                      $input = ($data * 123456789);
                      $encrypt = base64_encode($input);
                      ?>
                      <div class="wrapper">
                        <a class="p-0 m-0" href="admin-food-detail.php?id=<?= $encrypt; ?>">
                          <div class="img-size"><img src="../image/<?= $row['image']; ?>" class="img-top" alt="...">
                            <div class="content">
                              <h4>Edit</h4>
                            </div>
                          </div>
                        </a>
                      </div>
                      <div class="card-body">
                        <h5 class="card-title fw-bold"><?= $row['food_name']; ?></h5>
                        <div class=" text-start">
                          <p class="mb-0"><?= $row['restaurant_name']; ?></p>
                          <small class="text-secondary">Price: Tk. <?= $row['price']; ?></small><br>
                          <small class="text-secondary">Rating: </small>

                          <?php
                          for ($j = 0; $j < intval($row['rating']); $j++) { ?>
                            <span class="fa fa-star checked"></span>
                          <?php
                          }
                          for ($j = 0; $j < 5 - intval($row['rating']); $j++) { ?>
                            <span class="fa fa-star"></span>
                          <?php
                          }
                          ?>

                        </div>
                      </div>
                    </div>
                  <?php
                  }
                  ?>
                </div>
              </div>
              <?php
              if (mysqli_num_rows($result) > 3) {
              ?>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample1Indicators" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExample1Indicators" data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Next</span>
                </button>
              <?php
              }
              ?>
            </div>
        </section>
        <hr>
        <!-- Part5 -->
        <section class="scroll-section mt-5" id="Pasta-And-Noodles">
          <?php
          $query = "SELECT * FROM `food_info` WHERE `catagory`='Pasta-And-Noodles' ORDER BY`rating` DESC";
          $result = mysqli_query($connect, $query);
          ?>
          <div class="part d-flex my-3">
            <h2 class="fw-bold text-start px-2">Pasta & Noodles</h2>
            <img src="../image/e.png" width="8%" alt="">
          </div>
          <div id="carouselExample1Indicators" class="carousel slide">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <div class="cards-wrapper">
                  <?php
                  for ($i = 0; $i < 3; $i++) {
                    $row = mysqli_fetch_assoc($result);
                    if ($row == null) {
                      break;
                    }
                  ?>
                    <div class="card">
                      <?php
                      $data = $row['food_id'];
                      $input = ($data * 123456789);
                      $encrypt = base64_encode($input);
                      ?>
                      <div class="wrapper">
                        <a class="p-0 m-0" href="admin-food-detail.php?id=<?= $encrypt; ?>">
                          <div class="img-size"><img src="../image/<?= $row['image']; ?>" class="img-top" alt="...">
                            <div class="content">
                              <h4>View Details</h4>
                            </div>
                          </div>
                        </a>
                      </div>
                      <div class="card-body">
                        <h5 class="card-title fw-bold"><?= $row['food_name']; ?></h5>
                        <div class=" text-start">
                          <p class="mb-0"><?= $row['restaurant_name']; ?></p>
                          <small class="text-secondary">Price: Tk. <?= $row['price']; ?></small><br>
                          <small class="text-secondary">Rating: </small>

                          <?php
                          for ($j = 0; $j < intval($row['rating']); $j++) { ?>
                            <span class="fa fa-star checked"></span>
                          <?php
                          }
                          for ($j = 0; $j < 5 - intval($row['rating']); $j++) { ?>
                            <span class="fa fa-star"></span>
                          <?php
                          }
                          ?>

                        </div>
                      </div>
                    </div>
                  <?php
                  }
                  ?>
                </div>
              </div>
              <div class="carousel-item">
                <div class="cards-wrapper">
                  <?php
                  for ($i = 3; $i < 6; $i++) {
                    $row = mysqli_fetch_assoc($result);
                    if ($row == null) {
                      break;
                    }
                  ?>
                    <div class="card">
                      <?php
                      $data = $row['food_id'];
                      $input = ($data * 123456789);
                      $encrypt = base64_encode($input);
                      ?>
                      <div class="wrapper">
                        <a class="p-0 m-0" href="admin-food-detail.php?id=<?= $encrypt; ?>">
                          <div class="img-size"><img src="../image/<?= $row['image']; ?>" class="img-top" alt="...">
                            <div class="content">
                              <h4>View Details</h4>
                            </div>
                          </div>
                        </a>
                      </div>
                      <div class="card-body">
                        <h5 class="card-title fw-bold"><?= $row['food_name']; ?></h5>
                        <div class=" text-start">
                          <p class="mb-0"><?= $row['restaurant_name']; ?></p>
                          <small class="text-secondary">Price: Tk. <?= $row['price']; ?></small><br>
                          <small class="text-secondary">Rating: </small>

                          <?php
                          for ($j = 0; $j < intval($row['rating']); $j++) { ?>
                            <span class="fa fa-star checked"></span>
                          <?php
                          }
                          for ($j = 0; $j < 5 - intval($row['rating']); $j++) { ?>
                            <span class="fa fa-star"></span>
                          <?php
                          }
                          ?>

                        </div>
                      </div>
                    </div>
                  <?php
                  }
                  ?>
                </div>
              </div>
              <?php
              if (mysqli_num_rows($result) > 3) {
              ?>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample1Indicators" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExample1Indicators" data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Next</span>
                </button>
              <?php
              }
              ?>
            </div>
        </section>
        <hr>
        <!-- Part6 -->

        <section class="scroll-section mt-5" id="Sandwitch">
          <?php
          $query = "SELECT * FROM `food_info` WHERE `catagory`='Sandwitch' ORDER BY`rating` DESC";
          $result = mysqli_query($connect, $query);
          ?>
          <div class="part d-flex mt-3 mb-2">
            <h2 class="fw-bold text-start px-2">Sandwitch</h2>
            <img src="../image/f.png" width="6%" alt="">
          </div>
          <div id="carouselExample1Indicators" class="carousel slide">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <div class="cards-wrapper">
                  <?php
                  for ($i = 0; $i < 3; $i++) {
                    $row = mysqli_fetch_assoc($result);
                    if ($row == null) {
                      break;
                    }
                  ?>
                    <div class="card">
                      <?php
                      $data = $row['food_id'];
                      $input = ($data * 123456789);
                      $encrypt = base64_encode($input);
                      ?>
                      <div class="wrapper">
                        <a class="p-0 m-0" href="admin-food-detail.php?id=<?= $encrypt; ?>">
                          <div class="img-size"><img src="../image/<?= $row['image']; ?>" class="img-top" alt="...">
                            <div class="content">
                              <h4>View Details</h4>
                            </div>
                          </div>
                        </a>
                      </div>
                      <div class="card-body">
                        <h5 class="card-title fw-bold"><?= $row['food_name']; ?></h5>
                        <div class=" text-start">
                          <p class="mb-0"><?= $row['restaurant_name']; ?></p>
                          <small class="text-secondary">Price: Tk. <?= $row['price']; ?></small><br>
                          <small class="text-secondary">Rating: </small>

                          <?php
                          for ($j = 0; $j < intval($row['rating']); $j++) { ?>
                            <span class="fa fa-star checked"></span>
                          <?php
                          }
                          for ($j = 0; $j < 5 - intval($row['rating']); $j++) { ?>
                            <span class="fa fa-star"></span>
                          <?php
                          }
                          ?>

                        </div>
                      </div>
                    </div>
                  <?php
                  }
                  ?>
                </div>
              </div>
              <div class="carousel-item">
                <div class="cards-wrapper">
                  <?php
                  for ($i = 3; $i < 6; $i++) {
                    $row = mysqli_fetch_assoc($result);
                    if ($row == null) {
                      break;
                    }
                  ?>
                    <div class="card">
                      <?php
                      $data = $row['food_id'];
                      $input = ($data * 123456789);
                      $encrypt = base64_encode($input);
                      ?>
                      <div class="wrapper">
                        <a class="p-0 m-0" href="admin-food-detail.php?id=<?= $encrypt; ?>">
                          <div class="img-size"><img src="../image/<?= $row['image']; ?>" class="img-top" alt="...">
                            <div class="content">
                              <h4>View Details</h4>
                            </div>
                          </div>
                        </a>
                      </div>
                      <div class="card-body">
                        <h5 class="card-title fw-bold"><?= $row['food_name']; ?></h5>
                        <div class=" text-start">
                          <p class="mb-0"><?= $row['restaurant_name']; ?></p>
                          <small class="text-secondary">Price: Tk. <?= $row['price']; ?></small><br>
                          <small class="text-secondary">Rating: </small>

                          <?php
                          for ($j = 0; $j < intval($row['rating']); $j++) { ?>
                            <span class="fa fa-star checked"></span>
                          <?php
                          }
                          for ($j = 0; $j < 5 - intval($row['rating']); $j++) { ?>
                            <span class="fa fa-star"></span>
                          <?php
                          }
                          ?>

                        </div>
                      </div>
                    </div>
                  <?php
                  }
                  ?>
                </div>
              </div>
              <?php
              if (mysqli_num_rows($result) > 3) {
              ?>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample1Indicators" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExample1Indicators" data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Next</span>
                </button>
              <?php
              }
              ?>
            </div>
        </section>
        <hr>
        <!-- Part7 -->

        <section class="scroll-section mt-5" id="Sides">
          <?php
          $query = "SELECT * FROM `food_info` WHERE `catagory`='Sides' ORDER BY`rating` DESC";
          $result = mysqli_query($connect, $query);
          ?>
          <div class="part d-flex my-3">
            <h2 class="fw-bold text-start px-2">Sides</h2>
            <img src="../image/g.png" width="8%" alt="">
          </div>
          <div id="carouselExample1Indicators" class="carousel slide">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <div class="cards-wrapper">
                  <?php
                  for ($i = 0; $i < 3; $i++) {
                    $row = mysqli_fetch_assoc($result);
                    if ($row == null) {
                      break;
                    }
                  ?>
                    <div class="card">
                      <?php
                      $data = $row['food_id'];
                      $input = ($data * 123456789);
                      $encrypt = base64_encode($input);
                      ?>
                      <a class="p-0 m-0" href="admin-food-detail.php?id=<?= $encrypt; ?>">
                        <div class="img-size"><img src="../image/<?= $row['image']; ?>" class="img-top" alt="..."></div>
                      </a>
                      <div class="card-body">
                        <h5 class="card-title fw-bold"><?= $row['food_name']; ?></h5>
                        <div class=" text-start">
                          <p class="mb-0"><?= $row['restaurant_name']; ?></p>
                          <small class="text-secondary">Price: Tk. <?= $row['price']; ?></small><br>
                          <small class="text-secondary">Rating: </small>

                          <?php
                          for ($j = 0; $j < intval($row['rating']); $j++) { ?>
                            <span class="fa fa-star checked"></span>
                          <?php
                          }
                          for ($j = 0; $j < 5 - intval($row['rating']); $j++) { ?>
                            <span class="fa fa-star"></span>
                          <?php
                          }
                          ?>

                        </div>
                      </div>
                    </div>
                  <?php
                  }
                  ?>
                </div>
              </div>
              <div class="carousel-item">
                <div class="cards-wrapper">
                  <?php
                  for ($i = 3; $i < 6; $i++) {
                    $row = mysqli_fetch_assoc($result);
                    if ($row == null) {
                      break;
                    }
                  ?>
                    <div class="card">
                      <?php
                      $data = $row['food_id'];
                      $input = ($data * 123456789);
                      $encrypt = base64_encode($input);
                      ?>
                      <a class="p-0 m-0" href="admin-food-detail.php?id=<?= $encrypt; ?>">
                        <div class="img-size"><img src="../image/<?= $row['image']; ?>" class="img-top" alt="..."></div>
                      </a>
                      <div class="card-body">
                        <h5 class="card-title fw-bold"><?= $row['food_name']; ?></h5>
                        <div class=" text-start">
                          <p class="mb-0"><?= $row['restaurant_name']; ?></p>
                          <small class="text-secondary">Price: Tk. <?= $row['price']; ?></small><br>
                          <small class="text-secondary">Rating: </small>

                          <?php
                          for ($j = 0; $j < intval($row['rating']); $j++) { ?>
                            <span class="fa fa-star checked"></span>
                          <?php
                          }
                          for ($j = 0; $j < 5 - intval($row['rating']); $j++) { ?>
                            <span class="fa fa-star"></span>
                          <?php
                          }
                          ?>

                        </div>
                      </div>
                    </div>
                  <?php
                  }
                  ?>
                </div>
              </div>
              <?php
              if (mysqli_num_rows($result) > 3) {
              ?>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample1Indicators" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExample1Indicators" data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Next</span>
                </button>
              <?php
              }
              ?>
            </div>
        </section>
      </section>
    </div>
  </section>
</body>

</html>