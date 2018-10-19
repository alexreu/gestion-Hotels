<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ChambresRepository")
 */
class Chambres
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
     * @ORM\Column(type="boolean")
     */
    private $statut_menage;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Hotel", inversedBy="id_chambre")
     * @ORM\JoinColumn(nullable=false)
     */
    private $id_hotel;

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

    public function getStatutMenage(): ?bool
    {
        return $this->statut_menage;
    }

    public function setStatutMenage(bool $statut_menage): self
    {
        $this->statut_menage = $statut_menage;

        return $this;
    }

    public function getIdHotel(): ?Hotel
    {
        return $this->id_hotel;
    }

    public function setIdHotel(?Hotel $id_hotel): self
    {
        $this->id_hotel = $id_hotel;

        return $this;
    }
}
