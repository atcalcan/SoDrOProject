<?php

if (isset($_POST["from"])) {
    if ($_POST["from"] == 'pd') {
        $pid = $_POST["pid"];
        $ListId = $_POST["ListId"];
        include_once './dbh-hidden.php';
        include_once './lists-functions-hidden.php';
        removeItemFromList($conn, $ListId, $pid);
        header("location: ../user_list.php?id=$ListId");
        exit();
    } else if ($_POST["from"] == 'ld') {
        $ListId = $_POST["ListId"];
        include_once './dbh-hidden.php';
        include_once './lists-functions-hidden.php';
        removeList($conn, $ListId);
        header("location: ../profile.php#lists");
        exit();

    }
}