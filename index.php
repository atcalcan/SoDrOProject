<!DOCTYPE html>
<html>

<head>
    <title>Main page</title>
    <meta charset="UTF-8">
   <?php
    echo '<link rel="stylesheet" type="text/css" href="css/style.css">';

    ?>
    </head>

<body>
    <?php
    // phpinfo();
    include_once 'header.php';
    ?>
    <div class="contentdesk">
        <div class="formbox">
        <h3>Formular de preferinţe</h3>
        <form action="./hidden/index-hidden.php" method="post">
                <p>1. Preferi b&#259;uturi acidulate?</p>
                <input name="acid" type="checkbox">
                <p>2. Preferi băuturi naturale?</p>
                <input name="natural" type="checkbox">
                <p>3. Preferi băuturi cu conţinut caloric scăzut?</p>
                <input name="lowcal" type="checkbox">
                <p>4. Preferi băuturi care conţin lapte?</p>
                <input name="milk" type="checkbox">
                <p>5. Preferi băuturi cu cofeină?</p>
                <input name="cofe" type="checkbox">
                <p>6. Ce gust ai prefera sa aibă băutura?</p>
                <div style="text-align: center;">
                    <select name="gust" id="gust" multiple>
                        <option value="dulce">Dulce</option>
                        <option value="amar">Amar</option>
                        <option value="acru">Acru</option>
                    </select>
                </div>
                <p>7. Ce aromă ai prefera sa aibă băutura?</p>
                <input name="aroma" type="text" placeholder="Introdu aroma dorită">
            <div style="text-align: center;">
                <input name="submit" type="submit" value="Submit">
            </div>
            </form>
        </div>
    </div>
</body>

</html>