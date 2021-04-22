<?php

require_once ("database/Database.php");
require_once ("classes/Country.php");

class CountryController
{
    private ?PDO $conn;

    public function __construct()
    {
        $this->conn = (new Database())->getConnection();
    }

    public function insertCountry($name, $country_code, $capital_city): int {
        $stmt = $this->conn->prepare("INSERT INTO countries (name, country_code, capital_city)
                                           VALUES (:name, :country_code, :capital_city)");

        $stmt->bindParam(":name", $name, PDO::PARAM_STR);
        $stmt->bindParam(":country_code", $country_code, PDO::PARAM_STR);
        $stmt->bindParam(":capital_city", $capital_city, PDO::PARAM_STR);

        $stmt->execute();
        return (int)$this->conn->lastInsertId();
    }

    public function getCountry(int $id): ?Country {
        $stmt = $this->conn->prepare("SELECT name, country_code, city
                                           FROM countries
                                           WHERE id=:id");

        $stmt->bindParam(":id", $id, PDO::PARAM_STR);

        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, Country::class);
        return $stmt->fetch();
    }

    public function isVisitedFrom(string $country_code): bool {
        $stmt = $this->conn->prepare("SELECT id
                                           FROM countries
                                           WHERE country_code=:country_code");

        $stmt->bindParam(":country_code", $country_code, PDO::PARAM_STR);

        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $country_id = $stmt->fetch();

        if ($country_id != "") {
            return true;
        }
        return false;
    }
}