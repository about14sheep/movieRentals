<?php

class Rental
{
    /**
     * @var Movie
     */
    private $movie;

    /**
     * @var int
     */
    private $daysRented;

    /**
     * @param Movie $movie
     * @param int $daysRented
     */
    public function __construct(Movie $movie, $daysRented)
    {
        $this->movie = $movie;
        $this->daysRented = $daysRented;
    }

    /**
     * @return Movie
     */
    public function movie()
    {
        return $this->movie;
    }

    /**
     * @return int
     */
    public function daysRented()
    {
        return $this->daysRented;
    }

    /**
     * @return double
     */
    public function getRentalAmount()
    {
        return $this->calculateRentalAmount();
    }

    /**
     * @return int
     */
    public function renterPoints()
    {
        return $this->movie->frequentRenterPoints($this->daysRented);
    }
    
    /**
     * @return double
     */
    private function calculateRentalAmount()
    {
        return $this->movie->getAmount($this->daysRented);
    }

    /**
     * @return string
     */
    public function formatRental()
    {
        return "\t" . str_pad($this->movie->name(), 30, ' ', STR_PAD_RIGHT) . "\t" . $this->movie->getAmount($this->daysRented) . PHP_EOL;
    }

    /**
     * @return string
     */
    public function formatHTML()
    {
        return "<li>" . $this->movie->name() . " - " . $this->daysRented . "</li>";
    }

}
