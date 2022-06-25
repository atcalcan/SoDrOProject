<?php

function getProductImageLink($startLink)
{
    $content = file_get_contents($startLink);
    $content = strip_tags($content, "<img>");
    $trial = strchr($content, '/images/products/');
    $trial1 = strtok($trial, '"');
    $trial1 = 'https://world.openfoodfacts.org' . $trial1;
    return str_replace("200.jpg", "full.jpg", $trial1);
}


function getProductIngredients($startLink)
{
    $content = file_get_contents($startLink);
    $content = strip_tags($content, "<table>, <thead>, <td>, <th>, <caption>, <span>, <tr>");
    $trial = strchr($content, '<table id=');
    $trial = str_replace("Packaging", "`", $trial);
    $trial = str_replace("&#215;", "`", $trial);
    $trial = str_replace("image/svg+xml", "`", $trial);
    $trial1 = strtok($trial, '`');
    return $trial1;
    //    return str_replace("200.jpg","full.jpg",$trial1);
}


function getNova($startLink)
{
    $content = file_get_contents($startLink);
    $content = strip_tags($content, "<img>");
    $trial = strchr($content, '/attributes/nova-group');
    $trial1 = strtok($trial, '"');
    $trial1 = 'https://static.openfoodfacts.org/images/' . $trial1;
    return $trial1;
    //    return str_replace("200.jpg","full.jpg",$trial1);
}


function getNutriscore($startLink)
{
    $content = file_get_contents($startLink);
    $content = strip_tags($content, "<img>");
    $trial = strchr($content, '/attributes/nutriscore');
    $trial1 = strtok($trial, '"');
    $trial1 = 'https://static.openfoodfacts.org/images/' . $trial1;
    return $trial1;
    //    return str_replace("200.jpg","full.jpg",$trial1);
}