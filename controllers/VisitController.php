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

    public function getNumberOfVisitorsFromCountries(): mixed {
        $stmt = $this->conn->prepare("SELECT country_id, COUNT(DISTINCT ip) AS visitors
                                           FROM `visits`
                                           GROUP BY country_id");
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $all_countries_visitors = $stmt->fetchAll();

        $CC = new CountryController();

        $result = [];
        foreach ($all_countries_visitors as $country_visitors) {

            $country = $CC->getCountry((int)$country_visitors["country_id"]);

            if ($country == null) {
                return null;
            }
            array_push($result, [$country["name"], $country["country_code"], $country_visitors["visitors"], $country_visitors["country_id"]]);
        }
        return $result;
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

    public function getVisit(int $id): Visit {
        $stmt = $this->conn->prepare("SELECT ip, country_id, location_id, page, date, time
                                           FROM visits
                                           WHERE id=?");
        $stmt->execute([$id]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, Visit::class);
        return $stmt->fetch();
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