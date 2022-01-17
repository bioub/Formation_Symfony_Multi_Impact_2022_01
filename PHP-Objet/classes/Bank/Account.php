<?php

namespace MultiImpact\Bank;

use Exception;
use MultiImpact\Entity\Contact;

class Account
{
    protected int $id;
    protected AccountType $type;
    protected float $solde = 0;
    protected Contact $proprietaire;

    /**
     * @return Contact
     */
    public function getProprietaire(): Contact
    {
        return $this->proprietaire;
    }

    /**
     * @param Contact $proprietaire
     * @return Account
     */
    public function setProprietaire(Contact $proprietaire): Account
    {
        $this->proprietaire = $proprietaire;
        return $this;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Account
     */
    public function setId(int $id): Account
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param AccountType $type
     * @return Account
     */
    public function setType(AccountType $type): Account
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return float
     */
    public function getSolde(): float
    {
        return $this->solde;
    }

    /**
     * @param float $solde
     * @return Account
     */
    public function crediter(float $montant): Account
    {
        if ($montant < 0) {
            throw new Exception('Le montant ne doit pas être négatif');
        }

        $this->solde += $montant;
        return $this;
    }

    /**
     * @param float $solde
     * @return Account
     */
    public function debiter(float $montant): Account
    {
        if ($montant < 0) {
            throw new Exception('Le montant ne doit pas être négatif');
        }

        $this->solde -= $montant;
        return $this;
    }


}