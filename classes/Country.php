<?php

class Country
{
    private string $name;
    private string $country_code;
    private string $capital_city;

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getCountryCode(): string
    {
        return $this->country_code;
    }

    /**
     * @param string $country_code
     */
    public function setCountryCode(string $country_code): void
    {
        $this->country_code = $country_code;
    }

    /**
     * @return string
     */
    public function getCapitalCity(): string
    {
        return $this->capital_city;
    }

    /**
     * @param string $capital_city
     */
    public function setCapitalCity(string $capital_city): void
    {
        $this->capital_city = $capital_city;
    }


}