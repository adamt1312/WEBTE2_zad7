<?php

// Na druhej stránke budú zobrazené tieto údaje:
//· IP adresa návštevníka danej stránky,
//· GPS súradnice zodpovedajúceho miesta,
//· mesto, v rámci ktorého sa dané súradnice nachádzajú (ak sa toto mesto nedá lokalizovať, tak sa vypíše reťazec typu „mesto sa nedá lokalizovať alebo sa nachádzate na vidieku“),
//· štát, ktorému daná IP adresa prislúcha,
//· hlavné mesto tohoto štátu.
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
</head>
<body>
    <div class="container">
        <div id="titleWrapper">WEBTE2 - ZAD7</div>
        <div id="menuWrapper">
            <div class="linkWrapper">
                <a href="index.php">
                    <i class="fas fa-home"></i>Home
                </a>
            </div>
            <div class="linkWrapper selected">
                <a href="infoaboutyou.php" class="selected_a">
                    <i class="fas fa-info-circle"></i>Info
                </a>
            </div>
            <div class="linkWrapper">
                <a href="stats.php">
                    <i class="fas fa-chart-bar"></i></i>Stats
                </a>
            </div>

        </div>
        <div id=""></div>
    </div>

    <footer>Adam Trebichalský, 98014</footer>
    <script src="script.js"></script>
</body>
</html>
