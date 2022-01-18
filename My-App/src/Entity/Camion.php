<?php

namespace App\Entity;

use App\Repository\CamionRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CamionRepository::class)]
class Camion
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 40)]
    private $marque;

    #[ORM\Column(type: 'float', nullable: true)]
    private $poidsAVide;

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

    public function getPoidsAVide(): ?float
    {
        return $this->poidsAVide;
    }

    public function setPoidsAVide(?float $poidsAVide): self
    {
        $this->poidsAVide = $poidsAVide;

        return $this;
    }
}
