<?php

namespace App\Entity;

use App\Repository\RecetteRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RecetteRepository::class)]
class Recette
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $image = null;

    #[ORM\Column]
    private ?bool $est_favori = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $quantite3 = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $ingredient3 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $ingredient2 = null;

    #[ORM\Column(length: 255)]
    private ?string $ingredient1 = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(length: 255)]
    private ?string $quantite1 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $quantite2 = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function isEstFavori(): ?bool
    {
        return $this->est_favori;
    }

    public function setEstFavori(bool $est_favori): self
    {
        $this->est_favori = $est_favori;

        return $this;
    }

    public function getQuantite3(): ?string
    {
        return $this->quantite3;
    }

    public function setQuantite3(?string $quantite3): self
    {
        $this->quantite3 = $quantite3;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getIngredient3(): ?string
    {
        return $this->ingredient3;
    }

    public function setIngredient3(?string $ingredient3): self
    {
        $this->ingredient3 = $ingredient3;

        return $this;
    }

    public function getIngredient2(): ?string
    {
        return $this->ingredient2;
    }

    public function setIngredient2(?string $ingredient2): self
    {
        $this->ingredient2 = $ingredient2;

        return $this;
    }

    public function getIngredient1(): ?string
    {
        return $this->ingredient1;
    }

    public function setIngredient1(string $ingredient1): self
    {
        $this->ingredient1 = $ingredient1;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getQuantite1(): ?string
    {
        return $this->quantite1;
    }

    public function setQuantite1(string $quantite1): self
    {
        $this->quantite1 = $quantite1;

        return $this;
    }

    public function getQuantite2(): ?string
    {
        return $this->quantite2;
    }

    public function setQuantite2(string $quantite2): self
    {
        $this->quantite2 = $quantite2;

        return $this;
    }
}
