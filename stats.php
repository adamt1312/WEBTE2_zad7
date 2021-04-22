<?php


//  Na tretej stránke budú zobrazené nasledujúce štatistické údaje:
//· počet návštevníkov vášho portálu, pričom títo návštevníci budú rozdelení na základe štátov,
// z ktorých podľa svojej IP adresy pochádzajú. Tieto údaje uveďte prehľadne do tabuľky, v ktorej
// bude uvedená vlajka daného štátu, meno tohto štátu a počet návštevníkov z tohoto štátu. Za unikátnu
// návštevu sa považuje 1 návšteva z 1 IP adresy počas 1 dňa.

//· v prípade kliknutia na daný štát sa otvorí podobná tabuľka, kde sa budú zobrazovať informácie o počtoch
// návštev z miest daného štátu. Neidentifikované mestá sa budú spočítavať do kolonky „nelokalizované mestá a vidiek“.

//· mapa s bodkami, odkiaľ pochádzali návštevníci vášho portálu (realizácia mapy môže byť spravená napr. cez Google mapy,
// OpenStreet mapy, resp. inú vami vybranú alternatívu).

//· informácia, v ktorom čase koľko ľudí navštívilo váš portál. Vyhodnocujte časové pásma medzi 6:00-15:00, 15:00-21:00,
// 21:00-24:00, 24:00-6:00. Berte do úvahy lokálny čas daného užívateľa (t.j. ak sa na stránku pozrie Bratislavčan o 19:00
// a človek z New Yorku svojho lokálneho času tiež o 19:00, tak napriek tomu, že medzi týmito dvoma mestami je časový posun
// 6 hodín, tak sa to bude považovať za rovnaký lokálny čas).

//· informácia o tom, ktorá z vašich troch stránok bola najčastejšie navštevovaná.

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
    <?php include_once "menu.html"; ?>
    <div id=""></div>
</div>

<footer>Adam Trebichalský, 98014</footer>
<script src="script1.js"></script>
</body>
</html>
