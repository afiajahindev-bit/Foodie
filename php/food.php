<?php
require_once('database.php');
if (isset($_POST['search'])) {
    $search = $_POST['searchVal'];
} else {
    $search = '';
}
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
    <link rel="stylesheet" href="../css/food.css">
    <link rel="stylesheet" href="../css/virtual-select.min.css">
    <!-- JavaScript -->
    <script src="jQuery.js"></script>
</head>

<body>
    <!--Header-->
    <!--Navigation-->
    <?php
    require('Navigation.php');
    ?>
    <!-- Request -->
    <section class="my-5 mx-auto" style="background-color: hsl(0, 0%, 85%); width:90%">
        <div class="d-flex justify-content-end mx-auto align-items-baseline">
            <p class="pb-0 me-4">You find any <em>Dish</em> missing here? Help us</p>
            <!-- Button trigger modal -->
            <button type="button" class="btn req-btn list-btn me-5 my-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
                +Request
            </button>
            <?php
            require_once("request.php");
            ?>
        </div>
    </section>

    <!-- Filter -->
    <section id="filter-section">
        <!-- Search -->
        <div class="search">
            <div class="search-bar">
                <input id="search-field" name="search-field" class="form-control me-2 ms-5 ps-0" type="search" value="" placeholder="find your favourite food..." aria-label="Search">
                <input id="hid" type="hidden">
                <button id="search-btn" class="btn" type="button"><i class="fa-solid fa-magnifying-glass fa-lg p-0"></i></button>
            </div>
        </div>
        <!-- Sort -->
        <div>
            <div>
                <div class="select">
                    <div class="row">
                        <div class=" btn-group col-lg-6 col-sm-12">
                            <div class="center">
                                <div class="drop-down">
                                    <div id="" class="input-box"><i class="fa-solid fa-sort mx-2"></i>Sort By</div>
                                    <div class="list">
                                        <input type="radio" name="sort" id="nameASC" class="radio" />
                                        <label for="nameASC">
                                            <i class="fa-solid fa-arrow-up-z-a fa-sm"></i>
                                            <span class="name">Name</span>
                                            <span class="ms-auto text-secondary">(A - Z)</span>
                                        </label>
                                        <input type="radio" name="sort" id="nameDESC" class="radio" />
                                        <label for="nameDESC">
                                            <i class="fa-solid fa-arrow-down-z-a fa-sm"></i>
                                            <span class="name">Name</span>
                                            <span class="ms-auto text-secondary">(Z - A)</span>
                                        </label>

                                        <input type="radio" name="sort" id="priceASC" class="radio" />
                                        <label for="priceASC">
                                            <i class="fa-solid fa-arrow-up-9-1 fa-sm"></i>
                                            <span class="name">Price</span>
                                            <span class="ms-auto text-secondary">(Low - High)</span>
                                        </label>
                                        <input type="radio" name="sort" id="priceDESC" class="radio" />
                                        <label for="priceDESC">
                                            <i class="fa-solid fa-arrow-down-9-1 fa-sm"></i>
                                            <span class="name">Price</span>
                                            <span class="ms-auto text-secondary">(High - Low)</span>
                                        </label>

                                        <input type="radio" name="sort" id="rateASC" class="radio" />
                                        <label for="rateASC">
                                            <i class="fa-solid fa-arrow-up-wide-short fa-sm"></i>
                                            <span class="name">Rating</span>
                                            <span class="ms-auto text-secondary">(Low - High)</span>
                                        </label>
                                        <input type="radio" name="sort" id="rateDESC" class="radio" />
                                        <label for="rateDESC">
                                            <i class="fa-solid fa-arrow-down-wide-short fa-sm"></i>
                                            <span class="name">Rating</span>
                                            <span class="ms-auto text-secondary">(High - Low)</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Filter button -->
                        <div class="btn-group col-lg-6 col-sm-12">
                            <button class="filterBtn btn" type="button"><i class="fa-solid fa-filter mx-2"></i>Filter</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Filter box -->
        <div class="filterBox">
            <?php
            require_once('filter.php');
            $sort_str = " ORDER BY `rating` DESC";
            ?>
        </div>
    </section>
    <section id="filtered">

    </section>

    <!-- All foods -->
    <section id="View-All">

    </section>
    <script>
        var radio = document.querySelectorAll(".radio");
        radio.forEach((item) => {
            item.addEventListener("change", () => {
                var sortName = item.id;
                $('#View-All').load("sorted-page.php", {
                    sort: sortName
                });
            })
        })
        $('#View-All').load("sorted-page.php");
    </script>
    <!--Footer-->

    <section class="white-section" id="footer">
        <?php
        require('footer.php');
        ?>
    </section>
</body>

<script>
    filterBtn = document.querySelector('.filterBtn');
    filterBox = document.querySelector('.filterBox');
    var input = document.querySelector(".input-box");
    filterBtn.addEventListener('click', function() {
        filterBox.classList.toggle('show')
        filterBtn.classList.toggle('active')
        input.classList.remove("open");
        document.querySelector(".list").style.maxHeight = null;
    })

    $('.dropdown-item').click(function() {
        $("#dropdown-toggle").dropdown("toggle");
    });
</script>
<script type="text/javascript" src="virtual-select.min.js"></script>
<script>
    var input = document.querySelector(".input-box");
    input.onclick = function() {
        this.classList.toggle("open");
        let list = this.nextElementSibling;
        if (list.style.maxHeight) {
            list.style.maxHeight = null;
            list.style.boxShadow = null;
        } else {
            list.style.maxHeight = list.scrollHeight + "px";
            list.style.boxShadow =
                "0 1px 2px 0 rgba(0, 0, 0, 0.15),0 1px 3px 1px rgba(0, 0, 0, 0.1)";
        };
    }
    var rad = document.querySelectorAll(".radio");
    rad.forEach((item) => {
        item.addEventListener("change", () => {
            input.innerHTML = 'Sort By: ' + item.nextElementSibling.firstElementChild.nextElementSibling.innerHTML +
                item.nextElementSibling.lastElementChild.innerHTML;
            input.style.fontWeight = '600';
            input.style.fontSize = '14px';
            input.id = item.getAttribute("id");
            input.click();
        });
    });
</script>
<script>
    var searchVal = "<?= $search; ?>";
    console.log(searchVal);
    if (searchVal != "") {
        $('#search-field').val(searchVal);
    }
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
</script>
<script type="text/javascript" src="filter.js"></script>

</html>