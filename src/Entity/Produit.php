<?php

namespace App\Entity;

use App\Repository\ProduitRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProduitRepository::class)]
class Produit
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $libelle_produit = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 6, scale: 2)]
    private ?string $prix_achat_ht = null;

    #[ORM\Column(length: 255)]
    private ?string $photo_produit = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 6, scale: 2)]
    private ?string $prix_vente_ht = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $description_produit = null;

    #[ORM\ManyToOne]
    private ?SousRubrique $id_sous_rubrique = null;

    #[ORM\ManyToOne]
    private ?Rubrique $id_rubrique = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelleProduit(): ?string
    {
        return $this->libelle_produit;
    }

    public function setLibelleProduit(string $libelle_produit): static
    {
        $this->libelle_produit = $libelle_produit;

        return $this;
    }

    public function getPrixAchatHt(): ?string
    {
        return $this->prix_achat_ht;
    }

    public function setPrixAchatHt(string $prix_achat_ht): static
    {
        $this->prix_achat_ht = $prix_achat_ht;

        return $this;
    }

    public function getPhotoProduit(): ?string
    {
        return $this->photo_produit;
    }

    public function setPhotoProduit(string $photo_produit): static
    {
        $this->photo_produit = $photo_produit;

        return $this;
    }

    public function getPrixVenteHt(): ?string
    {
        return $this->prix_vente_ht;
    }

    public function setPrixVenteHt(string $prix_vente_ht): static
    {
        $this->prix_vente_ht = $prix_vente_ht;

        return $this;
    }

    public function getDescriptionProduit(): ?string
    {
        return $this->description_produit;
    }

    public function setDescriptionProduit(?string $description_produit): static
    {
        $this->description_produit = $description_produit;

        return $this;
    }

    public function getIdSousRubrique(): ?SousRubrique
    {
        return $this->id_sous_rubrique;
    }

    public function setIdSousRubrique(?SousRubrique $id_sous_rubrique): static
    {
        $this->id_sous_rubrique = $id_sous_rubrique;

        return $this;
    }

    public function getIdRubrique(): ?Rubrique
    {
        return $this->id_rubrique;
    }

    public function setIdRubrique(?Rubrique $id_rubrique): static
    {
        $this->id_rubrique = $id_rubrique;

        return $this;
    }
}
