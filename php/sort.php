<?php
require_once('database.php');
$sort_str = " ORDER BY `rating` DESC";
if (isset($_POST['sort'])) {
    $sort = $_POST['sort'];
    if ($_POST['sort'] == '') {
        $sort_str = " ORDER BY `rating` DESC";
    } else {
        if ($sort == "nameASC") {
            $sort_str = " ORDER BY `food_name` ASC";
        } elseif ($sort == "nameDESC") {
            $sort_str = " ORDER BY `food_name` DESC";
        } elseif ($sort == "priceASC") {
            $sort_str = " ORDER BY `price` ASC";
        } elseif ($sort == "priceDESC") {
            $sort_str = " ORDER BY `price` DESC";
        } elseif ($sort == "rateASC") {
            $sort_str = " ORDER BY `rating` ASC";
        } elseif ($sort == "rateDESC") {
            $sort_str = " ORDER BY `rating` DESC";
        }
    }
}
// _SESSION["sort] = "2";$
?>

