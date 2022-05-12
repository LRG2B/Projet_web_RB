<?php
 // ~/php/tp1/public/cities.php

 // include db
 include __DIR__ . '/../database/db.php';
 // include model
 include __DIR__ . '/../model/cities.php';

if(!key_exists('search', $_GET)) { // On vérfie si la référence est bien passée
    page_not_found();
}

$search = $_GET['search'];
$cities = modelSearchByName($dbh, $search);

 // include view
include __DIR__ . '/../view/cities.php';

function page_not_found()
{
    header("HTTP/1.0 404 Not Found"); //On définit la page comme étant une page 404 au sein de l’entête
    include __DIR__ . '/../view/404.html'; // On ajoute la vue de la page 404
    die(); // arrête l’exécution du script
}