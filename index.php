<?php

require_once('Movie.php');
require_once('Rental.php');
require_once('Customer.php');
require_once('Classification.php');

$classif1 = new Classification(
    'Childrens',
    1.5,
    3,
    1.5
);

$classif2 = new Classification(
    'Regular',
    2.0,
    2,
    1.5
);

$rental1 = new Rental(
    new Movie(
        'Back to the Future',
        $classif1,
        FALSE
    ), 4
);

$rental2 = new Rental(
    new Movie(
        'Office Space',
        $classif2,
        FALSE
    ), 3
);

$rental3 = new Rental(
    new Movie(
        'The Big Lebowski',
        $classif1,
        TRUE
    ), 5
);

$customer = new Customer('Joe Schmoe');

$customer->addRental($rental1);
$customer->addRental($rental2);
$customer->addRental($rental3);

echo $customer->statement();
