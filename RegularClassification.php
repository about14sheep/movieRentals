<?php

class RegularClassification extends ChildrensClassification
{
  protected function calculateCost($daysRented)
  {
    $cost = 2;
    if ($daysRented > 2) {
      $cost += ($daysRented - 2) * 1.5;
    }
    return $cost;
  }

  protected function calculatePoints($daysRented)
  {
    return 1;
  }
}