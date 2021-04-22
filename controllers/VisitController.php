<?php

require_once ("database/Database.php");
require_once ("classes/Visit.php");

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

    public function getNumberOfVisitors(): int {
        $stmt = $this->conn->prepare("SELECT COUNT(DISTINCT ip) FROM `visits`");
        $stmt->execute();
        $stmt->setFetchMode(PDO::PARAM_INT);
        return $stmt->fetch();
    }

    public function getNumberOfVisitorsOnPage(string $page): int {
        $stmt = $this->conn->prepare("SELECT COUNT(DISTINCT ip) FROM `visits`
                                      WHERE page=?");
        $stmt->execute([$page]);
        $stmt->setFetchMode(PDO::PARAM_INT);
        return $stmt->fetch();
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
        $stmt = $this->conn->prepare("SELECT id FROM visits WHERE ip=? AND page=? AND date=?");

        $stmt->execute([$ip,$page,$date]);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $visit_id = $stmt->fetch();

        if (isset($visit_id["id"])) {
            return true;
        }
        return false;
    }

}