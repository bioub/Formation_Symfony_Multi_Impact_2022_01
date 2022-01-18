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