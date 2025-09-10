<?php

namespace App\Controller;

use App\Repository\ProduitRepository;
use App\Repository\RubriqueRepository;
use App\Repository\SousRubriqueRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;



final class AccueilController extends AbstractController
{

    # Afficher toutes les rubrique avec leurs nom et l'image associé
    #[Route('/', name: 'app_accueil')]
    public function index(RubriqueRepository $repo): Response
    {

        $rub = $repo->findAll();

        return $this->render('accueil/index.html.twig', [
            'controller_name' => 'AccueilController',
            'rub' => $rub
        ]);
    }


    # Afficher les sous rubrique d'une rubrique selon l'id
    #[Route('/rubrique/{id}', name: 'app_rub')]
    public function rubrique(int $id, SousRubriqueRepository $repo, RubriqueRepository $rubrepo): Response
    {

        $rubrique = $rubrepo->find($id);
        $sousrubriques = $repo->findBy(['rubrique' => $rubrique]);

        return $this->render('sous_rubrique/index.html.twig', [
            'controller_name' => 'AccueilController',
            'rubrique' => $rubrique,
            'sousrubriques' => $sousrubriques,
        ]);
    }


    # Afficher les produits d'une sous categorie
    #[Route('/produit/{id}', name: 'app_pro')]
    public function produitApp(int $id, SousRubriqueRepository $repo, ProduitRepository $produit, RubriqueRepository $rubrepo): Response
    {

        $sousrubrique = $repo->find($id);
        $pro = $produit->findBy(['id_sous_rubrique' => $sousrubrique]);


        return $this->render('produit/index.html.twig', [
            'controller_name' => 'AccueilController',
            'sousrubrique' => $sousrubrique,
            'produits' => $pro,
        ]);
    }

    # Affiche le produit selectionner
    #[Route('/fiche-produit/{id}', name: 'app_produit_fiche')]
    public function produitFiche(int $id, ProduitRepository $produitRepo): Response
    {
        $produit = $produitRepo->find($id);

        return $this->render('liste/fiche.html.twig', [
            'produit' => $produit,
        ]);
    }
}
