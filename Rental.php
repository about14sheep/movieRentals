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
     * @return double
     */
    private function calculateRentalAmount()
    {
        return $this->movie()->getAmount($this->daysRented());
    }

    /**
     * @return int
     */
    public function renterPoints()
    {
        return $this->movie()->frequentRenterPoints($this->daysRented());
    }
}
