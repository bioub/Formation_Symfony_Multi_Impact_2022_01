# Exercices

## Router

* créer un controleur Contact avec la commande make:controller
* dans ce controller créer 5 méthodes : index, create, show, delete, update
* créer les fichiers twig manquant (juste mettre une balise h2 avec le nom de la page)
* ces méthodes doivent être accessible via les requetes suivantes

| Requete                           | methode php |
|-----------------------------------|-------------|
| GET /contacts                     | index       |
| GET /contacts/{id}                | show        |
| GET et POST /contacts/add         | create      |
| GET et POST /contacts/{id}/delete | delete      |
| GET et POST /contacts/{id}/update | update      |

## Twig

### Ex1 

* créer une entité Contact avec 3 propriétés (id: int, name: string, email: string)
* générer les getters/setters avec PHPStorm
* dans ContactController::index créer un tableau d'objet Contact avec des valeurs d'exemple
pour id, name et email
* dans template/index afficher la liste de contacts sous forme d'un tableau HTML

### Ex2

* dans ContactController::show créer un objet Contact avec des valeurs d'exemple
  pour id, name et email
* dans template/show afficher les valeurs dans des paragraphes

### Ex3

* dans ContactController::delete créer un objet Contact avec des valeurs d'exemple
  pour id, name et email
* dans template/delete afficher un formulaire avec la phrase "Etes vous sur de vous supprimer le contact Jean Dupont ?"
  ( où Jean Dupont est la prop name du contact) et 2 boutton Oui et Non

## Doctrine

* ajouter les annotations/attributs dans la classe Contact
* générer les migrations associées
* jouer les migrations
* modifier le fichier AppFixture pour générer des contacts
* insérer les fixtures
* modifier les controleurs index et show de Contact pour 
  récupérer les données via ObjectRepository

## Créer une nouvelle entité et ses pages

* Générer une nouvelle entité Societe avec id, nom et ville avec make:entity
* Générer les getters/setters si besoin et la table
* Modifier les fixtures pour insérer des sociétés à partir de Faker (voir la doc)
* Créer SocieteManager et le faire dépendre de SocieteRepository
* Générer un contrôleur SocieteController et le faire dépendre de SocieteManager
* Ajouter dans SocieteManager les méthodes getAll et getById comme ContactManager
* Créer les pages list et show en affichant le contenu de la base comme Contact

## Relations Doctrine

### Ex 1

* créer une entité Groupe (groupe de contacts, ex: Amis, Famille, Collègues) avec 2 propriétés : name (type: string) et description (type: text)
* dans AppFixtures créer 3 groupes : Amis, Famille, Collègues
* créer la relation unidirectionnel côté Contact pour qu'on puisse y ajouter des groupes
* mettre à jour la table
* dans AppFixtures appeler le adder de groupe sur chaque contact
* dans contact show afficher les groupes du contact

### Ex 2

* Dans Societe créer la relation vers la société mère (ex: Google -> Alphabet, Activision -> Microsoft)
* dans AppFixtures appeler setMaisonMere
* afficher la maison mere dans societe show
* 