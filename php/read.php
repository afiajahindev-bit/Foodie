<?php
require_once("database.php");
if($_POST['ids']){
    $ids = $_POST['ids'];
    $ids = explode(',', $ids);
    foreach($ids as $id){
        $sql = "UPDATE `notification` SET `Status`='Read' WHERE `id`='$id'";
        $query = mysqli_query($connect, $sql);
    }
    header("Location: notification.php");
}
?>