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

        ?>

        <table style="width: 30%; margin-left: auto; margin-right: auto;">
            <tbody>
            <tr>
                <td>
                    <div class="formbox2">
                        <form action="./hidden/download-list.php" method="post">
                            <input type="submit" value="Download as CSV &#11015;" name="Download"/>
                            <input type="hidden" name="listId" value="<?php
                            require_once './hidden/dbh-hidden.php';
                            require_once './hidden/functions-hidden.php';
                            require_once './hidden/preference-functions-hidden.php';
                            echo $row['list_id'];
                            ?>">


                        </form>
                    </div>
                </td>
            </tr>
            </tbody>
        </table>

        <?php

        echo allListDesk($conn, $_SESSION['user'], $row["list_id"]);

        echo '<p>&#160;</p>';


    }
    ?>
</div>
</body>
</html>
