<?php
require_once("../php/database.php");
require_once("queries.php");
$rate = 0;
$minVal = 0;
$maxVal = $row['max'];
$str = '';

if (isset($_POST['restaurant'])) {
    $res = $_POST['restaurant'];
    $res_val = '\'' . implode('\' , \'', $res) . '\'';
} else {
    $res_val = $res_all;
}
if (isset($_POST['type'])) {
    $type = $_POST['type'];
    $type_val = '\'' . implode('\' , \'', $type) . '\'';
} else {
    $type_val = $type_all;
}
if (isset($_POST['catagory'])) {
    $cat = $_POST['catagory'];
    $cat_val = '\'' . implode('\' , \'', $cat) . '\'';
} else {
    $cat_val = $cat_all;
}

if (isset($_POST['location'])) {
    $locations = $_POST['location'];
    $loc_query = implode("%' OR `location_name` LIKE '%", $locations);
    $str_loc = "AND `location_name` LIKE '%".$loc_query."%'";
    // echo $str_loc;
} else {
    $str_loc = '';
}

if (isset($_POST['rating'])) {
    if ($_POST['rating'] == '') {
        $rate = 0;
    } else {
        $rate = $_POST['rating'];
    }
}

if (isset($_POST['minPrice'])) {
    if ($_POST['minPrice'] == '') {
        $minVal = 0;
    } else {
        $minVal = $_POST['minPrice'];
    }
}
if (isset($_POST['maxPrice'])) {
    if ($_POST['maxPrice'] == '') {
        $maxVal = $row['max'];
    } else {
        $maxVal = $_POST['maxPrice'];
    }
}
if (isset($_POST['search'])) {
    if ($_POST['search'] != '') {
        $searchKey = $_POST['search'];
        $str = "AND (`food_name` LIKE '%" . $searchKey . "%' 
        OR `restaurant_name` LIKE '%" . $searchKey . "%' 
        OR `type` LIKE '%" . $searchKey . "%'
        OR `catagory` LIKE '%" . $searchKey . "%'
        OR `location_name` LIKE '%" . $searchKey . "%'
        OR`description` LIKE '%" . $searchKey . "%')";
    } else {
        $str = '';
    }
}

require_once('sort.php');
?>


<div class="container">
    <div class="d-inline-flex p-2 px-4 food-title">
        <h3>Filter Result</h3>
    </div>

    <div>
        <div class="d-flex flex-wrap justify-content-start box m-auto" style="height: 100%;">
            <?php
            $sql = "SELECT * FROM food_info WHERE `restaurant_name` IN ($res_val) AND `type` IN ($type_val) AND `catagory` IN ($cat_val) " . $str_loc . "  AND `rating` >= $rate AND `price` BETWEEN $minVal AND $maxVal " . $str . $sort_str;
            //echo $sql;
            $sql_result = mysqli_query($connect, $sql);
            if (mysqli_num_rows($sql_result) > 0) {
                while ($row = mysqli_fetch_assoc($sql_result)) {
            ?>
                    <div class="card m-3">
                        <?php
                        $data = $row['food_id'];
                        $input = ($data * 123456789);
                        $encrypt = base64_encode($input);
                        ?>
                        <div class="wrapper">
                            <a class="p-0 m-0" href="food-detail.php?id=<?= $encrypt; ?>">
                                <div class="img-size"><img src="../image/<?= $row['image']; ?>" class="img-top" alt="...">
                                    <div class="content">
                                        <h4>View Details</h4>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title fw-bold"><?= $row['food_name']; ?></h5>
                            <div class=" text-start">
                                <p class="mb-0"><?= $row['restaurant_name']; ?></p>
                                <small class="text-secondary">Price: Tk. <?= $row['price']; ?></small><br>
                                <small class="text-secondary">Rating: </small>
                                <div>
                                    <?php
                                    for ($j = 0; $j < intval($row['rating']); $j++) { ?>
                                        <span class="fa fa-star checked"></span>
                                    <?php
                                    }
                                    for ($j = 0; $j < 5 - intval($row['rating']); $j++) { ?>
                                        <span class="fa fa-star"></span>
                                    <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                }
            } else {
                ?>
                <div class="mx-auto mt-5">
                    <h4>No Result Found</h4>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
</div>