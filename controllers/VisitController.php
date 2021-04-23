<?php

require_once ("database/Database.php");
require_once ("classes/Visit.php");
require_once ("CountryController.php");

class VisitController
{
    private ?PDO $conn;

    public function __construct()
    {
        $this->conn = (new Database())->getConnection();
    }

    public function insertVisit($ip, $country_id, $location_id, $page, $date, $time): int
    {
        $stmt = $this->conn->prepare("INSERT INTO visits (ip, country_id, location_id, page, date, time) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->execute([$ip, $country_id, $location_id, $page, $date, $time]);
        return (int)$this->conn->lastInsertId();
    }

    //dava malo prihlaseni z velkej krajiny
    public function getNumberOfVisitorsFromCountries(): ?array {
        $stmt = $this->conn->prepare("SELECT country_id, COUNT(DISTINCT ip, date) AS `count`
                                            FROM visits
                                            GROUP BY country_id 
                                            ORDER BY `count` DESC");
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $all_countries_visits = $stmt->fetchAll();

        $CC = new CountryController();
        $result = [];
        foreach ($all_countries_visits as $country) {
            $country_obj = $CC->getCountry($country["country_id"]);
            array_push($result, ["country_id" => $country["country_id"],
                                      "country_name" => $country_obj["name"],
                                      "country_code" => $country_obj["country_code"],
                                      "visits_count" => $country["count"]]);
        }
        return $result;
    }

    public function getNumberOfVisits(): array {
        $stmt = $this->conn->prepare("SELECT min(time) as time
                                           FROM visits 
                                           GROUP BY ip, date");
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $all_times = $stmt->fetchAll();

        $times = [];
        $one = 0;
        $two = 0;
        $three = 0;
        $four = 0;

        foreach ($all_times as $time) {

            if (date("H:i:s", strtotime("06:00:00")) <= $time["time"] &&
                $time["time"] <= date("H:i:s", strtotime("14:59:59"))) {
                $one = $one + 1;
            } else if (date("H:i:s", strtotime("15:00:00")) <= $time["time"] &&
                $time["time"] <= date("H:i:s", strtotime("20:59:59"))) {
                $two = $two + 1;
            } else if (date("H:i:s", strtotime("21:00:00")) <= $time["time"] &&
                $time["time"] <= date("H:i:s", strtotime("23:59:59"))) {
                $three = $three + 1;
            } else if (date("H:i:s", strtotime("00:00:00")) <= $time["time"] &&
                $time["time"] <= date("H:i:s", strtotime("05:59:59"))) {
                $four = $four + 1;
            }
        }

        array_push($times, $one, $two, $three, $four);
        return $times;
    }

    public function getPageWithMaxNumberOfVisitors(): string {
        $stmt = $this->conn->prepare("SELECT page, COUNT(DISTINCT ip) AS visits
                                           FROM `visits`
                                           GROUP BY page
                                           ORDER BY visits
                                           DESC LIMIT 1");
        $stmt->execute();
        $result = $stmt->fetch();

        return $result["page"];
    }

    public function isTodayVisited(string $ip, string $page, string $date): bool {
        $stmt = $this->conn->prepare("SELECT id FROM visits
                                           WHERE ip=? AND page=? AND date=?");

        $stmt->execute([$ip,$page,$date]);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $visit_id = $stmt->fetch();

        if (isset($visit_id["id"])) {
            return true;
        }
        return false;
    }
}