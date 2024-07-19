<?php
session_start();

// Inclure le fichier de configuration de la base de données
require_once 'config.php';

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['id_user'])) {
    header('Location: connexion.php');
    exit();
}

// Récupérer les informations de l'utilisateur depuis la base de données
$id_user = $_SESSION['id_user'];
$sql = "SELECT nom, prenoms, email, numero, adresse, username FROM users WHERE id_user = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$id_user]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$user) {
    die("Utilisateur non trouvé.");
}
?>

<!DOCTYPE html>
<html>
<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="profil.css">
    <link rel="stylesheet" type="text/css" href="style.css">

    
</head>
<body>
    <div class="content">
        <nav>
            <ul class="horizontal-list">
                <li><a href="index.php">Accueil</a></li>
                <li><a href="inscription.php">Inscription</a></li>
                <li><a href="connexion.php">Apprendre</a></li>
                <li><a href="challenge.php">Challenges</a></li>
                <li><a href="about.php">À propos</a></li>
                <li><a href="profil.php">Mon Profil</a></li>
            </ul>
        </nav>
        
        <h1>Mon Profil</h1>
        <div class="profile">
            <div class="profile-icon">
                &#128100; 
            </div>
            <div class="profile-info">
    <div>
        <p>Nom : <?php echo htmlspecialchars($user['nom']); ?></p>
        <p>Prénom : <?php echo htmlspecialchars($user['prenoms']); ?></p>
        <p>Email : <?php echo htmlspecialchars($user['email']); ?></p>
        <p>Numéro de téléphone : <?php echo htmlspecialchars($user['numero']); ?></p>
        <p>Adresse : <?php echo htmlspecialchars($user['adresse']); ?></p>
    </div>
    <div>
        <p>Nom d'utilisateur : <?php echo htmlspecialchars($user['username']); ?></p>
    </div>
    <div>
        <ul>
            <li><a href="edit_profile.php">Modifier le profil</a></li>
            <li><a href="change_password.php">Changer le mot de passe</a></li>
            <li><a href="logout.php">Se Déconnecter</a></li>
            <li><a href="supprimer_compte.php">Supprimer Mon Compte</a></li>
        </ul>
    </div>
    </div>
        </div>
    </div>
</body>
</html>
