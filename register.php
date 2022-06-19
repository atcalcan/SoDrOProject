<!DOCTYPE html>
<html>

<head>
    <title>Register</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="./css/intro.css">
    <!--    <link rel="stylesheet" type="text/css" href="./css/style.css">-->
</head>

<body>
<?php
include_once 'header.php';
?>
<div class="registerbox">
    <img src="./assets/avatar.svg" class="avatar" alt="avatar">
    <h1>Înregistrare</h1>
    <form action="hidden/register-hidden.php" method="post">
        <p>Adresă de email</p>
        <input type="email" name="email" placeholder="Introdu adresa de email">
        <p>Nume de utilizator</p>
        <input type="text" name="user" placeholder="Introdu numele de utilizator">
        <p>Parolă</p>
        <input type="password" name="pwd" placeholder="Introdu parola">
        <input type="password" name="pwd_rpt" placeholder="Repetă parola">

        <input type="submit" name="submit" value="Înregistrează-te">
        <?php
        if (isset($_GET["error"])) {
            if ($_GET["error"] == "emptyinput") {
                echo '<p style="color:red; text-align: center; font-size: 80%">Te rog introdu toate datele.</p>';
            }
            if ($_GET["error"] == "invalidemail") {
                echo '<p style="color:red; text-align: center; font-size: 80%">Adresa de mail nu este validă.</p>';
            }
            if ($_GET["error"] == "invaliduser") {
                echo '<p style="color:red; text-align: center; font-size: 70%">Numele de utilizator trebuie să conţină doar litere şi cifre.</p>';
            }
            if ($_GET["error"] == "invalidpwd") {
                echo '<p style="color:red; text-align: center; font-size: 80%">Parola trebuie să se repete identic.</p>';
            }
            if ($_GET["error"] == "repeatedusername") {
                echo '<p style="color:red; text-align: center; font-size: 80%">Numele de utilizator există deja.</p>';
            }
            if ($_GET["error"] == "none") {
                echo '<p style="color:#85dbfe; text-align: center; font-size: 80%">Te-ai înregistrat cu succes!</p>';
            }
        }
        ?>
        <div>
            <a href="./login.php">Autentificare</a><br/>
            <a href="./forgor.php">Ai uitat parola?</a>
        </div>
    </form>


</div>

<?php
// phpinfo();
include_once 'footer.php';
?>
</body>

</html>