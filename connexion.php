<?php
session_start();

define('MAX_LOGIN_ATTEMPTS', 3);
define('LOCKOUT_DURATION', 10 * 60); 

require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username = ? LIMIT 1";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$username]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        
        if ($user['lockout_time'] && strtotime($user['lockout_time']) > (time() - LOCKOUT_DURATION)) {
            header("Location: connexion.php?User=$username&Error=3"); 
            exit;
        }

        if (password_verify($password, $user['password'])) {
          
            $query = "UPDATE users SET login_attempts = 0, lockout_time = NULL WHERE username = ?";
            $stmt = $pdo->prepare($query);
            $stmt->execute([$username]);

            $_SESSION['username'] = $user['username'];
            $_SESSION['id_user'] = $user['id_user']; 
            header("Location: profil.php");
            exit;
        } else {
           
            $loginAttempts = $user['login_attempts'] + 1;
            $lockoutTime = NULL;

            if ($loginAttempts >= MAX_LOGIN_ATTEMPTS) {
                $lockoutTime = date('Y-m-d H:i:s');
            }

            $query = "UPDATE users SET login_attempts = ?, lockout_time = ? WHERE username = ?";
            $stmt = $pdo->prepare($query);
            $stmt->execute([$loginAttempts, $lockoutTime, $username]);

            header("Location: connexion.php?User=$username&Error=2"); 
            exit;
        }
    } else {
        header("Location: connexion.php?User=$username&Error=0"); 
        exit;
    }
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
        <form action="connexion.php" method="post">
            <label for="username">Nom d'utilisateur :</label>
            <input type="text" id="username" name="username" required>
            <br>
            <label for="password">Mot de passe :</label>
            <input type="password" id="password" name="password" required>
            <br>
            <button type="submit" style="background-color: #77B5FE; color: white;">Se connecter</button>
            <p>Vous n'avez pas un compte? <a href="inscription.php">Inscrivez-vous</a> </p>
        </form>
        <div id="erreur_message">
            <?php
            if (isset($_GET['Error'])) {
                if ($_GET['Error'] == 0) {
                    echo '<p style="color: red;">Nom d\'utilisateur incorrect. Veuillez réessayer.</p>';
                } elseif ($_GET['Error'] == 2) {
                    echo '<p style="color: red;">Mot de passe incorrect. Veuillez réessayer.</p>';
                } elseif ($_GET['Error'] == 3) {
                    echo '<p style="color: red;">Votre compte est verrouillé. Veuillez réessayer plus tard.</p>';
                }
            }
            ?>
        </div>
    </div>
</body>
</html>
