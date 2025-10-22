<?php
require_once('database.php');
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
  <link rel="stylesheet" href="../css/home.css">
  <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
</head>

<body>
  <!--Header-->

  <section class="colored-section">
    <div class="container-fluid">

      <!--Navigation-->
      <?php
      require('Navigation.php');
      ?>

      <!--Title

      <div class="row">
        <div class="col-lg-6">
          <h1>Become a Foodie.</h1>
          <p>Become a <strong>reviewer</strong> and earn money.</p>
        </div>

        <div class="col-lg-6 text-center align-middle">
          
        </div>

      </div>

    </div>-->
  </section>

  <!--Features-->

  <div id="carouselExampleIndicators" class="carousel slide">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <div class="cards-wrapper">
          <div class="card d-none d-md-block">
            <img src="../image/b.jpg" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
          </div>
          <div class="card d-none d-md-block">
            <img src="../image/b.jpg" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
          </div>
          <div class="card d-none d-md-block">
            <img src="../image/c.jpg" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
          </div>
        </div>
      </div>
      <div class="carousel-item">
        <div class="cards-wrapper">
          <div class="card d-none d-md-block">
            <img src="../image/d.jpg" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
          </div>
          <div class="card d-none d-md-block">
            <img src="../image/e.jpg" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
          </div>
          <div class="card d-none d-md-block">
            <img src="../image/f.jpg" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
          </div>
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>


    <!--Footer-->

    <section class="white-section" id="footer">
      <div>
        <h5>Contact us on social networks: </h5>
        <div class="container p-2 pb-0">
          <div class="mb-4">
            <a class="btn btn-outline-dark btn-floating m-1 mx-3" href="#!" role="button"><i class="fab fa-facebook-f"></i></a>
            <a class="btn btn-outline-dark btn-floating m-1 mx-3" href="#!" role="button"><i class="fab fa-twitter"></i></a>
          </div>
        </div>
      </div>
      <hr class=" hr hr-blurry">
      <div class="row contact my-3">
        <div class="col-lg-4 col-md-6 col-sm-12 col-xl-4 mx-auto mb-md-0 mb-4">
          <h6 class="text-uppercase fw-bold mb-4 mt-4">Explore</h6>
          <p><a href="home.php" class="footer-anchor">Home</a></p>
        </div>

        <div class="col-lg-4 col-md-6 col-sm-12 col-xl-4 mx-auto mb-md-0">
          <h6 class="text-uppercase fw-bold mb-4 mt-4">Support</h6>
          <p><a href="" class="footer-anchor">About</a></p>
          <p><a href="" class="footer-anchor">Contact us</a></p>
          <p><a href="" class="footer-anchor">FAQ</a></p>
        </div>

        <div class="col-lg-4 col-md-6 col-sm-12 col-xl-4 mx-auto mb-md-0">
          <h6 class="text-uppercase fw-bold mb-4 mt-4">Contact</h6>
          <p>House-1/3, Road-01 (Avenue), Block-C, Mirpur-1, Dhaka-1216, Bangladesh</p>
          <p>foodiebangladesh@gmail.com</p>
          <p>Phone: 01878-726339</p>
        </div>
      </div>

      <hr class=" hr hr-blurry">
      <div class="text-center p-3">
        <p>© Copyright 2023 Foodie group</p>
      </div>
    </section>
</body>

</html>