<?php

require_once "controllers/VisitController.php";
require_once "controllers/LocationController.php";

$LC = new LocationController();
$VC = new VisitController();

// detail table, country cities
if (isset($_GET['country_id'])) {
    echo json_encode($LC->getCountryLocations($_GET['country_id']));
}

// general table data
elseif (isset($_POST)) {
    $data = (object) [
        'tableData' => $VC->getNumberOfVisitorsFromCountries(),
        'markers' => $LC->getAllLocations(),
        'mostVisited' => $VC->getPageWithMaxNumberOfVisitors(),
        'intervalsOfVisits' => $VC->getNumberOfVisits()
    ];
    echo json_encode($data);
}
