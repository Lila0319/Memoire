<?php
session_start();

if (!isset($_COOKIE['role']) || $_COOKIE['role'] != 'manager') {
    header('Location: index.php');
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="../styles.css">
</head>
<body>
<body>
    <div class="container">
        <div class="sidebar">
            <div class="menu-bar">Menu</div>
            <nav>
                <ul>
                    <li><a href="index.php">Accueil</a></li>
                  
                </ul>
            </nav>
        </div>
    
        <div class="content">
            <h1>Manager</h1>
            <p style="color: green;">Bienvenue, Manager! Voici votre flag: LILA{Y0U_aR3_1_M1n1g3r}</p>
        </div>
    </div>
    <script>   window.addEventListener('beforeunload', function (e) {
            navigator.sendBeacon('logout.php');
        });</script>
</body>
</html>
