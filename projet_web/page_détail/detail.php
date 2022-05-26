<?php

if (!isset($_GET["id"]) || empty($_GET["id"])) //On vérifie si on a un id
{
    header("Location: index.php"); // Non, on redirige
}

$id = $_GET["id"]; //On récupère l'id

$sql_streamers = "SELECT * FROM streamers WHERE id = :id";
$sql_streamers_stats = "SELECT * FROM `streamers-stats` WHERE streamer = :id";


require_once "../connect.php"; //On se connecte à la base

$requete_streamer = $db->prepare($sql_streamers); //On prépare la requête
$requete_streamer_stats = $db->prepare($sql_streamers_stats);

$requete_streamer->bindValue(":id", $id, PDO::PARAM_INT); //On vérifie que l'ID soit un entier
$requete_streamer_stats->bindValue(":id", $id, PDO::PARAM_INT);

$requete_streamer->execute(); //On execute la requête
$requete_streamer_stats->execute();

$streamer = $requete_streamer->fetch(); //On récupère les données
$streamer_stats = $requete_streamer_stats->fetch();


if (!$streamer) //Si l'id ne renvoit aucun streamer
{
    http_response_code(404);
    echo "Streamer introuvable";
    exit;
}

?>

<!DOCTYPE HTML>
<html>
    <head>
        <link rel="stylesheet" href="détail_style.css">
        <meta http-equiv="content-type" content="text/html;
            charset=utf-8" />
        <title><?php echo $streamer["name"]?> - Twitch Analitics</title>
    </head>
    <body>
        <h1><?php echo $streamer["name"]?></h1>

        <p>Rank : <?php echo $streamer_stats["rank"]?></h1>
        <p>Date : <?php echo $streamer_stats["date"]?></h1>
        <p>Minutes streamed : <?php echo $streamer_stats["minutes_streamed"]?></h1>
        <p>Average viewers : <?php echo $streamer_stats["avg_viewers"]?></h1>
        <p>Maximum viewers : <?php echo $streamer_stats["max_viewers"]?></h1>
        <p>Hours watched : <?php echo $streamer_stats["hours_watched"]?></h1>
        <p>Followers : <?php echo $streamer_stats["followers"]?></h1>
        <p>Views : <?php echo $streamer_stats["views"]?></h1>
        <p>Total followers : <?php echo $streamer_stats["followers_total"]?></h1>
        <p>Total views : <?php echo $streamer_stats["views_total"]?></h1>

        <p><a href="../index.php">Retour</a></p>
    </body>
</html>