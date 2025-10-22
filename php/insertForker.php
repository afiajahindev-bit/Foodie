    <?php
    require_once("database.php");

    $key = $_SESSION['k'];
    $value = $_SESSION['v'];
    $query="INSERT INTO forkers (reviewers, forker) VALUES ('{$key}', '{$value}')";
    $result1 = $connect->query($query);

?>