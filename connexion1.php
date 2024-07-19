<?php
session_start();

require_once 'config.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username = ? LIMIT 1";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$username]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        if (password_verify($password, $user['password'])) {
            $_SESSION['username'] = $user['username'];
            header("Location: index.php");
            exit;
        } else {
            $_SESSION['error_message'] = "Mot de passe incorrect pour l'utilisateur $username. flag:LILA{Un3nforc3d_UserName_P0l1cy}";
        }
    } else {
        $_SESSION['error_message'] = "Nom d'utilisateur incorrect.";
    }
    header("Location: connexion1.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
        <h1>Connexion</h1>
        <form action="connexion1.php" method="post"> 
            <label for="username">Nom d'utilisateur :</label>
            <input type="text" id="username" name="username" required>
            <br>
            <label for="password">Mot de passe :</label>
            <input type="password" id="password" name="password" required>
            <br>
            <button type="submit" style="background-color: #77B5FE; color: white;">Se connecter</button>
            <p>Vous n'avez pas un compte? <a href="inscription.php">Inscrivez-vous</a></p>
        </form>
        <div id="error_message">
            <?php
            if (isset($_SESSION['error_message'])) {
                echo '<p style="color: red;">' . $_SESSION['error_message'] . '</p>';
                unset($_SESSION['error_message']);
            }
            ?>
        </div>
    </div>
</body>
</html>
