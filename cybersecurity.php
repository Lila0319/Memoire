<?php
session_start();



if (!isset($_SESSION['page'])) {
    $_SESSION['page'] = 'Apprendre';
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Cours de Sécurité Informatique</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <style>
        .cours-container {
            display: grid;
            grid-template-columns: repeat(3, 1fr); /* Crée 3 colonnes égales */
            gap: 20px; /* Espace entre les cours */
        }

        .cours {
            width: 100%; /* Largeur de chaque carte de cours */
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

        <!-- Cours container (utilisant CSS Grid) -->
        <div class="cours-container">
            <!-- Cours 1 : Introduction à la sécurité informatique -->
            <div class="cours">
                <h2>1. Introduction à la sécurité informatique</h2>
                <p>Contenu du cours sur l'introduction à la sécurité informatique...</p>
            </div>

            <!-- Cours 2 : Cryptographie et chiffrement -->
            <div class="cours">
                <h2>2. Cryptographie et chiffrement</h2>
                <p>Contenu du cours sur la cryptographie et le chiffrement...</p>
            </div>

            <!-- Cours 3 : Gestion des mots de passe -->
            <div class="cours">
                <h2>3. Gestion des mots de passe</h2>
                <p>Contenu du cours sur la gestion des mots de passe...</p>
            </div>

            <!-- Cours 4 : Firewalls et sécurité réseau -->
            <div class="cours">
                <h2>4. Firewalls et sécurité réseau</h2>
                <p>Contenu du cours sur les firewalls et la sécurité réseau...</p>
            </div>

            <!-- Cours 5 : Sécurité des applications -->
            <div class="cours">
                <h2>5. Sécurité des applications</h2>
                <p>Contenu du cours sur la sécurité des applications...</p>
            </div>

            <!-- Cours 6 : Monitoring -->
            <div class="cours">
                <h2>6. Monitoring</h2>
                <p>Contenu du cours sur le monitoring...</p>
            </div>
        </div>

        <!-- Liens vers d'autres cours -->
        <p><a href="autres_cours.php" style="color: #77B5FE;">Cours supplémentaires</a></p>
    </div>
</body>
</html>
