<!DOCTYPE html>
<html>

<head>
    <title>Profile</title>
    <meta charset="UTF-8">
    <link rel="icon" type="image/x-icon" href="./assets/favicon.ico">
    <link rel="stylesheet" type="text/css" href="./css/style.css">
</head>

<body>

<?php
include_once 'header.php';
?>
<div class="contentdesk">
    <h3>Pagina de profil</h3>
    <?php
    require_once './hidden/dbh-hidden.php';
    require_once './hidden/functions-hidden.php';
    require_once './hidden/preference-functions-hidden.php';
    ?>

    <table style="margin-left: auto; margin-right: auto;">
        <tbody>
        <tr>
            <td width="30%">
                <?php
                echo '<div style=" text-align: center;"><img style="border-radius: 50%;" class="profile" src="https://www.ssrl-uark.com/wp-content/uploads/2014/06/no-profile-image.png" width="100px" alt="profile"></div>';
                ?>
            </td>
            <td>
                <table style="margin-left: auto; margin-right: auto;" width="100%">
                    <tbody>
                    <tr>
                        <td>
                            <?php
                            echo '<p style="text-indent: 0"><b>Nume de utilizator: ' . $_SESSION['user'] . '</b></p>';
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <?php
                            echo '<p style="text-indent: 0">Email: ' . getEmail($conn, $_SESSION['user']) . '</p>';
                            ?>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <div class="formbox2">
                    <form action="./hidden/profile-hidden.php" method="post">
                        <div style="text-align: center;">
                            <div><input name="changeEmail" type="submit" value="Schimă emailul"></div>
                            <div><input name="changePwd" type="submit" value="Schimă parola"></div>
                        </div>
                    </form>
                </div>
            </td>
        </tr>
        </tbody>
    </table>

    <?php
    if ($_GET["action"] == "changemail") {
        if (isset($_GET["error"])) {
            if ($_GET["error"] == "invalidemail") {
                echo '<p style="color:red; text-align: center; font-size: 80%">Adresa de mail este invalidă.</p>';
            } else if ($_GET["error"] == "differentmails") {
                echo '<p style="color:red; text-align: center; font-size: 80%">Adresele introduse nu se potrivesc.</p>';
            } else if ($_GET["error"] == "none") {
                echo '<p style="color:#0072a0; text-align: center;">Am schimbat cu succes adresa ta de email.</p>';
            }
        }
        echo '<div class="formbox2">
                    <form action="./hidden/change-email-hidden.php" method="post">
                        <p>Care este noua adresă de email?</p>
                        <input name="newAdress1" type="email" placeholder="Introdu noua adresă">
                        <input name="newAdress2" type="email" placeholder="Repetă noua adresă">
                        <div style="text-align: center;">
                        <input name="changeEmailSubmit" type="submit" value="Submit">
                        <input name="user" type="hidden" value="';
        echo $_SESSION['user'];
        echo '">
                        </div>
                    </form>
               </div>';
    }
    ?>

    <?php
    if ($_GET["action"] == "changepwd") {
        if (isset($_GET["error"])) {
            if ($_GET["error"] == "wrongpwd") {
                echo '<p style="color:red; text-align: center; font-size: 80%">Parola curentă nu este corectă.</p>';
            } else if ($_GET["error"] == "differentpwds") {
                echo '<p style="color:red; text-align: center; font-size: 80%">Noile parole introduse nu se potrivesc.</p>';
            } else if ($_GET["error"] == "none") {
                echo '<p style="color:#0072a0; text-align: center;">Am schimbat cu succes parola ta.</p>';
            }
        }
        echo '<div class="formbox2">
                    <form action="./hidden/change-pwd-hidden.php" method="post">
                        <p>Care este parola ta?</p>
                        <input name="oldPwd" type="password" placeholder="Introdu parola ta curentă">
                        <p>Care este noua ta parolă?</p>
                        <input name="newPwd1" type="password" placeholder="Introdu noua parolă">
                        <input name="newPwd2" type="password" placeholder="Repetă noua parolă">
                        <div style="text-align: center;">
                        <input name="changePwdSubmit" type="submit" value="Submit">
                        <input name="user" type="hidden" value="';
        echo $_SESSION['user'];
        echo '">
                        </div>
                    </form>
               </div>';
    }
    ?>
    <?php
//    echo '<div style="text-align: center;">';

    if (selectedProductsDesk($conn, $_SESSION['acid'], $_SESSION['natural'], $_SESSION['lowcal'], $_SESSION['milk'], $_SESSION['cofe'], $_SESSION['gust'], $_SESSION['aroma'], $_SESSION['user']) == allProductsDesk($conn, $_SESSION['user'])) {
        echo '<p style="text-align: center;"><b>Nu ai completat încă <a href="./index.php">formularul de preferințe</a>.</b></p>';
    }
    else {
        echo '<table style="margin-left: auto; margin-right: auto;" border=1 frame=void rules=rows cellpadding="15">
<tbody>
<tr>
<th colspan="2">Preferințe</th>
</tr>
';
        echo '<tr>
<td>Preferi băuturi acidulate?</td>
<td>';
        if ($_SESSION['acid'] == 'on') {
            echo '✔';
        }
        else {
            echo '✖';
        }
        echo '</td>
</tr>';

        echo '<tr>
<td>Preferi băuturi naturale?</td>
<td>';
        if ($_SESSION['natural'] == 'on') {
            echo '✔';
        }
        else {
            echo '✖';
        }
        echo '</td>
</tr>';

        echo '<tr>
<td>Preferi băuturi cu conţinut caloric scăzut?</td>
<td>';
        if ($_SESSION['lowcal'] == 'on') {
            echo '✔';
        }
        else {
            echo '✖';
        }
        echo '</td>
</tr>';

        echo '<tr>
<td>Preferi băuturi fără lapte?</td>
<td>';
        if ($_SESSION['milk'] == 'on') {
            echo '✔';
        }
        else {
            echo '✖';
        }
        echo '</td>
</tr>';

        echo '<tr>
<td>Preferi băuturi fără cafeină?</td>
<td>';
        if ($_SESSION['cofe'] == 'on') {
            echo '✔';
        }
        else {
            echo '✖';
        }
        echo '</td>
</tr>';

        echo '<tr>
<td>Ce gust ai prefera sa aibă băutura?</td>
<td>';
        if ($_SESSION['gust'] != '') {
            echo $_SESSION['gust'];
        }
        else {
            echo '<b>?</b>';
        }
        echo '</td>
</tr>';

        echo '<tr>
<td>Ce aromă ai prefera sa aibă băutura?</td>
<td>';
        if ($_SESSION['aroma'] != '') {
            echo $_SESSION['aroma'];
        }
        else {
            echo '<b>?</b>';
        }
        echo '</td>
</tr>';

        echo '</tbody>
</table>';
    }

    echo '<p>&#160;</p>';

    echo '<table style="margin-left: auto; margin-right: auto;" border=1 frame=void rules=rows cellpadding="15">
<tbody>
<tr>
<th>Listele utilizatorului</th>
<th></th>
</tr>';
    include_once './hidden/preference-functions-hidden.php';
    include_once './hidden/lists-functions-hidden.php';

    $uid = getID($conn, $_SESSION['user']);
    echo getUserLists($conn, $uid);
    echo '</tbody></table>';
    ?>


    <p>&#160;</p>
</div>
<?php
// phpinfo();
include_once 'footer.php';
?>
</body>

</html>