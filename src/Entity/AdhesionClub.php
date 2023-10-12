<?php

namespace App\Entity;

use App\Repository\AdhesionClubRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AdhesionClubRepository::class)]
class AdhesionClub
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $date_demande = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $date_appro = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $role = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $statut_adhesion = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateDemande(): ?string
    {
        return $this->date_demande;
    }

    public function setDateDemande(?string $date_demande): static
    {
        $this->date_demande = $date_demande;

        return $this;
    }

    public function getDateAppro(): ?string
    {
        return $this->date_appro;
    }

    public function setDateAppro(?string $date_appro): static
    {
        $this->date_appro = $date_appro;

        return $this;
    }

    public function getRole(): ?string
    {
        return $this->role;
    }

    public function setRole(?string $role): static
    {
        $this->role = $role;

        return $this;
    }

    public function getStatutAdhesion(): ?string
    {
        return $this->statut_adhesion;
    }

    public function setStatutAdhesion(?string $statut_adhesion): static
    {
        $this->statut_adhesion = $statut_adhesion;

        return $this;
    }
}
