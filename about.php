<?php
session_start();

$_SESSION['page'] = 'A propos';

$cookie_name = "Flag";
$cookie_value = "4c494c417b4731314c5f444a434856435f4243464252487d";

setcookie($cookie_name, $cookie_value);
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
                <h1>A propos</h1>
                <p style="color: black;">L0L3 cybersecurity est une formation en ligne base sur la securite informatique . 
                Ici, vous trouverez des ressources, des cours et des conseils pour vous aider à renforcer votre sécurité en ligne et à protéger vos données personnelles. Explorez nos cours sur la sécurité informatique, la cryptographie, la gestion des mots de passe, les firewalls, et bien plus encore. La sécurité en ligne est essentielle de nos jours, et nous sommes là pour vous guider dans ce domaine.</p>
                
            </div>
            
        </div>
        </div>
    </div>

   

</body>
</html>
