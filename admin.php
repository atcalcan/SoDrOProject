<!DOCTYPE html>
<html>

<head>
    <title>Admin Hub</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="./css/style.css">
</head>

<body>

<?php
include_once 'header.php';
?>

<div class="contentdesk">
    <div style="text-align: center;">
        <?php
        require_once './hidden/dbh-hidden.php';
        require_once './hidden/functions-hidden.php';

        echo '<h4>Număr de utilizatori: ' . numberOfUsers($conn) . ';</h4>';
        echo '<h4>Număr de produse: ' . numberOfProducts($conn) . ';</h4>';
        // TODO NUMAR USERI
        // TODO NUMAR PRODUSE
        // TODO
        ?>
    </div>
    <p>&#160;</p>
</div>


<?php
// phpinfo();
include_once 'footer.php';
?>
</body>
</html>