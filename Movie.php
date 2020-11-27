<?php

class Movie
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var Classification
     */
    private $classification;

    /**
     * @param string $name
     * @param Classification $classification
     */
    public function __construct($name, $classification)
    {
        $this->name = $name;
        $this->classification = $classification;
    }

    /**
     * @return string
     */
    public function name()
    {
        return $this->name;
    }

    /**
     * @return Classification
     */
    public function classification()
    {
        return $this->classification;
    }

    public function getAmount($daysRented)
    {
        return $this->calculateAmount($daysRented);
    }

    /**
     * @return double
     */
    private function calculateAmount($daysRented)
    {
        return $this->classification()->getCost($daysRented);
    }

    /**
     * @return int
     */
    public function frequentRenterPoints($daysRented)
    {
        return $this->classification()->getPoints($daysRented);
    }
}
