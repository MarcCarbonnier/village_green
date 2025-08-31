<?php

namespace App\Entity;

use App\Repository\FournisseursRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FournisseursRepository::class)]
class Fournisseurs
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $ref_fournisseurs = null;

    #[ORM\Column(length: 50)]
    private ?string $nom_fournisseurs = null;

    #[ORM\Column(length: 50)]
    private ?string $type_fournisseurs = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRefFournisseurs(): ?string
    {
        return $this->ref_fournisseurs;
    }

    public function setRefFournisseurs(string $ref_fournisseurs): static
    {
        $this->ref_fournisseurs = $ref_fournisseurs;

        return $this;
    }

    public function getNomFournisseurs(): ?string
    {
        return $this->nom_fournisseurs;
    }

    public function setNomFournisseurs(string $nom_fournisseurs): static
    {
        $this->nom_fournisseurs = $nom_fournisseurs;

        return $this;
    }

    public function getTypeFournisseurs(): ?string
    {
        return $this->type_fournisseurs;
    }

    public function setTypeFournisseurs(string $type_fournisseurs): static
    {
        $this->type_fournisseurs = $type_fournisseurs;

        return $this;
    }
}
