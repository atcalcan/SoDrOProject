<?php

if (isset($_POST["changePwdSubmit"])) {
    $oldPwd = $_POST["oldPwd"];
    $newPwd1 = $_POST["newPwd1"];
    $newPwd2 = $_POST["newPwd2"];
    $user = $_POST["user"];

    require_once './dbh-hidden.php';
    require_once './functions-hidden.php';

    if (wrongPwd($conn, $user, $oldPwd) !== false) {
        header("location: ../profile.php?action=changepwd&error=wrongpwd");
        exit();
    }

    if (invalidPwd($newPwd1, $newPwd2) !== false) {
        header("location: ../profile.php?action=changepwd&error=differentpwds");
        exit();
    }

    if (isset($user)) {
        updatePwd($conn, $newPwd1, $user);
    } else {
        header("location: ../profile.php?action=changepwd&error=idkuser");
        exit();
    }

}
