<?php

namespace App\Controller;

use App\Entity\Produit;
use App\Repository\ProduitRepository;
use App\Repository\RubriqueRepository;
use App\Repository\SousRubriqueRepository;
use App\Entity\User;
use App\Form\UserType;
use Doctrine\ORM\EntityManagerInterface;
use SessionIdInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
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

    #[Route('/fiche-produit/{id}', name: 'app_produit_fiche', requirements: ['id' => '\d+'])]
    public function produitFiche(int $id, ProduitRepository $produitRepo): Response
    {
        $produit = $produitRepo->find($id);

        if (!$produit) {
            // Si le produit n'existe pas, on renvoie une 404
            throw $this->createNotFoundException('Produit non trouvé.');
        }

        return $this->render('liste/fiche.html.twig', [
            'controller_name' => 'AccueilController',
            'produit' => $produit,
        ]);
    }

    #[Route('/panier', name: 'app_panier')]
    public function panier(Session $session, ProduitRepository $produitRepo): Response
    {
        $panier = $session->get('panier', []);

        $panierAvecDetails = [];

        foreach ($panier as $id => $quantite) {
            $produit = $produitRepo->find($id);
            if ($produit) {
                $panierAvecDetails[] = [
                    'produit' => $produit,
                    'quantite' => $quantite,
                    'panier' => $panier
                ];
            }
        }


        return $this->render('panier/index.html.twig', [
            'panier' => $panierAvecDetails,
        ]);
    }


    # Ajoute les produits au panier
    #[Route('/panier/add/{id}', name: 'app_panier_add')]
    public function add(Produit $produit, Request $request): Response
    {

        $session = $request->getSession();

        $panier = $session->get('panier', []);

        if (isset($panier[$produit->getId()]))
            $panier[$produit->getId()]++;
        else
            $panier[$produit->getId()] = 1;

        $session->set('panier', $panier);

        // dd($panier);

        return $this->redirectToRoute('app_panier');
    }

    #[Route('/panier/del/{id}', name: 'app_panier_del')]
    public function del(Produit $produit, Request $request): Response
    {
        $session = $request->getSession();
        $panier = $session->get('panier', []);

        $id = $produit->getId();

        // Supprime le produit du panier
        if (isset($panier[$id])) {
            unset($panier[$id]);
        }

        $session->set('panier', $panier);

        // Redirige vers le panier
        return $this->redirectToRoute('app_panier');
    }

    #[Route('/inscription', name: 'app_inscription')]
    public function register(Request $request, EntityManagerInterface $em, UserPasswordHasherInterface $hasher): Response
    {
        $user = new User();

        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $hashed = $hasher->hashPassword($user, $user->getPassword());
            $user->setPassword($hashed);

            $em->persist($user);
            $em->flush();

            return $this->redirectToRoute('app_accueil');
        }

        return $this->render('user/register.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
