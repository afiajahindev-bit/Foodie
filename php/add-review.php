<!-- Modal -->
<?php
$call = "0";
require_once("database.php");

if (isset($_POST["post"])) {
    $email = $user_value['email'];
    $name = $user_value['firstname'] . " " . $user_value['lastname'];
    $username = $user_value['username'];
    $image = $user_value['image'];
    $user_id = $user_value['id'];

    $rating = $_POST['rating'];
    if (!isset($rating)) {
        echo "<div class='alert alert-danger' style='padding-left:40%; margin:5px 10px ; border-radius:0'>Give a rating</div>";
    }
    $comment = $_POST["feedback"];
    $date = date("l, j/m/Y h:i A");

    $sql = "INSERT INTO food_review(rev_name,email,username,image,user_id,food_id,rating,comment,date) VALUES (?,?,?,?,?,?,?,?,?)";
    $stmtinsert = $connect->prepare($sql);
    if ($stmtinsert) {
        $result = $stmtinsert->execute([$name, $email, $username, $image, $user_id, $food_id, $rating, $comment, $date]);
        if ($result) {
            $call = "1";
        } else {
            echo "<div class='alert alert-danger' style='padding-left:40%; margin:5px 10px ; border-radius:0'>An error Occured</div>";
        }
    } else {
        echo "<div class='alert alert-danger' style='padding-left:40%; margin:5px 10px ; border-radius:0'>An error Occured</div>";
    }
}
?>
<?php
$sql_avg = "SELECT AVG(`rating`) AS avgRate FROM `food_review` WHERE `food_id` = $food_id";
$avg_result = mysqli_query($connect, $sql_avg);
$avg_value = mysqli_fetch_assoc($avg_result);
$a = number_format($avg_value['avgRate'], 1);

$rate_update = "UPDATE `food_info` SET `rating`=$a WHERE `food_id` = $food_id";
$update_query = mysqli_query($connect, $rate_update);
?>
<script>
    if (<?= $call; ?> == "1") {
        window.location.href = 'food-detail.php?id=<?= $input; ?>';
    }
</script>
<form action="food-detail.php?id=<?= $input; ?>" method="post">
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" data-bs-backdrop="static" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content text-bg-dark">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Add your review</h1>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="mb-3">
                        <h5 class="mb-0">How would you rate the food?</h5>
                        <small class="text-secondary">Your feedback would greatly be appreciated.</small>
                        <div class="stars">
                            <i class="fa fa-star" onclick="count(1)"></i>
                            <i class="fa fa-star" onclick="count(2)"></i>
                            <i class="fa fa-star" onclick="count(3)"></i>
                            <i class="fa fa-star" onclick="count(4)"></i>
                            <i class="fa fa-star" onclick="count(5)"></i>
                        </div>
                        <input type="hidden" id="count" name="rating" value="">

                    </div>
                    <div class="mb-3">
                        <label for="message-text" class="col-form-label">Feedback:</label>
                        <textarea class="form-control" id="message-text" name="feedback"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger px-2 py-1 mb-0" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success px-3 py-1 mb-0" name="post">Post</button>
                </div>
            </div>

        </div>
    </div>
</form>

<script>
    const stars = document.querySelectorAll(".stars i");
    console.log(stars);

    stars.forEach((star, index1) => {
        star.addEventListener("click", () => {
            stars.forEach((star, index2) => {
                index1 >= index2 ? star.classList.add("active") : star.classList.remove("active");
            });
        });
    });

    function count(count) {
        document.getElementById('count').value = count;
    }
</script>