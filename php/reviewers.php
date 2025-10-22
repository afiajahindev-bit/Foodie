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
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css" rel="stylesheet">
    <!--CSS-->
    <link rel="stylesheet" href="../css/food.css">
    <!-- JavaScript -->
    <script src="jQuery.js"></script>
</head>

<body>
    <!--Navigation-->
    <?php
    require('Navigation.php');
    ?>
    <section id="reviewer">
        <h4>All Reviewers</h4>
        <?php
        // $reviewer = "SELECT `reviewers`,COUNT(`forker`) as count FROM `forkers` GROUP BY `reviewers`";
        $reviewer = "SELECT `rev_id`, `rev_name`, `email`, `username`, `image`, `user_id`, COUNT(DISTINCT `forker`) as count FROM `food_review` f LEFT JOIN `forkers` o ON f.`user_id`=o.`reviewers` GROUP BY `rev_name` ORDER BY count DESC";
        $reviewer_query = mysqli_query($connect, $reviewer);
        while ($reviewer_row = mysqli_fetch_assoc($reviewer_query)) {
            if ($reviewer_row['user_id'] != $user_value['id']) {
                $data = $reviewer_row['user_id'];
                $input = ($data * 123456789);
                $encrypt = base64_encode($input);
                $link = "reviewer-detail.php?id=<?=$encrypt;?>";
            } else {
                $link = "account.php";
            }
        ?>
            <a class="p-0 m-0" style="text-decoration: none;" href="<?= $link; ?>">
                <div class="card mb-4 mx-auto" style="max-width: 860px;">
                    <div class="row g-0 align-items-center">
                        <div class="col-md-4 p-4 w-25">
                            <img src="../image/<?= $reviewer_row['image']; ?>" class="img-fluid rounded-circle" alt="...">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title text-dark"><?= $reviewer_row['rev_name']; ?></h5>
                                <p class="card-text mb-0 text-dark"><?= $reviewer_row['email']; ?></p>
                                <p class="card-text"><small class="text-body-secondary"><?= $reviewer_row['username']; ?></small></p>
                                <p class="card-text text-dark"><?= $reviewer_row['count']; ?> Forkers</p>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        <?php
        }
        ?>
    </section>
</body>

<style>
    #reviewer {
        margin-top: 2rem;
    }

    #reviewer h4 {
        text-align: center;
        margin-bottom: 1.5rem;
    }

    .card {
        box-shadow: 2px 6px 8px 0 rgba(22, 22, 26, 0.18);
        background-color: rgba(231, 205, 205, 0.539);
        border: none;
        border-radius: 0;
    }
</style>

</html>