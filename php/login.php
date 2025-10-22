<?php
require_once('database.php');

$sql_admin =  "SELECT * FROM  admin";
$admin_query = mysqli_query($connect, $sql_admin);
$admin = mysqli_fetch_assoc($admin_query);
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width-device-width">
    <title>Foodie</title>
    <!--Google Font-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Ubuntu&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <!--Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <!--CSS-->
    <link rel="stylesheet" href="../css/reg-log.css">
</head>

<body>
    <section id="title">
        <div class="container-fluid">
            <h1>Foodie</h1>
        </div>
    </section>

    <section class="mt-2">
        <!--PHP code-->
        <div>
            <?php
            if (isset($_SESSION['register'])) {
            ?>
                <div class='alert alert-success' style='text-align:center; border-radius:0'>Registered Succsessfully ! </div>
            <?php
                unset($_SESSION['register']);
            }
            if (isset($_SESSION['newPass'])) {
            ?>
                <div class='alert alert-success' style='text-align:center; border-radius:0'>Password updated Succsessfully ! </div>
            <?php
                unset($_SESSION['newPass']);
            }
            if (isset($_POST["login"])) {
                $email = $_POST["email"];
                $password = $_POST["password"];
                $pass = password_hash($_POST['password'], PASSWORD_DEFAULT);

                if ($email == $admin['email']) {
                    if (password_verify($password, $admin["password"])) {
                        $_SESSION['admin_logged'] = "1";
                        $_SESSION['admin_email'] = $admin['email'];

                        header("Location: ../admin/admin-home.php");
                        die();
                    }
                }

                $sql = "SELECT * FROM registration WHERE email = '$email'";
                $result = mysqli_query($connect, $sql);
                $user = mysqli_fetch_assoc($result);
                if ($user) {
                    if (password_verify($password, $user["password"])) {
                        $_SESSION['logged'] = "1";
                        $_SESSION['user_email'] = $user['email'];
                        echo "<div class='alert alert-success' style='text-align:center; border-radius:0'>Logged in</div>";
                        header("Location: logged-home.php");
                        die();
                    } else {
                        echo "<div class='alert alert-danger' style='text-align:center; border-radius:0'>Wrong Password</div>";
                    }
                } else {
                    echo "<div class='alert alert-danger' style='text-align:center; border-radius:0'>Email Does not exists</div>";
                }
            }
            ?>
        </div>
        <!--Form Structure-->
        <div id="move" class="center">
            <!--Form Title-->
            <h2>Login</h2>
            <!--Form-->
            <form action="login.php" method="post">
                <div class="txt_field">
                    <input type="text" name="email" required>
                    <span></span>
                    <label for="email">Email</label>
                </div>
                <div class="txt_field mb-3">
                    <input type="password" name="password" id="myPass" required>
                    <span></span>
                    <label for="password">Password</label>
                </div>

                <div class="mt-2 mb-4">
                    <a href="forgotpassform.php" class="pass">Forgot Password?</a>
                    <div class="float-end">
                    <input id="showPass" type="checkbox" onclick="myFunction()">
                    <label for="showPass" class="text-light opacity-50">Show Password</label>
                </div>
                </div>
                <!--Submit Button-->
                <div class="m-auto text-center">
                    <input class="btn button" type="submit" name="login" value="Log in">
                </div>
                <div class="signup_link">
                    Not a member? <a href="registration.php">Register</a>
                </div>
            </form>
        </div>
    </section>
</body>

</html>

<script>
    function myFunction() {
        var passType = document.getElementById("myPass");
        if (passType.type === "password") {
            passType.type = "text";
        } else {
            passType.type = "password";
        }
    }
</script>