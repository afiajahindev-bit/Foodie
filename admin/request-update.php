<?php
require_once('../php/database.php');
if (isset($_GET['id'])) {
    $req_id = $_GET['id'];
}
?>

<?php
$sql_request = "SELECT * FROM request WHERE id = '$req_id'";
$result_req = mysqli_query($connect, $sql_request);
$row_req = mysqli_fetch_assoc($result_req);

if (isset($_POST["accept"])) {
    $type = $_POST["type"];
    $catagory = $_POST["catagory"];
    $foodname = $row_req["food_name"];
    $resname = $row_req["res_name"];
    $image = $row_req["image"];
    $price = $row_req["price"];
    $desc = $row_req["description"];
    $latitude = $row_req["latitude"];
    $longitude =  $row_req["longitude"];
    $locationName = $row_req["locationName"];

    $errors = array();

    $org_image = $_POST["org_image"];
    $destination = "C:/xampp/htdocs/Foodie/image";
    $img_name = basename($org_image);

    if (count($errors) > 0) {
        foreach ($errors as $error) {
            echo "<div class='alert alert-danger' style='padding-left:40%; margin:5px 10px ; border-radius:0'>$error</div>";
        }
    } else {
        $sql = "INSERT INTO food_info(food_name, restaurant_name,image, type, catagory, location_name, price, description, latitude , longitude ) VALUES (?,?,?,?,?,?,?,?,?,?)";
        $stmtinsert = $connect->prepare($sql);
        if ($stmtinsert) {
            $result = $stmtinsert->execute([$foodname, $resname, $image, $type, $catagory, $locationName, $price, $desc, $latitude, $longitude]);
            if ($result) {
                $sql2 = "DELETE FROM request WHERE `id` = '$req_id'";
                $query2 = mysqli_query($connect, $sql2);
                if ($query2) {
                    if (rename($org_image, $destination . '/' . $img_name)) {
                        header("Location:request-list.php");
                    } else {
                        echo 'failed';
                    }
                } else {
                    echo "<div class='alert alert-danger' style='padding-left:40%; margin:5px 10px ; border-radius:0'>An error Occured</div>";
                }
            } else {
                echo "<div class='alert alert-danger' style='padding-left:40%; margin:5px 10px ; border-radius:0'>An error Occured</div>";
            }
        } else {
            echo "<div class='alert alert-danger' style='padding-left:40%; margin:5px 10px ; border-radius:0'>An error Occured</div>";
        }
    }
}
?>