<?php

namespace App\Entity;

use App\Repository\UtilisateursRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

#[ORM\Entity(repositoryClass: UtilisateursRepository::class)]
#[UniqueEntity(fields: ['email'], message: 'There is already an account with this email')]
class Utilisateurs implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 180, unique: true)]
    private ?string $email = null;

    #[ORM\Column]
    private array $roles = [];

    /**
     * @var string The hashed password
     */
    #[ORM\Column]
    private ?string $password = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(length: 255)]
    private ?string $prenom = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $annee_naissance = null;

    #[ORM\ManyToMany(targetEntity: Poste::class, mappedBy: 'joueurs')]
    private Collection $postes;

    #[ORM\ManyToMany(targetEntity: Equipe::class, inversedBy: 'utilisateurs')]
    private Collection $equipes;

    #[ORM\OneToMany(mappedBy: 'utilisateurs', targetEntity: Stats::class)]
    private Collection $stats;

    #[ORM\ManyToMany(targetEntity: Club::class, inversedBy: 'utilisateurs')]
    private Collection $club;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $fondateur = null;

    #[ORM\ManyToMany(targetEntity: Adhesionclub::class, mappedBy: 'relation')]
    private Collection $adhesionclubs;

    #[ORM\OneToMany(mappedBy: 'fondateur', targetEntity: Club::class)]
    private Collection $clubFonda;


    public function __construct()
    {
        $this->postes = new ArrayCollection();
        $this->equipes = new ArrayCollection();
        $this->stats = new ArrayCollection();
        $this->club = new ArrayCollection();
        $this->adhesionclubs = new ArrayCollection();
        $this->clubs = new ArrayCollection();
        $this->clubFonda = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): static
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): static
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials(): void
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
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

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): static
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getAnneeNaissance(): ?\DateTimeInterface
    {
        return $this->annee_naissance;
    }

    public function setAnneeNaissance(\DateTimeInterface $annee_naissance): static
    {
        $this->annee_naissance = $annee_naissance;

        return $this;
    }

    /**
     * @return Collection<int, Poste>
     */
    public function getPostes(): Collection
    {
        return $this->postes;
    }

    public function addPoste(Poste $poste): static
    {
        if (!$this->postes->contains($poste)) {
            $this->postes->add($poste);
            $poste->addJoueur($this);
        }

        return $this;
    }

    public function removePoste(Poste $poste): static
    {
        if ($this->postes->removeElement($poste)) {
            $poste->removeJoueur($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, Equipe>
     */
    public function getEquipes(): Collection
    {
        return $this->equipes;
    }

    public function addEquipe(Equipe $equipe): static
    {
        if (!$this->equipes->contains($equipe)) {
            $this->equipes->add($equipe);
        }

        return $this;
    }

    public function removeEquipe(Equipe $equipe): static
    {
        $this->equipes->removeElement($equipe);

        return $this;
    }

    /**
     * @return Collection<int, Stats>
     */
    public function getStats(): Collection
    {
        return $this->stats;
    }

    public function addStat(Stats $stat): static
    {
        if (!$this->stats->contains($stat)) {
            $this->stats->add($stat);
            $stat->setUtilisateurs($this);
        }

        return $this;
    }

    public function removeStat(Stats $stat): static
    {
        if ($this->stats->removeElement($stat)) {
            // set the owning side to null (unless already changed)
            if ($stat->getUtilisateurs() === $this) {
                $stat->setUtilisateurs(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Club>
     */
    public function getClub(): Collection
    {
        return $this->club;
    }

    public function addClub(Club $club): static
    {
        if (!$this->club->contains($club)) {
            $this->club->add($club);
        }

        return $this;
    }

    public function removeClub(Club $club): static
    {
        $this->club->removeElement($club);

        return $this;
    }

    public function getFondateur(): ?string
    {
        return $this->fondateur;
    }

    public function setFondateur(?string $fondateur): static
    {
        $this->fondateur = $fondateur;

        return $this;
    }

    /**
     * @return Collection<int, Adhesionclub>
     */
    public function getAdhesionclubs(): Collection
    {
        return $this->adhesionclubs;
    }

    public function addAdhesionclub(Adhesionclub $adhesionclub): static
    {
        if (!$this->adhesionclubs->contains($adhesionclub)) {
            $this->adhesionclubs->add($adhesionclub);
            $adhesionclub->addRelation($this);
        }

        return $this;
    }

    public function removeAdhesionclub(Adhesionclub $adhesionclub): static
    {
        if ($this->adhesionclubs->removeElement($adhesionclub)) {
            $adhesionclub->removeRelation($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, Club>
     */
    public function getClubFonda(): Collection
    {
        return $this->clubFonda;
    }

    public function addClubFonda(Club $clubFonda): static
    {
        if (!$this->clubFonda->contains($clubFonda)) {
            $this->clubFonda->add($clubFonda);
            $clubFonda->setFondateur($this);
        }

        return $this;
    }

    public function removeClubFonda(Club $clubFonda): static
    {
        if ($this->clubFonda->removeElement($clubFonda)) {
            // set the owning side to null (unless already changed)
            if ($clubFonda->getFondateur() === $this) {
                $clubFonda->setFondateur(null);
            }
        }

        return $this;
    }

}
