<?php

class Movie
{
    const CHILDRENS = 2;
    const REGULAR = 0;
    const NEW_RELEASE = 1;

    /**
     * @var string
     */
    private $name;

    /**
     * @var int
     */
    private $priceCode;

    /**
     * @var Classification
     */
    private $classification;

    /**
     * @param string $name
     * @param int $priceCode
     * @param Classification $classification
     */
    public function __construct($name, $priceCode, $classification)
    {
        $this->name = $name;
        $this->priceCode = $priceCode;
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
     * @return int
     */
    public function priceCode()
    {
        return $this->priceCode;
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
        return $this->amountSwitch($daysRented);
    }

    /**
     * @return double
     */
    private function amountSwitch($daysRented)
    {
        $thisAmount = 0;
        if ($this->priceCode() === 1) {
            $thisAmount += $daysRented * 3;
        } else {
            $thisAmount += $this->classification()->getCost($daysRented);
        }
        return $thisAmount;
    }
}
