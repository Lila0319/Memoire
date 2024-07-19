<?php
session_start();



if (!isset($_SESSION['page'])) {
    $_SESSION['page'] = 'Apprendre';
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cours de Sécurité Informatique</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <style>
        .cours-container {
            display: grid;
            grid-template-columns: repeat(3, 1fr); 
            gap: 20px; 
        }

        .cours {
            width: 100%;
            border: 2px solid #77B5FE;
            padding: 1px;
            background-color: #f0f0f0;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>
<body>
    <div class="content">
        <nav>
            <ul class="horizontal-list">
                <li><a href="index.php">Accueil</a></li>
                <li><a href="inscription.php">Inscription</a></li>
                <li><a href="cybersecurity.php">Apprendre</a></li>
                <li><a href="challenge.php">Challenges</a></li>
                <li><a href="about.php">À propos</a></li>
                <li><a href="profil.php">Mon Profil</a></li>
            </ul>
        </nav>
        <h1>Cours de Sécurité Informatique</h1>
        <p style="color: black;">Bienvenue dans notre cours de sécurité informatique. Découvrez nos cours ci-dessous :</p>

      
        <div class="cours-container">
           
            <div class="cours">
                <h2>1. Introduction à la sécurité informatique</h2>
                <p>Contenu du cours sur l'introduction à la sécurité informatique...</p>
            </div>

           
            <div class="cours">
                <h2>2. Cryptographie et chiffrement</h2>
                <p>Contenu du cours sur la cryptographie et le chiffrement...</p>
            </div>

            
            <div class="cours">
                <h2>3. Gestion des mots de passe</h2>
                <p>Contenu du cours sur la gestion des mots de passe...</p>
            </div>

            
            <div class="cours">
                <h2>4. Firewalls et sécurité réseau</h2>
                <p>Contenu du cours sur les firewalls et la sécurité réseau...</p>
            </div>

            
            <div class="cours">
                <h2>5. Sécurité des applications</h2>
                <p>Contenu du cours sur la sécurité des applications...</p>
            </div>

          
            <div class="cours">
                <h2>6. Monitoring</h2>
                <p>Contenu du cours sur le monitoring...</p>
            </div>
        </div>

        
        <p><a href="autres_cours.php" style="color: #77B5FE;">Cours supplémentaires</a></p>
    </div>
</body>
</html>
