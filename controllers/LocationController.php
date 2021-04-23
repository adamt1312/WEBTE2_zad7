<?php

require_once ("database/Database.php");

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

    //dava vela prihlaseni z jednej malej dediny
    public function getCountryLocations(int $country_id): mixed {
        $stmt = $this->conn->prepare("SELECT location_id, COUNT(DISTINCT ip, date) AS `count`
                                           FROM `visits`
                                           WHERE country_id=?
                                           GROUP BY location_id");

        $stmt->execute([$country_id]);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $all_locations = $stmt->fetchAll();

        $result = [];
        foreach ($all_locations as $location) {
            $location_id = $location["location_id"];
            $stmt = $this->conn->prepare("SELECT city
                                               FROM locations
                                               WHERE id=$location_id");
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $city = $stmt->fetch();
            array_push($result, ["city_name" => $city["city"] ,"count"=> $location["count"]]);
        }
        return $result;
    }

    public function getAllLocations(): mixed {
        $stmt = $this->conn->prepare("SELECT latitude, longitude
                                           FROM locations");
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $all_locations = $stmt->fetchAll();

        $result = [];
        foreach ($all_locations as $location) {
            array_push($result, [$location["latitude"], $location["longitude"]]);
        }
        return $result;
    }

    public function isVisitedFrom(string $latitude, string $longitude): ?int {
        $stmt = $this->conn->prepare("SELECT id
                                           FROM locations
                                           WHERE latitude=? AND longitude=?");

        $stmt->execute([$latitude,$longitude]);
        $stmt->setFetchMode(PDO::PARAM_INT);
        $location_id = $stmt->fetch();

        if ($location_id != false) {
            return (int)$location_id["id"];
        }
        return null;
    }
}