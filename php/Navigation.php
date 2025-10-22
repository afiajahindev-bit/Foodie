<?php
if (isset($admin_email)) {
?>
    <nav class="navbar fixed-top navbar-expand-lg navbar-light">
        <a class="navbar-brand" href="">Foodie</a>
        <ul class="navbar-nav ms-auto">
            <li class="nav-item"><a class="nav-link" href="../php/logout.php">Log Out</a></li>
        </ul>
    </nav>
    <style>
        .navbar {
            padding: 0.35rem 230px 0.35rem 50px;
            background-color: #eafaff;
            box-shadow: 2px 6px 8px 0 rgba(22, 22, 26, 0.18);
        }

        .navbar-brand {
            font-family: 'Dancing Script', cursive;
            font-size: 3.5rem;
            font-weight: bold;
        }

        .nav-item {
            padding: 0 15px;
            background-color: #000000;


        }

        .nav-link {
            font-size: 1.2rem;
            font-family: "Montserrat-light";
            color: aliceblue;
        }

        .nav-link:hover {
            color: aliceblue;
            text-decoration: underline;
        }

        .drop-a {
            display: inline;
            padding-right: 0;
            font-size: 1.2rem;
        }
    </style>
<?php
} else {
?>
    <nav class="navbar sticky-top navbar-expand-lg navbar-light">
        <a class="navbar-brand" href="">Foodie</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="logged-home.php">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="food.php">Foods</a></li>
                <li class="nav-item"><a class="nav-link" href="reviewers.php">Reviewers</a></li>
                <li class="nav-item">
                    <?php
                    $user_id = $user_value['id'];
                    $sql = "SELECT * FROM `notification` WHERE `user_id`='$user_id' AND `Status`='Unread'";
                    $result = mysqli_query($connect, $sql);
                    $count = mysqli_num_rows($result);
                    ?>
                    <div class="btn-group drop-a position-relative">
                        <?php
                        if ($count > 0) {
                        ?>
                            <span style="z-index: 100;" class="position-absolute top-0 start-100 translate-middle p-2 bg-danger border border-light rounded-circle">
                                <span class="visually-hidden">New alerts</span>
                            </span>
                        <?php
                        }
                        ?>
                        <button class="btn btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <a class="nav-link" style="padding: 0px 3px; display:inline;" href="">My Profile</a></button>
                        <ul class="dropdown-menu dropdown-menu-dark">
                            <li class="dropdown-item-text opacity-50"><small><?= $user_value['email']; ?></small></li>
                            <li>
                                <hr class="dropdown-divider bg-bright">
                            </li>
                            <li><a class="dropdown-item" href="account.php">View Profile</a></li>
                            <li><a class="dropdown-item d-flex" href="notification.php">
                                    <span>Notification</span>
                                    <?php if ($count > 0) { ?>
                                        <span class="notify ms-auto"><?= $count;?></span>
                                    <?php
                                    }
                                    ?>
                                </a></li>
                            <li><a class="dropdown-item" href="logout.php">Log out</a></li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
    <style>
        .notify {
            width: 25px;
            height: 25px;
            background-color: #fff;
            color: #353535;
            border-radius: 50%;
            display: flex;
            align-items: flex-end;
            justify-content: center;
            font-size: 16px;
            font-weight: 600;
        }

        .navbar {
            padding: 0 230px;
            background-color: #f7f7f7;
            box-shadow: 2px 6px 8px 0 rgba(22, 22, 26, 0.18);
        }

        .btn.active,
        .btn.show {
            border: 0;
        }

        .navbar-nav {
            align-items: center;
        }

        .navbar-brand {
            font-family: 'Dancing Script', cursive;
            font-size: 3.5rem;
            font-weight: bold;
        }

        .nav-item {
            padding: 0 15px;
        }

        .nav-link {
            font-size: 1.2rem;
            font-family: "Montserrat-light";
        }

        .nav-link:hover {
            text-decoration: underline;
            color: #000;
        }

        .drop-a {
            background-color: #ffa500;
        }

        .drop-a:hover {
            background-color: #ffa60093;
        }

        .dropdown-divider {
            border-top: 1px solid #fff;
            opacity: 0.25;
        }

        .dropdown-menu {
            background-color: #353535;
        }

        .dropdown-menu.show {
            width: 15rem;
            font-size: 15px;
            border-radius: 0;
        }
    </style>
<?php
}
?>