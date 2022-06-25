<?php

if (isset($_POST["Download"])){
    $uid = $_POST["uid"];

    require_once './dbh-hidden.php';
    require_once './functions-hidden.php';
    require_once './preference-functions-hidden.php';

    $cmd = "SELECT * FROM beverages WHERE id_produs IN (SELECT id_produs_wish as id_produs FROM wishlist WHERE id_user_wish = $uid) order by id_produs";
    $cmd = "copy (" . $cmd . ") to '/var/www/html/SoDrOProject/tmp/wishlist.csv' DELIMITER ',' csv header";
    pg_query($conn, $cmd) or die(pg_last_error());
    $path = '/var/www/html/SoDrOProject/tmp/wishlist.csv';

    header("location: ./download-hidden-two.php?path=$path");
    exit();

}