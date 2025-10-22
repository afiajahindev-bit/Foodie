<?php
require_once("database.php");

    $key = $_SESSION['k'];
    $value = $_SESSION['v'];
    $query = "DELETE FROM forkers WHERE reviewers = '{$key}' AND forker = '{$value}'";
    $result1 = $connect->query($query);

?>