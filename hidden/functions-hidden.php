<?php

$index = 0;

function emptyInputRegister($email, $user, $pwd, $pwd_rpt)
{
    if (empty($email) || empty($user) || empty($pwd) || empty($pwd_rpt)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function emptyInputLogin($user, $pwd)
{
    if (empty($user) || empty($pwd)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function invalidEmail($email)
{
    if (!preg_match("/^[a-zA-Z0-9]*(\@)[a-zA-Z0-9]*[\.(a-zA-Z0-9)*]+$/", $email)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function invalidUser($user)
{
    if (!preg_match("/^[a-zA-Z0-9]+$/", $user)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function invalidPwd($pwd, $pwd_rpt)
{
    if ($pwd !== $pwd_rpt) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function userRpt($conn, $user, $email)
{
    $cmd = "SELECT * FROM USERS where username = '$user' or email = '$email'";
    $stid = pg_query($conn, $cmd);
    $row = pg_fetch_array($stid, null, PGSQL_ASSOC);
    if ($row) {
        return true;
    } else {
        return false;
    }
}

function userNo($conn, $user)
{
    $cmd = "SELECT * FROM USERS where username = ':USER'";
    $stid = oci_parse($conn, $cmd);
    oci_bind_by_name($cmd, ':USER', $user);
    oci_execute($stid);
    $row = oci_fetch_array($stid, OCI_ASSOC + OCI_RETURN_NULLS);
    if ($row == null) {
        return true;
    } else {
        return false;
    }
}

function createUser($conn, $email, $user, $pwd)
{
    $stid = pg_query($conn, "SELECT max(id) FROM USERS");
    $row = pg_fetch_array($stid, null, PGSQL_NUM);

    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
    $stmt = "INSERT INTO USERS VALUES ($row[0] + 1, '$user', '$hashedPwd', '$email')";
    $stid = pg_query($conn, $stmt);

    header("location: ../register.php?error=none");
    exit();
}

function loginUser($conn, $user, $pwd)
{
//    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
    $stid = pg_query($conn, "SELECT passwd FROM USERS where username = '$user'");
    $row = pg_fetch_array($stid, null, PGSQL_ASSOC);
    // TODO VERIFY
    if ($row) {
        if (password_verify($pwd, $row["passwd"])) {
            session_start();
            $_SESSION['user'] = $user;
            header("location: ../index.php");
        }
        else{
            header("location: ../login.php?error=notfound");
            exit;
        }
    } else {
        header("location: ../login.php?error=notfound");
        exit;
    }
}

//function receivedReteta($nume, $vegetarian, $vegan, $descriere, $string, $conn)
//{
//    $stid = oci_parse($conn, "select max(ID) as ID from RETETE");
//    oci_execute($stid);
//    oci_fetch($stid);
//    $id = oci_result($stid, 'ID');
//    $stid = oci_parse($conn, "INSERT INTO RETETE (id, nume, vegetarian, vegan, descriere) VALUES ($id + 1, '$nume', '$vegetarian', '$vegan', '$descriere')");
//    oci_execute($stid);
//    oci_commit($conn);
//    stringParser($string, $id + 1, $conn);
//    header("location: ../products.php");
//}
//
//function emptyInputRecipy($nume, $vegetarian, $vegan, $descriere, $string)
//{
//
//    if (!isset($nume) || !isset($vegetarian) || !isset($vegan) || !isset($descriere) || !isset($string)) {
//        return true;
//    } else {
//        return false;
//    }
//}
//
//function stringParser($string, $id, $conn)
//{
//    $pieces = explode(", ", $string);
//    foreach ($pieces as &$word) {
//        $separe = explode(" ", $word);
//        $stid = oci_parse($conn, "INSERT INTO INGREDIENTE (id, nume, cantitate) VALUES ($id, '$separe[0]', '$separe[1]')");
//        oci_execute($stid);
//        oci_commit($conn);
//    }
//}
