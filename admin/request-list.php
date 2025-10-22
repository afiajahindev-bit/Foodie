<?php
require_once('../php/database.php');
require "./PHPMailer-master/src/PHPMailer.php";
require "./PHPMailer-master/src/SMTP.php";
require "./PHPMailer-master/src/Exception.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
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
    <link rel="stylesheet" href="css/food.css">
    <link rel="stylesheet" href="css/food-view.css">
    <link rel="stylesheet" href="css/virtual-select.min.css">
    <!-- JavaScript -->
    <script src="jQuery.js"></script>
</head>

<body>
    <section class="colored-section" id="title">
        <div class="container-fluid">
            <!--Navigation-->
            <?php
            require_once('admin-nav.php');
            ?>
    </section>
    <section id="content" class="layout">
        <?php
        require_once('sidebar.php');
        ?>
        <div id="content-body">
            <div id="notif" class="px-5">
                <div class="mx-auto px-5 py-3">
                    <?php

                    if (isset($_POST['select'])) {
                        $reqId = $_POST['reqId'];
                        $columns = explode(',', $_POST['column-select']);
                        // // echo $reqId;
                        // foreach ($columns as $column) {
                        //     echo $column;
                        // }                      

                        $sql = "SELECT * FROM request WHERE id = $reqId";
                        $query = mysqli_query($connect, $sql);
                        $result = mysqli_fetch_assoc($query);

                        $foodname = $result["food_name"];
                        $resname =$result["res_name"];
                        $price=$result["price"];
                        $location=$result["locationName"];
                        $description=$result["description"];

                        $userID = $result["user_id"];
                        $userEmail = $result["user_email"];
                        // echo $userID;
                        // echo $userEmail;
                        $columnValues = implode(', ', $columns);
                        $mistake = "Please correct these mistakes: {$columnValues}, and re-upload your request";
                        $sql = "INSERT INTO notification (user_id,req_id,mistakes,food_name,res_name,price,location,description) VALUES ('$userID','$reqId', '$mistake','$foodname','$resname','$price','$location','$description')";
                        if (mysqli_query($connect, $sql)) {
                            $mail = new PHPMailer(true);
                            $mail->isSMTP();
                            $mail->SMTPAuth = true;
                            $mail->SMTPSecure = "tls";
                            $mail->Host = "smtp.gmail.com";
                            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                            $mail->Port = 587;

                            // Enter your email ID
                            $mail->Username = "kaziratun2020@gmail.com";
                            $mail->Password = "uqujpnxpqsaplyvv";

                            // Your email ID and Email Title
                            $mail->setFrom("kaziratun2020@gmail.com", "Foodie");

                            $mail->addAddress($userEmail);

                            // You can change the subject according to your requirement!
                            $mail->Subject = "Request mistakes";

                            // You can change the Body Message according to your requirement!
                            $mail->Body = $mistake;
                            $mail->send();

                            $_SESSION['mailSend'] = "done";
                        }
                        if($_SESSION['mailSend'] == "done"){
                            $sql = "DELETE FROM `request` WHERE id = $reqId ";
                            $result = mysqli_query($connect, $sql);
                        }
                    }

                    ?>
                    <script></script>
                    <form action="request-list.php" method="post" class="row gap-2 align-items-center">
                        <div class="request-select col">
                            <label for="requestID" class="form-label">Request ID :</label>
                            <input type="text" class="form-control" id="requestID" name="reqId" required>
                        </div>
                        <div class="select-column col">
                            <div class="col m-2 px-0">
                                <select multiple id="column-select" class="reqSelect" name="column-select" placeholder="Select Column" data-search="false" data-silent-initial-value-set="true" style="background-color: #fff;" required>
                                    <option value="Food Name">Food Name</option>
                                    <option value="Image">Image</option>
                                    <option value="Restaurant Name">Restaurant Name</option>
                                    <option value="Location">Location</option>
                                    <option value="Price">Price</option>
                                    <option value="Description">Description</option>
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <input type="submit" class="list-btn" name="select">
                        </div>
                    </form>
                </div>
            </div>
            <div id="food-table">
                <table>
                    <thead>
                        <tr class="text-center">
                            <th>#</th>
                            <th>ID</th>
                            <th>User ID</th>
                            <th>User Email</th>
                            <th>Food Name</th>
                            <th>Restaurant</th>
                            <th>Price</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT * FROM request";
                        $result = mysqli_query($connect, $sql);
                        while ($food_value = mysqli_fetch_assoc($result)) {

                        ?>
                            <tr>
                                <td>
                                    <div class="input-container">
                                        <input id="checkbox-<?= $food_value['id']; ?>" type="radio" name="radio" onclick="selectId(<?= $food_value['id']; ?>)">
                                        <div class="radio-tile">
                                            <span class="icon">&#10004;</span>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <?= $food_value['id']; ?>
                                </td>
                                <td class="text-center">
                                    <?= $food_value['user_id']; ?>
                                </td>
                                <td>
                                    <?= $food_value['user_email']; ?>
                                </td>
                                <td>
                                    <?= $food_value['food_name']; ?>
                                </td>
                                <td>
                                    <?= $food_value['res_name']; ?>
                                </td>
                                <td class="text-center">Tk.
                                    <?= $food_value['price']; ?>
                                </td>
                                <td class="mx-auto text-center">
                                    <button type="button" data-bs-toggle="modal" data-bs-target="#accept<?= $food_value['id']; ?>" class="list-btn">Details</button>
                                    <button class="list-btn" onclick="deleteRec(<?= $food_value['id']; ?>)">Cancel</button>
                                    <?php
                                    require("accept.php");
                                    ?>
                                    <div id="del"></div>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</body>

</html>
<style>
    .reqSelect.vscomp-ele {
        background-color: #fff;
        box-shadow: 1px 1px 3px #353535;
    }
</style>
<script type="text/javascript" src="virtual-select.min.js"></script>
<script>
    VirtualSelect.init({
        ele: '.reqSelect',
        setValueAsArray: false,
        selectedValue: '',
    });
</script>
<script>
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href)
    }

    $(document).ready(function() {
        $('#1').css('display', 'none');
        $('#add1').css('display', 'none');
    });

    function selectId(requestId) {
        console.log(requestId);
        $('#requestID').val(requestId);
    }
    function deleteRec(val) {
    let delRow = confirm('Are you sure you want to delete this record?');
        if (delRow) {
            console.log(val);
            $('#del').load("cancel.php", {
            id: val
        });
            window.alert("Record has been successfully deleted")
            $("#food-table").load(location.href + " #food-table");
        }
    }
</script>