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
