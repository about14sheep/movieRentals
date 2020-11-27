<?php

class NewReleaseClassification extends Classification
{

  protected function calculateCost($daysRented)
  {
    return $daysRented * 3;
  }

  protected function calculatePoints($daysRented)
  {
    return $daysRented > 1 ? 2 : 1;
  }

}