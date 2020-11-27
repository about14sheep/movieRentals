<?php

class ChildrensClassification extends Classification
{
  protected function calculateCost($daysRented)
  {
    $cost = 1.5;
    if ($daysRented > 3) {
      $cost += ($daysRented - 3) * 1.5;
    }
    return $cost;
  }

  protected function calculatePoints($daysRented)
  {
    return 1;
  }
}