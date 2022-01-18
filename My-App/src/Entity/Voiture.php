<?php

namespace App\Entity;

class Voiture
{
    protected string $marque;

    /**
     * @return string
     */
    public function getMarque(): string
    {
        return $this->marque;
    }

    /**
     * @param string $marque
     */
    public function setMarque(string $marque): void
    {
        $this->marque = $marque;
    }

    public function __toString(): string
    {
        return 'Voiture de marque ' . $this->marque;
    }


}