<?php

namespace MultiImpact\Entity;

use MultiImpact\Bank\Account;

class Contact
{
    protected int $id;
    protected string $firstName;
    protected string $lastName;
    protected bool $active;

    /** @var Account[] */
    protected array $comptes = [];

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Contact
     */
    public function setId(int $id): Contact
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     * @return Contact
     */
    public function setFirstName(string $firstName): Contact
    {
        $this->firstName = $firstName;
        return $this;
    }

    /**
     * @return string
     */
    public function getLastName(): string
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     * @return Contact
     */
    public function setLastName(string $lastName): Contact
    {
        $this->lastName = $lastName;
        return $this;
    }

    /**
     * @return bool
     */
    public function isActive(): bool
    {
        return $this->active;
    }

    /**
     * @param bool $active
     * @return Contact
     */
    public function setActive(bool $active): Contact
    {
        $this->active = $active;
        return $this;
    }

    /**
     * @return Account[]
     */
    public function getComptes(): array
    {
        return $this->comptes;
    }

    /**
     * @param Account $compte
     * @return Contact
     */
    public function addCompte(Account $compte): Contact
    {
        $this->comptes[] = $compte;
        return $this;
    }






}