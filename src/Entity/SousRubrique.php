<?php

namespace App\Entity;

use App\Repository\SousRubriqueRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SousRubriqueRepository::class)]
class SousRubrique
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $nom_sous_rubrique = null;

    #[ORM\Column(length: 255)]
    private ?string $img_sous_rubrique = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Rubrique $id_rubrique = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomSousRubrique(): ?string
    {
        return $this->nom_sous_rubrique;
    }

    public function setNomSousRubrique(string $nom_sous_rubrique): static
    {
        $this->nom_sous_rubrique = $nom_sous_rubrique;

        return $this;
    }

    public function getImgSousRubrique(): ?string
    {
        return $this->img_sous_rubrique;
    }

    public function setImgSousRubrique(string $img_sous_rubrique): static
    {
        $this->img_sous_rubrique = $img_sous_rubrique;

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
