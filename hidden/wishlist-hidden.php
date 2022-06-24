<?php

//echo $_POST["SubmitW"];

//if (isset($_POST["SubmitW"])) {
    $uid = $_POST["uid"];
    $pid = $_POST["pid"];
    $from = $_POST["from"];

    require_once './dbh-hidden.php';
    require_once './functions-hidden.php';
    toggleFav($conn, $uid, $pid);
    if ($from == 'p') {
        header("location: ../products.php#$pid");
    }
    else if ($from == 'w') {
        header("location: ../wishlist.php");
    }
    else if ($from == 'pr') {
        header("location: ../beverage.php?id=$pid");
    }
    exit();
//}