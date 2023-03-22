# PHP-Panier

Projet réalisé par Étienne Robert

## Objectif
L'**Objectif** de ce projet était de créer un site web avec une liste de produit et un panier.
J'ai donc choisit de recréer un site web de cable USB en utilisant les technologie Bootstrap et JQuery pour m'assister.
Le site est aussi entièrement écrit en PHP avec une architecture de type MVC a la demande du projet.

## Feature PHP implenté
Il est possible de:
  - Se connecter 
  - S'inscrire
  - Ajouter un item au panier
  - Modifier son panier
  - Se deconnecter
  - Changer de thème
  - Créer une facture dans la table facture
## Setup
Pour pouvoir utilisé l'application, il vous faudrait un serveur de type Wamp Xampp ou Lamp. 
J'ai développer sur Wamp, donc il faudras mettre le dossier dans le dossier /www du dossier wamp.
Par exemple, pour moi cela ce trouve ici: C:\wamp64\www

Par la suite, il faudrait créer la base de donnée php-panier dans MySQL et executé le script SQL fournit avec le projet.
(voir [Fichier SQL de la base de donnée](https://github.com/eti9/PHP-Panier/blob/main/BD-SQL-SCRIPT/php-panier.sql))

Pour finir, pour accéder au site, il faudrait accéder a localhost et ce rendre dans le 
directory du projet où PHP choisira directement l'index.php comme fichier d'ouverture
## Thème CSS choisit
### 1er theme - Normal
J'ai choisit un thème un peu style "Apple" auquel j'ai aussi rajouter un monstre rouge afin de donnée de la personnalité au site.
Le thème ressemble a cela:
![image](https://user-images.githubusercontent.com/37345940/226804883-26c101c7-0153-4c8f-ab4c-018aca175537.png)

### 2eme Theme - Saint-Patrick
Pour le deuxieme theme, j'ai choisit un thème un peu plus festif. J'ai décidé d'y aller avec la Saint-Patrick puisque c'était plutôt d'actualité.
Le thème ressemble donc a cela :
![image](https://user-images.githubusercontent.com/37345940/226805149-3db057a3-4176-4792-9dc1-21f63c5a8dcf.png)


## Animation et service JQuery et Javascript
Pour mes trois implémentations de Javascript, j'ai décidé de faire un form validation pour l'inscription, 
puis un décompte lorsqu'on réussit notre inscription et finalement j'ai aussi fait un bouton qui se rend visible lorsqu'on
modifie le nombre dun item dans le cart. J'ai aussi rajouter des alerts avec les cookies pour gérer les erreurs et les succès.

Premier cas :
![image](https://user-images.githubusercontent.com/37345940/226805735-08850d47-6299-488a-b216-2070644f0081.png)

Deuxieme cas: 
![image](https://user-images.githubusercontent.com/37345940/226805855-b4ec3ed2-b951-4421-ba2a-27ec60d71d75.png)

Troisième cas:
![image](https://user-images.githubusercontent.com/37345940/226805983-9494cb02-23d8-4384-ad06-5da49523baff.png)
![image](https://user-images.githubusercontent.com/37345940/226806025-cac434bb-f429-4f4c-b69f-ca06428a203a.png)

Erreur et succès:
![image](https://user-images.githubusercontent.com/37345940/226806094-b8319492-8597-4677-b990-d8de99d2a1fc.png)






Et voila le projet pas tout a fait finit mais tout au moins fonctionnel ! 
#### Future implementation
 - Liste de facture
 - Dropdown avec animation lors de Hover pour le profil dans la navbar
 - Page profil avec les infos pour les modifiers
