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
     * @param string $name
     * @param int $priceCode
     */
    public function __construct($name, $priceCode)
    {
        $this->name = $name;
        $this->priceCode = $priceCode;
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
        switch($this->priceCode()) {
            case Movie::REGULAR:
                $thisAmount += 2;
                if ($daysRented > 2) {
                    $thisAmount += ($daysRented - 2) * 1.5;
                }
                break;
            case Movie::NEW_RELEASE:
                $thisAmount += $daysRented * 3;
                break;
            case Movie::CHILDRENS:
                $thisAmount += 1.5;
                if ($daysRented > 3) {
                    $thisAmount += ($daysRented - 3) * 1.5;
                }
                break;
        }
        return $thisAmount;
    }
}
