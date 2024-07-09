<?php
// Connexion à la base de données en utilisant PDO
$dsn = 'mysql:host=' . getenv('DB_HOST') . ';dbname=' . getenv('DB_NAME');
$username = getenv('DB_USER');
$password = getenv('DB_PASSWORD');

try {
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
} catch (PDOException $e) {
    die ('Connexion échouée : ' . $e->getMessage());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer les données du formulaire
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $numero = $_POST['numero'];
    $adresse = $_POST['adresse'];
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); 

    // Insérer les données dans la base de données
    $sql = "INSERT INTO demandes (nom, prenoms, email, numero, adresse, username, password) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$nom, $prenom, $email, $numero, $adresse, $username, $password]);

    header("Location: confirmation.php");
    exit;
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
            <h1>Inscription</h1>
            <form action="inscription.php" method="post">
                <label for="nom">Nom :</label>
                <input type="text" id="nom" name="nom" required>
                <br>
                <label for="prenom">Prénom :</label>
                <input type="text" id="prenom" name="prenom" required>
                <br>
                <label for="email">Email :</label>
                <input type="email" id="email" name="email" required>
                <br>
                <label for="numero">Numéro de téléphone :</label>
                <input type="tel" id="numero" name="numero" required>
                <br>
                <label for="adresse">Adresse :</label>
                <input type="text" id="adresse" name="adresse" required>
                <br>
                <label for="username">Nom d'utilisateur :</label>
                <input type="text" id="username" name="username" required>
                <br>
                <label for="password">Mot de passe :</label>
                <input type="password" id="password" name="password" required>
                <br>
                <label>
                    <input type="checkbox" name="accepter_conditions" required> J'accepte les conditions d'utilisation
                </label>
                <br>
                <div class="g-recaptcha" data-sitekey="votre-clé-reCAPTCHA"></div> <!-- Remplacez "votre-clé-reCAPTCHA" par votre clé reCAPTCHA -->
                <br>
                <button type="submit">Valider</button>
            </form>
        </div>
    </div>

    <script>
        // JavaScript pour changer la langue (exemple simple)
        const changeLanguageButton = document.getElementById('changeLanguage');
        const pageTitle = document.querySelector('h1');

        changeLanguageButton.addEventListener('click', function () {
            if (pageTitle.textContent === 'Inscription') {
                pageTitle.textContent = 'Registration';
            } else {
                pageTitle.textContent = 'Inscription';
            }
        });
    </script>
</body>
</html>

