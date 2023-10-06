# Sujet TP 1

Créer un mini site web pour administrer un parc de véhicules.

Chaque véhicule comprend les propriétés suivantes : 
* Nom du modèle
* Marque
* Kilométrage (entier)
* Date de fabrication
* Date de mise en circulation
* Prix (flottant)


## Éxercice 1

* Créer l'entité correspondant à un véhicule, avec les contraintes de champs nécessaires.
> Générer/modifier une entité : `symfony console make:entity`
> 
> Générer un fichier de migration :  `symfony console make:migration`
> 
> Exécuter le fichier de migration : `symfony console doctrine:migrations:migrate`
 
* Générer un Crud de cette entité, et créer plusieurs véhicules
> symfony console make:crud

**Résultat attendu : Pouvoir lister/ajouter/éditer/supprimer un véhicule**

## Éxercice 2

L'adminstrateur souhaite pouvoir modifier la quantité d'un véhicule directement depuis la liste.

* Dans la liste, ajouter pour chaque véhicule deux boutons, un pour augmenter la quantité (+1), et un pour la réduire(-1)
* Ajouter une action et une route dans un controller pour le bouton d'ajout 
* Ajouter une action et une route dans un controller pour le bouton de réduction de la quantité
> Pour faire propre, créer une seule action qui fait ajouter/retirer

**Résultat attendu : lorsqu'on clique sur "ajouter"/"retirer", la page est actualisée et la quantité est bien mise à jour**
 
## Éxercice 3

L'adminstrateur souhaite pouvoir trier et filtrer la liste.

* Filtrage possible : 
  * Kilométrage min / max (`<input>`)
* Tries possibles :
  * Quantité et prix (croissant / décroissant) (`<select>`)  

* Ajouter les inputs HTML de trie et de filtrage au-dessus de la liste
* Faire passer à l'action "index" les valeurs du formulaire, via des paramètres GET
* Créer une fonction dans le repository pour gérer le filtrage
  * Cette fonction aura autant de paramètres que de critères de filtrage/trie  

**Résultat attendu : Lorsqu'on utilise les filtre/tries, la liste est actualisée et triée/filtrée**
## Éxercice 4

L'administrateur souhaite pouvoir filtrer les véhicules par marque.

* Créer une nouvelle entité "Marque"
  * Supprimer l'ancienne propriété "Marque"
* Mettre à jour l'entité du véhicule pour créer une relation avec l'entité Marque
> Un véhicule ne peut avoir qu'une seule marque
>
> Une marque peut être reliée à plusieurs véhicules
  
* Générer un CRUD de l'entité Marque
* Modifier le formulaire des véhicules pour pouvoir sélectionner une marque
* Dans la page qui liste les véhicules, ajouter une liste déroulante qui permet de filtrer par marque

**Résultat attendu : Il est possible d'ajouter/supprimer/éditer/lister les marques, il est possible de modifier la marque d'un véhicule, et lorsqu'on filtre par marque, la liste est acutalisée et filtrée**

## Éxercice 5
L'administrateur souhaite créer un espace publique qui mette en avant certains véhicules.

* Créer une page d'accueil
* Ajouter à l'entité véhicule les propriétés suivantes
  * mise en avant en page d'accueil
  * meilleur rapport qualité/prix
  * Mettre à jour le formulaire pour mettre en place des cases à cocher pour ces nouvelles propriétés
* Dans la page d'accueil
  * Créer un encart des véhicules mis en avant
  * Créer un encart pour les véhicules ayant un meilleur rapport qualité/prix
  
** Résultat attendu : La page d'accueil contient deux liste de véhicules, ceux mis en avant, et ceux ayant le meilleur rapport qualité prix

 ## Éxercice 6
L'administrateur souhaite avoir un espace d'administration sécurisé par une connexion
 
* Utiliser la commande "make:user" pour générer l'entité User
* Utiliser la commande "make:auth" pour mettre en place un formulaire de connexion
* Utiliser la commande "make:registration-form" pour mettre en place un formulaire d'inscription
> **Prenez le temps de lire le résultat de chaque commande**
* Mettre en place les règles de sécurité pour que :
  * seul un utilisateur connecté puisse accéder à l'interface d'administration des véhicules
  * un utilisateur anonyme ne peut accéder qu'à la page d'accueil 
  
** Résultat attendu : N'importe qui peut consulter la page d'accueil, mais il faut être connecté pour pouvoir administrer les véhicules et les marques"

## Éxercice 7
 
 L'administrateur souhaite pouvoir recevoir des demandes de contact via un formulare sur le site
 * Créer une entité "Contact" avec les propriétés suivantes :
    * Nom
    * Email
    * Message
 * Générer un CRUD de l'entité Contact et placer le formulaire dans la page d'accueil
 * Intégrer dans l'espace d'administration une page qui liste les demandes de contact
 
 ## Éxercice 8
 
 Ajouter du style.
 Installer la librarie "Webpack Encore" et ajouter Bootstrap. 
