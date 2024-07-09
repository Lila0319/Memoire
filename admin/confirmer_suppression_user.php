<?php
session_start();

require_once 'config.php';

if (!isset($_POST['selected_users']) || !isset($_POST['action'])) {
    header("Location: afficher.php");
    exit;
}

$selectedUsers = $_POST['selected_users'];
$action = $_POST['action'];

$_SESSION['selected_users'] = $selectedUsers;
$_SESSION['action'] = $action;

try {
    // Connexion à la base de données à partir de config.php
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Récupérer tous les utilisateurs depuis la base de données
    $stmt = $pdo->query("SELECT id_user, username FROM users");
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("La connexion à la base de données a échoué : " . $e->getMessage());
}
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmer la suppression</title>
    <link rel="stylesheet" href="../styles.css">
</head>
<body>
    <div class="container">
        <h1>Confirmer la suppression</h1>
        <form action="suppression_definitive_user.php" method="post">
            <p>Que voulez-vous faire avec les informations  des utilisateurs sélectionnés ?</p>
            <input type="radio" id="delete_info" name="post_action" value="delete_info" required>
            <label for="delete_posts">Supprimer les informations </label><br>
            <input type="radio" id="transfer_info" name="post_action" value="transfer_info" required>
            <label for="transfer_info">Transférer les informations vers un autre utilisateur </label><br>
            <select name="new_user_id" id="new_user_id">
                <?php foreach ($users as $user): ?>
                    <option value="<?= htmlspecialchars($user['id_user']) ?>"><?= htmlspecialchars($user['username']) ?></option>
                <?php endforeach; ?>
            </select>
            <br>
            <button type="submit">Confirmer</button>
        </form>
    </div>
</body>
</html>
