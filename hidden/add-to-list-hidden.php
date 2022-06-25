<?php

if ($_POST["action"] == 'add'){
    $pid = $_POST["pid"];

    header("location: ../beverage.php?id=$pid&action=add");
    exit();
}