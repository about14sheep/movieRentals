<?php

require_once('Movie.php');
require_once('Rental.php');
require_once('Customer.php');
require_once('Classification.php');
require_once('ChildrensClassification.php');
require_once('NewReleaseClassification.php');
require_once('RegularClassification.php');

$classif1 = new ChildrensClassification('Childrens');

$classif2 = new NewReleaseClassification('New Release');

$classif3 = new RegularClassification('Regular');

$rental1 = new Rental(
    new Movie(
        'Back to the Future',
        $classif1
    ), 4
);

$rental2 = new Rental(
    new Movie(
        'Office Space',
        $classif3
    ), 3
);

$rental3 = new Rental(
    new Movie(
        'The Big Lebowski',
        $classif2
    ), 5
);

$customer = new Customer('Joe Schmoe');

$customer->addRental($rental1);
$customer->addRental($rental2);
$customer->addRental($rental3);

echo $customer->statement();
echo $customer->htmlStatement();
