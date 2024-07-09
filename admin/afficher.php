<?php
session_start();

require_once 'config.php';

try {
    $sql = "SELECT * FROM users";
    $stmt = $pdo->query($sql);
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Erreur de récupération des utilisateurs : " . $e->getMessage());
}

?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="../styles.css">
</head>
<body>
    <div class="content">
    <nav>
                 <ul class="horizontal-list">
                    <li><a href="index.php">Acceuil</a></li>
                    <li><a href="profil_admin.php">Mon Profil </a></li>
                </ul>
           </nav>
        <h1>Liste des utilisateurs</h1>
        <form action="confirmer_suppression_user.php" method="post">
            <table>
                <thead>
                    <tr>
                        <th>Sélectionner</th>
                        <th>Nom</th>
                        <th>Prénoms</th>
                        <th>Email</th>
                        <th>Numéro de téléphone</th>
                        <th>Adresse</th>
                        <th>Nom d'utilisateur</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $user) : ?>
                        <tr>
                            <td><input type="checkbox" name="selected_users[]" value="<?= $user['id_user'] ?>"></td>
                            <td><?= $user['nom'] ?></td>
                            <td><?= $user['prenoms'] ?></td>
                            <td><?= $user['email'] ?></td>
                            <td><?= $user['numero'] ?></td>
                            <td><?= $user['adresse'] ?></td>
                            <td><?= $user['username'] ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <select name="action">
                <option value="delete">Supprimer</option>
                <option value="delete">Modifier</option>
            </select>
            <button type="submit">Appliquer</button>
        </form>
        <a class="show-button" href="demandes.php">Voir les demandes </a>
        <a class="show-button" href="ajouter_utilisateur.php">Ajouter Utilisateur</a>
       
    </div>
</body>
</html>
