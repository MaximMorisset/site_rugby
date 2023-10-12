<?php

namespace App\Entity;

use App\Repository\AdhesionClubRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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

    #[ORM\ManyToMany(targetEntity: utilisateurs::class, inversedBy: 'adhesionclubs')]
    private Collection $relation;

    #[ORM\ManyToMany(targetEntity: Club::class, inversedBy: 'adhesionclubs')]
    private Collection $relation2;

    public function __construct()
    {
        $this->relation = new ArrayCollection();
        $this->relation2 = new ArrayCollection();
    }

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

    /**
     * @return Collection<int, utilisateurs>
     */
    public function getRelation(): Collection
    {
        return $this->relation;
    }

    public function addRelation(utilisateurs $relation): static
    {
        if (!$this->relation->contains($relation)) {
            $this->relation->add($relation);
        }

        return $this;
    }

    public function removeRelation(utilisateurs $relation): static
    {
        $this->relation->removeElement($relation);

        return $this;
    }

    /**
     * @return Collection<int, Club>
     */
    public function getRelation2(): Collection
    {
        return $this->relation2;
    }

    public function addRelation2(Club $relation2): static
    {
        if (!$this->relation2->contains($relation2)) {
            $this->relation2->add($relation2);
        }

        return $this;
    }

    public function removeRelation2(Club $relation2): static
    {
        $this->relation2->removeElement($relation2);

        return $this;
    }
}
