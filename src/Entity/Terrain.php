<?php

namespace App\Entity;

use App\Repository\TerrainRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TerrainRepository::class)]
class Terrain
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $lieu = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?Entrainement $entrainement = null;

    #[ORM\ManyToMany(targetEntity: Club::class, inversedBy: 'terrains')]
    private Collection $relation;

    public function __construct()
    {
        $this->relation = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getEntrainement(): ?Entrainement
    {
        return $this->entrainement;
    }

    public function setEntrainement(?Entrainement $entrainement): static
    {
        $this->entrainement = $entrainement;

        return $this;
    }

    /**
     * @return Collection<int, Club>
     */
    public function getRelation(): Collection
    {
        return $this->relation;
    }

    public function addRelation(Club $relation): static
    {
        if (!$this->relation->contains($relation)) {
            $this->relation->add($relation);
        }

        return $this;
    }

    public function removeRelation(Club $relation): static
    {
        $this->relation->removeElement($relation);

        return $this;
    }

    public function __toString()
    {
        return $this->getLieu();
    }
}
