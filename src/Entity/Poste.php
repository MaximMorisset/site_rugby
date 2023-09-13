<?php

namespace App\Entity;

use App\Repository\PosteRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PosteRepository::class)]
class Poste
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $pillier_gauche = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $talonneur = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $pillier_droit = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $deuxieme_ligne_gauche = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $deuxieme_ligne_droit = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $troisieme_ligne_gauche = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $troisieme_ligne_droit = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $troisieme_ligne_centre = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $demi_de_melee = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $ouvreur = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $aillier_gauche = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $centre_gauche = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $centre_droit = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $aillier_droit = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $arriere = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $finisseur1 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $finisseur2 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $finisseur3 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $finisseur4 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $finisseur5 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $finisseur6 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $finisseur7 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $finisseur8 = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPillierGauche(): ?string
    {
        return $this->pillier_gauche;
    }

    public function setPillierGauche(?string $pillier_gauche): static
    {
        $this->pillier_gauche = $pillier_gauche;

        return $this;
    }

    public function getTalonneur(): ?string
    {
        return $this->talonneur;
    }

    public function setTalonneur(?string $talonneur): static
    {
        $this->talonneur = $talonneur;

        return $this;
    }

    public function getPillierDroit(): ?string
    {
        return $this->pillier_droit;
    }

    public function setPillierDroit(?string $pillier_droit): static
    {
        $this->pillier_droit = $pillier_droit;

        return $this;
    }

    public function getDeuxiemeLigneGauche(): ?string
    {
        return $this->deuxieme_ligne_gauche;
    }

    public function setDeuxiemeLigneGauche(?string $deuxieme_ligne_gauche): static
    {
        $this->deuxieme_ligne_gauche = $deuxieme_ligne_gauche;

        return $this;
    }

    public function getDeuxiemeLigneDroit(): ?string
    {
        return $this->deuxieme_ligne_droit;
    }

    public function setDeuxiemeLigneDroit(?string $deuxieme_ligne_droit): static
    {
        $this->deuxieme_ligne_droit = $deuxieme_ligne_droit;

        return $this;
    }

    public function getTroisiemeLigneGauche(): ?string
    {
        return $this->troisieme_ligne_gauche;
    }

    public function setTroisiemeLigneGauche(?string $troisieme_ligne_gauche): static
    {
        $this->troisieme_ligne_gauche = $troisieme_ligne_gauche;

        return $this;
    }

    public function getTroisiemeLigneDroit(): ?string
    {
        return $this->troisieme_ligne_droit;
    }

    public function setTroisiemeLigneDroit(?string $troisieme_ligne_droit): static
    {
        $this->troisieme_ligne_droit = $troisieme_ligne_droit;

        return $this;
    }

    public function getTroisiemeLigneCentre(): ?string
    {
        return $this->troisieme_ligne_centre;
    }

    public function setTroisiemeLigneCentre(?string $troisieme_ligne_centre): static
    {
        $this->troisieme_ligne_centre = $troisieme_ligne_centre;

        return $this;
    }

    public function getDemiDeMelee(): ?string
    {
        return $this->demi_de_melee;
    }

    public function setDemiDeMelee(?string $demi_de_melee): static
    {
        $this->demi_de_melee = $demi_de_melee;

        return $this;
    }

    public function getOuvreur(): ?string
    {
        return $this->ouvreur;
    }

    public function setOuvreur(?string $ouvreur): static
    {
        $this->ouvreur = $ouvreur;

        return $this;
    }

    public function getAillierGauche(): ?string
    {
        return $this->aillier_gauche;
    }

    public function setAillierGauche(?string $aillier_gauche): static
    {
        $this->aillier_gauche = $aillier_gauche;

        return $this;
    }

    public function getCentreGauche(): ?string
    {
        return $this->centre_gauche;
    }

    public function setCentreGauche(?string $centre_gauche): static
    {
        $this->centre_gauche = $centre_gauche;

        return $this;
    }

    public function getCentreDroit(): ?string
    {
        return $this->centre_droit;
    }

    public function setCentreDroit(?string $centre_droit): static
    {
        $this->centre_droit = $centre_droit;

        return $this;
    }

    public function getAillierDroit(): ?string
    {
        return $this->aillier_droit;
    }

    public function setAillierDroit(?string $aillier_droit): static
    {
        $this->aillier_droit = $aillier_droit;

        return $this;
    }

    public function getArriere(): ?string
    {
        return $this->arriere;
    }

    public function setArriere(?string $arriere): static
    {
        $this->arriere = $arriere;

        return $this;
    }

    public function getFinisseur1(): ?string
    {
        return $this->finisseur1;
    }

    public function setFinisseur1(?string $finisseur1): static
    {
        $this->finisseur1 = $finisseur1;

        return $this;
    }

    public function getFinisseur2(): ?string
    {
        return $this->finisseur2;
    }

    public function setFinisseur2(?string $finisseur2): static
    {
        $this->finisseur2 = $finisseur2;

        return $this;
    }

    public function getFinisseur3(): ?string
    {
        return $this->finisseur3;
    }

    public function setFinisseur3(?string $finisseur3): static
    {
        $this->finisseur3 = $finisseur3;

        return $this;
    }

    public function getFinisseur4(): ?string
    {
        return $this->finisseur4;
    }

    public function setFinisseur4(?string $finisseur4): static
    {
        $this->finisseur4 = $finisseur4;

        return $this;
    }

    public function getFinisseur5(): ?string
    {
        return $this->finisseur5;
    }

    public function setFinisseur5(?string $finisseur5): static
    {
        $this->finisseur5 = $finisseur5;

        return $this;
    }

    public function getFinisseur6(): ?string
    {
        return $this->finisseur6;
    }

    public function setFinisseur6(?string $finisseur6): static
    {
        $this->finisseur6 = $finisseur6;

        return $this;
    }

    public function getFinisseur7(): ?string
    {
        return $this->finisseur7;
    }

    public function setFinisseur7(?string $finisseur7): static
    {
        $this->finisseur7 = $finisseur7;

        return $this;
    }

    public function getFinisseur8(): ?string
    {
        return $this->finisseur8;
    }

    public function setFinisseur8(?string $finisseur8): static
    {
        $this->finisseur8 = $finisseur8;

        return $this;
    }
}
