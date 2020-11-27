<?php

class Customer
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var Rental[]
     */
    private $rentals;

    /**
     * @param string $name
     */
    public function __construct($name)
    {
        $this->name = $name;
        $this->rentals = [];
    }

    /**
     * @return string
     */
    public function name()
    {
        return $this->name;
    }

    /**
     * @param Rental $rental
     */
    public function addRental(Rental $rental)
    {
        $this->rentals[] = $rental;
    }

    /**
     * @return string
     */
    public function statement()
    {   
        $price = 0;
        $points = 0;
        $result = $this->formatHeader($this->name);

        foreach ($this->rentals as $rental) {
            $result .= $rental->formatRental();
            $price += $rental->getRentalAmount();
            $points += $rental->renterPoints();
        }

        $result .= $this->formatFooter($price, $points);

        return $result;
    }
    
    /**
     * @return string
     */
    public function htmlStatement()
    {
        $price = 0;
        $points = 0;
        $result = "<h1>Rental Record for <em>{$this->name}<em></h1>";
        $result .= "<ul>";
        foreach($this->rentals as $rental) {
            $result .= $rental->formatHTML();
            $price += $rental->getRentalAmount();
            $points += $rental->renterPoints();
        }
        $result .= "</ul>";
        $result .= "<p>Amount owed is <em>{$price}</em></p>";
        $result .= "<p>You earned <em>{$points}</em> frequent renter points</p>";
        return $result;
    }

    /**
     * @return string
     */
    private function formatHeader($name)
    {
        return 'Rental Record for ' . $name . PHP_EOL;
    }

    /**
     * @return string
     */
    private function formatFooter($totalAmount, $frequentRenterPoints)
    {
        $earnedStr = 'Amount owed is ' . $totalAmount . PHP_EOL;
        $renterPointsStr = 'You earned ' . $frequentRenterPoints . ' frequent renter points' . PHP_EOL;
        return $earnedStr . $renterPointsStr;
    }

}
