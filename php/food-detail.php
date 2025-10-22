<?php
require_once('database.php');


if (isset($_GET['id'])) {
    $input = $_GET['id'];
    $food_id = (base64_decode($input) / 123456789);
    $food_sql = "SELECT * FROM food_info where food_id='$food_id'";
    $food_result = mysqli_query($connect, $food_sql);
    $food_value = mysqli_fetch_assoc($food_result);
    $updatefood_id = "UPDATE getfood_id SET food_id = $food_id WHERE id = 1;";
    $updatefood_result = mysqli_query($connect, $updatefood_id);
}
$user_id = $user_value['id'];
$_SESSION['value'] = $food_id;
$_SESSION['food_id'] = $food_id;
include("functions.php");
//$connect->close();
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!--Font Awesome-->
    <script src="https://kit.fontawesome.com/d4c58442e3.js" crossorigin="anonymous"></script>
    <!--CSS-->
    <link rel="stylesheet" href="../css/detail.css">
    <script src="jQuery.js"></script>
    <style>
        /* Style for the modal */
        #mapModal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.7);
        }

        /* Style for the modal content */
        #mapModalContent {
            background-color: #fff;
            position: fixed;
            top: 50%;
            /* Center vertically */
            left: 50%;
            /* Center horizontally */
            transform: translate(-50%, -50%);
            /* Center the modal exactly */
            padding: 10px;
            width: 750px;
            border: 4px solid #0074D9;
        }

        /* Style for the close button */
        #closeMap {
            position: absolute;
            top: 0;
            right: 0;
            padding: 10px;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <!--Header-->
    <input type="hidden" id="result" value="<?php echo $resultt; ?>">
    <form action="food-detail.php?id=<?= $input; ?>" method="POST">

        <!-- 
        <input type="text" name="results" id="results">
        <input type="submit" value="submit" id="submit-button"> -->
    </form>
    <?php
    require('Navigation.php');
    ?>
    <!-- Details -->
    <section id="details">
        <div class="row">
            <div class="col-lg-6">
                <img src="../image/<?= $food_value['image']; ?>" alt="" style="width:80% ">
            </div>
            <div class="col-lg-6">
                <div>
                    <h2><?= $food_value['food_name']; ?></h2>
                    <div>
                        <?php
                        for ($i = 0; $i < intval($food_value['rating']); $i++) { ?>
                            <span class="fa fa-star checked"></span>
                        <?php
                        }
                        for ($i = 0; $i < 5 - intval($food_value['rating']); $i++) { ?>
                            <span class="fa fa-star"></span>
                        <?php
                        }
                        ?>
                        <span class="px-2 fw-bold"><?= $food_value['rating']; ?></span>
                    </div>
                    <h4 class="mt-2 mb-4"><?= $food_value['restaurant_name']; ?></h4>
                    <p class="mb-2"><span class="fw-bold">Location </span><br><?= $food_value['location_name']; ?></p>
                    <div>
                        <span><i class="fa-solid fa-location-dot fa-lg pe-1" style="color: #eb9800;"></i></span>
                        <small><a href="#" class="link-secondary mb-4" id="openMap">View Map</a></small>
                    </div>
                    <div id="mapModal">
                        <div id="mapModalContent">

                            <iframe src="map.php" width="100%" height="400"></iframe>

                            <div id="closeMap" onclick="closeMap()">&times;</div>
                        </div>
                    </div>
                    <script>
                        // Get references to the modal and close button
                        var modal = document.getElementById('mapModal');
                        var openMapLink = document.getElementById('openMap');

                        // Function to open the modal
                        function openMap() {
                            modal.style.display = 'block';
                        }

                        // Function to close the modal
                        function closeMap() {
                            modal.style.display = 'none';
                        }

                        // Event listener for the "View map" link
                        openMapLink.addEventListener('click', openMap);

                        // Event listener to close modal when clicking outside the modal content
                        modal.addEventListener('click', function(event) {
                            if (event.target === modal) {
                                closeMap();
                            }
                        });
                    </script>
                    <hr class=" hr hr-blurry">
                    <div class="py-3 detail">
                        <h4 class="pt-3 pb-2">Description</h4>
                        <p style="text-align: justify;" class="pb-2 text-secondary"><?= $food_value['description']; ?>
                        </p>
                        <h4>Tk. <?= $food_value['price']; ?></h4>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <hr class=" hr hr-blurry w-75 m-auto">
    <!-- Reviews -->
    <section id="reviews">
        <h3 class="mb-4">Reviews</h3>
        <div id="reload">
            <div class="show-review">
                <input id="rate-filter" type="hidden" value=''>
                <div id="reviews" class="box">
                    <?php
                    $review_sql = "SELECT * FROM food_review where food_id='$food_id'";
                    $review_result = mysqli_query($connect, $review_sql);
                    $review_count = mysqli_num_rows($review_result);
                    $sql = "SELECT * FROM food_review where food_id='$food_id' ORDER BY `date` DESC";
                    $stmt = $db->prepare($sql);
                    $stmt->execute();
                    $rows = $stmt->fetchAll();
                    ?>
                    <div class="bg-dark-subtle d-flex px-5">
                        <h6 class="mb-0 py-3"><span><img class="pe-2" src="../image/emoji.png" alt="" width="50px"></span>Reviewed by
                            <?= $review_count ?> Reviewers
                        </h6>
                        <!-- Button trigger modal -->
                        <button type="button" class="list-btn mb-0 ms-auto float-end" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            +Add Your Review
                        </button>

                        <?php
                        require_once("add-review.php");
                        ?>
                    </div>
                    <div class="scroll bg-dark text-emphasis-dark">
                        <?php
                        foreach ($rows as $row) {
                            $rev_id = $row['rev_id'];

                        ?>
                            <div class="card">
                                <?php
                                if ($row['user_id'] != $user_value['id']) {
                                    $data = $row['user_id'];
                                    $input = ($data * 123456789);
                                    $encrypt = base64_encode($input);
                                    $link = "reviewer-detail.php?id=<?=$encrypt;?>";
                                } else {
                                    $link = "account.php";
                                }

                                ?>
                                <div class="card-header" style="position: relative;">
                                    <a href="<?= $link; ?>">
                                        <div style="width: 50%; height: 100%; position:absolute; top:0">
                                        </div>
                                    </a>
                                    <a href="<?= $link; ?>"><img src="../image/<?= $row['image']; ?>" alt=""></a>
                                    <div class="ms-3">
                                        <h6 class="mb-0">
                                            <?= $row['rev_name']; ?>
                                        </h6>
                                        <p class="text-secondary mb-1">
                                            <?= $row['username']; ?>
                                        </p>
                                        <div>
                                            <?php
                                            for ($i = 0; $i < $row['rating']; $i++) { ?>
                                                <span class="fa fa-star checked"></span>
                                            <?php
                                            }
                                            for ($i = 0; $i < 5 - $row['rating']; $i++) { ?>
                                                <span class="fa fa-star"></span>
                                            <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    <?php
                                    if ($row['user_id'] != $user_value['id']) {
                                    ?>
                                        <div class="like-button">
                                            <i <?php
                                                if (userLikesDislikes($row['rev_id'], $user_id, 'like', $db)) : ?> class="fa fa-thumbs-up like-btn" <?php else : ?> class="fa fa-thumbs-o-up like-btn" <?php endif ?> data-id="<?php echo $row['rev_id'] ?>"></i>
                                            <span class="likes">
                                                <?php echo getLikesDislikes($row['rev_id'], 'like', $db); ?>
                                            </span>

                                            &nbsp;&nbsp;&nbsp;&nbsp;
                                            <i <?php if (userLikesDislikes($row['rev_id'], $user_id, 'dislike', $db)) : ?> class="fa fa-thumbs-down dislike-btn" <?php else : ?> class="fa fa-thumbs-o-down dislike-btn" <?php endif ?> data-id="<?php echo $row['rev_id'] ?>"></i>
                                            <span class="dislikes">
                                                <?php echo getLikesDislikes($row['rev_id'], 'dislike', $db); ?>
                                            </span>
                                        </div>
                                    <?php
                                    } else {
                                    ?>
                                        <div class="del d-flex align-items-center" style="position: absolute;">
                                            <button class="border-0" onclick="deleteRec(<?= $row['rev_id']; ?>)"><i class="fa-solid fa-trash fa-xl" style="color: #d62e2e;"></i></button>
                                            <style>
                                                .del {
                                                    height: 100%;
                                                    position: absolute;
                                                    top: 0;
                                                    right: 5%;
                                                }
                                            </style>
                                        </div>
                                    <?php
                                    }
                                    ?>
                                </div>
                                <div class="card-body">
                                    <p class="card-text">
                                        <?= $row['comment']; ?>
                                    </p>
                                </div>
                                <div class="card-footer">
                                    <div><small class="text-secondary"><em> Reviewed on: <?= $row['date']; ?></em></small></div>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                    <div id="del"></div>
                </div>
            </div>
        </div>
    </section>
    <style>
        .list {
            padding-bottom: 20px;
        }

        .card {
            padding: 5px;
        }

        .content {
            font-size: 14px;
        }

        .card_item {
            border: 1px solid black;
        }

        options {
            cursor: pointer;
        }

        .fa {
            font-size: 1.2em;
        }

        .fa-thumbs-down,
        .fa-thumbs-o-down {
            transform: rotateY(180deg);
        }

        .logged_in_user {
            padding: 10px 30px 0px;
        }

        /* i {
            color: blue;
            cursor: pointer;
        } */

        /* a {
            color: #000000;
            text-decoration: none;
            font-size: 20px;
        } */

        .like-btn {
            margin: 25px;
            margin-top: 10px;
            padding: 10px 35px;
            font-size: 22px;
            border-radius: 50px;
            border: 10px;
            background-color: #1b4543;
            cursor: pointer;
            color: #fff;
            /* box-shadow: 2px 2px 3px 0 #303030; */
        }

        .dislike-btn {
            margin: 25px;
            margin-top: 10px;
            padding: 10px 35px;
            font-size: 22px;
            border-radius: 50px;
            border: 100px;
            background-color: #1b4543;
            cursor: pointer;
            color: #fff;
        }
    </style>
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

<script src="like_dislike.js"></script>
<!-- <script src="popup.js">

</script> -->