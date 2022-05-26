<?php

$user = 'root';
$pass = '';

try
{
    $db = new PDO ('mysql:host=localhost;dbname=twitch', $user, $pass);
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
}
catch (PDOException $e)
{
    print "Erreur :" . $e->getMessage() . "<br/>";
    die;
}