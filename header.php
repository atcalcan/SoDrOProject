<?php
session_start();
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <!-- <link rel="stylesheet" type="text/css" href="./css/intro.css"> -->
    <link rel="stylesheet" type="text/css" href="./css/header.css">
</head>
<nav>
    <div class="headerdesk">
        <div class="logo_header">
            <img src="./assets/logo.png" height="100px">
        </div>
        <div class="inner_header">
            <ul class="navigation">
                <li><a href="./index.php">
                    Formular
                </a></li>
                <li><a href="./products.php">
                    Lista produselor
                </a></li>
                <li><a href="./about_us.php">
                    Despre noi
                </a></li>
                <?php
                if (isset($_SESSION['user'])) {
                    echo '<li><a href="./profile.php">
                        Profil
                    </a></li>';
                    if ($_SESSION['user'] == 'admin') {
                        echo '<li><a href="./admin.php">
                        Admin Hub
                    </a></li>';
                    }
                    echo '<li><a href="./wishlist.php">
                        Wishlist
                    </a></li>';
                    echo '<li><a href="./hidden/logout.php">
                        Log Out
                    </a></li>';
                } else {
                    echo '<li><a href="./login.php">
                        Autentificare
                    </a></li>';
                    echo '<li><a href="./register.php">
                        Înregistrare
                    </a></li>';
                }
                ?>


            </ul>
        </div>
    </div>
</nav>
<nav>
    <div class="headermob">
        <div class="logo_header">
            <img src="./assets/logo.png" height="100px">
        </div>
        <div class="inner_header">
            <input type="checkbox" id="check">
            <label for="check" class="checkbtn">
                &#9660;
            </label>
        <ul class="navigation">
            <li><a href="./index.php">
                Formular
            </a></li>
            <li><a href="./products.php">
                Lista produselor
            </a></li>
            <li><a href="./about_us.php">
                Despre noi
            </a></li>
            <?php
            if (isset($_SESSION['user'])) {
                echo '<li><a class="active" href="./profile.php">
                        Profil
                    </a></li>';
                if ($_SESSION['user'] == 'admin') {
                    echo '<li><a href="./admin.php">
                        Admin Hub
                    </a></li>';
                }
                echo '<li><a href="./wishlist.php">
                        Wishlist
                    </a></li>';
                echo '<li><a href="./hidden/logout.php">
                        Log Out
                    </a></li>';
            } else {
                echo '<li><a href="./login.php">
                        Autentificare
                    </li></a>';
                echo '<li><a href="./register.php">
                        Înregistrare
                    </a></li>';
            }
            ?>
        </ul>
        </div>
    </div>
</nav>