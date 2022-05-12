<?php
 // ~/php/tp1/public/cities.php
 // include model
include __DIR__ . '/../database/db.php';

 include __DIR__ . '/../model/cities.php';
$cities = modelFetchAll($dbh);

 $countries = []; // Will be used to contain all our countries
 foreach($cities as $city) {
     if(!in_array($city['country'], $countries)) { // Check if country does not already exists in array
         array_push($countries, $city['country']);
     }
 }

 // include view
 include __DIR__ . '/../view/countries.php';