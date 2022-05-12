<!-- ~/php/tp1/view/cities.php -->
<!DOCTYPE HTML>
<html>
    <head>
        <meta http-equiv="content-type" content="text/html;
            charset=utf-8" />
    </head>
    <title>All cities</title>
    <body>
    <h1>All cities from <?= $country; ?></h1>
    <table>
        <?php foreach ($citiesFromCountry as $city) : ?>
        <tr>
            <td><?= $city['name']; ?></td>
        </tr>
        
        <?php endforeach; ?>
    </table>
    </body>
</html>