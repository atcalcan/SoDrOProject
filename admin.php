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

    <div>
</body>
<div class="contentdesk">
    <div class="formbox">
        <form action="./hidden/refresh-hidden.php" method="post">
            <input name="submit1" type="submit" value="Refresh">
        </form>
        <?php
        if ($_GET['error'] == "refresh") {
            echo file_get_contents("./files/retete.txt");
        } else {
            echo '
        
            <h3>Introducerea unei noi reţete în baza de date!</h3>
        <p style="text-align: center">Momentan, doar administratorul poate să introducă noi reţete, folosind formularul de mai jos:</p>
        <p>&#160;</p>
        <form action="./hidden/intro-hidden.php" method="post">
            <p>Care este numele reţetei?</p>
            <input name="nume" type="text" placeholder="Introdu numele reţetei">
            <p>Este reţeta vegetariană?</p>
            <input name="vegetarian" type="checkbox" value="1">
            <p>Este reţeta vegană?</p>
            <input name="vegan" type="checkbox" value="1">
            <p>Care este descrierea reţetei?</p>
            <input name="descriere" type="text" placeholder="Introdu descrierea reţetei">
            <p>Care sunt ingredientele?</p>
            <input name="string" type="text" placeholder="Introdu ingredientele din frigider, separate de o virgulă">
            <input name="submit" type="submit" value="Submit">
        </form>';
        }

        ?>
    </div>
</div>

</html>