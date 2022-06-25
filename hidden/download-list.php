<?php

if (isset($_POST["Download"])) {
    $listId = $_POST["listId"];


    require_once './dbh-hidden.php';
    require_once './functions-hidden.php';
    require_once './preference-functions-hidden.php';
    require_once './lists-functions-hidden.php';
    $row = getList($conn, $listId);

    $cmd = "SELECT * FROM beverages WHERE id_produs IN (SELECT pid_i as id_produs FROM lists_items WHERE list_id_i = $listId) order by id_produs";
    $cmd = "copy (" . $cmd . ") to '/var/www/html/SoDrOProject/tmp/" . trim($row["list_name"]) . ".csv' DELIMITER ',' csv header";
    pg_query($conn, $cmd) or die(pg_last_error());
    $path = '/var/www/html/SoDrOProject/tmp/' . trim($row["list_name"]) . '.csv';

    header("location: ./download-hidden-two.php?path=$path");
    exit();

}