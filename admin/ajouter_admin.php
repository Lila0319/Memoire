<?php
session_start();


require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $admin_username = $_POST['admin_username'];
    $admin_password = password_hash($_POST['admin_password'], PASSWORD_DEFAULT);

    try {
       
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        
        $stmt = $pdo->prepare("SELECT * FROM admins WHERE username = ?");
        $stmt->execute([$admin_username]);
        $existingAdmin = $stmt->fetch();

        if ($existingAdmin) {
            die("Cet administrateur existe déjà.");
        }

        
        $stmt = $pdo->prepare("INSERT INTO admins (username, password) VALUES (?, ?)");
        $stmt->execute([$admin_username, $admin_password]);

        die("Administrateur ajouté avec succès. Voici ton flag : LILA{adm1n_Ajout3R_2hd2j3}");

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
    <title>Ajouter un administrateur</title>
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
            <h1>Ajouter un administrateur</h1>
            <form action="ajouter_admin.php" method="post">
                <label for="admin_username">Nom d'utilisateur :</label>
                <input type="text" id="admin_username" name="admin_username" required>
                <br>
                <label for="admin_password">Mot de passe :</label>
                <input type="password" id="admin_password" name="admin_password" required>
                <br>
                <button type="submit">Ajouter administrateur</button>
            </form>
        </div>
    </div>
</body>
</html>

