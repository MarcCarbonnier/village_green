<?php

namespace App\Entity;

use App\Repository\ClientRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ClientRepository::class)]
class Client
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 10, unique: true)]
    private string $code_client; // <-- ici ton C001, C002

    /**
     * @var Collection<int, BonCommande>
     */
    #[ORM\OneToMany(targetEntity: BonCommande::class, mappedBy: 'ref_client')]
    private Collection $ref_client;

    #[ORM\Column(length: 50)]
    private ?string $type_client = null;

    #[ORM\Column(length: 50)]
    private ?string $nom_client = null;

    #[ORM\Column(length: 50)]
    private ?string $prenom_client = null;

    #[ORM\Column(length: 50)]
    private ?string $coeff_prix = null;

    #[ORM\Column(length: 50)]
    private ?string $nom_commercial = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $reduction_sup = null;

    #[ORM\Column(length: 50)]
    private ?string $adresse_facturation = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $siren_client = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $forme_juridique_client = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $siege_social = null;

    #[ORM\Column(length: 50)]
    private ?string $adresse_livraison = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $forme_juridique = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $num_ident_RCS = null;

    public function __construct()
    {
        $this->ref_client = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCodeClient(): ?string
    {
        return $this->code_client;
    }

    public function setCodeClient(string $codeClient): static
    {
        $this->code_client = $codeClient;
        return $this;
    }

    /**
     * @return Collection<int, BonCommande>
     */
    public function getRefClient(): Collection
    {
        return $this->ref_client;
    }

    public function addRefClient(BonCommande $refClient): static
    {
        if (!$this->ref_client->contains($refClient)) {
            $this->ref_client->add($refClient);
            $refClient->setRefClient($this);
        }

        return $this;
    }

    public function removeRefClient(BonCommande $refClient): static
    {
        if ($this->ref_client->removeElement($refClient)) {
            // set the owning side to null (unless already changed)
            if ($refClient->getRefClient() === $this) {
                $refClient->setRefClient(null);
            }
        }

        return $this;
    }

    public function getTypeClient(): ?string
    {
        return $this->type_client;
    }

    public function setTypeClient(string $type_client): static
    {
        $this->type_client = $type_client;

        return $this;
    }

    public function getNomClient(): ?string
    {
        return $this->nom_client;
    }

    public function setNomClient(string $nom_client): static
    {
        $this->nom_client = $nom_client;

        return $this;
    }

    public function getPrenomClient(): ?string
    {
        return $this->prenom_client;
    }

    public function setPrenomClient(string $prenom_client): static
    {
        $this->prenom_client = $prenom_client;

        return $this;
    }

    public function getCoeffPrix(): ?string
    {
        return $this->coeff_prix;
    }

    public function setCoeffPrix(string $coeff_prix): static
    {
        $this->coeff_prix = $coeff_prix;

        return $this;
    }

    public function getNomCommercial(): ?string
    {
        return $this->nom_commercial;
    }

    public function setNomCommercial(string $nom_commercial): static
    {
        $this->nom_commercial = $nom_commercial;

        return $this;
    }

    public function getReductionSup(): ?string
    {
        return $this->reduction_sup;
    }

    public function setReductionSup(?string $reduction_sup): static
    {
        $this->reduction_sup = $reduction_sup;

        return $this;
    }

    public function getAdresseFacturation(): ?string
    {
        return $this->adresse_facturation;
    }

    public function setAdresseFacturation(string $adresse_facturation): static
    {
        $this->adresse_facturation = $adresse_facturation;

        return $this;
    }

    public function getSirenClient(): ?string
    {
        return $this->siren_client;
    }

    public function setSirenClient(?string $siren_client): static
    {
        $this->siren_client = $siren_client;

        return $this;
    }

    public function getFormeJuridiqueClient(): ?string
    {
        return $this->forme_juridique_client;
    }

    public function setFormeJuridiqueClient(?string $forme_juridique_client): static
    {
        $this->forme_juridique_client = $forme_juridique_client;

        return $this;
    }

    public function getSiegeSocial(): ?string
    {
        return $this->siege_social;
    }

    public function setSiegeSocial(?string $siege_social): static
    {
        $this->siege_social = $siege_social;

        return $this;
    }

    public function getAdresseLivraison(): ?string
    {
        return $this->adresse_livraison;
    }

    public function setAdresseLivraison(string $adresse_livraison): static
    {
        $this->adresse_livraison = $adresse_livraison;

        return $this;
    }

    public function getFormeJuridique(): ?string
    {
        return $this->forme_juridique;
    }

    public function setFormeJuridique(?string $forme_juridique): static
    {
        $this->forme_juridique = $forme_juridique;

        return $this;
    }

    public function getNumIdentRCS(): ?string
    {
        return $this->num_ident_RCS;
    }

    public function setNumIdentRCS(?string $num_ident_RCS): static
    {
        $this->num_ident_RCS = $num_ident_RCS;

        return $this;
    }
}
