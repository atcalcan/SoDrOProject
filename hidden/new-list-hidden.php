<?php

if (isset($_POST["newNameSubmit"])) {
    $user = $_POST["user"];
    $pid = $_POST["pid"];
    $newName = $_POST["newName"];


    require_once './dbh-hidden.php';
    require_once './lists-functions-hidden.php';
    if (checkListName($conn, $user, $newName)) {

        header("location: ../beverage.php?id=$pid&action=add&list=new&error=dl");
    } else {
        createList($conn, $user, $newName);
        addBevToList($conn, $user, $newName, $pid);
        header("location: ../beverage.php?id=$pid&action=add&list=new&error=nonenew");
    }
    exit();
}