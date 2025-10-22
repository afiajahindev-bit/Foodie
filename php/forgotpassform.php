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
            <h5>Password Recover</h5>
            <!--Form-->
            <form action="forgotpassword.php" method="post" class="pt-2 pb-5">
                <div class="txt_field my-5">
                    <label for="email">Email</label>
                    <input id="email" type="email" name="email" class="ps-0" required>
                    <?php
                    if(isset($_GET["email"])){
                        echo '<small class=" mt-3 text-danger float-start">Email Not Found.Please try again.</small>';
                    }
                    ?>
                </div>
                <div class="m-auto text-center">
                    <input class="btn button" name="otp" type="submit" value="Send OTP">
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

</html>
<script>
    document.getElementById("email").addEventListener("click",()=>{
        document.querySelector(".txt_field").style.borderBottom = "2px solid #ff8a41";
        document.querySelector(".txt_field label").style.color = " #ff8a41";
        
    })
</script>