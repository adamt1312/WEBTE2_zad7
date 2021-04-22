<?php

require_once ("database/Database.php");
require_once ("classes/Country.php");

class LocationController
{
    private ?PDO $conn;

    public function __construct()
    {
        $this->conn = (new Database())->getConnection();
    }

    public function insertLocation($country_id, $city, $latitude, $longitude): int {
        $stmt = $this->conn->prepare("INSERT INTO locations (country_id, city, latitude, longitude)
                                            VALUES (:country_id, :city, :latitude, :longitude)");

        $stmt->bindParam(":country_id", $country_id, PDO::PARAM_STR);
        $stmt->bindParam(":city", $city, PDO::PARAM_STR);
        $stmt->bindParam(":latitude", $latitude, PDO::PARAM_STR);
        $stmt->bindParam(":longitude", $longitude, PDO::PARAM_STR);

        $stmt->execute();
        return (int)$this->conn->lastInsertId();
    }

    public function getLocation(int $id): Location {
        $stmt = $this->conn->prepare("SELECT country_id, city, latitude, longitude
                                           FROM locations
                                           WHERE id=:id");

        $stmt->bindParam(":id", $id, PDO::PARAM_STR);

        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, Location::class);
        return $stmt->fetch();
    }

    public function isVisitedFrom(string $latitude, string $longitude): bool {
        $stmt = $this->conn->prepare("SELECT id
                                           FROM locations
                                           WHERE latitude=? AND longitude=?");

        $stmt->execute([$latitude,$longitude]);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $location_id = $stmt->fetch();

        if ($location_id != "") {
            return true;
        }
        return false;
    }
}