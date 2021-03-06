<?php

namespace App\Entity;

use App\Repository\SocieteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SocieteRepository::class)]
class Societe
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 80)]
    private $nom;

    #[ORM\Column(type: 'string', length: 100, nullable: true)]
    private $ville;

    #[ORM\OneToMany(targetEntity: Contact::class, mappedBy: 'societe')]
    protected Collection $contacts;

    #[ORM\ManyToOne(targetEntity: self::class, inversedBy: 'filliales')]
    private $societeMere;

    #[ORM\OneToMany(mappedBy: 'societeMere', targetEntity: self::class)]
    private $filliales;

    public function __construct()
    {
        $this->contacts = new ArrayCollection();
        $this->filliales = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(?string $ville): self
    {
        $this->ville = $ville;

        return $this;
    }

    /**
     * @return Collection|Contact[]
     */
    public function getContacts(): Collection
    {
        return $this->contacts;
    }

    public function addContact(Contact $contact): self
    {
        if (!$this->contacts->contains($contact)) {
            $this->contacts[] = $contact;
            $contact->setSociete($this);
        }

        return $this;
    }

    public function removeContact(Contact $contact): self
    {
        if ($this->contacts->removeElement($contact)) {
            // set the owning side to null (unless already changed)
            if ($contact->getSociete() === $this) {
                $contact->setSociete(null);
            }
        }

        return $this;
    }

    public function getSocieteMere(): ?self
    {
        return $this->societeMere;
    }

    public function setSocieteMere(?self $societeMere): self
    {
        $this->societeMere = $societeMere;

        return $this;
    }

    /**
     * @return Collection|self[]
     */
    public function getFilliales(): Collection
    {
        return $this->filliales;
    }

    public function addFilliale(self $filliale): self
    {
        if (!$this->filliales->contains($filliale)) {
            $this->filliales[] = $filliale;
            $filliale->setSocieteMere($this);
        }

        return $this;
    }

    public function removeFilliale(self $filliale): self
    {
        if ($this->filliales->removeElement($filliale)) {
            // set the owning side to null (unless already changed)
            if ($filliale->getSocieteMere() === $this) {
                $filliale->setSocieteMere(null);
            }
        }

        return $this;
    }
}
