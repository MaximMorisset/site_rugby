<?php

namespace App\Entity;

use App\Repository\EquipeMatchRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EquipeMatchRepository::class)]
class EquipeMatch
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'equipe_match')]
    private ?Matchs $matchs = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMatchs(): ?Matchs
    {
        return $this->matchs;
    }

    public function setMatchs(?Matchs $matchs): static
    {
        $this->matchs = $matchs;

        return $this;
    }
}
