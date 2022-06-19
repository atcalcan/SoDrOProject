<?php


$serverName = "localhost";
$dBUsername = "postgres";
$dBPassword = "postgres";
$dBName = "sodro";

$conn = pg_connect("host=$serverName dbname=$dBName user=$dBUsername password=$dBPassword")
or die('Could not connect: ' . pg_last_error());


