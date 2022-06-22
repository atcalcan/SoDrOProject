<?php

if (isset($_POST["changeEmailSubmit"])) {
    $newAddress1 = $_POST["newAdress1"];
    $newAddress2 = $_POST["newAdress2"];
    $user = $_POST["user"];

    require_once './dbh-hidden.php';
    require_once './functions-hidden.php';

    if ($newAddress1 != $newAddress2) {
        header("location: ../profile.php?action=changemail&error=differentmails");
        exit();
    }

    if (invalidEmail($newAddress1) !== false) {
        header("location: ../profile.php?action=changemail&error=invalidemail");
        exit();
    }

    if (emailRpt($conn, $newAddress1) !== false) {
        header("location: ../profile.php?action=changemail&error=invalidemail");
        exit();
    }

    if (isset($user)) {
        updateEmail($conn, $newAddress1, $user);
    } else {
        header("location: ../profile.php?action=changemail&error=idkuser");
        exit();
    }

}
