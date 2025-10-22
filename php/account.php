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
    <!-- JS -->
    <script src="jQuery.js"></script>
</head>

<body>
    <!--Header-->

    <!--Navigation-->
    <?php
    require('Navigation.php');
    ?>

    <?php
    if (isset($_SESSION['updated'])) {
    ?>
        <div class='alert alert-success' style='text-align:center;'>Updated Successfully!</div>
    <?php
        unset($_SESSION['updated']);
    }
    ?>

    <section class="my-5" id="info">
        <div class="row">
            <div class="col col-lg-6">
                <h2>Account Information</h2>

                <div class="profile-pic">
                    <img src="../image/<?= $user_value['image']; ?>" alt="">
                </div>
                <?php
                $id = $user_value['id'];
                $sql = "SELECT COUNT(`forker`) as count FROM `forkers` WHERE `reviewers`='$id'";
                $query = mysqli_query($connect, $sql);
                $row = mysqli_fetch_assoc($query);
                ?>
                <!-- Follower List -->
                <div class="fw-bold text-center bg-success text-light py-1">
                    <button type="button" class="btn text-light" title="See people follows you" data-bs-toggle="modal" data-bs-target="#exampleModal"><em><?= $row['count']; ?> Forkers for You</em></button>
                </div>
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

                <!-- Account Info -->
                <form class="my-4 py-4 px-5" action="">
                    <div class="row mb-3 mx-2 form-text">
                        <div class="col-sm-3 col-form-label"><label for="username">User Name</label></div>
                        <div class="col-sm-9"><input type="text" id="username" value="<?= $user_value['username']; ?>" class="form-control-plaintext" readonly></div>
                    </div>
                    <hr>
                    <div class="row mb-3 mx-2 form-text">
                        <div class="col-sm-3 col-form-label"><label for="email">Email</label></div>
                        <div class="col-sm-9"><input type="text" id="email" value="<?= $user_value['email']; ?>" class="form-control-plaintext" readonly></div>
                    </div>
                    <hr>
                    <div class="row mb-3 mx-2 form-text">
                        <div class="col-sm-3 col-form-label"><label for="firstname">First Name</label></div>
                        <div class="col-sm-9"><input type="text" id="firstname" value="<?= $user_value['firstname']; ?>" class="form-control-plaintext" readonly></div>
                    </div>
                    <hr>
                    <div class="row mb-3 mx-2 form-text">
                        <div class="col-sm-3 col-form-label"><label for="lasttname">Last Name</label></div>
                        <div class="col-sm-9"><input type="text" id="lastname" value="<?= $user_value['lastname']; ?>" class="form-control-plaintext" readonly></div>
                    </div>
                    <hr>
                    <div class="row mb-3 mx-2 form-text">
                        <div class="col-sm-3 col-form-label"><label for="contact">Contact</label></div>
                        <div class="col-sm-9"><input type="text" id="contact" value="<?= $user_value['contact']; ?>" class="form-control-plaintext" readonly></div>
                    </div>
                    <hr>
                    <div class="row mb-3 mx-2 form-text">
                        <div class="col-sm-3 col-form-label"><label for="address">Address</label></div>
                        <div class="col-sm-9"><input type="text" id="address" value="<?= $user_value['address']; ?>" class="form-control-plaintext" readonly></div>
                    </div>
                    <hr>
                    <p class="mx-3">Social Networks:</p>
                    <div class="row mb-1 mx-2 form-text">
                        <div class="col-sm-3 col-form-label"><label for="youtube"><i class="fa-brands fa-youtube fa-lg"></i></label></div>
                        <div class="col-sm-9"><input type="text" id="youtube" value="<?= $user_value['youtube']; ?>" class="form-control-plaintext" readonly></div>
                    </div>
                    <div class="row mb-1 mx-2 form-text">
                        <div class="col-sm-3 col-form-label"><label for="instagram"><i class="fa-brands fa-instagram fa-lg"></i></label></div>
                        <div class="col-sm-9"><input type="text" id="instagram" value="<?= $user_value['instagram']; ?>" class="form-control-plaintext" readonly></div>
                    </div>
                    <div class="row mb-1 mx-2 form-text">
                        <div class="col-sm-3 col-form-label"><label for="facebook"><i class="fa-brands fa-facebook fa-lg "></i></label></div>
                        <div class="col-sm-9"><input type="text" id="facebook" value="<?= $user_value['facebook']; ?>" class="form-control-plaintext" readonly></div>
                    </div>
                    <div class="row mb-1 mx-2 form-text">
                        <div class="col-sm-3 col-form-label"><label for="twitter"><i class="fa-brands fa-twitter fa-lg"></i></label></div>
                        <div class="col-sm-9"><input type="text" id="twitter" value="<?= $user_value['twitter']; ?>" class="form-control-plaintext" readonly></div>
                    </div>
                    <br>
                    <div class="d-grid gap-2 d-sm-flex mt-5 ml-5">
                        <a href="update.php"><button type="button" class="btn btn-outline-light custom-button rounded-pill px-5">Update Profile</button></a>
                    </div>
                </form>
            </div>
            <div class="col col-lg-1">
                <div class="d-flex me-0" style="height: 600px; width:4%">
                    <div class="vr"></div>
                </div>
            </div>
            <div class="col col-lg-5">
                <div class="text-center my-4">
                    <!-- Reviewed foods -->
                    <h3>Reviewed</h3>
                </div>
                <section id="Collection">
                    <div id="reload">
                        <div class="box m-auto">
                            <?php
                            $userID = $user_value['id'];
                            $review_sql = "SELECT * FROM food_review where user_id='$userID'";
                            $review_result = mysqli_query($connect, $review_sql);
                            while ($review_row = mysqli_fetch_assoc($review_result)) {
                                $food = $review_row['food_id'];
                                $sql = "SELECT * FROM food_info where food_id='$food'";
                                $result = mysqli_query($connect, $sql);
                                while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                                    <div class="mb-3 w-100 mx-auto text-start">
                                        <h6 class="fw-semibold fst-italic">Reviewed on: <?= $review_row['date']; ?></h6>
                                    </div>
                                    <div class="card mb-5 mx-auto w-100 text-start">
                                        <?php
                                        $data = $row['food_id'];
                                        $input = ($data * 123456789);
                                        $encrypt = base64_encode($input);
                                        ?>
                                        <div class="row g-5">
                                            <div class="col-md-5 p-0">
                                                <a class="p-0 m-0" href="food-detail.php?id=<?= $encrypt; ?>">
                                                    <div class="img-size"><img src="../image/<?= $row['image']; ?>" class="img-fluid rounded-start" alt="...">
                                                    </div>
                                                </a>
                                            </div>

                                            <div class="col-md-5 pe-0 flex-fill">
                                                <div class="card-body">
                                                    <h6 class="card-title mb-0"><strong><?= $row['food_name']; ?></strong></h6>
                                                    <p class="card-text "><?= $row['restaurant_name']; ?></p>
                                                    <p class="card-text mb-0">Rated
                                                        <span class="ms-3">
                                                            <?php
                                                            for ($j = 0; $j < intval($review_row['rating']); $j++) {
                                                            ?>
                                                                <span class="fa fa-star checked fa-xs"></span>
                                                            <?php
                                                            }
                                                            for ($j = 0; $j < 5 - intval($review_row['rating']); $j++) { ?>
                                                                <span class="fa fa-star  fa-xs"></span>
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
                                                    <p class="card-text mb-2">Review:<?= " " . $review_row['comment']; ?></p>
                                                    <p class="mb-1 text-secondary"><small><span>Likes: <?= $like_count; ?>
                                                            </span><span class="ms-4">Dislikes: <?= $dislike_count; ?></span></small></p>
                                                </div>
                                            </div>
                                            <div class="col-md-2" style="position: relative;">
                                                <button class="border-0" onclick="deleteRec(<?= $review_row['rev_id']; ?>)"><i class="del fa-solid fa-trash fa-lg" style="color: #d62e2e;"></i></button>
                                                <style>
                                                    .del {
                                                        position: absolute;
                                                        top: 50%;
                                                    }
                                                </style>
                                            </div>
                                        </div>
                                    </div>
                            <?php
                                }
                            }
                            ?>
                        </div>
                    </div>

                    <div id="del"></div>
                </section>
            </div>
    </section>
    </div>
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

<script>
    function deleteRec(val) {

        let delRow = confirm('Are you sure you want to delete your review?');
        if (delRow) {
            console.log(val);
            $('#del').load("delete-review.php", {
                rid: val
            });
            window.alert("Review has been successfully deleted")
            $("#reload").load(location.href + " #reload");
        }
    }
</script>