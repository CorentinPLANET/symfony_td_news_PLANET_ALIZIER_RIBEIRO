<?php

namespace App\Entity;

use App\Repository\ScheduleRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ScheduleRepository::class)]
class Schedule
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: Promo::class, inversedBy: 'id')]
    #[ORM\Column]
    private Promo $promo;

    #[ORM\Column(type: Types::SMALLINT)]
    private ?int $matine = null;

    #[ORM\Column(length: 255)]
    private ?string $cours = null;

    #[ORM\Column(length: 255)]
    private ?string $professeur = null;

    #[ORM\Column(length: 255)]
    private ?string $salle = null;

    #[ORM\Column(length: 255)]
    private ?string $specialite = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTime $dates = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): static
    {
        $this->id = $id;

        return $this;
    }

    public function getPromo(): ?Promo
    {
        return $this->promo;
    }

    public function setPromoId(?Promo $promo): self
    {
        $this->promo = $promo;

        return $this;
    }

    public function getMatine(): ?int
    {
        return $this->matine;
    }

    public function setMatine(int $matine): static
    {
        $this->matine = $matine;

        return $this;
    }

    public function getCours(): ?string
    {
        return $this->cours;
    }

    public function setCours(string $cours): static
    {
        $this->cours = $cours;

        return $this;
    }

    public function getProfesseur(): ?string
    {
        return $this->professeur;
    }

    public function setProfesseur(string $professeur): static
    {
        $this->professeur = $professeur;

        return $this;
    }

    public function getSalle(): ?string
    {
        return $this->salle;
    }

    public function setSalle(string $salle): static
    {
        $this->salle = $salle;

        return $this;
    }

    public function getSpecialite(): ?string
    {
        return $this->specialite;
    }

    public function setSpecialite(string $specialite): static
    {
        $this->specialite = $specialite;

        return $this;
    }

    public function getDates(): ?\DateTime
    {
        return $this->dates;
    }

    public function setDates(\DateTime $dates): static
    {
        $this->dates = $dates;

        return $this;
    }
}
