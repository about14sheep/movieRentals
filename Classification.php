<?php

abstract class Classification
{
  /**
    * @var string
    */
  protected $name;

  /**
   * @param string $name
   */
  public function __construct($name)
  {
    $this->name = $name;
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
  public function getCost($daysRented)
  {
    return $this->calculateCost($daysRented);
  }

  /**
   * @return int
   */
  public function getPoints($daysRented)
  {
    return $this->calculatePoints($daysRented);
  }

  /**
   * @return double
   */
  abstract protected function calculateCost($daysRented);

  /**
   * @return int
   */
  abstract protected function calculatePoints($daysRented);
  
}