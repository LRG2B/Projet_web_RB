<?php
 // ~/php/tp1/public/cities.php
// include db
include __DIR__ . '/../database/db.php';
// include model
include __DIR__ . '/../model/cities.php';
try { // on utilise un try catch pour renvoyer vers une erreur si la requête n'a pas fonctionné
    $city = [
        'name' => $_POST['name'],
        'country' => $_POST['country'],
        'life' => $_POST['life']
    ];
    $result = modelCreateCity($dbh, $city);
} catch (Exception $e) {
    fail($city); // On renvoie la city acutelle au template
}

if(!$result) {
 fail($city); // On renvoie la city acutelle au template
}

$cities = modelFetchAll($dbh);
$flash = "New city has been sucessfully created";

// include view
include __DIR__ . '/../view/cities.php';

function fail($city) {
    $error = true;
    include __DIR__ . '/../view/createCity.php';
    die();
}