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
        $thisAmount = 0;

        switch($this->movie()->priceCode()) {
            case Movie::REGULAR:
                $thisAmount += 2;
                if ($this->daysRented() > 2) {
                    $thisAmount += ($this->daysRented() - 2) * 1.5;
                }
            break;
            case Movie::NEW_RELEASE:
                $thisAmount += $this->daysRented() * 3;
                break;
            case Movie::CHILDRENS:
                $thisAmount += 1.5;
                if ($this->daysRented() > 3) {
                    $thisAmount += ($this->daysRented() - 3) * 1.5;
                }
                break;
        }
        return $thisAmount;
    }
}
