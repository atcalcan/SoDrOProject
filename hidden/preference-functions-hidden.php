<?php


function getID($conn, $user)
{
    $cmd = "SELECT * FROM USERS where username = '$user'";
//    echo '6';
    $stid = pg_query($conn, $cmd);
//    echo '7';
    $row = pg_fetch_array($stid, null, PGSQL_ASSOC);
    return $row["id"];
}


function getAcid($conn, $user)
{
    $stmt = "SELECT * FROM preferences WHERE id_user = " . getID($conn, $user);
    $stid = pg_query($conn, $stmt);
    $row = pg_fetch_array($stid, null, PGSQL_ASSOC);
    return $row["acid_pref"];
}

function getNatural($conn, $user)
{
    $stmt = "SELECT * FROM preferences WHERE id_user = " . getID($conn, $user);
    $stid = pg_query($conn, $stmt);
    $row = pg_fetch_array($stid, null, PGSQL_ASSOC);
    return $row["natural_pref"];
}

function getLowCal($conn, $user)
{
    $stmt = "SELECT * FROM preferences WHERE id_user = " . getID($conn, $user);
    $stid = pg_query($conn, $stmt);
    $row = pg_fetch_array($stid, null, PGSQL_ASSOC);
    return $row["lowcal_pref"];
}

function getMilk($conn, $user)
{
    $stmt = "SELECT * FROM preferences WHERE id_user = " . getID($conn, $user);
    $stid = pg_query($conn, $stmt);
    $row = pg_fetch_array($stid, null, PGSQL_ASSOC);
    return $row["milk_pref"];
}

function getCofe($conn, $user)
{
    $stmt = "SELECT * FROM preferences WHERE id_user = " . getID($conn, $user);
//    echo '3';
    $stid = pg_query($conn, $stmt);
//    echo '3';
    $row = pg_fetch_array($stid, null, PGSQL_ASSOC);
    return $row["cofe_pref"];
}

function getGust($conn, $user)
{
    $stmt = "SELECT * FROM preferences WHERE id_user = " . getID($conn, $user);
    $stid = pg_query($conn, $stmt);
    $row = pg_fetch_array($stid, null, PGSQL_ASSOC);
    return $row["gust_pref"];
}

function getAroma($conn, $user)
{
    $stmt = "SELECT * FROM preferences WHERE id_user = " . getID($conn, $user);
    $stid = pg_query($conn, $stmt) or die('Error: ' . pg_last_error());
    $row = pg_fetch_array($stid, null, PGSQL_ASSOC);
    return $row["aroma_pref"];
}

function updatePreferences($conn, $user, $acid, $natural, $lowcal, $milk, $cofe, $gust, $aroma)
{
//    echo '3';
    $stmt = "SELECT * FROM preferences WHERE id_user = " . getID($conn, $user);
//    echo '3';
    $stid = pg_query($conn, $stmt) or die('Error: ' . pg_last_error());
//    echo '3';
    $row = pg_fetch_array($stid, null, PGSQL_NUM);
//    echo '9';
    if ($row) {
//        echo '4';
        $stmt1 = "UPDATE preferences SET acid_pref = '$acid', natural_pref = '$natural', lowcal_pref = '$lowcal', milk_pref = '$milk', cofe_pref = '$cofe', gust_pref = '$gust', aroma_pref = '$aroma' WHERE id_user = " . getID($conn, $user);
//        echo '4';
        pg_query($conn, $stmt1) or die('Error: ' . pg_last_error());
    } else {
//        echo '5';
        $stmt2 = "INSERT INTO preferences VALUES (" . getID($conn, $user) . ", '$acid', '$natural', '$lowcal', '$milk', '$cofe', '$gust', '$aroma')";
//        echo '5';
        pg_query($conn, $stmt2);
    }
}