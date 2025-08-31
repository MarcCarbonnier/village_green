<?php

namespace App\Entity;

use App\Repository\LivreRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LivreRepository::class)]
class Livre
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne]
    private ?fournisseurs $id_founisseurs = null;

    #[ORM\ManyToOne]
    private ?produit $id_produit = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdFounisseurs(): ?fournisseurs
    {
        return $this->id_founisseurs;
    }

    public function setIdFounisseurs(?fournisseurs $id_founisseurs): static
    {
        $this->id_founisseurs = $id_founisseurs;

        return $this;
    }

    public function getIdProduit(): ?produit
    {
        return $this->id_produit;
    }

    public function setIdProduit(?produit $id_produit): static
    {
        $this->id_produit = $id_produit;

        return $this;
    }
}
