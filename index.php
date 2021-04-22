<?php


?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>WEBTE2 - Zad7</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Exo+2&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/e73d803768.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script></head>
<body>
    <div class="container">
        <?php include_once "menu.html"; ?>

        <div class="contentWrapper">
            <h1>7 days forecast</h1>
            <div class="weather_info">
                <div style="display: inline-block; font-size: 2rem; width: 100%"><p id="city_par">Your city:</p></div>
            </div>
        </div>
    </div>

    <footer>Adam Trebichalský, 98014</footer>
    <script src="scripts/script1.js"></script>
</body>
</html>
