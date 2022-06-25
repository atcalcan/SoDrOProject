<?php



function createList($conn, $user, $listName)
{
    $stid = pg_query($conn, "SELECT max(list_id) FROM users_lists");
    $row = pg_fetch_array($stid, null, PGSQL_NUM);

    require_once './preference-functions-hidden.php';
    $uid = getID($conn, $user);

    $stmt = "INSERT INTO users_lists VALUES ($row[0] + 1, $uid, '$listName')";
    pg_query($conn, $stmt);

    header("location: ../profile.php?error=none");
    exit();
}

function checkListName($conn, $user, $listName){

    require_once './preference-functions-hidden.php';
    $uid = getID($conn, $user);
    $stid = pg_query($conn, "SELECT * FROM users_list where list_name = '$listName' AND uid_lists = $uid");
    $row = pg_fetch_array($stid, null, PGSQL_NUM);
    if ($row){
        return true;
    }
    else {
        return false;
    }
}

function addBevToList($conn, $user, $listName, $pid){
    if (checkListName($conn, $user, $listName)) {
        $stid = pg_query($conn, "INSERT INTO list_items VALUES (". getListID($conn, $listName, $user) . ", $pid)");
        pg_fetch_array($stid, null, PGSQL_NUM);
    }


}

function getListID($conn, $listName, $user){
    require_once './preference-functions-hidden.php';
    $uid = getID($conn, $user);
    $stid = pg_query($conn, "SELECT * FROM users_list where list_name = '$listName' and uid_lists = $uid");
    $row = pg_fetch_array($stid, null, PGSQL_ASSOC);
    return $row["list_id"];
}

function getUserLists($conn, $uid)
{
    $result='';
    $stid = pg_query($conn, "SELECT * FROM users_list where uid_lists = $uid") or die('Err' . pg_last_error());
    $row = pg_fetch_array($stid, null, PGSQL_ASSOC) or die('Err' . pg_last_error());
    while ($row){
        $result = $result . '<option value="'.$row["list_name"].'">'.$row["list_name"].'</option>
';
        $row = pg_fetch_array($stid, null, PGSQL_ASSOC);
    }
    return $result . '<option value="NewList">Listă nouă ➕</option>';

}