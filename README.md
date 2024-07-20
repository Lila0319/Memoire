1-DEPLOYER DOCKER 

Pour deployer docker :

Prerequis : Installer Docker au prealable sur votre machine et dans le repertoire racine  executez cette commande  

docker-compose up -d --build

Pour stopper le docker vous allez executer la commande :

docker-compose down 

Si la commande est validée vous pouvez acceder a l'application sur un navigateur avec : localhost:7000/

2- Acceder a Mysql :

docker exec -it Memoire_db mysql -h 127.0.0.1 -P 3306  -u root -p

Mot de passe : lila

3-Informations sur les challenges :

Les challenges ci dessous font reference aux WSTG -v4.2 et permet aux pentester web de pouvoir identifier les failles sur leur application web afin de les corriger avant de la mettre en  production

Module : Tests de securite des applications Web 
 
Partie 3 : Tests de gestions des identites

 I- DEFINITION DES ROLES DE TEST 


Challenge 1 : cookie variable 

Le premier challenge sert a bypasser le cookie et d'acceder au role admin .Le but est de verifier si l'utilisateur simple peut etre un administrateur afin de jouer les roles de cet dernier .

Challenge 2 : account variable

Le but est de verifier si l'utilisateur simple peut etre un Manager afin de jouer les roles de cet dernier.
Cet challenge demande donc de bypasser le role manager .

Challenge 3 : hidden files
Le but de ce challenges est de trouver des repertoires ou fichier caches ( par exemple /admin , /mod, /backups) afin d'obtenir le flag .

Challenge 4 : admin bypass