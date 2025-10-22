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
    <link rel="stylesheet" href="../css/account.css">
    <script src="jQuery.js"></script>
</head>

<body>
    <!--Header-->

    <!--Navigation-->
    <?php
    require('Navigation.php');
    ?>

    <div>
        <?php
        $user_id = $user_value['id'];
        $sql = "SELECT * FROM `notification` WHERE `user_id`='$user_id' AND `Status`='Unread'";
        $result = mysqli_query($connect, $sql);
        $count = mysqli_num_rows($result);
        // echo $row['mistakes'].'<br>';

        ?>
    </div>
    <div class="header ms-5">
        <h2 class="fw-bold mt-5 ms-5 mb-4">Notifications</h2>
    </div>

    <hr>
    <section id="unread">
        <div>
            <h5 class="heading">Unread Notifications</h5>
        </div>
        <?php
        $notif_read = array();
        if ($count > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                array_push($notif_read, $row["id"]);

        ?>
                <div class="card mb-4">
                    <div class="card-header">
                        Request has been canceled !
                    </div>
                    <div class="card-body">
                        <h6 class="card-title"><?= $row['mistakes']; ?></h6>
                        <div class="card-text">
                            <p class="mb-1">Your request Information:</p>
                            <div class="text-secondary">
                                <small>Food name: <?= $row['food_name']; ?></small><br>
                                <small>Price: <?= $row['price']; ?></small><br>
                                <small>Restaurant Name: <?= $row['res_name']; ?></small><br>
                                <small>Location: <?= $row['location']; ?></small><br>
                                <small>Description: <?= $row['description']; ?></small>
                            </div>

                        </div>
                    </div>
                </div>
            <?php
                $str = implode(',', $notif_read);
            }
        } else {
            ?>
            <div class="text-center">
               <h5> No New Notification!</h5>
            </div>
        <?php
        }
        ?>
    </section>
    <hr>
    <section id="read">
        <div>
            <h5 class="heading">Read Notifications</h5>
        </div>
        <?php
        $sql = "SELECT * FROM `notification` WHERE `user_id`='$user_id' AND `Status`='Read'";
        $result = mysqli_query($connect, $sql);
        $read_count = mysqli_num_rows($result);
        if($read_count>0){
            while ($row = mysqli_fetch_assoc($result)) {
                array_push($notif_read, $row["id"]);
            ?>
                <div class="card mb-4">
                    <div class="card-header">
                        Request has been canceled !
                    </div>
                    <div class="card-body">
                        <h6 class="card-title"><?= $row['mistakes']; ?></h6>
                        <div class="card-text">
                            <p class="mb-1">Your request Information:</p>
                            <div class="text-secondary">
                                <small>Food name: <?= $row['food_name']; ?></small><br>
                                <small>Price: <?= $row['price']; ?></small><br>
                                <small>Restaurant Name: <?= $row['res_name']; ?></small><br>
                                <small>Location: <?= $row['location']; ?></small><br>
                                <small>Description: <?= $row['description']; ?></small>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            }
        }else{
            ?>
            <div class="text-center">
               <h5> Nothing to Show!</h5>
            </div>
        <?php
        }
        ?>
    </section>

    <div id="reading"></div>
</body>

</html>

<style>
    #unread {
        width: 85%;
        background-color: rgb(208, 250, 250, 0.9);
        margin: auto;
        margin-top: 2%;
        padding: 3%;
    }

    .heading {
        padding: 2%;
        margin-bottom: 3%;
        background-color: beige;
        border-radius: 30px;
        font-weight: 600;
        box-shadow: 3px 2px 6px #000;
    }

    #read {
        width: 85%;
        background-color: rgb(208, 250, 250);
        margin: auto;
        margin-top: 2%;
        padding: 3%;

    }

    .card-body {
        background-color: #f0eded73;
    }

    .card-title {
        font-size: 21px;
        color: brown;
    }

    .card-text {
        width: 80%;
    }
</style>

<script>
    r = "<?= $str; ?>"
    console.log(r);
    $("#reading").load("read.php", {
        ids: r
    });
    // window.location.href = "read.php?ids=" + r;
</script>