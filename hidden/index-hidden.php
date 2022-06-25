<?php

if (isset($_POST["submitForm"])) {
//    $acid = $_POST["acid"];
//    $natural = $_POST["natural"];
//    $lowcal = $_POST["lowcal"];
//    $milk = $_POST["milk"];
//    $cofe = $_POST["cofe"];
//    $gust = $_POST["gust"];
//    $aroma = $_POST["aroma"];
//    $user = $_POST["user"];


    require_once './dbh-hidden.php';
    require_once './functions-hidden.php';
    require_once './preference-functions-hidden.php';
//    echo '1';

    if (isset($_POST["user"])) {
        updatePreferences($conn, $_POST["user"], $_POST["acid"], $_POST["natural"], $_POST["lowcal"], $_POST["milk"], $_POST["cofe"], $_POST["gust"], $_POST["aroma"]);
    }
    echo '2';

    session_start();

    if (isset($_POST["acid"])) {
        $_SESSION['acid'] = $_POST["acid"];
    } else $_SESSION['acid'] = null;
    if (isset($_POST["natural"])) {
        $_SESSION['natural'] = $_POST["natural"];
    } else $_SESSION['natural'] = null;
    if (isset($_POST["lowcal"])) {
        $_SESSION['lowcal'] = $_POST["lowcal"];
    } else $_SESSION['lowcal'] = null;
    if (isset($_POST["milk"])) {
        $_SESSION['milk'] = $_POST["milk"];
    } else $_SESSION['milk'] = null;
    if (isset($_POST["cofe"])) {
        $_SESSION['cofe'] = $_POST["cofe"];
    } else $_SESSION['cofe'] = null;
    if (isset($_POST["gust"])) {
        $_SESSION['gust'] = $_POST["gust"];
    } else $_SESSION['gust'] = null;
    if (isset($_POST["aroma"])) {
        $_SESSION['aroma'] = $_POST["aroma"];
    } else $_SESSION['aroma'] = null;
    header("location: ../products.php");
}
