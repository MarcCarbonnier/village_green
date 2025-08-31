<?php

namespace App\Entity;

use App\Repository\RubriqueRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RubriqueRepository::class)]
class Rubrique
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $nom_rubrique = null;

    #[ORM\Column(length: 255)]
    private ?string $img_rubrique = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomRubrique(): ?string
    {
        return $this->nom_rubrique;
    }

    public function setNomRubrique(string $nom_rubrique): static
    {
        $this->nom_rubrique = $nom_rubrique;

        return $this;
    }

    public function getImgRubrique(): ?string
    {
        return $this->img_rubrique;
    }

    public function setImgRubrique(string $img_rubrique): static
    {
        $this->img_rubrique = $img_rubrique;

        return $this;
    }
}
