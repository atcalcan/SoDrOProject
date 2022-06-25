<?php



function createList($conn, $user, $listName)
{
    $stid = pg_query($conn, "SELECT max(list_id) FROM users_lists");
    $row = pg_fetch_array($stid, null, PGSQL_NUM);

    require_once './preference-functions-hidden.php';
    $uid = getID($conn, $user);

    $stmt = "INSERT INTO users_lists VALUES ($row[0] + 1, $uid, '$listName')";
    pg_query($conn, $stmt);

//    header("location: ../profile.php?error=none");
//    exit();
}

function checkListName($conn, $user, $listName): bool
{

    require_once './preference-functions-hidden.php';
    $uid = getID($conn, $user);
    $stid = pg_query($conn, "SELECT * FROM users_lists where list_name = '$listName' AND uid_lists = $uid");
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
        $stid = pg_query($conn, "INSERT INTO lists_items VALUES (". getListID($conn, $listName, $user) . ", $pid)");
        pg_fetch_array($stid, null, PGSQL_NUM);
    }


}

function getListID($conn, $listName, $user){
    require_once './preference-functions-hidden.php';
    $uid = getID($conn, $user);
    $stid = pg_query($conn, "SELECT * FROM users_lists where list_name = '$listName' and uid_lists = $uid");
    $row = pg_fetch_array($stid, null, PGSQL_ASSOC);
    return $row["list_id"];
}

function getList($conn, $id){
    $stid = pg_query($conn, "SELECT * FROM users_lists where list_id = $id");
    $row = pg_fetch_array($stid, null, PGSQL_ASSOC);
    return $row;
}

function getUserListsOptions($conn, $uid): string
{
    $result='';
    $stid = pg_query($conn, "SELECT * FROM users_lists where uid_lists = $uid");
    $row = pg_fetch_array($stid, null, PGSQL_ASSOC);
    while ($row){
        $result = $result . '<option value="'.$row["list_name"].'">'.$row["list_name"].'</option>
';
        $row = pg_fetch_array($stid, null, PGSQL_ASSOC);
    }
    return $result . '<option value="NewList">Listă nouă ➕</option>';

}

function getUserLists($conn, $uid): string
{
    $result='';
    $stid = pg_query($conn, "SELECT * FROM users_lists where uid_lists = $uid");
    $row = pg_fetch_array($stid, null, PGSQL_ASSOC);
    while ($row){
        $result = $result . '<tr><td><a href="./user_list.php?id=' . $row["list_id"] . '" target="_blank">'.$row["list_name"] . '</a></td>';

        echo '</tr>
';
        $row = pg_fetch_array($stid, null, PGSQL_ASSOC);
    }
    return $result;

}

function removeList($conn, $ListId){
    pg_query($conn, "DELETE FROM users_lists where list_id = $ListId");
}

function removeItemFromList($conn, $ListId, $ItemId){
    pg_query($conn, "DELETE FROM lists_items where list_id_i = $ListId AND pid_i = $ItemId");
}

function checkPIDinList($conn, $listName, $pid, $user): bool
{
    $listId = getListID($conn, $listName, $user);
    $stid = pg_query($conn, "SELECT * FROM lists_items where pid_i = $pid AND list_id_i = $listId");
    $row = pg_fetch_array($stid, null, PGSQL_ASSOC);
    if ($row){
        return true;
    }
    else {
        return false;
    }


}

function startListTableDesk($user){
    $result = '<table style="margin-left: auto; margin-right: auto;" border=1 frame=void rules=rows cellpadding="15">
<tbody>
<tr>
<th style="width: 35%;">Nume</th>
<th>Acidulat?</th>
<th>Natural?</th>
<th>kcal/100g</th>
<th>Lapte?</th>
<th>Cafeină/100g</th>
<th>Gust</th>
<th>Aromă</th>
<th>Ștergere</th>';

//<td>Link</td>
    return $result . '
</tr>';
}

function allListDesk($conn, $user, $listId)
{

    $result = startListTableDesk($user);
    $cmd = "SELECT * FROM beverages where id_produs in (select pid_i as id_produs from lists_items where list_id_i = $listId) order by id_produs";
    $result = $result . getListProductsDesk($conn, $cmd, $user, $listId);
    return $result . '</tbody>
</table>';
}

function getListProductsDesk($conn, $cmd, $user, $listId)
{
    $result = '';
    $stid = pg_query($conn, $cmd) or die('Error: ' . pg_last_error());
    $row = pg_fetch_array($stid, null, PGSQL_ASSOC);
    while ($row) {
        $result = $result . '<tr>';
        $result = $result . '<td><a id="' . $row["id_produs"] .'"></a><a href="./beverage.php?id=' . getProductID($conn, $row["nume_produs"]) . '" target="_blank">' . $row["nume_produs"] . '</a></td>';
        if ($row["acidulat"] == 't') {
            $result = $result . '<td>✔</td>';
        } else if ($row["acidulat"] == 'f') {
            $result = $result . '<td>✖</td>';
        } else {
            $result = $result . '<td><b>?</b></td>';
        }
        if ($row["natur"] == 't') {
            $result = $result . '<td>✔</td>';
        } else if ($row["natur"] == 'f') {
            $result = $result . '<td>✖</td>';
        } else {
            $result = $result . '<td><b>?</b></td>';
        }
        $result = $result . '<td>' . $row["calories"] . '</td>';
        if ($row["milk"] == 't') {
            $result = $result . '<td>✔</td>';
        } else if ($row["milk"] == 'f') {
            $result = $result . '<td>✖</td>';
        } else {
            $result = $result . '<td><b>?</b></td>';
        }
        $result = $result . '<td>' . $row["cof"] . '</td>';
        $result = $result . '<td>' . $row["gust"] . '</td>';
        $result = $result . '<td>' . $row["aroma"] . '</td>';

        if ($user != ''){
            $result = $result . '<td><form action="./hidden/delete-list-hidden.php" method="post">
';
            require_once './hidden/preference-functions-hidden.php';
            $uid = getID($conn, $user);
//            $result = $result . '<input type="image"';
            $result = $result . '<input type="image" src="./assets/minus.svg" width="25px" name="DeleteP" alt="Submit"/>';
            $result = $result . '<input name="pid" type="hidden" value="' . $row["id_produs"] . '">';
            $result = $result . '<input name="ListId" type="hidden" value="' . $listId . '">';
            $result = $result . '<input name="from" type="hidden" value="pd">';
//            $result = $result . ' border="0" name="Submit"/>
//            ';

            $result = $result . '</form></td>';
        }
        $result = $result . '</tr>
';
        $row = pg_fetch_array($stid, null, PGSQL_ASSOC);
    }
    return $result;
}