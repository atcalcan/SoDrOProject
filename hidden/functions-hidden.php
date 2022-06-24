<?php

//$index = 0;


function getProductID($conn, $name){
    $cmd = "SELECT * FROM beverages where nume_produs = '$name'";
    $stid = pg_query($conn, $cmd);
    $row = pg_fetch_array($stid, null, PGSQL_ASSOC);
    return $row["id_produs"];
}

function isFav($conn, $uid, $bid){
    $cmd = "SELECT * FROM wishlist where id_user_wish = $uid and id_produs_wish = $bid";
    $stid = pg_query($conn, $cmd);
    $row = pg_fetch_array($stid, null, PGSQL_ASSOC);
    if($row){
        return true;
    }
    else {
        return false;
    }
}

function toggleFav($conn, $uid, $bid){
    if (isFav($conn, $uid, $bid)){
        $cmd = "DELETE FROM wishlist where id_user_wish = $uid and id_produs_wish = $bid";
        pg_query($conn, $cmd);
    }
    else {
        $cmd = "INSERT INTO wishlist ($uid, $bid)";
        pg_query($conn, $cmd);
    }
}

function getProductByID($conn, $id){
    $cmd = "SELECT * FROM beverages where id_produs = '$id'";
    $stid = pg_query($conn, $cmd);
    return pg_fetch_array($stid, null, PGSQL_ASSOC);
}

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
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
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

function emailRpt($conn, $email)
{
    $cmd = "SELECT * FROM USERS where email = '$email'";
    $stid = pg_query($conn, $cmd);
    $row = pg_fetch_array($stid, null, PGSQL_ASSOC);
    if ($row) {
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
    pg_query($conn, $stmt);
    $stmt = "INSERT INTO preferences VALUES (". getID($conn, $user) . ")";
    pg_query($conn, $stmt);

    header("location: ../register.php?error=none");
    exit();
}

function loginUser($conn, $user, $pwd)
{
//    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
    $stid = pg_query($conn, "SELECT passwd FROM USERS where username = '$user'");
    $row = pg_fetch_array($stid, null, PGSQL_ASSOC);
    if ($row) {
        if (password_verify($pwd, $row["passwd"])) {

            session_start();
            $_SESSION['user'] = $user;
            $_SESSION['acid'] = getAcid($conn, $user);
            $_SESSION['natural'] = getNatural($conn, $user);
            $_SESSION['lowcal'] = getLowCal($conn, $user);
            $_SESSION['milk'] = getMilk($conn, $user);
            $_SESSION['cofe'] = getCofe($conn, $user);
            $_SESSION['gust'] = getGust($conn, $user);
            $_SESSION['aroma'] = getAroma($conn, $user);
            header("location: ../index.php");
        } else {
            header("location: ../login.php?error=notfound");
            exit;
        }
    } else {
        header("location: ../login.php?error=notfound");
        exit;
    }
}

function wrongPwd($conn, $user, $pwd): bool
{
    $stid = pg_query($conn, "SELECT passwd FROM USERS where username = '$user'");
    $row = pg_fetch_array($stid, null, PGSQL_ASSOC);
    if (password_verify($pwd, $row["passwd"])) {
        return false;
    } else {
        return true;
    }
}


function updateEmail($conn, $newAdress, $user)
{
    $stmt = "UPDATE USERS SET email = '$newAdress' WHERE username = '$user'";
    pg_query($conn, $stmt);
    header("location: ../profile.php?action=changemail&error=none");
    exit;
}


function updatePwd($conn, $pwd, $user)
{
    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
    $stmt = "UPDATE USERS SET passwd = '$hashedPwd' WHERE username = '$user'";
    pg_query($conn, $stmt);
    header("location: ../profile.php?action=changepwd&error=none");
    exit;
}


function numberOfUsers($conn)
{
    $cmd = "SELECT COUNT(*) as number FROM USERS";
    $stid = pg_query($conn, $cmd);
    $row = pg_fetch_array($stid, null, PGSQL_ASSOC);
    return $row["number"];
}


function numberOfProducts($conn)
{
    $cmd = "SELECT COUNT(*) as number FROM BEVERAGES";
    $stid = pg_query($conn, $cmd);
    $row = pg_fetch_array($stid, null, PGSQL_ASSOC);
    return $row["number"];
}


function getEmail($conn, $user)
{
    $cmd = "SELECT email FROM USERS where username = '$user'";
    $stid = pg_query($conn, $cmd);
    $row = pg_fetch_array($stid, null, PGSQL_ASSOC);
    return $row["email"];
}

 function startTableDesk($user){
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
<th>Aromă</th>';
    if ($user != ''){
        $result = $result . '<th></th>';
    }

//<td>Link</td>
     $result = $result . '
</tr>';
     return $result;
 }

 function allProductsDesk($conn, $user)
{
    $result = startTableDesk($user);
//    echo '0';
    $cmd = "SELECT * FROM beverages";
    $result = $result . getProductsDesk($conn, $cmd, $user);
    return $result . '</tbody>
</table>';
}

 function selectedProductsDesk($conn, $acid, $natural, $lowcal, $milk, $cofe, $gust, $aroma, $user)
{
//    echo '3';
    $result = startTableDesk($user);
    $cmd = "SELECT * FROM beverages";
    if ($acid == 'on' && $natural == 'on'){
         $cmd = "SELECT * FROM (" . $cmd . ") as x ORDER BY acidulat desc, natur desc";
     }
    else if ($acid == 'on'){
        $cmd = "SELECT * FROM (" . $cmd . ") as x ORDER BY acidulat desc";
    }
    else if ($natural == 'on'){
        $cmd = "SELECT * FROM (" . $cmd . ") as x ORDER BY natur desc";
    }
    if ($lowcal == 'on'){
        $cmd = "SELECT * FROM (" . $cmd . ") as x ORDER BY calories::int";
    }
    if ($milk == 'on'){
        $cmd = "SELECT * FROM (" . $cmd . ") as x WHERE NOT milk";
    }
    if ($cofe == 'on'){
        $cmd = "SELECT * FROM (" . $cmd . ") as x WHERE cof = '0'";
    }
    if ($gust == 'Dulce' | $gust == 'Amar' | $gust == 'Acru'){
        $cmd = "SELECT * FROM (" . $cmd . ") as x WHERE gust = '$gust'";
    }
    if ($aroma != ''){
        $cmd = "SELECT * FROM (" . $cmd . ") as x WHERE aroma like '%$aroma%'";
    }
//    echo $cmd;
    $result = $result . getProductsDesk($conn, $cmd, $user);
//    echo '1';
    return $result . '</tbody>
</table>';
}

function getProductsDesk($conn, $cmd, $user)
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
            $result = $result . '<td><form>
';
            $uid = getID($conn, $user);
//            $result = $result . '<input type="image"';
            if (isFav($conn, $uid, $row["id_produs"])) {
                $result = $result . '<input type="image" src="../assets/wish/on.svg" width="30px" name="Submit" alt="Submit"/>
            ';
            }
            else {
                $result = $result . '<input type="image" src="../assets/wish/off.svg" width="30px" name="Submit" alt="Submit"/>
            ';
            }
//            $result = $result . ' border="0" name="Submit"/>
//            ';

            $result = $result . '</form></td>';
        }
//        $startLink = $row["link"];
//        $content=file_get_contents($startLink);
//        $content = strip_tags($content,"<img id='og_image'>");
//        $subString = preg_split(">", $content);
//        echo $subString;

//        $result = $result . '<td><a href="' . $row["link"] . '" target="_blank">Link</a></td>';
//        $result = $result . '<td><img width="75%" src="'. 'https://world.openfoodfacts.org/images/products/001/299/344/1104/front_en.3.400.jpg'. '"></td>';
        $result = $result . '</tr>
';
        $row = pg_fetch_array($stid, null, PGSQL_ASSOC);
    }
    return $result;
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
