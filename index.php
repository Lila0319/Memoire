<?php
session_start();
$_SESSION['page'] = 'Accueil';

// Définir le rôle par défaut s'il n'est pas déjà défini
if (!isset($_COOKIE['role'])) {
    setcookie('role', 'user', time() + 3600, '/');
}

// Fonction pour vérifier le rôle
function checkRole() {
    if (isset($_COOKIE['role'])) {
        return $_COOKIE['role'];
    }
    return 'user';
}

$role = checkRole();

if ($role == 'admin') {
    header('Location: ../LM/admin/index.php');
    exit();
}
if ($role == 'manager') {
    header('Location: ../LM/mod/index.php');
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="styles.css">
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
            <h1>Accueil</h1>
           
            <?php if ($role == 'user'): ?>
                <p style="color: black;">  Bienvenue dans notre univers dédié à la cybersécurité. </p>
            <?php endif; ?>
        </div>
    </div>
    
    <script>
       
    </script>
</body>
</html>
