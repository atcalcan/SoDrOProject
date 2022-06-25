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
    <h3>SoDrO</h3>
    <table>
        <tbody>
        <tr><td colspan="2"><img class="sticla" src="./assets/logo.png" width="30%" alt="avatar"></td></tr>
        <tr><td></td></tr>
        <tr>
            <td width="30%">
                <div style="text-align: center;"><img class="sticla" src="./assets/avatar.svg" width="30%" alt="avatar">
                </div>
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
    </table>
    <?php
    include_once './hidden/dbh-hidden.php';
    include_once './hidden/functions-hidden.php';

    echo PopularityContest($conn);
    ?>

    <p>&#160;</p>
</div>

<div class="contentmob">
    <h3>Despre noi</h3>
    <p>&#160;</p>
    <div style="text-align: center;"><img class="sticla" src="./assets/avatar.svg" width="15%"></div>
    <p>&#160;</p>
    <p>Care este povestea noastră?</p>
    <p>Suntem doi tineri foarte pasionaţi de informatică, <i>în special</i> HTML şi CSS, care au ales un
        proiect la materia noastră preferată, <i>Tehnologii WEB</i>.</p>
    <p>Din fericire, acest proiect a atins o zonă foarte dragă nouă: <i>management-ul unei baze de
            date
            despre băuturi non-alcoolice</i> şi reprezentarea acestei funcţionalităţi într-o
        aplicaţie web.
        Evident, când am citit această cerinţă inedită, inspiraţia noastră a explodat în nenumărate
        idei.</p>
</div>
<?php
// phpinfo();
include_once 'footer.php';
?>
</body>

</html>