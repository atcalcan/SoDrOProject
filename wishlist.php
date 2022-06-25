<?php
//session_start();
//
?>

<!DOCTYPE html>
<html>

<head>
    <title>Wishlist</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="./css/style.css">
    <link rel="icon" type="image/x-icon" href="./assets/favicon.ico">
</head>

<body>
<?php
include_once 'header.php';
?>
<div class="contentdesk">
    <div class="formbox">
        <h3>Wishlistul lui <?php echo $_SESSION['user']; ?></h3>

        <table style="width: 30%; margin-left: auto; margin-right: auto;">
            <tbody>
            <tr>
                <td>
                    <div class="formbox2">
                        <form action="./hidden/download-database.php" method="post">
                            <input type="submit" value="Download as CSV &#11015;" name="Download"/>
                            <input type="hidden" name="uid" value="<?php
                            require_once './hidden/dbh-hidden.php';
                            require_once './hidden/functions-hidden.php';
                            require_once './hidden/preference-functions-hidden.php';
                            echo getID($conn, $_SESSION['user']);
                            ?>">


                        </form>
                    </div>
                </td>
            </tr>
            </tbody>
        </table>

        <?php

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