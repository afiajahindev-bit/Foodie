<?php
include("functions.php");
require("database.php");

$food_id = $_POST["food_id"];
$review_sql = "SELECT * FROM food_review where food_id='$food_id'";
$review_result = mysqli_query($connect, $review_sql);
$review_count = mysqli_num_rows($review_result);
$sql = "SELECT * FROM food_review where food_id='$food_id'";
$stmt = $db->prepare($sql);
$stmt->execute();
$rows = $stmt->fetchAll();
?>
<div class="bg-dark-subtle d-flex">
    <h6 class="mb-0 py-3"><span><img class="pe-2" src="../image/emoji.png" alt="" width="50px"></span>Reviewed by
        <?= $review_count; ?> Reviewers
    </h6>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-dark mb-0" data-bs-toggle="modal" data-bs-target="#exampleModal">
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

                <a href="<?= $link; ?>"><img src="../image/face.jpg" alt=""></a>
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
            </div>
            <div class="card-body">
                <p class="card-text">
                    <?= $row['comment']; ?>
                </p>
            </div>
        </div>
    <?php
    }
    ?>
</div>