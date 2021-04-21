<?php

// Na prvej stránke bude zobrazená predpoveď počasia pre miesto, z ktorého si návšteník pozerá vašu stránku.
// Pokiaľ nebude možné nájsť predpoveď počasia pre dané miesto, tak predpoveď sa zobrazí pre najbližšie mesto,
// pre ktoré je predpoveď k dispozícii.

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
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
</head>
<body>
    <div class="container">
        <div id="titleWrapper">WEBTE2 - ZAD7</div>
        <div id="menuWrapper">
            <div class="linkWrapper selected">
                <a href="index.php" class="selected_a">
                    <i class="fas fa-home"></i>Home
                </a>
            </div>
            <div class="linkWrapper">
                <a href="infoaboutyou.php">
                    <i class="fas fa-info-circle"></i>Info
                </a>
            </div>
            <div class="linkWrapper">
                <a href="stats.php">
                    <i class="fas fa-chart-bar"></i></i>Stats
                </a>
            </div>

        </div>


        <div class="contentWrapper">
            <h1>7 days forecast</h1>
            <div class="weather_info">
                <div style="display: inline-block; font-size: 2rem; width: 100%"><p id="city_par">Your city:</p></div>
<!--                <div id="daysWrapper">-->
<!--                    <div class="dayForecast">-->
<!--                        <span class="dayTitle">Wed</span>-->
<!--                        <div class="dayInfo">-->
<!--                            <span class="temp"><i class="fas fa-long-arrow-alt-up"></i>Max 20 °C</span>-->
<!--                            <span class="temp"><i class="fas fa-long-arrow-alt-down"></i>Min 20 °C</span>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
            </div>
        </div>
    </div>

    <footer>Adam Trebichalský, 98014</footer>
    <script src="script.js"></script>
</body>
</html>
