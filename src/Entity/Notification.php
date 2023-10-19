<?php

namespace App\Entity;

use App\Repository\NotificationRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: NotificationRepository::class)]
class Notification
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $contenu = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $dateCreation = null;

    #[ORM\ManyToOne(inversedBy: 'destinataire')]
    private ?Utilisateurs $destinataire = null;

    #[ORM\ManyToOne(inversedBy: 'demandeAdhesion')]
    private ?AdhesionClub $demandeAdhesion = null;

    #[ORM\ManyToOne(inversedBy: 'type')]
    private ?TypeNotification $type = null;

    #[ORM\ManyToOne(inversedBy: 'etat')]
    private ?EtatNotification $etat = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getContenu(): ?string
    {
        return $this->contenu;
    }

    public function setContenu(?string $contenu): static
    {
        $this->contenu = $contenu;

        return $this;
    }

    public function getDateCreation(): ?\DateTimeInterface
    {
        return $this->dateCreation;
    }

    public function setDateCreation(?\DateTimeInterface $dateCreation): static
    {
        $this->dateCreation = $dateCreation;

        return $this;
    }

    public function getDestinataire(): ?Utilisateurs
    {
        return $this->destinataire;
    }

    public function setDestinataire(?Utilisateurs $destinataire): static
    {
        $this->destinataire = $destinataire;

        return $this;
    }

    public function getDemandeAdhesion(): ?AdhesionClub
    {
        return $this->demandeAdhesion;
    }

    public function setDemandeAdhesion(?AdhesionClub $demandeAdhesion): static
    {
        $this->demandeAdhesion = $demandeAdhesion;

        return $this;
    }

    public function getType(): ?TypeNotification
    {
        return $this->type;
    }

    public function setType(?TypeNotification $type): static
    {
        $this->type = $type;

        return $this;
    }

    public function getEtat(): ?EtatNotification
    {
        return $this->etat;
    }

    public function setEtat(?EtatNotification $etat): static
    {
        $this->etat = $etat;

        return $this;
    }
}
