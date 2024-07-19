<<?php
session_start();

require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_username = $_POST['user_username'];
    $user_email = $_POST['user_email'];
    $user_password = password_hash($_POST['user_password'], PASSWORD_DEFAULT);
    $user_nom = $_POST['user_nom'];
    $user_prenoms = $_POST['user_prenoms'];
    $user_numero = $_POST['user_numero'];
    $user_adresse = $_POST['user_adresse'];

    try {
        // Connexion à la base de données à partir de config.php
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Vérifier si l'utilisateur existe déjà
        $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->execute([$user_username]);
        $existingUser = $stmt->fetch();

        if ($existingUser) {
            die("Cet utilisateur existe déjà.");
        }

        // Ajouter l'utilisateur à la base de données
        $stmt = $pdo->prepare("INSERT INTO users (username, email, password, nom, prenoms, numero, adresse) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->execute([$user_username, $user_email, $user_password, $user_nom, $user_prenoms, $user_numero, $user_adresse]);

        die("Utilisateur ajouté avec succès. Voici le flag : LILA{use5_AjoUt3R_2h20233}");

    } catch (PDOException $e) {
        die("Erreur : " . $e->getMessage());
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un utilisateur</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
   
        <div class="content">
        <nav>
                 <ul class="horizontal-list">
                    <li><a href="index.php">Acceuil</a></li>
                    <li><a href="profil_admin.php">Mon Profil </a></li>
                </ul>
           </nav>
            <h1>Ajouter un utilisateur</h1>
            <form action="ajouter_utilisateur.php" method="post">
                <label for="user_username">Nom d'utilisateur :</label>
                <input type="text" id="user_username" name="user_username" required>
                <br>
                <label for="user_email">Email :</label>
                <input type="email" id="user_email" name="user_email" required>
                <br>
                <label for="user_nom">Nom :</label>
                <input type="text" id="user_nom" name="user_nom" required>
                <br>
                <label for="user_prenoms">Prénoms :</label>
                <input type="text" id="user_prenoms" name="user_prenoms" required>
                <br>
                <label for="user_numero">Numéro de Telephone :</label>
                <input type="text" id="user_numero" name="user_numero" required>
                <br>
                <label for="user_adresse">Adresse :</label>
                <input type="text" id="user_adresse" name="user_adresse" required>
                <br>
                <label for="user_password">Mot de passe :</label>
                <input type="password" id="user_password" name="user_password" required>
                <br>
                <button type="submit">Ajouter utilisateur</button>
            </form>
        </div>
    </div>
</body>
</html>
