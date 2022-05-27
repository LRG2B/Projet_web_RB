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
        <div>
            <select name="dropdown" class="dropdown" onchange="update()">
                <option disabled value selected>Sélectionnez un streamer</option>
                <?php foreach($streamers as $streamer): ?>
                    <option value="<?= $streamer["id"] ?>"><?= $streamer["name"] ?></option>
                    <?php endforeach; ?>
            </select>
            <p id="name"></p>
                
            <script type="text/javascript">
                function update()
                {
                //var select = document.getElementById("dropdown");
                //var option = select.options[select.selectedIndex];
                //document.getElementById("name").innerHTML = option.value;
                var v = document.querySelector('dropdown');
                console.log(v);
                document.getElementById("name").innerHTML = v;
                }
            </script>
            <?php
                $option_value = 1; 
                //echo "<script type='text/javascript' id='oui'>document.write(value);</script>";
                $sql_streamers_stats = "SELECT * FROM `streamers-stats` WHERE streamer = $option_value";
                $requete_streamer_stats = $db->query($sql_streamers_stats);
                $streamer_stats = $requete_streamer_stats->fetch();
            ?>

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
        <p><a href="../index.php"><- Retour</a></p>
    </body>
</html>