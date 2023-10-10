<?php

namespace App\Entity;

use App\Repository\ClubRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ClubRepository::class)]
class Club
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\ManyToMany(targetEntity: Utilisateurs::class, mappedBy: 'club')]
    private Collection $utilisateurs;

    #[ORM\OneToMany(mappedBy: 'club', targetEntity: Equipement::class)]
    private Collection $equipement;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?EquipeMatch $equipe_match = null;

    #[ORM\ManyToMany(targetEntity: Terrain::class, mappedBy: 'relation')]
    private Collection $terrains;

    #[ORM\Column(nullable: true)]
    private ?int $telephone = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $clubhouse = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $ville = null;

    #[ORM\Column(nullable: true)]
    private ?int $code_postale = null;

    #[ORM\Column(nullable: true)]
    private ?bool $entente = null;

    public function __construct()
    {
        $this->utilisateurs = new ArrayCollection();
        $this->equipement = new ArrayCollection();
        $this->terrains = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * @return Collection<int, Utilisateurs>
     */
    public function getUtilisateurs(): Collection
    {
        return $this->utilisateurs;
    }

    public function addUtilisateur(Utilisateurs $utilisateur): static
    {
        if (!$this->utilisateurs->contains($utilisateur)) {
            $this->utilisateurs->add($utilisateur);
            $utilisateur->addClub($this);
        }

        return $this;
    }

    public function removeUtilisateur(Utilisateurs $utilisateur): static
    {
        if ($this->utilisateurs->removeElement($utilisateur)) {
            $utilisateur->removeClub($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, Equipement>
     */
    public function getEquipement(): Collection
    {
        return $this->equipement;
    }

    public function addEquipement(Equipement $equipement): static
    {
        if (!$this->equipement->contains($equipement)) {
            $this->equipement->add($equipement);
            $equipement->setClub($this);
        }

        return $this;
    }

    public function removeEquipement(Equipement $equipement): static
    {
        if ($this->equipement->removeElement($equipement)) {
            // set the owning side to null (unless already changed)
            if ($equipement->getClub() === $this) {
                $equipement->setClub(null);
            }
        }

        return $this;
    }

    public function getEquipeMatch(): ?EquipeMatch
    {
        return $this->equipe_match;
    }

    public function setEquipeMatch(?EquipeMatch $equipe_match): static
    {
        $this->equipe_match = $equipe_match;

        return $this;
    }

    /**
     * @return Collection<int, Terrain>
     */
    public function getTerrains(): Collection
    {
        return $this->terrains;
    }

    public function addTerrain(Terrain $terrain): static
    {
        if (!$this->terrains->contains($terrain)) {
            $this->terrains->add($terrain);
            $terrain->addRelation($this);
        }

        return $this;
    }

    public function removeTerrain(Terrain $terrain): static
    {
        if ($this->terrains->removeElement($terrain)) {
            $terrain->removeRelation($this);
        }

        return $this;
    }

    public function getTelephone(): ?int
    {
        return $this->telephone;
    }

    public function setTelephone(?int $telephone): static
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getClubhouse(): ?string
    {
        return $this->clubhouse;
    }

    public function setClubhouse(?string $clubhouse): static
    {
        $this->clubhouse = $clubhouse;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(string $ville): static
    {
        $this->ville = $ville;

        return $this;
    }

    public function getCodePostale(): ?int
    {
        return $this->code_postale;
    }

    public function setCodePostale(?int $code_postale): static
    {
        $this->code_postale = $code_postale;

        return $this;
    }

    public function isEntente(): ?bool
    {
        return $this->entente;
    }

    public function setEntente(?bool $entente): static
    {
        $this->entente = $entente;

        return $this;
    }
}
