<?php

require_once __DIR__ . '/../vendor/autoload.php';

$romain = new \MultiImpact\Entity\Contact();
$romain
    ->setId(1)
    ->setFirstName('Romain')
    ->setLastName('Bohdanowicz');

echo $romain->getFirstName() . "\n";

$cc = new \MultiImpact\Bank\Account();
$romain->addCompte($cc);

$livretA = new \MultiImpact\Bank\Account();
$romain->addCompte($livretA);

