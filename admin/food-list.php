<?php
require_once('../php/database.php');
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
    <section id="title">
        <div class="container-fluid">
            <!--Navigation-->
            <?php
            require_once('../php/Navigation.php');
            ?>
    </section>
    <section id="content" class="layout">
        <?php
        require_once('sidebar.php');
        ?>
        <div id="content-body">
            <div id="add-new">
                <div class="mx-auto px-5 py-3 text-end">
                    <button class="list-btn fs-6" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <strong>+ </strong>Add New Item
                    </button>
                    <div class="text-start">
                        <?php
                        require_once('addNew.php');
                        ?>
                    </div>
                </div>
            </div>
            <div id="food-table">
                <table>
                    <thead>
                        <tr class="text-center">
                            <th>ID</th>
                            <th>Food Name</th>
                            <th>Restaurant</th>
                            <th>Image</th>
                            <th>Description</th>
                            <th>Type</th>
                            <th>Catagory</th>
                            <th>Price</th>
                            <th>Rating</th>
                            <th>Location</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $list_sql = "SELECT * FROM food_info";
                        $list_result = mysqli_query($connect, $list_sql);
                        $row_req = mysqli_num_rows($list_result);
                        while ($food_value = mysqli_fetch_assoc($list_result)) {
                        ?>
                            <tr>
                                <td><?= $food_value['food_id']; ?></td>
                                <td><?= $food_value['food_name']; ?></td>
                                <td><?= $food_value['restaurant_name']; ?></td>
                                <td class="image-name" title="View Image"><?= $food_value['image']; ?></td>
                                <td style="max-width: 200px;"><?= $food_value['description']; ?></td>
                                <td><?= $food_value['type']; ?></td>
                                <td><?= $food_value['catagory']; ?></td>
                                <td><?= $food_value['price']; ?></td>
                                <td><?= $food_value['rating']; ?></td>
                                <td style="max-width: 200px;"><?= $food_value['location_name']; ?></td>
                                <td class="text-center">
                                    <button type="button" data-bs-toggle="modal" data-bs-target="#edit<?= $food_value['food_id']; ?>" class="list-btn">Edit</button>
                                    <button class="list-btn" onclick="deleteRec(<?= $food_value['food_id']; ?>)">Delete</button>
                                    <?php
                                    require("update.php");
                                    ?>
                                    <div id="del"></div>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
                <div class="popup-image">
                    <span>&times;</span>
                    <img src="" alt="">
                </div>
            </div>
        </div>
    </section>
</body>

</html>
<script>
    document.querySelectorAll('.image-name').forEach((image) => {
        image.addEventListener("click", () => {
            document.querySelector('.popup-image').style.display = "block";
            document.querySelector('.popup-image img').src = '../image/' + image.innerHTML;
        })
    });
    document.querySelector('.popup-image span').onclick = () => {
        document.querySelector('.popup-image').style.display = "none";
    }
</script>
<script>
    function deleteRec(val) {
        let delRow = confirm('Are you sure you want to delete this record?');
        if (delRow) {
            console.log(val);
            $('#del').load("delete.php", {
                food_id: val
            });
            window.alert("Record has been successfully deleted")
            $("#food-table").load(location.href + " #food-table");
        }
    }
</script>
<style>
    .modal-body .form-control, .add-select {
    width: 100% !important;
    box-shadow: 2px 6px 8px 0 rgba(22, 22, 26, 0.18) !important;
    box-sizing: border-box !important;
    border: 2px solid #ffa500 !important;
    border-radius: 10px !important;
    background-color: #fff !important;
    display: block;
}
</style>

