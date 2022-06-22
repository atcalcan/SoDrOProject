<?php

if (isset($_POST["submit"])) {
    $user = $_POST["user"];
    $pwd = $_POST["pwd"];

    require_once './dbh-hidden.php';
    require_once './functions-hidden.php';
    require_once './preference-functions-hidden.php';

    if (emptyInputLogin($user, $pwd) !== false) {
        header("location: ../login.php?error=emptyinput");
        exit();
    }

    if (invalidUser($user) !== false) {
        header("location: ../login.php?error=invaliduser");
        exit();
    }

    loginUser($conn, $user, $pwd);
} else {
    header("location: ../login.php");
    exit();
}
