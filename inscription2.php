<?php
session_start();


require_once 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $email = $_POST["email"];

    $defaultPassword = "welcome123";
    $hashedPassword = password_hash($defaultPassword, PASSWORD_BCRYPT);

    try {
        $query = "INSERT INTO users2 (username, email, password) VALUES (?, ?, ?)";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$username, $email, $hashedPassword]);

        $_SESSION['message'] = "Compte créé avec succès. Le mot de passe par défaut est 'welcome123'.";
        header("Location: connexion2.php");
        exit();
    } catch (PDOException $e) {
        die("Erreur de connexion à la base de données : " . $e->getMessage());
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Inscris-Toi</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <div class="content">
        <h1>Inscris-TOI</h1>
        <?php
        if (isset($_SESSION['message'])) {
            echo "<p>" . $_SESSION['message'] . "</p>";
            unset($_SESSION['message']);
        }
        ?>
        <form action="inscription2.php" method="post">
            <label for="username">Nom d'utilisateur :</label><br>
            <input type="text" name="username" required><br>
            
            <label for="email">Email :</label><br>
            <input type="email" name="email" required><br>

            <button type="submit">S'inscrire</button>
        </form>
    </div>
</body>
</html>
