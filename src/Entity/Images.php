<?php

namespace App\Entity;

use App\Repository\ImagesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ImagesRepository::class)]
class Images
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $nom = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $photo = null;

    #[ORM\ManyToOne(inversedBy: 'images')]
    private ?Club $image_club = null;

    #[ORM\ManyToOne(inversedBy: 'images')]
    private ?Utilisateurs $image_utilisateur = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(?string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPhoto(): ?string
    {
        return $this->photo;
    }

    public function setPhoto(?string $photo): static
    {
        $this->photo = $photo;

        return $this;
    }

    public function getImageClub(): ?Club
    {
        return $this->image_club;
    }

    public function setImageClub(?Club $image_club): static
    {
        $this->image_club = $image_club;

        return $this;
    }

    public function getImageUtilisateur(): ?Utilisateurs
    {
        return $this->image_utilisateur;
    }

    public function setImageUtilisateur(?Utilisateurs $image_utilisateur): static
    {
        $this->image_utilisateur = $image_utilisateur;

        return $this;
    }

    public function __toString(): string
    {
        return $this->nom ?: '';
    }
}
