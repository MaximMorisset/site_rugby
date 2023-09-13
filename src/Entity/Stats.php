<?php

namespace App\Entity;

use App\Repository\StatsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: StatsRepository::class)]
class Stats
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(nullable: true)]
    private ?int $points_marque = null;

    #[ORM\Column(nullable: true)]
    private ?int $nbr_essai = null;

    #[ORM\Column(nullable: true)]
    private ?int $points_marque_pieds = null;

    #[ORM\Column(nullable: true)]
    private ?int $plaquage = null;

    #[ORM\Column(nullable: true)]
    private ?int $plaquage_reussi = null;

    #[ORM\Column(nullable: true)]
    private ?int $plaquage_rate = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPointsMarque(): ?int
    {
        return $this->points_marque;
    }

    public function setPointsMarque(?int $points_marque): static
    {
        $this->points_marque = $points_marque;

        return $this;
    }

    public function getNbrEssai(): ?int
    {
        return $this->nbr_essai;
    }

    public function setNbrEssai(?int $nbr_essai): static
    {
        $this->nbr_essai = $nbr_essai;

        return $this;
    }

    public function getPointsMarquePieds(): ?int
    {
        return $this->points_marque_pieds;
    }

    public function setPointsMarquePieds(?int $points_marque_pieds): static
    {
        $this->points_marque_pieds = $points_marque_pieds;

        return $this;
    }

    public function getPlaquage(): ?int
    {
        return $this->plaquage;
    }

    public function setPlaquage(?int $plaquage): static
    {
        $this->plaquage = $plaquage;

        return $this;
    }

    public function getPlaquageReussi(): ?int
    {
        return $this->plaquage_reussi;
    }

    public function setPlaquageReussi(?int $plaquage_reussi): static
    {
        $this->plaquage_reussi = $plaquage_reussi;

        return $this;
    }

    public function getPlaquageRate(): ?int
    {
        return $this->plaquage_rate;
    }

    public function setPlaquageRate(?int $plaquage_rate): static
    {
        $this->plaquage_rate = $plaquage_rate;

        return $this;
    }
}
