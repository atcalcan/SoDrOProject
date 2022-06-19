<?php

if (isset($_POST["changeEmail"])) {
    header("location: ../profile.php?action=changemail");
    exit;
} else if (isset($_POST["changePwd"])) {
    header("location: ../profile.php?action=changepwd");
    exit;
}