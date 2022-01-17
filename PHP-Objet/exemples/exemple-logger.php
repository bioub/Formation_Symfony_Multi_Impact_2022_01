<?php

use MultiImpact\Writer\FileWriter;

require_once __DIR__ . '/../vendor/autoload.php';

$writer = new FileWriter(__DIR__ . '/../app.log', 'a');
// $writer = new \MultiImpact\Writer\NullWriter();

$logger = new \MultiImpact\Logger\Logger($writer);
$logger->error('UNE ERREUR');

// SOLID
// Single Responsability
// Open / Close
// Liskov Substitution
// Interface Segregation
// Dependency Inversion Principle
