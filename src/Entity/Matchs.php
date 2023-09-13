<?php

namespace App\Entity;

use App\Repository\MatchsRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MatchsRepository::class)]
class Matchs
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $date_heure = null;

    #[ORM\Column(length: 255)]
    private ?string $equipe_club = null;

    #[ORM\Column(length: 255)]
    private ?string $adveradversaire = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $lieu = null;

    #[ORM\Column]
    private ?int $prix = null;

    #[ORM\Column]
    private ?bool $amicale = null;

    #[ORM\Column]
    private ?bool $annule = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateHeure(): ?\DateTimeInterface
    {
        return $this->date_heure;
    }

    public function setDateHeure(\DateTimeInterface $date_heure): static
    {
        $this->date_heure = $date_heure;

        return $this;
    }

    public function getEquipeClub(): ?string
    {
        return $this->equipe_club;
    }

    public function setEquipeClub(string $equipe_club): static
    {
        $this->equipe_club = $equipe_club;

        return $this;
    }

    public function getAdveradversaire(): ?string
    {
        return $this->adveradversaire;
    }

    public function setAdveradversaire(string $adveradversaire): static
    {
        $this->adveradversaire = $adveradversaire;

        return $this;
    }

    public function getLieu(): ?string
    {
        return $this->lieu;
    }

    public function setLieu(string $lieu): static
    {
        $this->lieu = $lieu;

        return $this;
    }

    public function getPrix(): ?int
    {
        return $this->prix;
    }

    public function setPrix(int $prix): static
    {
        $this->prix = $prix;

        return $this;
    }

    public function isAmicale(): ?bool
    {
        return $this->amicale;
    }

    public function setAmicale(bool $amicale): static
    {
        $this->amicale = $amicale;

        return $this;
    }

    public function isAnnule(): ?bool
    {
        return $this->annule;
    }

    public function setAnnule(bool $annule): static
    {
        $this->annule = $annule;

        return $this;
    }
}
