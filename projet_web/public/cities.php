<?php
 // ~/php/tp1/public/cities.php

 // include db
 include __DIR__ . '/../database/db.php';
 // include model
 include __DIR__ . '/../model/cities.php';

$cities = modelFetchAll($dbh);

// include view
 include __DIR__ . '/../view/cities.php';