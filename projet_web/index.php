<?php

require_once "connect.php"; //On se connecte à la base
$sql_streamers = "SELECT * FROM streamers"; //On définit une requête
$requete = $db->query($sql_streamers); //On exécute la requête
$streamers = $requete->fetchAll(); //On récupère les données

?>


<!DOCTYPE HTML>
<html>
    <head>
        <link rel="stylesheet" href="./page_index/index_style.css">
        <meta http-equiv="content-type" content="text/html" charset="utf-8" />
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Catamaran:wght@100&family=Cormorant+Garamond:ital,wght@0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap');
            @import url('https://fonts.googleapis.com/css2?family=Audiowide&family=Fira+Mono:wght@500&display=swap');
        </style>
        <title>Twitch track</title>

        <header>
            <img src="./images_streamers/logo.png" alt="logo twitch track">
            <div id="elem_header">
                <h3><a class="header_text" href="index.php">Accueil</a></h3>
                <h3><a class="header_text" href="./page_compare/compare.php">Comparaison</a></h3>
            </div>
        </header>

        <section id="illustration">
            <img src="./images_streamers/Twitch_Track_illustration.png" alt="illustration site">
        </section>

        <section id="text">
            <h1 id="text_desc">Voici Twitch Track un trakeur qui vous propose les fonctionnalité suivante : </h1>
            <li class="text_desc_puce">Voir les statistique des meilleurs streamer Français</li>
            <li class="text_desc_puce">Comparer les meilleurs streamer Français</li>
            <div id="citation"><h1><i>“ Le meilleur Trackeur Twitch ”</i> &emsp;&emsp; Par LRG²B (en gros nous-même)</h1></div>
            
            <p id="text_list">
                Liste des Streamers :
            </p>
        </section>


        <section id="streamers">
        <?php foreach($streamers as $streamer): ?>  

            <article id="detail_streamer">
                <a href="page_détail/detail.php?id=<?= $streamer["id"] ?>"><img src="images_streamers\<?= $streamer["id"]?>.jpg", alt=<?= $streamer["name"] ?>></a>
                <p><?php echo $streamer["name"]?></p>
            </article>

        <?php endforeach; ?>
        </section>
      
        <footer>
            <img src="./images_streamers/Logo-LRG2B-Officiel-sliced.png" alt="Logo LRG²B">
            <p>Lien GitHub : <a href="https://github.com/LRG2B">ici</a></p>
        </footer>
    </body>
</html>