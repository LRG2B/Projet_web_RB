<?php

require_once "../connect.php";
$sql_streamers = "SELECT * FROM streamers";
$requete = $db->query($sql_streamers);
$streamers = $requete->fetchAll();

?>

<!DOCTYPE HTML>
<html>
    <head>
        <link rel="stylesheet" href="compare_style.css">
        <meta http-equiv="content-type" content="text/html;charset=utf-8" />
        <title>COMPARE - Twitch Analitics</title>
    </head>
    
    <body>
        <form action="" method="POST">
            <p>Nombre de streamer à comparer</p>
            <select name="nb_streamer">
                <option disabled value selected>0</option>
                <?php
                    for ($i = 1; $i < 6; $i++)  
                    {?>
                        <option value="<?= $i?>"><?= $i ?></option>
                    <?php } ?>
            </select>
            <input type="submit" name="envoyer_nb_streamer" value="Valider">
        </form>

        <?php for($i = 0; $i < $_POST['nb_streamer']; $i++) { ?>
            <form action="" method="POST">
                <select name="streamer">
                    <option disabled value selected>Sélectionnez un streamer</option>
                    <?php foreach($streamers as $streamer): ?>
                        <option value="<?= $streamer["id"] ?>"><?= $streamer["name"] ?></option>
                    <?php endforeach; ?>
                </select>
                <input type="submit" name="envoyer_streamer" value="Valider">
            </form>
            <?php } ?>

        <div>
            <p>Rank : <?php echo $streamer_stats["rank"]?></p>
            <p>Date : <?php echo $streamer_stats["date"]?></p>
            <p>Minutes streamed : <?php echo $streamer_stats["minutes_streamed"]?></p>
            <p>Average viewers : <?php echo $streamer_stats["avg_viewers"]?></p>
            <p>Maximum viewers : <?php echo $streamer_stats["max_viewers"]?></p>
            <p>Hours watched : <?php echo $streamer_stats["hours_watched"]?></p>
            <p>Followers : <?php echo $streamer_stats["followers"]?></p>
            <p>Views : <?php echo $streamer_stats["views"]?></p>
            <p>Total followers : <?php echo $streamer_stats["followers_total"]?></p>
            <p>Total views : <?php echo $streamer_stats["views_total"]?></p>
        </div>
        <?php
            $option_value = $_POST['streamer'];
            $sql_streamers_stats = "SELECT * FROM `streamers-stats` WHERE streamer = $option_value";
            $requete_streamer_stats = $db->query($sql_streamers_stats);
            $streamer_stats = $requete_streamer_stats->fetch();
        ?>
        <p><a href="../index.php"><- Retour</a></p>
    </body>
</html>