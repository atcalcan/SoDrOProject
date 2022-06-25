<!DOCTYPE html>
<html>

<head>
    <title><?php
        if (isset($_GET["id"])) {
            $liId = $_GET["id"];
            require_once './hidden/dbh-hidden.php';
            require_once './hidden/lists-functions-hidden.php';
            $row = getList($conn, $liId);
            echo $row["list_name"];
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
    $liId = $_GET["id"];
    require_once './hidden/dbh-hidden.php';
    require_once './hidden/lists-functions-hidden.php';
    $row = getList($conn, $liId);
    echo '<h2>' . $row["list_name"] . '</h2>';

    // TODO DOWNLOAD STERGERE

    echo allListDesk($conn, $_SESSION['user'], $row["list_id"]);

    echo '<p>&#160;</p>';


}
?>
</div>
</body>
</html>
