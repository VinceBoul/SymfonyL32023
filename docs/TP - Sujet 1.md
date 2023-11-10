# TP noté

### Installation : 

* Créer le projet symfony : `symfony new tp_note --version="6.1.*" --webapp`
* Configurer la connexion à la base de données
  * Compléter le fichier `.env`
    > DATABASE_URL="mysql://username:password@127.0.0.1:3306/database_name?serverVersion=8&charset=utf8mb4"
    * Remplacer **username** par l'utilisateur de la base de données (en général root)
    * Remplacer **password** par le mot de passe de la base de données (laisser vide si aucun mot de passe)
    * Remplacer **database_name** par le nom de la base de données souhaitée

> Pour ceux qui utilisent une BdD de type MariaDb, remplacer 
**serverVersion=8** par **serverVersion=mariadb-X.X.X** 
>
> **X.X.X** est la version serveur que vous trouverez dans la page **http://localhost/phpmyadmin** "Version du serveur"

* Créer la base de données : `symfony console doctrine:database:create`

## Commandes utiles

* Créer/Modifier une entité : `symfony console make:entity`
* Générer le fichier de migration : `symfony console make:migration`
> Dans le cas ou la commande ne fonctionne pas correctement, vider le dossier `/migrations` de votre projet, et relancer la commande
`symfony console make:migration`
* Exécuter la migration : `symfony console doctrine:migrations:migrate`

* Pour lancer le serveur local, se placer dans le dossier du projet.
* Lancer la commande `symfony serve`

> Si l'adresse `127.0.0.1:8000` ne fonctionne pas correctement, stopper le serveur avec la commande `symfony server:stop` et le relancer avec `symfony serve`

# Sujet 

## Rendu du TP
Créer un dossier `NOM_PRENOM` et copier les éléments suivants de votre projet : 
* `src`
* `templates`

Zipper le dossier et l'envoyer à l'adresse mail `vtoullec@gmail.com`

* Si exceptionnellement vous avez changé de groupe, indiquez le moi dans le mail votre groupe d'origine et celui dans lequel vous étiez.  

#### Sujet 1
Créer l'entité suivante, avec les propriétés indiquées :
* Produit alimentaire (Product)
    * nom (chaîne de caractères)
	* prix (float) - champ non obligatoire
	* marque (chaîne de caractères)
	* nutriscore (Liste déroulante avec les choix : "A", "B", "C", "D", "E")

* Dans le **formulaire** : Modifier le label du champ "nom" par "Nom du produit"
* Dans la **liste** : 
  * Ajouter un lien pour augmenter le prix de 5€
  * Mettre en place un filtre "prix minimum" de la liste sur la propriété prix

* Mettre en place une contrainte (Assert) sur la propriété "prix" pour que le prix ne puisse pas être inférieur à 200
