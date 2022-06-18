<?php

if (isset($_POST["submit"])) {
    $nume = $_POST["nume"];
    $vegetarian = $_POST["vegetarian"];
    $vegan = $_POST["vegan"];
    $descriere = $_POST["descriere"];
    $string = $_POST["string"];

    if ($vegetarian == "1") {
        $vg1 = 'Y';
    } else {
        $vg1 = 'N';

    }

    if ($vegan == "1") {
        $vg2 = 'Y';
    } else {
        $vg2 = 'N';

    }

    require_once './dbh-hidden.php';
    require_once './functions-hidden.php';

    if (emptyInputRecipy($nume, $vg1, $vg2, $descriere, $string) !== false) {
        header("location: ../admin.php?error=emptyrecipy");
        exit();
    }


    receivedReteta($nume, $vg1, $vg2, $descriere, $string, $conn);
} else {
    header("location: ../admin.php");
    exit();
}
