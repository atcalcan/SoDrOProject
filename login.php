<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <meta charset="UTF-8">
    <link rel="icon" type="image/x-icon" href="./assets/favicon.ico">
    <link rel="stylesheet" type="text/css" href="./css/intro.css">
    <!--     <link rel="stylesheet" type="text/css" href="./css/style.css">-->
</head>

<body>
<?php
include_once 'header.php';
?>
<div class="loginbox">
    <img src="./assets/avatar.svg" class="avatar" alt="avatar">
    <h1>Autentificare</h1>
    <div class="formbox">
        <form action="./hidden/login-hidden.php" method="post">
            <label for="user"><p>Nume de utilizator</p></label>
            <input type="text" name="user" placeholder="Introdu numele de utilizator">
            <label for="pwd"><p>Parolă</p></label>
            <input type="password" name="pwd" placeholder="Introdu parola">
            <input type="submit" name="submit" value="Autentifică-te">
            <?php
            if (isset($_GET["error"])) {
                if ($_GET["error"] == "emptyinput") {
                    echo '<p style="color:red; text-align: center; font-size: 80%">Te rog introdu toate datele.</p>';
                }
                if ($_GET["error"] == "invaliduser") {
                    echo '<p style="color:red; text-align: center; font-size: 70%">Numele de utilizator trebuie să conţină doar litere şi cifre.</p>';
                }
                if ($_GET["error"] == "notfound") {
                    echo '<p style="color:red; text-align: center; font-size: 80%">Numele de utilizator sau parola sunt greșite.</p>';
                }
                if ($_GET["error"] == "none") {
                    echo '<p style="color:red; text-align: center; font-size: 80%">Te-ai înregistrat cu succes!</p>';
                }
            }
            ?>

            <div>
                <a href="./register.php">Înregistrare</a><br/>
                <a href="./forgor.php">Ai uitat parola?</a>

            </div>
        </form>
    </div>
</div>

<?php
// phpinfo();
include_once 'footer.php';
?>
</body>

</html>