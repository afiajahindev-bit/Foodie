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
    <link rel="stylesheet" href="../css/cover.css">
</head>

<body>
    <!--Header-->

    <section class="colored-section" id="title">
        <div class="container-fluid">

            <!--Navigation-->
            <nav class="navbar fixed-top navbar-expand-lg navbar-light">
                <a class="navbar-brand" href="">Foodie</a>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="login.php">Log In / Sign Up</a></li>
                </ul>
            </nav>
    </section>

    <!--Features-->

    <section id="features">
        <div>
            <h2>Welcome to <span style="color: red; font-family:Verdana, Geneva, Tahoma, sans-serif;"> Foodie </span>!</h2>
        </div>
        <div class="row">
            <div class="col-lg-5 feature-box">
                <img class="rounded-2" src="../image/feature1.jpg" alt="">
                <h4>Become a Reviewer.</h4>
                <p class="feature-font">Start your journey as a reviwer with us.
                    Give review of food of different restaurants.
                    Create your own fanbase.
                    maintain honesty and get paid according.</p>
            </div>
            <div class="col-lg-5 feature-box">
                <img class="rounded-2" src="../image/feature2.jpg" alt="">
                <h4>Become a Foodie.</h4>
                <p class="feature-font">Want to find great foods persuant to ur craving?
                    Search your food ,watch reviw & enjoy your meal.
                    Dont forget to coherence your opinion.</p>
            </div>
        </div>
    </section>


    <!--Footer-->

    <section class="white-section" id="footer">
        <?php
        require_once('footer.php');
        ?>
    </section>
</body>
</html>