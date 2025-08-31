<?php

namespace App\Entity;

use App\Repository\FactureRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FactureRepository::class)]
class Facture
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    /**
     * @var Collection<int, BonCommande>
     */
    #[ORM\OneToMany(targetEntity: BonCommande::class, mappedBy: 'facture')]
    private Collection $id_bon_commande;

    #[ORM\Column(type: Types::SMALLINT)]
    private ?int $bon_livraison = null;

    #[ORM\Column(type: Types::SMALLINT)]
    private ?int $facture = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTime $date_payement = null;

    #[ORM\Column(length: 50)]
    private ?string $type_payement = null;

    public function __construct()
    {
        $this->id_bon_commande = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection<int, BonCommande>
     */
    public function getIdBonCommande(): Collection
    {
        return $this->id_bon_commande;
    }

    public function addIdBonCommande(BonCommande $idBonCommande): static
    {
        if (!$this->id_bon_commande->contains($idBonCommande)) {
            $this->id_bon_commande->add($idBonCommande);
            $idBonCommande->setFacture($this);
        }

        return $this;
    }

    public function removeIdBonCommande(BonCommande $idBonCommande): static
    {
        if ($this->id_bon_commande->removeElement($idBonCommande)) {
            // set the owning side to null (unless already changed)
            if ($idBonCommande->getFacture() === $this) {
                $idBonCommande->setFacture(null);
            }
        }

        return $this;
    }

    public function getBonLivraison(): ?int
    {
        return $this->bon_livraison;
    }

    public function setBonLivraison(int $bon_livraison): static
    {
        $this->bon_livraison = $bon_livraison;

        return $this;
    }

    public function getFacture(): ?int
    {
        return $this->facture;
    }

    public function setFacture(int $facture): static
    {
        $this->facture = $facture;

        return $this;
    }

    public function getDatePayement(): ?\DateTime
    {
        return $this->date_payement;
    }

    public function setDatePayement(\DateTime $date_payement): static
    {
        $this->date_payement = $date_payement;

        return $this;
    }

    public function getTypePayement(): ?string
    {
        return $this->type_payement;
    }

    public function setTypePayement(string $type_payement): static
    {
        $this->type_payement = $type_payement;

        return $this;
    }
}
