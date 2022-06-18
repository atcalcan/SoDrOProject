<?php

if (isset($_POST["submit"])) {
    $email = $_POST["email"];
    $user = $_POST["user"];
    $pwd = $_POST["pwd"];
    $pwd_rpt = $_POST["pwd_rpt"];

    require_once './dbh-hidden.php';
    require_once './functions-hidden.php';

    if (emptyInputRegister($email, $user, $pwd, $pwd_rpt) !== false) {
        header("location: ../register.php?error=emptyinput");
        exit();
    }

    if (invalidEmail($email) !== false) {
        header("location: ../register.php?error=invalidemail");
        exit();
    }

    if (invalidUser($user) !== false) {
        header("location: ../register.php?error=invaliduser");
        exit();
    }

    if (invalidPwd($pwd, $pwd_rpt) !== false) {
        header("location: ../register.php?error=invalidpwd");
        exit();
    }

    if (userRpt($conn, $user, $email) !== false) {

        header("location: ../register.php?error=repeatedusername");
        exit();
    }

    createUser($conn, $email, $user, $pwd);
} else {
    header("location: ../register.php");
    exit();
}
