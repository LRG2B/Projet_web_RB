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
        <link rel="stylesheet" href="./détail_style.css">
        <meta http-equiv="content-type" content="text/html;
            charset=utf-8" />
        <title><?php echo $streamer["name"]?> - Twitch track</title>
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Catamaran:wght@100&family=Cormorant+Garamond:ital,wght@0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap');
            @import url('https://fonts.googleapis.com/css2?family=Audiowide&family=Fira+Mono:wght@500&display=swap');
        </style>

    <body>
    
        <header>
            <img src="../images_streamers/logo.png" alt="logo twitch track">
            <div id="elem_header">
                <h3><a class="header_text" href="../index.php">Accueil</a></h3>
                <h3><a class="header_text" href="../page_compare/compare.php">Comparaison</a></h3>
            </div>
        </header>


        <article id="illustration">
            <img src="../images_streamers/illustration.png" alt="illustration site">
        </article>


        <article id="image_streamer">
        <div>
            <img src="..\images_streamers\<?= $streamer["id"]?>.jpg", alt=<?= $streamer["name"] ?>>
            <h1><?php echo $streamer["name"]?></h1>
        </div>

        <div id="info_princ">
            <p>Rank : <?php echo $streamer_stats["rank"]?></h1>
            <p>Followers : <?php echo $streamer_stats["followers"]?></h1>
        </div>
        </article>


        <article id="information">
            <div id="text">
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

            </div>
            <div id="graph">
                <img src="../images_streamers/stonks-meme.jpg" alt="Graphique évolution streamer">
            </div>
        </article>


        <article id="retour">
        <p><a href="../index.php">Retour</a></p>
        </article>


        <footer>
            <img src="../images_streamers/Logo-LRG2B-Officiel-sliced.png" alt="Logo LRG²B">
            <p>Lien GitHub : <a href="https://github.com/LRG2B">ici</a></p>
        </footer>
    </body>
</html>