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
     * @var bool
     */
    private $newRelease;

    /**
     * @param string $name
     * @param Classification $classification
     * @param newRelease $newRelease
     */
    public function __construct($name, $classification, $newRelease)
    {
        $this->name = $name;
        $this->classification = $classification;
        $this->newRelease = $newRelease;
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

    /**
     * @return bool
     */
    public function newRelease()
    {
        return $this->newRelease;
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
        $thisAmount = 0;
        if ($this->newRelease()) {
            $thisAmount += $daysRented * 3;
        } else {
            $thisAmount += $this->classification()->getCost($daysRented);
        }
        return $thisAmount;
    }
}
