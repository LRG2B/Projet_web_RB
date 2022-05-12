<?php
 // ~/php/tp1/public/cities.php
 // include model
include __DIR__ . '/../database/db.php';

 include __DIR__ . '/../model/cities.php';
 if(!key_exists('name', $_GET)) {
    page_not_found();
 }
 $country = $_GET['name'];

$cities = modelFetchAll($dbh);

 if(!do_country_exists($country, $cities)) {
    page_not_found();
 }

 $citiesFromCountry = []; // Will be used to contain all our countries
 foreach($cities as $city) {
     if( $city['country'] === $country ) { // Check if country does not already exists in array
         array_push($citiesFromCountry, $city);
     }
 }

 // include view
 include __DIR__ . '/../view/country.php';

 function page_not_found()
{
    header("HTTP/1.0 404 Not Found"); //On définit la page comme étant une page 404 au sein de l’entête
    include __DIR__ . '/../view/404.html'; // On ajoute la vue de la page 404
    die(); // arrête l’exécution du script
}

/**
 * Check whenever country exists in the array
 */
function do_country_exists($name, $cities) {
    $result = false; // initialize result to false ==> Should stay that way if no country found
    foreach($cities as $city) {
        if( $city['country'] === $name ) { // Check if country does not already exists in array
            $result = true;
        }
    }

    return $result;
}