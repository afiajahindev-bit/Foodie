<div id="sort-box">
    <?php
    require("database.php");
    require("sort.php");
    $sql_step = "SELECT DISTINCT `type` FROM `food_info` ORDER BY `type` ASC";
    $sql_result = mysqli_query($connect, $sql_step);
    while ($type_row = mysqli_fetch_assoc($sql_result)) {
        $type_name = $type_row['type'];
    ?>
        <div class="container" id="<?= $type_name; ?>">
            <div class="d-inline-flex p-2 px-4 food-title">
                <h1><?= $type_name; ?></h1>
            </div>

            <div>
                <div class="d-flex flex-wrap justify-content-start box m-auto">
                    <?php
                    $query = "SELECT * FROM `food_info` WHERE `type`='$type_name'".' '.$sort_str;
                    // echo $query;
                    $result = mysqli_query($connect, $query);
                    $count = mysqli_num_rows($result);
                    while ($row = mysqli_fetch_assoc($result)) {
                        $type = $row['type'];
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
                    ?>
                </div>
            </div>
            <?php
            if ($count > 3) {
            ?>
                <div class="load mx-auto mt-4">
                    <button id="<?=$type_name;?>" class="loadbtn btn px-4 py-2" type="button"></button>
                </div>

            <?php
            }
            ?>
        </div>
    <?php
    }
    ?>
</div>
<style>
    .loadbtn a {
        position: absolute;
        display: block;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
    }
</style>
<script>
    loadMorebtn = document.querySelectorAll('.loadbtn');

    for (let i = 0; i < loadMorebtn.length; i++) {
        loadMorebtn[i].addEventListener('click', function() {
            loadMorebtn[i].parentNode.parentNode.classList.toggle('show');

            if(loadMorebtn[i].parentNode.parentNode.classList.contains('show')){
                loadMorebtn[i].innerHTML = "<a href='#"+loadMorebtn[i].id+"'></a>";
                console.log("a");
            }
            else{
                loadMorebtn[i].innerHTML = "";
            }
        })
    }
</script>