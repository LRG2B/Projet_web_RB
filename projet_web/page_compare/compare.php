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
            <select id="dropdown" class="dropdown" onchange="update()">
                <option disabled value selected>Sélectionnez un streamer</option>
                <?php foreach($streamers as $streamer): ?>
                    <option value="<?= $streamer["id"] ?>"><?= $streamer["name"] ?></option>
                <?php endforeach; ?>
            </select>
            <p id="test_name"></p>
            <p id="test_id"></p>

            <script type="text/javascript">
                function update()
                {
                    var select = document.getElementById("dropdown");
                    var option = select.options[select.selectedIndex];
                    document.getElementById("test_name").innerHTML = option.text;
                }
            </script>
        </div>
    </body>
</html>