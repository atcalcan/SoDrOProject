<?php

if ($_POST["action"] == 'add'){
    $pid = $_POST["pid"];

    header("location: ../beverage.php?id=$pid&action=add");
    exit();
}

if (isset($_POST["SubmitListName"])){
    $listName = $_POST["listName"];
    $user = $_POST["user"];
    $pid = $_POST["pid"];
    if ($listName=='NewList'){
        header("location: ../beverage.php?id=$pid&action=add&list=new");
        exit();
    }
    else {

        require_once './dbh-hidden.php';
        require_once './lists-functions-hidden.php';
        if (!checkPIDinList($conn, $listName, $pid, $user)) {
            addBevToList($conn, $user, $listName, $pid);
            header("location: ../beverage.php?id=$pid&action=add&error=none");
        }
        else {
            header("location: ../beverage.php?id=$pid&action=add&error=double");
        }
        exit();


    }
}