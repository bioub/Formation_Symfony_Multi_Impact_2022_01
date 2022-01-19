<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
class Voiture
{
    #[ORM\Id, ORM\GeneratedValue, ORM\Column]
    protected int $id;

    #[ORM\Column(length: 40)]
    protected string $marque;

    #[ORM\Column(nullable: true)]
    protected int $puissanceFiscale;

    #[ORM\Column(nullable: true)]
    protected int $nbPlaces;

    public function __toString(): string
    {
        return 'Voiture de marque ' . $this->marque;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMarque(): ?string
    {
        return $this->marque;
    }

    public function setMarque(string $marque): self
    {
        $this->marque = $marque;

        return $this;
    }

    public function getPuissanceFiscale(): ?int
    {
        return $this->puissanceFiscale;
    }

    public function setPuissanceFiscale(?int $puissanceFiscale): self
    {
        $this->puissanceFiscale = $puissanceFiscale;

        return $this;
    }

    public function getNbPlaces(): ?int
    {
        return $this->nbPlaces;
    }

    public function setNbPlaces(?int $nbPlaces): self
    {
        $this->nbPlaces = $nbPlaces;

        return $this;
    }

    public function getCamion(): ?Camion
    {
        return $this->camion;
    }

    public function setCamion(?Camion $camion): self
    {
        $this->camion = $camion;

        return $this;
    }

}