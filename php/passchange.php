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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <!--CSS-->
    <link rel="stylesheet" href="../css/reg-log.css">
    <script src="jQuery.js"></script>
</head>

<body>
    <section id="title" class="mb-3">
        <div class="container-fluid">
            <h1>Foodie</h1>
        </div>
    </section>
    <section class="mt-5">
        <div id="move" class="center w-25">
            <!--Form Title-->
            <h5>Verify OTP</h5>
            <!--Form-->
            <form method="post" action="newpass.php" class="pt-2 pb-5">
                <div class="txt_field mt-4 mb-2">
                    <label for="new_password">New Password</label>
                    <input type="password" id="new_password" name="new_password" class="password-input" required>
                </div>
                <div>
                    <small id="char" class="text-warning"></small>
                    <input id="checkPass" type="checkbox" onclick="myFunction()">
                    <label for="checkPass" class="text-light opacity-50">Show Password</label>
                </div>
                <div class="txt_field mt-4 mb-2">
                    <label for="confirm_password">Confirm New Password</label>
                    <input type="password" id="confirm_password" name="confirm_password" class="password-input" required><br>
                </div>
                <div>
                    <input id="checkPass" type="checkbox" onclick="myFunctionc()">
                    <label for="checkPass" class="text-light opacity-50">Show Password</label>
                    <?php
                    if (isset($_GET["passwordMatch"])) {
                        echo '<br><small class=" mt-3 text-danger float-start">Password did not match. Please try again.</small>';
                    }
                    ?>
                </div>
                <div class="m-auto text-center mt-5">
                    <input type="submit" value="Reset Password" class="btn button">
                </div>
            </form>
        </div>
    </section>
</body>
<style>
    .txt_field label {
        position: unset;
        transform: none;
    }
</style>
<script>
    function myFunction() {
        var passType = document.getElementById("new_password");
        if (passType.type === "password") {
            passType.type = "text";
        } else {
            passType.type = "password";
        }
    }

    function myFunctionc() {
        var checkPass = document.getElementById("confirm_password");
        if (checkPass.type === "password") {
            checkPass.type = "text";
        } else {
            checkPass.type = "password";
        }
    }

    $("#new_password").on("input", function() {
        len = ($("#new_password").val()).length;
        if (len < 8) {
            $("#char").html("Password must be of atleast 8 characters");
        } else {
            $("#char").html("");
        }
    });
</script>

</html>