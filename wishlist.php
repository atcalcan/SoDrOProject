<?php
//session_start();
//
?>

<!DOCTYPE html>
<html>

<head>
    <title>Wishlist</title>
    <meta charset="UTF-8">
    <link rel="icon" type="image/x-icon" href="./assets/favicon.ico">
    <link rel="stylesheet" type="text/css" href="./css/style.css">
</head>

<body>

<?php
include_once 'header.php';
?>
<div class="contentdesk">
    <div class="formbox">
        <h3>Wishlistul lui <?php echo $_SESSION['user']; ?></h3>
        <?php
        require_once './hidden/dbh-hidden.php';
        require_once './hidden/functions-hidden.php';

        echo allWishlistDesk($conn, $_SESSION['user']);
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