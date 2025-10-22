<aside class="sidebar">
    <a class="active" href="admin-home.php"><i class="fa-solid fa-house fa-sm"></i><span class="ms-2">Home</span></a>
    <a data-bs-toggle="collapse" href="#pages" role="button" aria-expanded="false" aria-controls="pages">
        <i class="fa-solid fa-indent fa-sm"></i>
        <span class="ms-2">Index</span>
        <i class="fa-solid fa-caret-down fa-sm ms-5"></i>
    </a>
    <div class="collapse ms-4" id="pages">
        <a class="" href="home-view.php"><i class="fa-solid fa-house-user fa-sm"></i><span class="ms-2">Homepage</span></a>
        <a class="" href="admin-food.php"><i class="fa-solid fa-utensils fa-sm"></i><span class="ms-2">Foods</span></a>
    </div>
</aside>

<style>
    .layout {
        display: grid;
        grid-template-areas: "sidebar main";
        grid-template-columns: 1fr 5fr;
        align-items: start;
    }


    .sidebar {
        grid-area: sidebar;
    }

    .content-body {
        grid-area: main;
    }

    .sidebar {
        width: 250px;
        background-color: #f1f1f1;
        position: -webkit-sticky;
        position: sticky;
        top: 6rem;
        display: block !important;
        height: 100dvh;
        padding-top: 3rem;
        overflow-y: auto;
    }

    .sidebar a {
        font-size: 18px;
        display: block;
        color: black;
        padding: 5% 15%;
        text-decoration: none;
    }

    .sidebar a:hover:not(.active) {
        background-color: #555;
        color: white;
    }

    @media (max-width: 900px) {
        .sidebar {
            width: 80px;
            margin-top: 20px;
        }

        .sidebar a span {
            display: none;
        }

        .sidebar a {
            text-align: center;
        }
    }
</style>