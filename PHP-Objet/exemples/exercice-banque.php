<?php

use MultiImpact\Bank\Account;
use MultiImpact\Bank\AccountType;
use MultiImpact\Entity\Contact;


require_once __DIR__ . '/../vendor/autoload.php';

// FQN ou FQCN :
// Fully Qualified Class Name
// le nom complet de la classe avec ses namespace

$jean = new Contact();
$jean->setFirstName('Jean');

$compte = new Account();
$compte
    ->setId(1)
    ->setType(AccountType::COMPTE_COURANT)
    ->setProprietaire($jean);

try {
    $compte->crediter(-3200);
    $compte->debiter(500.50);
} catch (Exception $exception) {
    echo "Erreur : " . $exception->getMessage() . "\n";
}

echo "Solde : " . $compte->getSolde() . "\n"; // 2699.5

/*
 * Exercice :
 * Créer la classe Account correspondant à cet exemple
 * Ajouter 3 propriétés : id (int), type (string), solde (double)
 * Générer les getters/setters sauf setSolde
 * Ecrire les fonction debiter et crediter pour à jour le solde du montant en param
 * Interdire les montants négatifs dans crediter et debiter
 */