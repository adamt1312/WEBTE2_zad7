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
        <div class="contentWrapper" style="background: #2980B9;  /* fallback for old browsers */
background: -webkit-linear-gradient(to left, #FFFFFF, #6DD5FA, #2980B9);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to left, #FFFFFF, #6DD5FA, #2980B9); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
">
            <h1>Info about you</h1>
            <div class="weather_info">
                <ul id="infoList">
                    <li id="ipaddr">Your IP address: </li>
                    <li id="coords">GPS Coordinates: </li>
                    <li id="city">Your city: </li>
                    <li id="country">Your country: </li>
                    <li id="capital">Capital city: </li>
                </ul>
            </div>
        </div>
    </div>

    <footer>Adam Trebichalský, 98014</footer>

    <script src="scripts/script2.js"></script>
</body>
</html>
