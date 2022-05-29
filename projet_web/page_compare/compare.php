<?php

$sql_streamers = "SELECT * FROM streamers ";
$sql_streamers_stats = "SELECT streamer , MAX(date), minutes_streamed, rank, avg_viewers, max_viewers, hours_watched, followers, views, followers_total, views_total 
                        FROM `streamers-stats` 
                        GROUP BY streamer;";


require_once "../connect.php"; //On se connecte à la base

$requete_streamer = $db->prepare($sql_streamers); //On prépare la requête
$requete_streamer_stats = $db->prepare($sql_streamers_stats);

$requete_streamer->execute(); //On execute la requête
$requete_streamer_stats->execute();

$streamers = $requete_streamer->fetch(); //On récupère les données
$streamer_stats = $requete_streamer_stats->fetch();

function GetNameById($id,$streamer) {
    foreach ($streamer as $data) {
        if($data["id"] == $id) {
            return $data['name'] ;
        }
}
}


?>



<!DOCTYPE HTML>
<html>
<head>
        <link rel="stylesheet" href="./compare_style.css">
        <meta http-equiv="content-type" content="text/html;
            charset=utf-8" />
        <title>Twitch track</title>
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


        <article id="streamers">
        <?php foreach($streamer_stats as $streamer): ?>  

            <div id="detail_streamer">
                <a href="page_détail/detail.php?id=<?= $streamer["streamer"] ?>"> <?php echo GetNameById($streamer["streamer"], $streamers)?> </a>
            </div>

        <?php endforeach; ?>
        </article>

        
    </body>

</html>