<!-- ~/php/tp1/view/cities.php -->
<!DOCTYPE HTML>
<html>
    <head>
        <meta http-equiv="content-type" content="text/html;
            charset=utf-8" />
    </head>
    <title>All Cities</title>
    <body>
    <h1>All Cities</h1>
    <?php if($flash) {
        echo "
           <p style='color: green'>
            " . $flash . " 
           </p>
        ";
    } ?>
    <table>
        <?php foreach ($cities as $cityId => $city) : ?>
        <tr>
            <td><a href="/city.php?id=<?= $cityId; ?>"><?=
            $city['name']; ?></a></td>
            <td><?= $city['country']; ?></td>
            <td>Quality of life: <?= $city['life']; ?></td> <!--added property life-->
        </tr>
        
        <?php endforeach; ?>

    </table>
    <p>
        <a href="/recherche.php">Search cities by name</a>
    </p>
    <p>
        <a href="/create.php">Create a new city</a>
    </p>
    <p>
        <a href="/countries.php">Countries</a>
    </p>

    </body>
</html>