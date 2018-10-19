<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ClientsRepository")
 */
class Clients
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $adresse;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $telephone;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Chambres", mappedBy="id_client")
     */
    private $id_chambre;

    public function __construct()
    {
        $this->id_chambre = new ArrayCollection();
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

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(string $telephone): self
    {
        $this->telephone = $telephone;

        return $this;
    }

    /**
     * @return Collection|Chambres[]
     */
    public function getIdChambre(): Collection
    {
        return $this->id_chambre;
    }

    public function addIdChambre(Chambres $idChambre): self
    {
        if (!$this->id_chambre->contains($idChambre)) {
            $this->id_chambre[] = $idChambre;
            $idChambre->setIdClient($this);
        }

        return $this;
    }

    public function removeIdChambre(Chambres $idChambre): self
    {
        if ($this->id_chambre->contains($idChambre)) {
            $this->id_chambre->removeElement($idChambre);
            // set the owning side to null (unless already changed)
            if ($idChambre->getIdClient() === $this) {
                $idChambre->setIdClient(null);
            }
        }

        return $this;
    }
}
