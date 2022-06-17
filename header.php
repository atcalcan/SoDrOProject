<?php
session_start();
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <!-- <link rel="stylesheet" type="text/css" href="./css/intro.css"> -->
    <link rel="stylesheet" type="text/css" href="./css/style.css">
</head>
<nav>
    <div class="headerdesk">
        <div class="logo_header">
            <img src="./assets/logo.png" height="100px">
        </div>
        <div class="inner_header">
            <ul class="navigation">
                <a href="./index.php">
                    <li>Formular</li>
                </a>
                <a href="./products.php">
                    <li>Lista produselor</li>
                </a>
                <a href="./about_us.php">
                    <li>Despre noi</li>
                </a>
                <?php
                if (isset($_SESSION['user'])) {
                    echo '<a href="./profile.php">
                        <li>Profil</li>
                    </a>';
                    if ($_SESSION['user'] == 'admin') {
                        echo '<a href="./admin.php">
                        <li>Admin Hub</li>
                    </a>';
                    }
                    echo '<a href="./hidden/logout.php">
                        <li>Log Out</li>
                    </a>';
                } else {
                    echo '<a href="./login.php">
                        <li>Autentificare</li>
                    </a>';
                    echo '<a href="./register.php">
                        <li>Înregistrare</li>
                    </a>';
                }
                ?>


            </ul>
        </div>
    </div>
</nav>