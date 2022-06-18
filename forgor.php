<!DOCTYPE html>
<html>

<head>
    <title>Forgot my password</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="./css/intro.css">
    <link rel="stylesheet" type="text/css" href="./css/style.css">
</head>

<body>
<?php
include_once 'header.php';
?>
<div class="forgorbox">
    <img src="./assets/avatar.svg" class="avatar" alt="avatar">
    <h1>Recuperare parolă</h1>
    <form>
        <p>Adresă de email</p>
        <input type="email" placeholder="Introdu adresa de email">

        <input type="submit" value="Trimite mail de recuperare">

        <div>
            <a href="./login.php">Autentificare</a>
        </div>
    </form>

</div>
<?php
// phpinfo();
include_once 'footer.php';
?>
</body>

</html>