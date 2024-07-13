1-DEPLOYER DOCKER 

Pour deployer docker :

Prerequis : Installer Docker au prealable sur votre machine et dans le repertoire racine  executez cette commande  

docker-compose up -d --build

Pour stopper le docker vous allez executer la commande :

docker-compose down 

Si la commande est validée vous pouvez acceder a l'application sur un navigateur avec : localhost:8080/

2-IMPORTER LA BASE DE DONNEE 

Executer d'abord la commande : 

docker-compose up 

Et ensuite  ouvrez une autre ligne de commande pour importer la base 

Cette commande permet de copier la base de donnée dans le docker 

docker cp lm.sql db:/lm.sql 

Ensuite Acceder a Mysql :

docker exec -it db mysql -u root -p

Ca vous demandera un mot de passe ( Le mot de passe est vide donc cliquez sur entrer )

Ensuite choissisez la base de donnée 

use LM ;
La base une fois choisie ,executez cette commande :
Elle permet d'importer le contenue de la base dans la base creer 

SOURCE lm.sql 
