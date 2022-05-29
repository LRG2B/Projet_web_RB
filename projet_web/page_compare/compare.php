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
        <script type="text/javascript">

            function show_hide_div(input_box, div_stats)
            {
                if (input_box.checked)
                {
                    document.getElementById(div_stats).style.display = "block";
                } else 
                {
                    document.getElementById(div_stats).style.display = "none";
                }
            }
        </script>


        <?php foreach($streamers as $streamer): ?>
        <div>
            <p><?= $streamer["name"] ?><input type="checkbox" onclick="show_hide_div(this, '<?= $streamer['name'] ?>')" Checked></p>

            <?php 
            $sql_streamer_stats = "SELECT * FROM `streamers-stats` WHERE streamer = " . $streamer['id'] . ";";
            $requete_streamer_stats = $db->query($sql_streamer_stats);
            $streamer_stats = $requete_streamer_stats->fetch();
            ?>

            <div id="<?= $streamer["name"] ?>">
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
        </div>
        <?php endforeach; ?>
        <p><a href="../index.php"><- Retour</a></p>
    </body>
</html>