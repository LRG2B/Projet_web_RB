<?php

$user = 'root';
$pass = '';

try
{
    $db = new PDO ('mysql:host=localhost;dbname=twitch', $user, $pass);
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    // foreach ($db->query('SELECT * FROM streamers') as $row)
    // {
    //     print_r($row);
    // }
}
catch (PDOException $e)
{
    print "Erreur :" . $e->getMessage() . "<br/>";
    die;
}

?>