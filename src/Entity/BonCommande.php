<?php

namespace App\Entity;

use App\Repository\BonCommandeRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BonCommandeRepository::class)]
class BonCommande
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $desc_commande = null;

    #[ORM\Column(length: 50)]
    private ?string $ident_produit = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 6, scale: 2, nullable: true)]
    private ?string $prix_ht = null;

    #[ORM\Column(length: 50)]
    private ?string $tva = null;

    #[ORM\Column]
    private ?int $quant_produit = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 6, scale: 2)]
    private ?string $montant_total_ht = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 6, scale: 2)]
    private ?string $montant_total_ttc = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTime $date_livraison = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 5, scale: 2)]
    private ?string $frais_port = null;

    #[ORM\Column(length: 50)]
    private ?string $moyen_payement = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 6, scale: 2)]
    private ?string $acompte = null;

    #[ORM\Column(length: 50)]
    private ?string $delai_reglement = null;

    #[ORM\Column(length: 50)]
    private ?string $num_commande = null;

    #[ORM\Column(length: 50)]
    private ?string $statut_commande = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTime $date_edition_bon = null;

    #[ORM\ManyToOne(inversedBy: 'id_bon_commande')]
    private ?Facture $facture = null;

    #[ORM\ManyToOne(inversedBy: 'ref_client')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Client $ref_client = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDescCommande(): ?string
    {
        return $this->desc_commande;
    }

    public function setDescCommande(string $desc_commande): static
    {
        $this->desc_commande = $desc_commande;

        return $this;
    }

    public function getIdentProduit(): ?string
    {
        return $this->ident_produit;
    }

    public function setIdentProduit(string $ident_produit): static
    {
        $this->ident_produit = $ident_produit;

        return $this;
    }

    public function getPrixHt(): ?string
    {
        return $this->prix_ht;
    }

    public function setPrixHt(?string $prix_ht): static
    {
        $this->prix_ht = $prix_ht;

        return $this;
    }

    public function getTva(): ?string
    {
        return $this->tva;
    }

    public function setTva(string $tva): static
    {
        $this->tva = $tva;

        return $this;
    }

    public function getQuantProduit(): ?int
    {
        return $this->quant_produit;
    }

    public function setQuantProduit(int $quant_produit): static
    {
        $this->quant_produit = $quant_produit;

        return $this;
    }

    public function getMontantTotalHt(): ?string
    {
        return $this->montant_total_ht;
    }

    public function setMontantTotalHt(string $montant_total_ht): static
    {
        $this->montant_total_ht = $montant_total_ht;

        return $this;
    }

    public function getMontantTotalTtc(): ?string
    {
        return $this->montant_total_ttc;
    }

    public function setMontantTotalTtc(string $montant_total_ttc): static
    {
        $this->montant_total_ttc = $montant_total_ttc;

        return $this;
    }

    public function getDateLivraison(): ?\DateTime
    {
        return $this->date_livraison;
    }

    public function setDateLivraison(\DateTime $date_livraison): static
    {
        $this->date_livraison = $date_livraison;

        return $this;
    }

    public function getFraisPort(): ?string
    {
        return $this->frais_port;
    }

    public function setFraisPort(string $frais_port): static
    {
        $this->frais_port = $frais_port;

        return $this;
    }

    public function getMoyenPayement(): ?string
    {
        return $this->moyen_payement;
    }

    public function setMoyenPayement(string $moyen_payement): static
    {
        $this->moyen_payement = $moyen_payement;

        return $this;
    }

    public function getAcompte(): ?string
    {
        return $this->acompte;
    }

    public function setAcompte(string $acompte): static
    {
        $this->acompte = $acompte;

        return $this;
    }

    public function getDelaiReglement(): ?string
    {
        return $this->delai_reglement;
    }

    public function setDelaiReglement(string $delai_reglement): static
    {
        $this->delai_reglement = $delai_reglement;

        return $this;
    }

    public function getNumCommande(): ?string
    {
        return $this->num_commande;
    }

    public function setNumCommande(string $num_commande): static
    {
        $this->num_commande = $num_commande;

        return $this;
    }

    public function getStatutCommande(): ?string
    {
        return $this->statut_commande;
    }

    public function setStatutCommande(string $statut_commande): static
    {
        $this->statut_commande = $statut_commande;

        return $this;
    }

    public function getDateEditionBon(): ?\DateTime
    {
        return $this->date_edition_bon;
    }

    public function setDateEditionBon(\DateTime $date_edition_bon): static
    {
        $this->date_edition_bon = $date_edition_bon;

        return $this;
    }

    public function getFacture(): ?Facture
    {
        return $this->facture;
    }

    public function setFacture(?Facture $facture): static
    {
        $this->facture = $facture;

        return $this;
    }

    public function getRefClient(): ?Client
    {
        return $this->ref_client;
    }

    public function setRefClient(?Client $ref_client): static
    {
        $this->ref_client = $ref_client;

        return $this;
    }
}
