<?php

class Visit
{
    private string $ip;
    private int $country_id;
    private int $location_id;
    private string $page;
    private string $date;
    private string $time;

    /**
     * @return string
     */
    public function getIp(): string
    {
        return $this->ip;
    }

    /**
     * @param string $ip
     */
    public function setIp(string $ip): void
    {
        $this->ip = $ip;
    }

    /**
     * @return int
     */
    public function getCountryId(): int
    {
        return $this->country_id;
    }

    /**
     * @param int $country_id
     */
    public function setCountryId(int $country_id): void
    {
        $this->country_id = $country_id;
    }

    /**
     * @return int
     */
    public function getLocationId(): int
    {
        return $this->location_id;
    }

    /**
     * @param int $location_id
     */
    public function setLocationId(int $location_id): void
    {
        $this->location_id = $location_id;
    }

    /**
     * @return string
     */
    public function getPage(): string
    {
        return $this->page;
    }

    /**
     * @param string $page
     */
    public function setPage(string $page): void
    {
        $this->page = $page;
    }

    /**
     * @return string
     */
    public function getDate(): string
    {
        return $this->date;
    }

    /**
     * @param string $date
     */
    public function setDate(string $date): void
    {
        $this->date = $date;
    }

    /**
     * @return string
     */
    public function getTime(): string
    {
        return $this->time;
    }

    /**
     * @param string $time
     */
    public function setTime(string $time): void
    {
        $this->time = $time;
    }
}