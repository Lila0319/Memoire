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
 
Partie 1 : Tests de gestions des identites

 I- DEFINITION DES ROLES DE TEST 


Challenge 1 : cookie variable 

Le premier challenge sert a bypasser le cookie et d'acceder au role admin .Le but est de verifier si l'utilisateur simple peut acceder a l'interface administrateur.

Challenge 2 : account variable

Le but est de verifier si l'utilisateur simple peut etre un Manager afin de jouer les roles de cet dernier.
Cet challenge demande donc de bypasser le role manager .

Challenge 3 : hidden files
Le but de ce challenges est de trouver des repertoires ou fichier caches ( par exemple /admin , /mod, /backups) afin d'obtenir le flag .

Challenge 4 : admin bypass
Le but de ce challenge est de switcher d'un utilisateur simple ou lambda a des utilisateurs bien connus  (par exemple admin , backupsetc.)

Outils :

- https://github.com/Quitten/Autorize
- https://www.zaproxy.org/docs/desktop/addons/access-control-testing/

II-PROCESSUS D'INSCRIPTION DES UTILISATEURS DE TEST 

Les objectifs des tests suivant sont de verifier que les  exigences d’identité pour l’enregistrement des utilisateurs sont alignées sur les exigences commerciales et de sécurité. Et de valider le processus d'inscription 

Challenge 5 : Can anyone register for access?

Ce challenge est tres simple , le but est de verifier si n'importe qui peut s'incrire a notre application web .

Outils : Proxy

III-PROCESSUS DE PROVISIONNEMENT DU COMPTE DE TEST 
 
 L'objectif de ce test est  de verifier  quels comptes peuvent provisionner d’autres comptes et de quel type.

Challenge 6: Provisioning requests

Le but de ce challenge est de voir si il existe une une vérification, un contrôle et une autorisation des demandes de provisionnement

Challenge 7: De-provisioning requests

Le but de ce challenge est de verifier si il existe un moyen de desapprouver les utilisateurs lorsqu'ils respectent pas les normes .

Challenge 8: Can an administrator provision other administrators ? 

Le but de ce challenge est de verifier si un Un administrateur peut-il provisionner d’autres administrateurs

Challenge 9: Can an administrator provision other users ?

Le but de ce challenge est de verifier si  Un administrateur peut-il provisionner d’autres utilisateurs 

Challenge 10: Can an administrator de-provision other users ?

Le but de ce challenge est de verifier si  Un administrateur peut-il supprimer d’autres utilisateurs 

Challenge 11: User informations transfering

Ce challenge nous permet de verifier comment sont gerer les informations des utilisateurs ,s'ils sont transferer lorsqu'un utilisateur est supprimer 

Challenge 12: User de-provision

Le but de ce challenge est de verifier si un utilisateur  peut-il se supprimer lui meme

Outils : Proxy

IV-TESTS POUR L'ENUMERATION DES COMPTES ET LES COMPTES D'UTILISATEURS DEVINABLES 

L'objectif de ce test est Examiner les processus relatifs à l’identification de l’utilisateur ( par exemple , l’inscription, la connexion, etc.).Et d'Énumérer les utilisateurs lorsque cela est possible grâce à l’analyse des réponses.

Challenge 13: Username Invalid

Le but de ce challenge est que le testeur doit  essayer d'insérer un identifiant d'utilisateur non valide et un mot de passe erroné et enregistrer la réponse du serveur (le testeur doit être sûr que le nom d'utilisateur n'est pas valide dans l'application). Enregistrez le message d'erreur et la réponse du serveur. Afin d'identifier une liste des utilisateurs pour trouver le flag 

Challenge 14: Username Valid

 Le but de ce challenge est que le testeur doit essayer d'insérer un identifiant d'utilisateur valide et un mot de passe incorrect et enregistrer le message d'erreur généré par l'application.Et faire sortir la liste admins et de trouver le flag 

Outils : 
- https://www.zaproxy.org/
- https://curl.haxx.se/
- https://www.perl.org/
- sqlmap 
- BurpSuit

V-TEST DE LA POLITIQUE DE NOM D'UTILISATEUR FAIBLE OU NON APPLIQUEE

L'objectif du test est de determiner si une structure de nom de compte cohérente rend l’application vulnérable à l’énumération de comptes. Et de determiner  si les messages d’erreur de l’application autorisent l’énumération des comptes.


Challenge 15 : Testing for Weak or Unenforced Username Policy

Le but de ce challenge est de déterminer la structure des noms de compte et d'evaluez la réponse de l’application aux noms de compte valides et non valides.Afin de se connecter et de trouver le flag 

Outils :
Burpsuite
Wordlist

Partie 2: Test d'authentification

I-TEST DES INFORMATIONS D'IDENTIFICATION PAR DEFAUT

L'objectif de ce test est d'enumérer les applications pour les informations d’identification par défaut et validez si elles existent toujours. 
D'examiner  et d'evaluer les nouveaux comptes d’utilisateurs et vérifiez s’ils sont créés avec des valeurs par défaut ou des modèles identifiables.

Challenge 1: Testing for Default Credentials of Common Applications

Le but de se challenge est de se connecter avec des identifiants par defauts bien connu des admins afin de trouver le compte admin qui contient le flag 

Challenge 2: Testing for Default Password of New Accounts

Le but de se challenge est de verifier si les utilisateurs laissent leur mot de passe par defaut lors de la creation de leur compte au lieu de les changer 

Outils :
- https://portswigger.net/burp
- https://github.com/vanhauser-thc/thc-hydra
- https://www.cirt.net/nikto2

II-TEST DE LA FAIBLESSE DU MECANISME DE VERROUILLAGE 

Challenge 3: Lockout Mechanism

Challenge 4: CAPTCHA

Challenge 5: Unlock Mechanism