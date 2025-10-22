<form method="post" action="filter.php" class="py-3">
    <div class="row justify-content-center">
        <!-- Restaurant -->
        <div class="col m-2 px-0">
            <h6>Restaurant:</h6>
            <?php
            $sql = "SELECT DISTINCT `restaurant_name` From `food_info` ORDER BY `restaurant_name` ASC";
            $sql_result = mysqli_query($connect, $sql);
            ?>
            <select multiple id="restaurant-select" class="multiSelect" name="restaurant-select" placeholder="Select Restaurant" data-search="false" data-silent-initial-value-set="true">
                <?php
                while ($row = mysqli_fetch_assoc($sql_result)) {
                ?>
                    <option value="<?= $row['restaurant_name']; ?>"><?= $row['restaurant_name']; ?></option>
                <?php
                }
                ?>
            </select>
        </div>
        <!-- Type -->
        <div class="col m-2 px-0">
            <h6>Food Type:</h6>
            <?php
            $sql = "SELECT DISTINCT `type` From `food_info`";
            $sql_result = mysqli_query($connect, $sql);
            ?>
            <select multiple id="type-select" class="multiSelect" name="type-select" placeholder="Select Type" data-search="false" data-silent-initial-value-set="true">
                <?php
                while ($row = mysqli_fetch_assoc($sql_result)) {
                ?>
                    <option value="<?= $row['type']; ?>"><?= $row['type']; ?></option>
                <?php
                }
                ?>
            </select>
        </div>
        <!-- Catagory -->
        <div class="col m-2 px-0">
            <h6>Catagories:</h6>
            <?php
            $sql = "SELECT DISTINCT `catagory` From `food_info`";
            $sql_result = mysqli_query($connect, $sql);
            ?>
            <select multiple id="catagory-select" class="multiSelect" name="catagory-select" placeholder="Select Catagory" data-search="false" data-silent-initial-value-set="true">
                <?php
                while ($row = mysqli_fetch_assoc($sql_result)) {
                ?>
                    <option value="<?= $row['catagory']; ?>"><?= $row['catagory']; ?></option>
                <?php
                }
                ?>
            </select>
        </div>
        <?php
        if (!isset($admin_email)) {
        ?>
            <!-- Location -->
            <div class="col m-2 px-0">
                <h6>Locations:</h6>
                <?php
                $sql = "SELECT DISTINCT `location_name` FROM `location_names`";
                $sql_result = mysqli_query($connect, $sql);
                ?>
                <select multiple id="location-select" class="multiSelect" name="location-select" placeholder="Select Location" data-search="true" data-silent-initial-value-set="true">
                    <?php
                    while ($row = mysqli_fetch_assoc($sql_result)) {
                    ?>
                        <option value="<?= $row['location_name']; ?>"><?= $row['location_name']; ?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>
        <?php
        }
        ?>
        <!-- Rating -->
        <div class="col m-2 px-0">
            <h6>Rating:</h6>
            <select id="rating-select" class="multiSelect" name="rating-select" placeholder="Select Rating" data-search="false" data-silent-initial-value-set="false">
                <option value=''>All</option>
                <option value="5">Rated 5</option>
                <option value="4">≥4</option>
                <option value="3">≥3</option>
                <option value="2">≥2</option>
                <option value="1">≥1</option>
            </select>
        </div>
        <!-- Price -->
        <div class="col m-2 px-0">
            <h6>Price:</h6>
            <div class="d-flex align-items-baseline">
                <input id="minPrice" type="number" min="0" name="min" placeholder="Min" class="mb-2 form-box">
                <span class="mx-2">to</span>
                <input id="maxPrice" type="number" min="0" name="max" placeholder="Max" class="mb-2 form-box">
            </div>
            </select>
        </div>
    </div>
    <div>
        <button type="reset" class="list-btn my-3 float-end">
            Reset
        </button>
    </div>
</form>