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
        <meta http-equiv="content-type" content="text/html;
        charset=utf-8" />
        <title>Twitch Analitics</title>
    </head>
    
    <body>
        <div>
        <?php foreach($streamers as $streamer): ?>  

            <div>
                <img src="images_streamers\<?= $streamer["id"]?>.jpg", alt=<?= $streamer["name"] ?>, width="200", height="200">
                <p><?php echo $streamer["id"]?> - <a href="page_détail/detail.php?id=<?= $streamer["id"] ?>"><?php echo $streamer["name"]?></a></p>
            </div>

        <?php endforeach; ?>
        </div>
        <p><a href="page_compare/compare.php">Comparaison</a></p>
    </body>

</html>