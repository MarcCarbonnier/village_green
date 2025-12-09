Village Green — Catalogue d’instruments de musique

Version : 1.0

Description

Village Green est une application web responsive développée avec Symfony 6, permettant de consulter un catalogue d’instruments de musique.
Elle propose une interface moderne, ergonomique, et adaptée à tous les supports.

Technologies utilisées

 - Symfony 6
 - PHP 8.2
 - MySQL
 - Composer
 - Git

Prérequis

Avant d’installer le projet, assure-toi d’avoir :

 - PHP 8.2 ou supérieur
 - Composer
 - MySQL
 - Git

Installation

**Clone le projet :**

git clone <url-du-projet>
cd village-green

**Installe les dépendances :**

composer install

**Configure ta base de données dans le fichier .env :**

DATABASE_URL="mysql://user:password@localhost:3306/village_green"

**Créer la base de données et exécuter les migrations :**

php bin/console doctrine:database:create
php bin/console doctrine:migrations:migrate

***Lancer l'application***

**Démarrage du serveur Symfony :**

symfony serve

**L'application sera disponible à l'adresse :**

https://localhost:8000


Fonctionnalités principales

 - Consultation du catalogue d’instruments
 - Interface responsive
 - Architecture MVC via Symfony
 - Gestion des données via MySQL
