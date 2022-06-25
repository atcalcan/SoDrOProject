<!DOCTYPE html>
<html>

<head>
    <title>Homepage</title>
    <meta charset="UTF-8">
    <link rel="icon" type="image/x-icon" href="./assets/favicon.ico">
    <link rel="stylesheet" type="text/css" href="./css/style.css">
</head>

<body>

<?php
include_once 'header.php';
?>
<div class="contentdesk">
    <table>
        <tbody>
        <tr>
            <td colspan="2"><img class="sticla" src="./assets/logo.png" width="30%" alt="avatar"></td>
        </tr>

            <td width="50%">
<ul>
    <li><p>O gamă extinsă de băuturi non-alcolice și informații detaliate despre acestea</p></li>
    <li><p>Un formular pentru găsirea băuturii potrivite bazat pe un set de parametri</p></li>
    <li><p>Gestionarea băuturilor în diferite liste și printr-un sistem de "whishlist"</p></li>
    <li><p>Descărcarea listelor și whishlistului în format .csv</p></li>
    <li><p>Statistici despre popularitatea băuturilor</p></li></ul>
            </td><td><h2>Ce oferă Soft Drinks Organizer?</h2></td>
        </tr>
        <tr>
            <td width="50%">
                <h2>Cine suntem noi?</h2>
            </td>
            <td>

                <p>Care este povestea noastră?</p>
                <p>Suntem doi tineri foarte pasionaţi de informatică, <i>în special</i> HTML şi CSS, care au
                    ales un
                    proiect la materia noastră preferată, <i>Tehnologii WEB</i>.</p>
                <p>Din fericire, acest proiect a atins o zonă foarte dragă nouă: <i>management-ul unei baze de
                        date
                        despre băuturi non-alcoolice</i> şi reprezentarea acestei funcţionalităţi într-o
                    aplicaţie web.
                    Evident, când am citit această cerinţă inedită, inspiraţia noastră a explodat în nenumărate
                    idei.</p>

            </td>
        </tr>
        </tbody>
    </table><p>&#160;</p>
    <?php
    include_once './hidden/dbh-hidden.php';
    include_once './hidden/functions-hidden.php';

    echo PopularityContest($conn);
    ?>

    <p>&#160;</p>
</div>

<div class="contentmob">

</div>
<?php
// phpinfo();
include_once 'footer.php';
?>
</body>

</html>