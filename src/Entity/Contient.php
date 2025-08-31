<?php

namespace App\Entity;

use App\Repository\ContientRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ContientRepository::class)]
class Contient
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne]
    private ?produit $id_produit = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?BonCommande $id_bon_commande = null;

    #[ORM\Column(length: 50)]
    private ?string $quantite = null;



    public function getId(): ?int
    {
        return $this->id;
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

    public function getIdBonCommande(): ?BonCommande
    {
        return $this->id_bon_commande;
    }

    public function setIdBonCommande(?BonCommande $id_bon_commande): static
    {
        $this->id_bon_commande = $id_bon_commande;

        return $this;
    }

    public function getQuantite(): ?string
    {
        return $this->quantite;
    }

    public function setQuantite(string $quantite): static
    {
        $this->quantite = $quantite;

        return $this;
    }
}
