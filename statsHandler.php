<?php

require_once "controllers/VisitController.php";
require_once "controllers/LocationController.php";

$LC = new LocationController();
$VC = new VisitController();

$LC->getCountryLocations($_GET['country_id']);
//// detail table, country cities
//if (isset($_GET['country_id'])) {
//    var_dump($_GET['country_id']);
//}
//
//// general table data
//elseif (isset($_POST)) {
//    $data = (object) [
//        'tableData' => $VC->getNumberOfVisitorsFromCountries(),
//        'markers' => $LC->getAllLocations(),
//        'mostVisited' => $VC->getPageWithMaxNumberOfVisitors()
//    ];
//
//
//
//    echo json_encode($data);
//}