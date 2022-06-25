<!DOCTYPE html>
<html>

<head>
    <title><?php
        if (isset($_GET["id"])) {
            $prId = $_GET["id"];
            require_once './hidden/dbh-hidden.php';
            require_once './hidden/functions-hidden.php';
            $row = getProductByID($conn, $prId);
            echo 'SoDrO: ' . $row["nume_produs"];
        }
        ?></title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="./css/style.css">
    <link rel="stylesheet" type="text/css" href="./css/nutrition.css">
</head>

<body>

<?php
include_once 'header.php';
?>
<div class="contentdesk">
    <?php
    if (isset($_GET["id"])) {
        $prId = $_GET["id"];
        require_once './hidden/dbh-hidden.php';
        require_once './hidden/functions-hidden.php';
        require_once './hidden/beverage-functions-hidden.php';
        $row = getProductByID($conn, $prId);
        echo '<h2><a href="'. $row["link"] .'" target="_blank">' . $row["nume_produs"] . '</a></h2>';
//        echo '<p style="text-align: center;"><a href="' . $row["link"] . '" target="_blank">Link</a></p>';
        echo '<table style="width: 80%; margin-left: auto; margin-right: auto;">
<tbody>
<tr>
<td style="width: 30%;">';
        echo '<a href="'. $row["link"] .'" target="_blank"><img width="90%" src="'. getProductImageLink($row["link"]) .'" alt="'. $row["nume_produs"] .' Image"></a>';
        echo '</td>
<td>';
        echo '<table style="margin-left: auto; margin-right: auto;" border=1 frame=void rules=rows cellpadding="15">
<tbody>
<tr>';
        echo '<td><b>Acidulat?</b><br/>';
        if ($row["acidulat"] == 't') {
            echo '✔';
        } else if ($row["acidulat"] == 'f') {
            echo '✖';
        } else {
            echo '<b>?</b>';
        }
        echo '</td>';
        echo '
</tr>
<tr>';

        echo '<td><b>Natural?</b><br/>';
        if ($row["natur"] == 't') {
            echo '✔';
        } else if ($row["natur"] == 'f') {
            echo '✖';
        } else {
            echo '<b>?</b>';
        }
        echo '</td>';
        echo '
</tr>
<tr>';

        echo '<td><b>kcal/100g</b><br/>';
        echo $row["calories"];
        echo '</td>';
        echo '
</tr>
<tr>';

        echo '<td><b>Lapte?</b><br/>';
        if ($row["natur"] == 't') {
            echo '✔';
        } else if ($row["natur"] == 'f') {
            echo '✖';
        } else {
            echo '<b>?</b>';
        }
        echo '</td>';
        echo '
</tr>
<tr>';

        echo '<td><b>Cafeină/100g</b><br/>';
        echo $row["cof"];
        echo '</td>';
        echo '
</tr>
<tr>';

        echo '<td><b>Gust</b><br/>';
        echo $row["gust"];
        echo '</td>';
        echo '
</tr>
<tr>';

        echo '<td><b>Aromă</b><br/>';
        echo $row["aroma"];
        echo '</td>';
        echo '
</tr>
<tr></tr>';
        if ($_SESSION['user'] != ''){
            echo '<tr><td><form action="./hidden/wishlist-hidden.php" method="post">
';
            require_once './hidden/preference-functions-hidden.php';
            $uid = getID($conn, $_SESSION['user']);
            if (isFav($conn, $uid, $row["id_produs"])) {
                echo '<input type="image" src="./assets/wish/on.svg" width="50px" name="SubmitW" alt="Submit"/>
            ';
            }
            else {
                echo '<input type="image" src="./assets/wish/off.svg" width="50px" name="SubmitW" alt="Submit"/>
            ';
            }
            echo '<input name="uid" type="hidden" value="' . $uid . '">';
            echo '<input name="pid" type="hidden" value="' . $row["id_produs"] . '">';
            echo '<input name="from" type="hidden" value="pr">';

            echo '</form></td></tr>';
        }
        if ($_SESSION['user'] != ''){
            echo '<tr><td><form action="./hidden/add-to-list-hidden.php" method="post">
';
            require_once './hidden/preference-functions-hidden.php';
            $uid = getID($conn, $_SESSION['user']);
            echo '<input type="image" src="./assets/plus.svg" width="50px" name="Add" alt="Add">';
            echo '<input name="pid" type="hidden" value="' . $row["id_produs"] . '">';
            echo '<input name="action" type="hidden" value="add">';


            echo '</form></td></tr>';
        }

        echo '</tbody>
</table>
</td>
<td style="width: 30%;"><table style="width: 90%;">
<tbody>
<tr>
<td><a href="https://world.openfoodfacts.org/nova" target="_blank"><img src="'. getNova($row["link"]) .'"></a></td>
</tr>
<tr>
<td>&#160;</td>
</tr>
<tr>
<td><a href="https://world.openfoodfacts.org/nutriscore" target="_blank"><img src="' . getNutriscore($row["link"]) . '"></a></td>
</tr>
</tbody>
</table>
</tr>
</tbody>
</table>';
        if ($_GET["action"]=='add'){
            echo '<p>&#160;</p>';
            //TODO ERRORS
            echo '<div class="formbox2">
<form action="./hidden/add-to-list-hidden.php" method="post">
<label for="listName">
<p>În ce listă dorești să adaugi produsul?</p>
</label>
<select name="listName" multiple>
';
//            require_once './hidden/preference-functions-hidden.php';
            $uid = getID($conn, $_SESSION['user']);


            echo getUserLists($conn, $uid);
//                    <option value="Dulce">Dulce</option>
//                    <option value="Amar">Amar</option>
//                    <option value="Acru">Acru</option>
            echo '</select>
</form>
</div>';

        }
        echo '
    <p>&#160;</p><div class="nutrition">';
        include_once './hidden/lists-functions-hidden.php';

        echo getProductIngredients($row["link"]);


//        $startLink = $row["link"];


        echo '</div>
    <p>&#160;</p>';


//        $result = $result . '<td><a href="' . $row["link"] . '" target="_blank">Link</a></td>';
//        $result = $result . '<td><img width="75%" src="'. 'https://world.openfoodfacts.org/images/products/001/299/344/1104/front_en.3.400.jpg'. '"></td>';

    }
    else {

        header("location: ./index.php");
        exit();
    }


    ?>
</div>

<div class="contentmob">

</div>
<?php
// phpinfo();
include_once 'footer.php';
?>
</body>

</html>