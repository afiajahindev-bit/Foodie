<?php
$sql_avg = "SELECT AVG(`rating`) AS avgRate FROM `food_review` WHERE `food_id` = $data";
$avg_result = mysqli_query($connect, $sql_avg);
$avg_value = mysqli_fetch_assoc($avg_result);

$a= number_format(intval($avg_value['avgRate']),1);
?>
