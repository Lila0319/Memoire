<?php
session_start();

// Inclure le fichier de configuration de la base de données
require_once 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $submittedUsername = $_POST["username"];
    $submittedPassword = $_POST["password"];

    try {
        $query = "SELECT * FROM users2 WHERE username = ?";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$submittedUsername]);
        $user = $stmt->fetch();

        if ($user && password_verify($submittedPassword, $user["password"])) {
            $_SESSION['id_user'] = $user['id'];
            $_SESSION['username'] = $user['username'];

            if ($submittedPassword === "welcome123") {
                $_SESSION['flag'] = "LILA{def1ulT_Cr3dent1Als_newAcompte}";
            }

            die("LILA{def1ulT_Cr3dent1Als_newAcompte}");
            exit();
        } else {
            $_SESSION['erreur_connexion'] = "Nom d'utilisateur ou mot de passe incorrect. Veuillez réessayer.";
            header("Location: connexion2.php?error=1");
            exit();
        }
    } catch (PDOException $e) {
        die("Erreur de connexion à la base de données : " . $e->getMessage());
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Connecte-toi</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <div class="content">
        <h1>Connecte-toi</h1>
        <?php
        if (isset($_SESSION['erreur_connexion'])) {
            echo "<p>" . $_SESSION['erreur_connexion'] . "</p>";
            unset($_SESSION['erreur_connexion']);
        }
        ?>
        <form action="connexion2.php" method="post">
            <label for="username">Nom d'utilisateur :</label><br>
            <input type="text" name="username" required><br>
            
            <label for="password">Mot de passe :</label><br>
            <input type="password" name="password" required><br>
            
            <button type="submit">Se connecter</button>
        </form>
    </div>
</body>
</html>
