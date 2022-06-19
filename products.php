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
        <?php
        require_once './hidden/dbh-hidden.php';
        require_once './hidden/functions-hidden.php';

        echo allProducts($conn);
        ?>
    </div>

</div>
<?php
// phpinfo();
include_once 'footer.php';
?>

</body>

</html>