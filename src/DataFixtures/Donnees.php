<?php

namespace App\DataFixtures;

use App\Entity\BonCommande;
use App\Entity\Client;
use App\Entity\Contient;
use App\Entity\Facture;
use App\Entity\Fournisseurs;
use App\Entity\Livraison;
use App\Entity\Livre;
use App\Entity\Produit;
use App\Entity\Rubrique;
use App\Entity\SousRubrique;
use DateTime;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class Donnees extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        include "village_green.php";


        $fournisseursEntities = [];
        foreach ($fournisseurs as $four) {
            $fournisseur = new Fournisseurs;
            $fournisseur
                ->setRefFournisseurs($four['ref_fournisseurs'])
                ->setNomFournisseurs($four['nom_fournisseurs'])
                ->setTypeFournisseurs($four['type_fournisseurs']);
            $manager->persist($fournisseur);

            $fournisseursEntities[$four['ref_fournisseurs']] = $fournisseur;
        }

        foreach ($Facture as $fact) {
            $Facture = new Facture;
            $Facture
                ->setBonLivraison($fact['bon_livraison'])
                ->setFacture($fact['factures'])
                ->setDatePayement(new \DateTime($fact['date_payement']))
                ->setTypePayement($fact['type_payement']);
            $manager->persist($Facture);
        }

        // 1. Création des rubriques
        $rubriqueEntities = [];

        foreach ($rubrique as $rub) {
            $rubriqueEntity = new Rubrique();
            $rubriqueEntity
                ->setNomRubrique($rub['nom_rubrique'])
                ->setImgRubrique($rub['img_rubrique']);
            $manager->persist($rubriqueEntity);

            // On stocke l'entité avec la clé correspondant à l'ID externe (id_rubrique)
            $rubriqueEntities[$rub['id_rubrique']] = $rubriqueEntity;
        }


        $sous_rubriqueEntities = [];

        // Insertion des sous-rubriques
        foreach ($Sous_rubrique as $sr) {
            $sous_rubriqueEntity = new SousRubrique();
            $sous_rubriqueEntity
                ->setNomSousRubrique($sr['nom_sous_rubrique'])
                ->setImgSousRubrique($sr['img_sous_rubrique']);

            // Associer la bonne rubrique
            $idRubriqueSource = $sr['id_rubrique'];
            if (isset($rubriqueEntities[$idRubriqueSource])) {
                $sous_rubriqueEntity->setRubrique($rubriqueEntities[$idRubriqueSource]);
            } else {
                throw new \Exception("Rubrique source $idRubriqueSource non trouvée");
            }

            $manager->persist($sous_rubriqueEntity);

            // Stocker la correspondance ID source de sous-rubrique → entité Doctrine
            $sous_rubriqueEntities[$sr['id_sous_rubrique']] = $sous_rubriqueEntity;
        }


        $produitEntities = [];
        // 2. Création des produits
        foreach ($Produit as $pro) {
            $produitEntity = new Produit();
            $produitEntity
                ->setLibelleProduit($pro['libelle_produit'])
                ->setPrixAchatHt($pro['prix_achat_ht'])
                ->setPhotoProduit($pro['photo_produit'])
                ->setPrixVenteHt($pro['prix_vente_ht'])
                ->setDescriptionProduit($pro['description_produit']);

            $idRubriqueSource = $pro['id_rubrique'];
            $idSousRubrique = $pro['id_sous_rubrique'];

            if (!isset($sous_rubriqueEntities)) {
                throw new \Exception(("Sous Rubrique avec l'id source $idSousRubrique non trouvée"));
            }
            $produitEntity->setIdSousRubrique($sous_rubriqueEntities[$idSousRubrique]);


            if (!isset($rubriqueEntities[$idRubriqueSource])) {
                throw new \Exception("Rubrique avec l'id source $idRubriqueSource non trouvée");
            }

            // On associe le produit à l'entité Rubrique correspondante
            $produitEntity->setIdRubrique($rubriqueEntities[$idRubriqueSource]);

            $manager->persist($produitEntity);

            $produitEntities[$pro['id']] = $produitEntity;
        }

        foreach ($livre as $liv) {
            $livre_entity = new Livre();

            $idfournisseursSource = $liv['ref_fournisseurs'];
            $idProduitSource = $liv['id_produit'];

            if (!isset($fournisseursEntities[$idfournisseursSource])) {
                throw new \Exception("Fournisseurs id $idfournisseursSource not provided");
            }
            $livre_entity->setIdFounisseurs($fournisseursEntities[$idfournisseursSource]);


            if (!isset($produitEntities[$idProduitSource])) {
                throw new \Exception(("Produit id $idProduitSource not provided"));
            }
            $livre_entity->setIdProduit($produitEntities[$idProduitSource]);

            $manager->persist($livre_entity);
        }


        $clientsEntities = [];

        foreach ($client as $clie) {
            $c = new Client();
            $c->setCodeClient($clie['code_client'])
                ->setTypeClient($clie['type_client'])
                ->setNomClient($clie['nom_client'])
                ->setPrenomClient($clie['prenom_client'])
                ->setCoeffPrix($clie['coeff_prix'])
                ->setNomCommercial($clie['nom_commercial'])
                ->setReductionSup($clie['reduction_sup'])
                ->setAdresseFacturation($clie['adresse_facturation'])
                ->setSirenClient($clie['siren_client'])
                ->setFormeJuridiqueClient($clie['forme_juridique_client'])
                ->setSiegeSocial($clie['siege_sociale'])
                ->setAdresseLivraison($clie['adresse_livraison'])
                ->setFormeJuridique($clie['forme_juridique'])
                ->setNumIdentRcs($clie['num_ident_RCS']);

            $manager->persist($c);

            $clientsEntities[$clie['code_client']] = $c; // stocke l'objet

            $manager->flush();
        }


        $bonCommandeEntities = [];
        foreach ($Bon_commande as $bonC) {
            $bon = new BonCommande();
            $bon->setDescCommande($bonC['desc_commande'])
                ->setIdentProduit($bonC['ident_produit'])
                ->setPrixHt($bonC['prix_ht'])
                ->setTva($bonC['tva'])
                ->setQuantProduit($bonC['quant_produit'])
                ->setMontantTotalHt($bonC['montant_total_ht'])
                ->setMontantTotalTtc($bonC['montant_total_tic'])
                ->setDateLivraison(new \DateTime($bonC['date_livraison']))
                ->setFraisPort($bonC['frais_port'])
                ->setMoyenPayement($bonC['moyen_payement'])
                ->setAcompte($bonC['acompte'])
                ->setDelaiReglement($bonC['delai_reglement'])
                ->setNumCommande($bonC['num_commande'])
                ->setStatutCommande($bonC['statut_commande'])
                ->setDateEditionBon(new \DateTime($bonC['date_edition_bon']))
                ->setRefClient($clientsEntities[$bonC['code_client']]); // objet déjà persistant

            $manager->persist($bon);

                $bonCommandeEntities[$bonC['id_bon_commande']] = $bon;
        }


        $factureEntities = [];

        foreach ($Facture as $fact) {
            $facture = new Facture();
            $facture->setBonLivraison($fact['bon_livraison'])
                ->setFacture($fact['facture'])
                ->setDatePayement(new \DateTime($fact['date_payement']))
                ->setTypePayement($fact['type_payement']);

            $manager->persist($facture);

            // on stocke l'entité pour pouvoir l’associer aux BonCommande plus tard si nécessaire
            $factureEntities[] = $facture;
        }


        // Si tu veux associer les BonCommande aux Factures
        // Exemple : 1er BonCommande → 1ère Facture, etc.
        $bonCommandes = $manager->getRepository(\App\Entity\BonCommande::class)->findAll();
        foreach ($bonCommandes as $index => $bon) {
            if (isset($factureEntities[$index])) {
                $bon->setFacture($factureEntities[$index]);
                $factureEntities[$index]->addIdBonCommande($bon);
            }
        }

        foreach ($Livraison as $livrai) {
            // On récupère l'objet Client correspondant
            $client = $manager->getRepository(Client::class)
                ->findOneBy(['code_client' => $livrai['id_client']]);

            if (!$client) {
                throw new \Exception("Client {$livrai['id_client']} non trouvé pour la livraison.");
            }

            $livraison = new Livraison();
            $livraison->setIdClient($client)
                ->setAdresseLivraison($livrai['adresse_livraison'])
                ->setDateLivraison(new \DateTime($livrai['date_livraison']))
                ->setStatusLivraison($livrai['statuts_livraison']);

            $manager->persist($livraison);
        }

        $contientData = [
            ['id_produit' => '1', 'id_bon_commande' => '1', 'quantite' => '1'],
            ['id_produit' => '5', 'id_bon_commande' => '2', 'quantite' => '1']
        ];

        $contientEntities = [];

        foreach ($contientData as $c) {
            // Récupérer les entités existantes
            $produit = $produitEntities[$c['id_produit']] ?? null;
            $bonCommande = $bonCommandeEntities[$c['id_bon_commande']] ?? null;

            if (!$produit) {
                throw new \Exception("Produit id {$c['id_produit']} non trouvé");
            }
            if (!$bonCommande) {
                throw new \Exception("BonCommande id {$c['id_bon_commande']} non trouvé");
            }

            $contient = new Contient();
            $contient
                ->setIdProduit($produit)
                ->setIdBonCommande($bonCommande)
                ->setQuantite($c['quantite']);

            $manager->persist($contient);

            // On peut stocker l'entité pour référence future si besoin
            $contientEntities[] = $contient;
        }

        $manager->flush();
    }
}
