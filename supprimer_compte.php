<?php
session_start();
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

// Traitement de la demande de suppression de compte
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['confirm_delete'])) {
    // Supprimer l'utilisateur de la base de données
    $delete_sql = "DELETE FROM users WHERE id_user = ?";
    $delete_stmt = $pdo->prepare($delete_sql);
    $delete_stmt->execute([$id_user]);
     die("Votre compte a ete supprimer .Voici le flag LILA{user_deProvisioN_cod2j3}");
    // Détruire la session et rediriger vers la page d'accueil
    session_destroy();
    header('Location: index.php');
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .delete-form {
            margin-top: 20px;
            text-align: center;
        }
        .delete-form button {
            background-color: #FF6347;
            color: white;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
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
        <h1>Supprimer Mon Compte</h1>
        <div class="profile">
            <div class="profile-icon">
                &#128100; 
            </div>
            <div class="profile-info">
                <p>Nom : <?php echo htmlspecialchars($user['nom']); ?></p>
                <p>Prénom : <?php echo htmlspecialchars($user['prenoms']); ?></p>
                <p>Email : <?php echo htmlspecialchars($user['email']); ?></p>
                <p>Numéro de téléphone : <?php echo htmlspecialchars($user['numero']); ?></p>
                <p>Adresse : <?php echo htmlspecialchars($user['adresse']); ?></p>
                <p>Nom d'utilisateur : <?php echo htmlspecialchars($user['username']); ?></p>
            </div>
            <div class="delete-form">
                <p>Êtes-vous sûr de vouloir supprimer votre compte ? Cette action est irréversible.</p>
                <form method="post">
                    <button type="submit" name="confirm_delete">Confirmer la suppression</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
