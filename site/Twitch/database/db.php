<?php
try {
    $host = '127.0.0.1'; // Addresse de la base de données
    $name = 'twitch'; // Nom de la base de donnée
    $user = 'root'; // Utilisateur de la base de données
    $pass = ''; // Mot de passe de la base de données
    $port = '3306';
    $dbh = new PDO("mysql:host=$host;port=$port;dbname=$name", $user, $pass); // Initialisation de la connexion à la base de donnée
} catch(PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br>"; // Affichage du message d'erreur
    die(); // Arrêt du script
}