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
        Movie::CHILDRENS,
        $classif1
    ), 4
);

$rental2 = new Rental(
    new Movie(
        'Office Space',
        Movie::REGULAR,
        $classif2
    ), 3
);

$rental3 = new Rental(
    new Movie(
        'The Big Lebowski',
        Movie::NEW_RELEASE,
        $classif1
    ), 5
);

$customer = new Customer('Joe Schmoe');

$customer->addRental($rental1);
$customer->addRental($rental2);
$customer->addRental($rental3);

echo $customer->statement();
