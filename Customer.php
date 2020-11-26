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
        list ($name, $totalAmount, $frequentRenterPoints, $rentalsArr) = $this->generateStatement();

        $result = $this->formatHeader($name);

        foreach ($rentalsArr as $title=>$amount) {
            $result .= $this->formatRentals($title, $amount);
        }

        $result .= $this->formatFooter($totalAmount, $frequentRenterPoints);

        return $result;
    }
    
    /**
     * @return string
     */
    public function htmlStatement()
    {
        list ($name, $totalAmount, $frequentRenterPoints, $rentalsArr) = $this->generateStatement();
        return "<h1>Rental Record for <em>{$name}<em><h1>";
    }

    /**
     * @return array
     */
    private function generateStatement()
    {
        $totalAmount = 0;
        $rentalsArr = array();
        $name = $this->name();
        $frequentRenterPoints = $this->calculateFrequentRenterPoints($this->rentals);

        foreach ($this->rentals as $rental) {
            $thisAmount = $rental->getRentalAmount();
            $totalAmount += $thisAmount;
            $rentalsArr[$rental->movie()->name()] = $thisAmount;
        }
        return array($name, $totalAmount, $frequentRenterPoints, $rentalsArr);
    }

    /**
     * @return int
     */
    private function calculateFrequentRenterPoints($rentals)
    {
        $frequentRenterPoints = 0;

        foreach($rentals as $rental) {
            $frequentRenterPoints++;
            if ($rental->movie()->priceCode() === Movie::NEW_RELEASE && $rental->daysRented() > 1) {
                $frequentRenterPoints++;
            }
        }
        return $frequentRenterPoints;
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

    /**
     * @return string
     */
    private function formatRentals($name, $amount)
    {
        return "\t" . str_pad($name, 30, ' ', STR_PAD_RIGHT) . "\t" . $amount . PHP_EOL;
    }

}
