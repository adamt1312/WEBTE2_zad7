<?php

require_once 'controllers/CountryController.php';
require_once 'controllers/VisitController.php';
require_once 'controllers/LocationController.php';

if (isset($_POST)) {

    $VC = new VisitController();
    $CC = new CountryController();
    $LC = new LocationController();

    if (isset($_POST["timezone"])) {
        date_default_timezone_set($_POST["timezone"]);
    }
    $date = date("Y.m.d");
    $time = date("H:i:s");

    if (!$VC->isTodayVisited($_POST["ip"], $_POST["page"], $date)) {
        $country_id = $CC->isVisitedFrom($_POST["country"]);
        if ($country_id == false) {
            $country_id = $CC->insertCountry($_POST["country_name"], $_POST["country"], $_POST["country_capital"]);
        }

        $location_id = $LC->isVisitedFrom($_POST["latitude"], $_POST["longitude"]);

        if ($location_id == null) {
            if (isset($_POST["city"])) {
                $city = $_POST["city"];
            }
            else {
                $city = "countryside";
            }

            $location_id = $LC->insertLocation($country_id, $city, $_POST["latitude"], $_POST["longitude"]);
        }
        $VC->insertVisit($_POST["ip"], $country_id, $location_id, $_POST["page"], $date, $time);
    }
}