<?php

require_once "../connect.php";
$sql_streamers = "SELECT * FROM streamers";
$requete = $db->query($sql_streamers);
$streamers = $requete->fetchAll();
?>



<!DOCTYPE HTML>
<html>
<head>
        <link rel="stylesheet" href="./compare_style.css">
        <meta http-equiv="content-type" content="text/html;
            charset=utf-8" />
        <title>Compare - Twitch track</title>
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Catamaran:wght@100&family=Cormorant+Garamond:ital,wght@0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap');
            @import url('https://fonts.googleapis.com/css2?family=Audiowide&family=Fira+Mono:wght@500&display=swap');
        </style>
    </head>
    
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

        <article id="text">
            <h1 id="text_desc">Voici la comparaison de tout les streamers ( Vous pouvez masquer ceux de votre choix) : </h1>
        </article>

        
        <article class="information">
            <div class="name_checkbox">
                <p>Streamer : </p>
            </div>
            <section class="data">
                <p>Rank : </p>
                <p>Date : </p>
                <p>Minutes streamed : </p>
                <p>Average viewers : </p>
                <p>Maximum viewers : </p>
                <p>Hours watched : </p>
                <p>Followers : </p>
                <p>Views : </p>
                <p>Total followers : </p>
                <p>Total views : </p>                
            </section>
        </article>
        
        
                <script type="text/javascript">
        
                    function show_hide_div(input_box, div_stats)
                    {
                        if (input_box.checked)
                        {
                            document.getElementById(div_stats).style.display = "flex";
                        } else 
                        {
                            document.getElementById(div_stats).style.display = "none";
                        }
                    }
                </script>
        
        <?php foreach($streamers as $streamer): ?>
            <article class="information">
                <div class="name_checkbox">
                    <p> <a href="page_détail/detail.php?id=<?= $streamer["id"] ?>">  <?= $streamer["name"] ?> </a>    </p>
                    <p class="chekbox"> <input type="checkbox" onclick="show_hide_div(this , '<?= $streamer['name'] ?>')" Checked> </p>
                </div>
                <?php 
                    $sql_streamer_stats = "SELECT * FROM `streamers-stats` WHERE streamer = " . $streamer['id'] . ";";
                    $requete_streamer_stats = $db->query($sql_streamer_stats);
                    $streamer_stats = $requete_streamer_stats->fetch();
                ?>

                <div class="data" id="<?= $streamer['name'] ?>">
                    <div><p> <?php echo $streamer_stats["rank"]?></p></div>
                    <div><p><?php echo $streamer_stats["date"]?></p></div>
                    <div><p><?php echo $streamer_stats["minutes_streamed"]?></p></div>
                    <div><p><?php echo $streamer_stats["avg_viewers"]?></p></div>
                    <div><p><?php echo $streamer_stats["max_viewers"]?></p></div>
                    <div><p><?php echo $streamer_stats["hours_watched"]?></p></div>
                    <div><p><?php echo $streamer_stats["followers"]?></p></div>
                    <div><p><?php echo $streamer_stats["views"]?></p></div>
                    <div><p><?php echo $streamer_stats["followers_total"]?></p></div>
                    <div><p><?php echo $streamer_stats["views_total"]?></p></div>
        </div>
        </article>
            <?php endforeach; ?>


        <article id="retour">
            <p><a href="../index.php">Retour</a></p>
        </article>


        <footer>
            <img src="../images_streamers/Logo-LRG2B-Officiel-sliced.png" alt="Logo LRG²B">
            <p>Lien GitHub : <a href="https://github.com/LRG2B">ici</a></p>
        </footer>
    </body>
</html>