<?php
require_once('../php/database.php');

$query1 = mysqli_query($connect, "SELECT * FROM food_info");
$row_food = mysqli_num_rows($query1);

$query2 = mysqli_query($connect,"SELECT * FROM request");
$row_req = mysqli_num_rows($query2);

$query3 = mysqli_query($connect,"SELECT * FROM registration");
$row_ppl = mysqli_num_rows($query3);
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
    <link rel="stylesheet" href="css/home.css">
</head>

<body>
    <!--Header-->
    <section id="title">
        <div class="container-fluid">
            <!--Navigation-->
            <?php
            require_once('../php/Navigation.php');
            ?>
    </section>
    <section id="content" class="layout">
        <?php
        require_once('sidebar.php');
        ?>
        <div id="content-body">
            <div id="features">
                <div>
                    <h2>Welcome to <span style="color: red; font-family:Verdana, Geneva, Tahoma, sans-serif;"> Foodie, </span><span class="badge bg-success">Admin</span> !</h2>
                </div>
            </div>
            <div id="info">
                <div class="info">
                    <div class="row">
                        <div class="col col-lg-4 col-md-6 col-sm-12">
                            <div class="card">
                                <h5 class="card-header">All Foods</h5>
                                <a href="food-list.php">
                                    <button type="button" class="btn">
                                        <div class="card-body">
                                            <div class="row mt-2">
                                                <div class="col text-start">
                                                    <h3 class="card-title"><?= $row_food; ?></h3>
                                                    <h5 class="card-text">Total Foods</h5>
                                                </div>
                                                <div class="col">
                                                    <img src="../image/admin-food.png" alt="" width="95%">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            Check food list
                                        </div>
                                    </button>
                                </a>
                            </div>
                        </div>
                        <div class="col col-lg-4 col-md-6 col-sm-12">
                            <div class="card">
                                <h5 class="card-header">All Requests</h5>
                                <a href="request-list.php">
                                    <button type="button" class="btn">
                                        <div class="card-body">
                                            <div class="row mt-2">
                                                <div class="col text-start">
                                                    <h3 class="card-title"><?= $row_req; ?></h3>
                                                    <h5 class="card-text">Total Requests</h5>
                                                </div>
                                                <div class="col">
                                                    <img src="../image/request.png" alt="" width="95%">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            Check Request list
                                        </div>
                                    </button>
                                </a>
                            </div>
                        </div>
                        <div class="col col-lg-4 col-md-6 col-sm-12">
                            <div class="card">
                                <h5 class="card-header">All Foodies</h5>
                                <a href="reg-list.php">
                                    <button type="button" class="btn">
                                        <div class="card-body">
                                            <div class="row mt-2">
                                                <div class="col text-start">
                                                    <h3 class="card-title"><?= $row_ppl; ?></h3>
                                                    <h5 class="card-text">Total People</h5>
                                                </div>
                                                <div class="col">
                                                    <img src="../image/foodies.png" alt="" width="95%">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            Registration list
                                        </div>
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>