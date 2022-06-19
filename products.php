<!DOCTYPE html>
<html>

<head>
    <title>Lista produselor</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="./css/style.css">
</head>

<body>

<?php
include_once 'header.php';
?>
<div class="contentdesk">
    <div class="formbox">
        <?php
        require_once './hidden/dbh-hidden.php';
        require_once './hidden/functions-hidden.php';

        echo allProducts($conn);

        // $s = oci_parse($conn, "select retete.nume, retete.vegetarian, retete.vegan, retete.descriere, ingrediente.nume, ingrediente.cantitate from retete join ingrediente on retete.id=ingrediente.id group by retete.id, retete.nume");

        // $lista = '';

        // $stmt = oci_parse($conn, "BEGIN afiseaza_retete(); END;");

        // oci_bind_by_name($stmt, ':MSG', , 2000);

        // oci_execute($stmt);

        // $message is now populated with the output value
        // echo $lista;
        ?>
    </div>

</div>
<?php
// phpinfo();
include_once 'footer.php';
?>

</body>

</html>