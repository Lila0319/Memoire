<?php
session_start();

require_once 'config.php';

try {
    // Vérification de l'authentification de l'administrateur
    if (!isset($_SESSION['id_admin'])) {
        header('Location: login.php');
        exit();
    }

    // Récupération de l'ID de l'administrateur depuis la session
    $id_admin = $_SESSION['id_admin'];

    // Requête pour récupérer le nom d'utilisateur de l'administrateur
    $sql = "SELECT username FROM admins WHERE id_admin = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id_admin]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$user) {
        die("Utilisateur non trouvé.");
    }

} catch (PDOException $e) {
    // Erreur de connexion à la base de données
    die("La connexion à la base de données a échoué : " . $e->getMessage());
}
?>


<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="../style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .profile {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .profile-icon {
            font-size: 100px;
            color: #333;
        }
        .profile-info {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="content">
        <nav>
            <ul class="horizontal-list">
            <li><a href="index.php">Acceuil</a></li>
            <li><a href="profil_admin.php">Mon Profil </a></li>
            </ul>
        </nav>
        <h1>Mon Profil</h1>
        <div class="profile">
            <div class="profile-icon">
                &#128100; 
            </div>
            <div class="profile-info">
                <p>Nom d'utilisateur : <?php echo htmlspecialchars($user['username']); ?></p>
                <?php if ($user['username'] === 'root'): ?>
                    <p style="color: red;">FLAG: LILA{def1ulT_Cr3dent1Als_Admin}</p>
                <?php endif; ?>
               <ul> 
               <li> <a href="edit_profile.php">Modifier le profil</a></li>
               <li> <a href="change_password.php">Changer le mot de passe</a></li>
               <li> <a href="logout.php"> Se Deconnecter </a></li>
               <li> <a href="supprimer_compte.php">Supprimer Mon Compte </a></li>
               </ul>
            </div>
        </div>
    </div>
</body>
</html>
