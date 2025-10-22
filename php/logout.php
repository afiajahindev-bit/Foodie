<?php
require_once('database.php');
session_destroy();
header("Location: http://localhost/Foodie/php/home.php");
?>