<!DOCTYPE html>
<html>

<head>

    <title>Formular</title>
    <link rel="icon" type="image/x-icon" href="/assets/favicon.ico">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <meta charset="UTF-8">

</head>

<body>
<?php
include_once 'header.php';
?>
<div class="contentdesk">
    <div class="formbox2">
        <h3>Formular de preferinţe</h3>
        <form action="./hidden/index-hidden.php" method="post">
            <label for="acid"><p>1. Preferi băuturi acidulate?</p></label>
            <input name="acid" type="checkbox">
            <label for="natural"><p>2. Preferi băuturi naturale?</p></label>
            <input name="natural" type="checkbox">
            <label for="lowcal"><p>3. Preferi băuturi cu conţinut caloric scăzut?</p></label>
            <input name="lowcal" type="checkbox">
            <label for="milk"><p>4. Preferi băuturi fără lapte?</p></label>
            <input name="milk" type="checkbox">
            <label for="cofe"><p>5. Preferi băuturi fără cofeină?</p></label>
            <input name="cofe" type="checkbox">
            <label for="gust"><p>6. Ce gust ai prefera sa aibă băutura?</p></label>
            <div style="text-align: center;">
                <select name="gust" id="gust" multiple>
                    <option value="Dulce">Dulce</option>
                    <option value="Amar">Amar</option>
                    <option value="Acru">Acru</option>
                </select>
            </div>
            <label for="aroma"><p>7. Ce aromă ai prefera sa aibă băutura?</p></label>
            <input name="aroma" type="text" placeholder="Introdu aroma dorită">
            <div style="text-align: center;">
                <input name="submitForm" type="submit" value="Submit">
            </div>
            <?php
            if (isset($_SESSION['user'])) {
                echo '<input name="user" type="hidden" value="' . $_SESSION['user'] . '">';
            }
            ?>

        </form>
    </div>

    <p>&#160;</p>
</div>
<?php
include_once 'footer.php';
?>
</body>
</html>
