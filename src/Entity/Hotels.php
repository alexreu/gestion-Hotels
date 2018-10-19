<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\HotelsRepository")
 */
class Hotels
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
     * @ORM\Column(type="float")
     */
    private $tarif;

    /**
     * @ORM\Column(type="integer")
     */
    private $secteur;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Chambres", mappedBy="id_hotel")
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

    public function getTarif(): ?float
    {
        return $this->tarif;
    }

    public function setTarif(float $tarif): self
    {
        $this->tarif = $tarif;

        return $this;
    }

    public function getSecteur(): ?int
    {
        return $this->secteur;
    }

    public function setSecteur(int $secteur): self
    {
        $this->secteur = $secteur;

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
            $idChambre->setIdHotel($this);
        }

        return $this;
    }

    public function removeIdChambre(Chambres $idChambre): self
    {
        if ($this->id_chambre->contains($idChambre)) {
            $this->id_chambre->removeElement($idChambre);
            // set the owning side to null (unless already changed)
            if ($idChambre->getIdHotel() === $this) {
                $idChambre->setIdHotel(null);
            }
        }

        return $this;
    }
}
