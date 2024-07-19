<?php

session_start();
$_SESSION['page']='Acceuil';

if (!isset($_SESSION['id_admin'])) {
    
    header("Location: login.php");
    exit;
}

?>


<!DOCTYPE html>
<html>
<head>
    <title>Page d'Administration</title>
    <link rel="stylesheet" type="text/css" href="../style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
   
        <div class="content">
            <nav>
                 <ul class="horizontal-list">
                    <li><a href="index.php">Acceuil</a></li>
                    <li><a href="profil_admin.php">Mon Profil </a></li>
                </ul>
           </nav>
            <h1>Bienvenue sur la page d'administration, <?= $_SESSION['id_admin'] ?>!</h1>
            <p>Cliquez votre action ici.</p>
            <a class="show-button" href="afficher.php">Afficher les utilisateurs</a>
            <a class="show-button" href="ajouter_admin.php">ajouter admin </a>
            <a class="show-button" href="ajouter.php">Ajouter des cours</a>
            
                    <p>  LILA{adm1in_shdbf_2hd2j3} </p>
        </div>
    </div>
    <script>   window.addEventListener('beforeunload', function (e) {
            navigator.sendBeacon('logout.php');
        });</script>
</body>
</html>

