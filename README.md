# Symfony

## Pré requis

* Installer un des serveurs locaux suivants : Wamp / Xampp / Lamp / Mamp
> Contient un serveur Apache + MySQL/MariaDB + PHP
* Installer **Git** https://git-scm.com/
* Installer **NodeJS** https://nodejs.org/en/
* Installer le gestionnaire de dépendances **Composer** https://getcomposer.org/download/
> Privilégier le téléchargement du fichier d'installation plutôt que les lignes de commande
>
> ![alt text](./docs/imgs/composer.png "Title")

* Installer **Symfony CLI** https://symfony.com/download

> Privilégier le téléchargement des binaires
>
> L'installation via Bower est également très pratique : https://bower.io/
>
> ![alt text](./docs/imgs/symfony-console.png "Title")
>
> Extraire le fichier `.zip` dans un dossier système (exemple : `C:\Program Files\Symfony`)
>
> Depuis le menu "Démarrer" Ajouter aux variables d'environnement le dossier dans lequel se trouve `symfony.exe`
>
> ![alt text](./docs/imgs/env-variables.png "Title")
>
> ![alt text](./docs/imgs/env-variables-2.png "Title")
>
> ![alt text](./docs/imgs/env-variables-path.png "Title")
>
> ![alt text](./docs/imgs/env-variables-new.png "Title")
>
> ![alt text](./docs/imgs/env-variables-new-2.png "Title")

## Installation

* Ouvrir une invit de commandes dans le dossier de votre serveur local

> Pour Wamp : C:\wamp\www
>
> Pour Xampp : C:\xampp\htdocs

* Créer un projet vide : `symfony new my_project_directory --version="6.1.*" --webapp`

### Configuration de la bdd
* Modifier le fichier `.env`
> Si vous utilisez MariaDb, modifier le DATABASE_URL comme suit :
>
> DATABASE_URL="mysql://username:password@127.0.0.1:3306/symfony_l3_2022_bis?serverVersion=**mariadb-X.X.X**&charset=utf8mb4"
>
>  X.X.X doit être remplacé par votre version de mariaDB (ouvrir PhpMyAdmin pour la trouver)


* Si vous n'avez pas réussi à installer la commande `symfony`, utilisez composer :
* `composer create-project symfony/skeleton:"6.1.*" my_project_directory`
* `cd my_project_directory`

## Lancer le serveur local
* `symfony serve`


Hello there !