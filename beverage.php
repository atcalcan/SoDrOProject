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
        $row = getProductByID($conn, $prId);
        echo '<h3>' . $row["nume_produs"] . '</h3>';
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