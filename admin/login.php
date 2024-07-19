<?php
session_start();

require_once 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $submittedUsername = $_POST["username"];
    $submittedPassword = $_POST["password"];

    try {
        
        $query = "SELECT * FROM admins WHERE username = ?";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$submittedUsername]);
        $user = $stmt->fetch();

        if ($user && password_verify($submittedPassword, $user["password"])) {
            // Authentification réussie, enregistrer l'ID de l'administrateur en session
            $_SESSION['id_admin'] = $user['id_admin'];
            header("Location: profil_admin.php");
            exit();
        } else {
            
            $_SESSION['erreur_connexion'] = "Nom d'utilisateur ou mot de passe incorrect. Veuillez réessayer.";
            header("Location: login.php?error=1");
            exit();
        }
    } catch (PDOException $e) {
        // Erreur de connexion à la base de données
        die("Erreur de connexion à la base de données : " . $e->getMessage());
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Connexion</title>
    <link rel="stylesheet" type="text/css" href="../style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <div class="content">
        <nav>
            <ul class="horizontal-list">
                <li><a href="index.php">Accueil</a></li>
                <li><a href="profil_admin.php">Mon Profil</a></li>
            </ul>
        </nav>
        <h1>Connexion à la page d'administration</h1>
        <div class="login-box">
            <form action="login.php" method="post">
                <label for="username">Nom d'utilisateur :</label><br>
                <input type="text" name="username" required><br>
                
                <label for="password">Mot de passe :</label><br>
                <input type="password" name="password" required><br>
                
                <button class="green-button" type="submit">Se connecter</button>
            </form>
        </div>
    </div>
</body>
</html>
