<?php

/**
 * Export to PHP Array plugin for PHPMyAdmin
 * @version 5.2.2
 */

/**
 * Database `village_green`
 */

/* `village_green`.`Bon_commande` */
$Bon_commande = array(
  array('id_bon_commande' => 1, 'desc_commande' => 'Commande Guitare', 'ident_produit' => '1', 'prix_ht' => '1200.00', 'tva' => '20%', 'quant_produit' => '1', 'montant_total_ht' => '1200.00', 'montant_total_tic' => '1440.00', 'date_livraison' => '2025-07-01', 'frais_port' => '10.00', 'moyen_payement' => 'Carte bancaire', 'acompte' => '100.00', 'delai_reglement' => '30j', 'num_commande' => 'BC001', 'statut_commande' => 'Validée', 'date_edition_bon' => '2025-06-20', 'code_client' => 'C001'),
  array('id_bon_commande' => 2, 'desc_commande' => 'Commande Piano', 'ident_produit' => '5', 'prix_ht' => '750.00', 'tva' => '20%', 'quant_produit' => '1', 'montant_total_ht' => '750.00', 'montant_total_tic' => '900.00', 'date_livraison' => '2025-07-03', 'frais_port' => '15.00', 'moyen_payement' => 'Virement', 'acompte' => '50.00', 'delai_reglement' => '30j', 'num_commande' => 'BC002', 'statut_commande' => 'En attente', 'date_edition_bon' => '2025-06-22', 'code_client' => 'C002')
);

/* `village_green`.`client` */
$client = array(
  array('code_client' => 'C001', 'type_client' => 'Pro', 'nom_client' => 'Durand', 'prenom_client' => 'Luc', 'coeff_prix' => '1.0', 'nom_commercial' => 'MusicStore', 'reduction_sup' => '0.05', 'adresse_facturation' => '10 rue des Artistes', 'siren_client' => '123456789', 'forme_juridique_client' => 'SARL', 'siege_sociale' => 'Paris', 'adresse_livraison' => '10 rue des Artistes', 'forme_juridique' => 'SARL', 'num_ident_RCS' => 'RCS123'),
  array('code_client' => 'C002', 'type_client' => 'Particulier', 'nom_client' => 'Martin', 'prenom_client' => 'Claire', 'coeff_prix' => '1.0', 'nom_commercial' => 'Claire Music', 'reduction_sup' => '0.00', 'adresse_facturation' => '22 rue de la Scène', 'siren_client' => '987654321', 'forme_juridique_client' => 'EI', 'siege_sociale' => 'Lyon', 'adresse_livraison' => '22 rue de la Scène', 'forme_juridique' => 'EI', 'num_ident_RCS' => 'RCS987')
);

/* `village_green`.`contient` */
$contient = array(
  array('id_produit' => '1', 'id_bon_commande' => '1', 'quantite' => '1'),
  array('id_produit' => '5', 'id_bon_commande' => '2', 'quantite' => '1')
);

/* `village_green`.`Facture` */
$Facture = array(
  array('bon_livraison' => '1', 'factures' => 50,99, 'date_payement' => '2025-07-04', 'type_payement' => 'Carte bancaire'),
  array('bon_livraison' => '2', 'factures' => 20,99, 'date_payement' => '2025-09-10', 'type_payement' => 'Virement')
);

/* `village_green`.`fournisseurs` */
$fournisseurs = array(
  array('ref_fournisseurs' => 'F001', 'nom_fournisseurs' => 'Yamaha', 'type_fournisseurs' => 'Instruments'),
  array('ref_fournisseurs' => 'F002', 'nom_fournisseurs' => 'Gibson', 'type_fournisseurs' => 'Instruments'),
  array('ref_fournisseurs' => 'F003', 'nom_fournisseurs' => 'Shure', 'type_fournisseurs' => 'Audio'),
  array('ref_fournisseurs' => 'F004', 'nom_fournisseurs' => 'Roland', 'type_fournisseurs' => 'Claviers')
);

/* `village_green`.`gestion` */
$gestion = array(
  array('id_gestion' => '1', 'date_maj_cat' => '2025-06-01', 'date_maj_stock' => '2025-06-10', 'produit_valide' => '1'),
  array('id_gestion' => '2', 'date_maj_cat' => '2025-06-15', 'date_maj_stock' => '2025-06-20', 'produit_valide' => '1')
);

/* `village_green`.`info` */
$info = array(
  array('id_info' => '1', 'date_commande_doc' => '2025-06-20', 'date_exp_doc' => '2025-06-25'),
  array('id_info' => '2', 'date_commande_doc' => '2025-06-22', 'date_exp_doc' => '2025-06-27')
);

/* `village_green`.`Livraison` */
$Livraison = array(
  array('id_livraison' => '1', 'id_client' => 'C001', 'adresse_livraison' => '10 rue des Artistes', 'date_livraison' => '2025-07-01', 'statuts_livraison' => 'Livré'),
  array('id_livraison' => '2', 'id_client' => 'C002', 'adresse_livraison' => '22 rue de la Scène', 'date_livraison' => '2025-07-03', 'statuts_livraison' => 'En cours')
);

/* `village_green`.`livre` */
$livre = array(
  array('ref_fournisseurs' => 'F002', 'id_produit' => '1'),
  array('ref_fournisseurs' => 'F002', 'id_produit' => '2'),
  array('ref_fournisseurs' => 'F001', 'id_produit' => '3'),
  array('ref_fournisseurs' => 'F004', 'id_produit' => '4'),
  array('ref_fournisseurs' => 'F004', 'id_produit' => '5'),
  array('ref_fournisseurs' => 'F004', 'id_produit' => '6'),
  array('ref_fournisseurs' => 'F003', 'id_produit' => '7'),
  array('ref_fournisseurs' => 'F003', 'id_produit' => '8'),
  array('ref_fournisseurs' => 'F003', 'id_produit' => '9'),
  array('ref_fournisseurs' => 'F003', 'id_produit' => '10'),
  array('ref_fournisseurs' => 'F001', 'id_produit' => '11'),
  array('ref_fournisseurs' => 'F001', 'id_produit' => '12'),
  array('ref_fournisseurs' => 'F002', 'id_produit' => '13'),
  array('ref_fournisseurs' => 'F001', 'id_produit' => '14'),
  array('ref_fournisseurs' => 'F002', 'id_produit' => '15')
);

/* `village_green`.`Produit` */
$Produit = array(
  array('id'=>1, 'libelle_produit' => 'Gibson Les Paul', 'prix_achat_ht' => '800.00', 'photo_produit' => 'lespaul.jpg', 'prix_vente_ht' => '1200.00', 'description_produit' => 'Guitare électrique pro', 'id_sous_rubrique' => 1, 'id_rubrique' => 1),
  array('id'=>2, 'libelle_produit' => 'Martin D-28', 'prix_achat_ht' => '700.00', 'photo_produit' => 'martin_d28.jpg', 'prix_vente_ht' => '1100.00', 'description_produit' => 'Guitare acoustique haut de gamme', 'id_sous_rubrique' => 2, 'id_rubrique' => 1),
  array('id'=>3, 'libelle_produit' => 'Yamaha Acoustic Drum Kit', 'prix_achat_ht' => '300.00', 'photo_produit' => 'yamaha_drum.jpg', 'prix_vente_ht' => '500.00', 'description_produit' => 'Batterie acoustique Yamaha', 'id_sous_rubrique' => 3, 'id_rubrique' => 2),
  array('id'=>4 , 'libelle_produit' => 'Roland Electronic Drum', 'prix_achat_ht' => '400.00', 'photo_produit' => 'roland_drum.jpg', 'prix_vente_ht' => '650.00', 'description_produit' => 'Batterie électronique compacte', 'id_sous_rubrique' => 4, 'id_rubrique' => 2),
  array('id'=>5, 'libelle_produit' => 'Roland FP-30X', 'prix_achat_ht' => '550.00', 'photo_produit' => 'fp30x.jpg', 'prix_vente_ht' => '750.00', 'description_produit' => 'Piano numérique compact', 'id_sous_rubrique' => 5, 'id_rubrique' => 3),
  array('id'=>6 , 'libelle_produit' => 'Korg Minilogue Synth', 'prix_achat_ht' => '500.00', 'photo_produit' => 'korg_minilogue.jpg', 'prix_vente_ht' => '750.00', 'description_produit' => 'Synthétiseur analogique', 'id_sous_rubrique' => 6, 'id_rubrique' => 3),
  array('id'=>7 , 'libelle_produit' => 'Shure SM58', 'prix_achat_ht' => '90.00', 'photo_produit' => 'shure_sm58.jpg', 'prix_vente_ht' => '120.00', 'description_produit' => 'Microphone dynamique', 'id_sous_rubrique' => 7, 'id_rubrique' => 4),
  array('id'=>8 , 'libelle_produit' => 'K&M Microphone Stand', 'prix_achat_ht' => '50.00', 'photo_produit' => 'km_stand.jpg', 'prix_vente_ht' => '80.00', 'description_produit' => 'Pied de micro robuste', 'id_sous_rubrique' => 8, 'id_rubrique' => 4),
  array('id'=>9 , 'libelle_produit' => 'Monster Audio Cable', 'prix_achat_ht' => '20.00', 'photo_produit' => 'monster_cable.jpg', 'prix_vente_ht' => '35.00', 'description_produit' => 'Câble audio haute qualité', 'id_sous_rubrique' => 9, 'id_rubrique' => 4),
  array('id'=>10 ,  'libelle_produit' => 'Hercules Guitar Stand', 'prix_achat_ht' => '30.00', 'photo_produit' => 'hercules_stand.jpg', 'prix_vente_ht' => '50.00', 'description_produit' => 'Stand pour guitare', 'id_sous_rubrique' => 10, 'id_rubrique' => 4),
  array('id'=>11 ,  'libelle_produit' => 'JBL EON610 Speaker', 'prix_achat_ht' => '400.00', 'photo_produit' => 'jbl_eon610.jpg', 'prix_vente_ht' => '650.00', 'description_produit' => 'Enceinte amplifiée 10 pouces', 'id_sous_rubrique' => 11, 'id_rubrique' => 5),
  array('id'=>12 ,  'libelle_produit' => 'Behringer Xenyx Mixer', 'prix_achat_ht' => '200.00', 'photo_produit' => 'behringer_xenyx.jpg', 'prix_vente_ht' => '350.00', 'description_produit' => 'Mixeur audio 12 canaux', 'id_sous_rubrique' => 12, 'id_rubrique' => 5),
  array('id'=>13 ,  'libelle_produit' => 'Fender Bassman Amp', 'prix_achat_ht' => '600.00', 'photo_produit' => 'fender_bassman.jpg', 'prix_vente_ht' => '900.00', 'description_produit' => 'Amplificateur basse vintage', 'id_sous_rubrique' => 13, 'id_rubrique' => 5),
  array('id'=>14 ,  'libelle_produit' => 'Sony Walkman MP3', 'prix_achat_ht' => '60.00', 'photo_produit' => 'sony_walkman.jpg', 'prix_vente_ht' => '90.00', 'description_produit' => 'Lecteur MP3 portable', 'id_sous_rubrique' => 14, 'id_rubrique' => 5),
  array('id'=>15 ,  'libelle_produit' => 'Boss DS-1 Distortion Pedal', 'prix_achat_ht' => '80.00', 'photo_produit' => 'boss_ds1.jpg', 'prix_vente_ht' => '120.00', 'description_produit' => 'Pédale de distorsion pour guitare', 'id_sous_rubrique' => 10, 'id_rubrique' => 4)
);

/* `village_green`.`rubrique` */
$rubrique = array(
  array('id_rubrique' => 1, 'nom_rubrique' => 'Guitares', 'img_rubrique' => 'guitares.jpg'),
  array('id_rubrique' => 2, 'nom_rubrique' => 'Batteries', 'img_rubrique' => 'batteries.jpg'),
  array('id_rubrique' => 3, 'nom_rubrique' => 'Claviers', 'img_rubrique' => 'claviers.jpg'),
  array('id_rubrique' => 4, 'nom_rubrique' => 'Accessoires', 'img_rubrique' => 'accessoires.jpg'),
  array('id_rubrique' => 5, 'nom_rubrique' => 'Sonorisation', 'img_rubrique' => 'sonorisation.jpg')
);

/* `village_green`.`Sous_rubrique` */
$Sous_rubrique = array(
  array('id_sous_rubrique' => 1, 'nom_sous_rubrique' => 'Guitares électriques', 'img_sous_rubrique' => 'guitares_elec.jpg', 'id_rubrique' => 1),
  array('id_sous_rubrique' => 2, 'nom_sous_rubrique' => 'Guitares acoustiques', 'img_sous_rubrique' => 'guitares_acou.jpg', 'id_rubrique' => 1),
  array('id_sous_rubrique' => 3, 'nom_sous_rubrique' => 'Batteries acoustiques', 'img_sous_rubrique' => 'batteries_acou.jpg', 'id_rubrique' => 2),
  array('id_sous_rubrique' => 4, 'nom_sous_rubrique' => 'Batteries électroniques', 'img_sous_rubrique' => 'batteries_elec.jpg', 'id_rubrique' => 2),
  array('id_sous_rubrique' => 5, 'nom_sous_rubrique' => 'Pianos numériques', 'img_sous_rubrique' => 'pianos.jpg', 'id_rubrique' => 3),
  array('id_sous_rubrique' => 6, 'nom_sous_rubrique' => 'Synthétiseurs', 'img_sous_rubrique' => 'synthesiseurs.jpg', 'id_rubrique' => 3),
  array('id_sous_rubrique' => 7, 'nom_sous_rubrique' => 'Micros', 'img_sous_rubrique' => 'micros.jpg', 'id_rubrique' => 4),
  array('id_sous_rubrique' => 8, 'nom_sous_rubrique' => 'Pieds de micro', 'img_sous_rubrique' => 'pied_micro.jpg', 'id_rubrique' => 4),
  array('id_sous_rubrique' => 9, 'nom_sous_rubrique' => 'Câbles audio', 'img_sous_rubrique' => 'cables_audio.jpg', 'id_rubrique' => 4),
  array('id_sous_rubrique' => 10, 'nom_sous_rubrique' => 'Stands instruments', 'img_sous_rubrique' => 'stands.jpg', 'id_rubrique' => 4),
  array('id_sous_rubrique' => 11, 'nom_sous_rubrique' => 'Enceintes amplifiées', 'img_sous_rubrique' => 'enceintes.jpg', 'id_rubrique' => 5),
  array('id_sous_rubrique' => 12, 'nom_sous_rubrique' => 'Mixeurs audio', 'img_sous_rubrique' => 'mixeurs.jpg', 'id_rubrique' => 5),
  array('id_sous_rubrique' => 13, 'nom_sous_rubrique' => 'Amplificateurs', 'img_sous_rubrique' => 'amplis.jpg', 'id_rubrique' => 5),
  array('id_sous_rubrique' => 14, 'nom_sous_rubrique' => 'Lecteurs MP3', 'img_sous_rubrique' => 'mp3.jpg', 'id_rubrique' => 5)
);
