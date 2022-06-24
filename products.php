<?php
//session_start();
//
?>

<!DOCTYPE html>
<html>

<head>
    <title>Lista produselor</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="./css/style.css">
</head>

<body>

<?php
include_once 'header.php';
?>
<div class="contentdesk">
    <div class="formbox">
        <h3>Lista produselor</h3>
        <?php
        require_once './hidden/dbh-hidden.php';
        require_once './hidden/functions-hidden.php';

        if (isset($_SESSION['acid']) | isset($_SESSION['natural']) | isset($_SESSION['lowcal']) | isset($_SESSION['milk']) | isset($_SESSION['cofe']) | isset($_SESSION['gust']) | isset($_SESSION['aroma'])) {
//            echo '<p>'. $_SESSION['acid'] . ' ' . $_SESSION['natural'] . ' ' . $_SESSION['lowcal'] . ' ' . $_SESSION['milk'] . ' ' . $_SESSION['cofe'] . ' ' . $_SESSION['gust'] . ' ' . $_SESSION['aroma'] . '</p>';
            echo selectedProductsDesk($conn, $_SESSION['acid'], $_SESSION['natural'], $_SESSION['lowcal'], $_SESSION['milk'], $_SESSION['cofe'], $_SESSION['gust'], $_SESSION['aroma'], $_SESSION['user']);
        }
        else {
            echo allProductsDesk($conn, $_SESSION['user']);
        }
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