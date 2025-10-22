<?php
require_once('database.php');
if (isset($_GET['id'])) {
    $input = $_GET['id'];
    $id = (base64_decode($input) / 123456789);
    $sql = "SELECT * FROM registration where id='$id'";
    $result = mysqli_query($connect, $sql);
    $value = mysqli_fetch_assoc($result);
}
include("functions.php");
// $servername = "localhost";
// $username = "root";
// $password = "";
// $dbname = "foodies";

// $conn = new mysqli($servername, $username, $password, $dbname);

// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// }

$sql = "SELECT reviewers, forker FROM forkers";
$result = $connect->query($sql);
$key = $value['id'];   //reviewers
$values = $user_value['id'];  //forker
// session_start();
$_SESSION['k'] = $key;
$_SESSION['v'] = $values;

$founds = 0;
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {

        if ($row['reviewers'] == $key && $row['forker'] == $values) {
            $founds = 1;
            break;
        }
    }
}

if ($founds == 1) {
    $follow_str = "Unfollow Reviewer";
} else {
    $follow_str = "Follow Reviewer";
}
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
    <link rel="stylesheet" href="../css/reviewer.css">
</head>

<body>
    <!--Header-->
    <!--Navigation-->
    <?php
    require('Navigation.php');
    ?>


    <section id="account">
        <div class="reviewer">
            <img class="img" src="../image/<?= $value['image']; ?>" alt="">
            <div class="ms-3">
                <h4 class="mb-0"><?= $value['firstname'] . " "; ?><?= $value['lastname']; ?></h4>
                <p class="text-secondary mb-1"><?= $value['username']; ?></p>
            </div>
            <div>
                <button class="fork mb-3" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="<?php echo $follow_str; ?>">
                    Fork
                </button>
                <td><label class="forkk"><img id='ff' src="fork.png" alt="" class="forki"></label></td>
                <button type="button" class="btn" title="Forkers List" data-bs-toggle="modal" data-bs-target="#exampleModal"><td class="fcount"> <?php echo getforkers($key, $db); ?></td></button>
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" data-bs-backdrop="static" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Forkers List</h1>
                                <button type="button" class="btn-close btn-close-dark" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <?php
                                $follower = "SELECT * FROM `forkers` WHERE `reviewers`='$id'";
                                $follower_query = mysqli_query($connect, $follower);
                                while ($follower_row = mysqli_fetch_assoc($follower_query)) {
                                    $forker_id = $follower_row['forker'];
                                    $forker_list = "SELECT * FROM `registration` WHERE `id`='$forker_id'";
                                    $forker_query = mysqli_query($connect, $forker_list);
                                    while ($forker_row = mysqli_fetch_assoc($forker_query)) {
                                        $data = $forker_row['id'];
                                        $input = ($data * 123456789);
                                        $encrypt = base64_encode($input);
                                        $link = "reviewer-detail.php?id=<?=$encrypt;?>";
                                ?>
                                        <a href="<?= $link; ?>" class="text-decoration-none text-dark">
                                            <div class="d-flex align-items-start mb-4">
                                                <img src="../image/<?= $forker_row['image']; ?>" alt="" width="10%" class="me-3">
                                                <div>
                                                    <h6 class="mb-0"><?= $forker_row['firstname'] . ' ' . $forker_row['lastname']; ?></h6>
                                                    <small class="text-secondary"><?= $forker_row['email']; ?></small>
                                                </div>
                                            </div>
                                        </a>
                                <?php
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <input type="hidden" id="fc" value="<?php echo getforkers($key, $db); ?>">
                <style>
                    .fork:hover {
                        background-color: rgba(166, 43, 43);
                        transform: scale(1.04);
                    }
                </style>
                <script>
                    const tooltipTriggerList = document.querySelectorAll('.fork')
                    const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
                </script>
            </div>
            <input type="hidden" id="found" value="<?php echo $founds; ?>">
            <div class="social">
                <p style="display: inline-block;">Follow on: </p>
                <a href="<?= $value['youtube']; ?>"><img src="../image/youtube.png" alt=""></a>
                <a href="<?= $value['instagram']; ?>"><img src="../image/facebook.png" alt=""></a>
                <a href="<?= $value['facebook']; ?>"><img src="../image/instagram.png" alt=""></a>
                <a href="<?= $value['twitter']; ?>"><img src="../image/twitter.png" alt=""></a>
            </div>
        </div>
    </section>
    <section class="mt-5">
        <h3 class="text-center">Reviewed Food Items</h3>
        <div>
            <section id="Collection">
                <div class="box m-auto">
                    <?php
                    $review_sql = "SELECT * FROM food_review where user_id='$id'";
                    $review_result = mysqli_query($connect, $review_sql);
                    while ($review_row = mysqli_fetch_assoc($review_result)) {
                        $food = $review_row['food_id'];
                        $sql = "SELECT * FROM food_info where food_id='$food'";
                        $result = mysqli_query($connect, $sql);
                        while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                            <div class="mb-3 w-75 mx-auto text-start">
                                <h6 class="fw-semibold fst-italic">Reviewed on: <?= $review_row['date']; ?></h6>
                            </div>

                            <div class="card mb-5 mx-auto w-75 text-start">
                                <?php
                                $data = $row['food_id'];
                                $input = ($data * 123456789);
                                $encrypt = base64_encode($input);
                                ?>
                                <div class="row g-5">
                                    <div class="col-md-4">
                                        <div class="wrapper">
                                            <a class="p-0 m-0" href="food-detail.php?id=<?= $encrypt; ?>">
                                                <div class="img-size"><img src="../image/<?= $row['image']; ?>" class="img-fluid rounded-start" alt="...">
                                                </div>
                                            </a>
                                        </div>
                                    </div>

                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h5 class="card-title"><?= $row['food_name']; ?><span class="text-secondary ms-3" style="font-size: 16px;"><?= " " . $row['rating']; ?>/5</span></h5>
                                            <p class="card-text mb-0"><?= $row['restaurant_name']; ?></p>
                                            <p class="card-text"><small class="text-body-secondary">Price: Tk. <?= $row['price']; ?></small> </p>
                                            <p class="card-text mb-0">Reviewer Rating
                                                <span class="ms-3"><?php
                                                                    for ($j = 0; $j < intval($review_row['rating']); $j++) {
                                                                    ?>
                                                        <span class="fa fa-star checked"></span>
                                                    <?php
                                                                    }
                                                                    for ($j = 0; $j < 5 - intval($review_row['rating']); $j++) { ?>
                                                        <span class="fa fa-star"></span>
                                                    <?php
                                                                    }
                                                    ?></span>
                                                <span class="text-secondary"><?= " " . $review_row['rating']; ?>/5</span>
                                            </p>
                                            <?php
                                            $review_id = $review_row['rev_id'];
                                            $dislike_sql = "SELECT `id` FROM ad WHERE `rev_id`=$review_id AND`result`='dislike'";
                                            $dislike_result = mysqli_query($connect, $dislike_sql);
                                            $dislike_count = mysqli_num_rows($dislike_result);
                                            $like_sql = "SELECT `id` FROM ad WHERE `rev_id`=$review_id AND`result`='like'";
                                            $like_result = mysqli_query($connect, $like_sql);
                                            $like_count = mysqli_num_rows($like_result);
                                            ?>
                                            <p class="card-text">Review:<br><?= $review_row['comment']; ?></p>
                                            <div class="mb-1 text-secondary" style="position: absolute; top:30px; right:50px">
                                                <table>
                                                    <tbody>
                                                        <tr>
                                                            <td class="pe-3">Likes</td>
                                                            <td><?= $like_count; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="pe-3">Dislikes</td>
                                                            <td><?= $dislike_count; ?></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                    <?php
                        }
                    }
                    ?>

                </div>
            </section>
        </div>
    </section>

    <!--Footer-->

    <section class="white-section" id="footer">
        <?php
        require('footer.php');

        ?>
    </section>
</body>

</html>
<style>
    .imgg {
        height: 20px;
    }

    .forki {
        height: 20px;

    }
</style>
<script src="jQuery.js"></script>
<script src="fork.js">

</script>