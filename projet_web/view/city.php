<!-- ~/php/tp1/view/city.php -->
<!DOCTYPE HTML>
<html>
    <head>
        <meta http-equiv="content-type" content="text/html;
            charset=utf-8" />
    </head>
    <title>One city</title>
    <body>
    <h1>City <?= $city['name'] ?></h1>
        <p>
            Name of the city: <?= $city['name']; ?>
        </p>
        <p>
            Country: <?= $city['country']; ?>
        </p>
        <p>
            Quality of life: <?= $city['life']; ?>
        </p>

        <a href="/cities.php">
            Back to list of cities
        </a>
    </body>
</html>