<?php

require_once __DIR__ . '/../classes/Contact.php';

$romain = new Contact();
$romain
    ->setId(1)
    ->setFirstName('Romain')
    ->setLastName('Bohdanowicz');

echo $romain->getFirstName() . "\n";