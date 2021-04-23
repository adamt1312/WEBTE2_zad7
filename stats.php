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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/e73d803768.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body>
<div style="display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    font-family: 'Exo 2', sans-serif;">
    <?php include_once "menu.html"; ?>

    <div class="contentWrapper">
        <table class="table" id="tb1">
            <thead class="thead-dark">
            <th colspan="3" class="center">Visits stats</th>
            <tr>
                <th scope="col">Country Name</th>
                <th scope="col" class="center">Country Flag</th>
                <th scope="col" class="center">Number of visitors</th>
            </tr>
            </thead>
            <tbody id="tbody1"></tbody>
        </table>

        <table class="table" id="tb2">
            <thead class="thead-dark">
            <th colspan="3" class="center" id="country_name_title"></th>
            <tr>
                <th scope="col" class="center">City Name</th>
                <th scope="col" class="center">Number of visitors</th>
            </tr>
            </thead>
            <tbody id="tbody2">

            </tbody>
        </table>



        <div id="map"></div>

        <table class="table table-dark" id="tb3">
            <thead class="thead-dark">
            <th colspan="4" class="center">Time intervals of visits</th>
            <tr>
                <th scope="col" class="center">06:00 - 15:00</th>
                <th scope="col" class="center">15:00 - 21:00</th>
                <th scope="col" class="center">21:00 - 00:00</th>
                <th scope="col" class="center">00:00 - 06:00</th>
            </tr>
            </thead>
            <tbody id="tbody3">
            <tr>
                <td class="center interval"></td>
                <td class="center interval"></td>
                <td class="center interval"></td>
                <td class="center interval"></td>
            </tr>
            </tbody>
        </table>
    </div>
</div>

<footer id="stats">Adam Trebichalský, 98014</footer>

<script src="scripts/script3.js"></script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBu8jrYiRQKTnmtQjU3WcvQdN2F1jksPtc&callback=initMap"
        type="text/javascript"></script>
</body>
</html>
