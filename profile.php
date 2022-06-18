<!DOCTYPE html>
<html>

<head>
    <title>Profile</title>
    <meta charset="UTF-8">
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

    echo '<table style="margin-left: auto; margin-right: auto;">
<tbody>
<tr>
<td width="30%">';
    // Profile Pic
    echo '<div style=" text-align: center;"><img style="border-radius: 50%;" class="profile" src="https://www.ssrl-uark.com/wp-content/uploads/2014/06/no-profile-image.png" width="100px" alt="profile"></div>';
    echo '</td>
<td>
<table style="margin-left: auto; margin-right: auto;" width="100%">
<tbody>
<tr>
<td>';
    echo '<p style="text-indent: 0"><b>Nume de utilizator: ' . $_SESSION['user'] . '</b></p>';
    echo '</td>
</tr>
<tr>
<td>';
    echo '<p style="text-indent: 0">Email: ' . getEmail($conn, $_SESSION['user']) . '</p>';
    echo '</td>
</tr>
</tbody>
</table>
</td>
</tr>
<tr>
<td colspan="2">';
    echo '<div class="formbox">
<form action="./hidden/profileHidden.php" method="post">
            <div style="text-align: center;">';
    echo '<div><input name="changeEmail" type="submit" value="Schimă emailul"></div>';
    echo '<div><input name="changePwd" type="submit" value="Schimă parola"></div>';
    echo '</div>
        </form></div>';
    echo '</td>
</tr>
</tbody>
</table>';

    ?>
</div>
<?php
// phpinfo();
include_once 'footer.php';
?>
</body>

</html>