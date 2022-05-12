<?php
 // ~/php/tp1/model/cities.php
function modelSearchByName($dbh, $searchString) {
    $query = $dbh->prepare('SELECT c.name, c.country, c.life FROM city c WHERE c.name like :search ORDER BY c.name'); // Création de la requête + utilisation order by pour ne pas utiliser sort
    $query->execute([':search' => '%' . $searchString .  '%']); // Exécution de la requête
    return $query->fetchAll(\PDO::FETCH_ASSOC);
}
// On utilise use pour ajouter $dbh à notre fonction
function modelFetchAll($dbh) { // Transformation en function pour une création de requête et utilisation plus facile et explicite
    // On passe $dbh en paramètre pour que la fonction ai accès à la connexion sql
    $query = $dbh->prepare('SELECT c.name, c.country, c.life FROM city c ORDER BY c.name'); // Création de la requête + utilisation order by pour ne pas utiliser sort
    $query->execute(); // Exécution de la requête
    return $query->fetchAll(\PDO::FETCH_ASSOC);
}

function modelCreateCity($dbh, $city) {
        $query = $dbh->prepare('INSERT INTO city (name, country, life) VALUES (:name, :country, :life)'); // Création de la requête + utilisation order by pour ne pas utiliser sort
        return $query->execute([
            ':name' => $city['name'],
            ':country'=> $city['country'],
            ':life' => $city['life']
        ]);
     // Exécution de la requête
}

 // Récupération des informations de la requête
// PDO::FETCH_ASSOC sert ici à déterminer comment renvoyer le résultat, ici on demande seulement le tableau associatif. Nous aurions très bien pu demander un objet ou encore un simple tableau
