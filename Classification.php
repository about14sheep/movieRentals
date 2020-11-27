<?php

class Classification
{
  /**
    * @var string
    */
  private $name;

  /**
   * @var double
   */
  private $price;

  /**
   * @var double
   */
  private $lateMultiplier;

  /**
   * @var int
   */
  private $daysBeforeLate;

  /**
   * @param string $name
   * @param double $price
   * @param int $daysBeforeLate
   * @param double $lateMultiplier
   */
  public function __construct($name, $price, $daysBeforeLate, $lateMultiplier)
  {
    $this->name = $name;
    $this->price = $price;
    $this->daysBeforeLate = $daysBeforeLate;
    $this->lateMultiplier = $lateMultiplier;
  }

  /**
   * @return string
   */
  public function name()
  {
    return $this->name;
  }

  /**
   * @return double
   */
  public function price()
  {
    return $this->price;
  }

  /**
   * @return int
   */
  public function daysBeforeLate()
  {
    return $this->daysBeforeLate;
  }

  /**
   * @return double
   */
  public function lateMultiplier()
  {
    return $this->lateMultiplier;
  }

  /**
   * @return double
   */
  public function getCost($daysRented)
  {
    return $this->calculateCost($daysRented);
  }

  /**
   * @return double
   */
  private function calculateCost($daysRented)
  {
    $cost = $this->price();
    if ($daysRented > $this->daysBeforeLate()) {
      $cost += ($daysRented - $this->daysBeforeLate()) * $this->lateMultiplier();
    }
    return $cost;
  }
  
}