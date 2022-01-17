<?php

require_once __DIR__ . '/../classes/Account.php';

$compte = new Account();
$compte
    ->setId(1)
    ->setType('Compte Courant');

$compte->crediter(3200);
$compte->debiter(500.50);

echo $compte->getSolde() . "\n"; // 2699.5

/*
 * Exercice :
 * Créer la classe Account correspondant à cet exemple
 * Ajouter 3 propriétés : id (int), type (string), solde (double)
 * Générer les getters/setters sauf setSolde
 * Ecrire les fonction debiter et crediter pour à jour le solde du montant en param
 * Interdire les montants négatifs dans crediter et debiter
 */