<?php
session_start();

require_once 'config.php';

try {
    // Récupérer les demandes en attente depuis la base de données
    $stmt = $pdo->query("SELECT * FROM demandes WHERE status = 'pending'");
    $demandes = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("La connexion à la base de données a échoué : " . $e->getMessage());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_user = $_POST['id_user'];
    $action = $_POST['action'];

    
    $pdo->beginTransaction();

    try {
        if ($action === 'approve') {
          
            $stmt = $pdo->prepare("SELECT * FROM demandes WHERE id_user = ?");
            $stmt->execute([$id_user]);
            $demande = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($demande) {
                $nom = $demande['nom'];
                $prenom = $demande['prenoms'];
                $email = $demande['email'];
                $numero = $demande['numero'];
                $adresse = $demande['adresse'];
                $username = $demande['username'];
                $password = $demande['password'];

               
                $stmt = $pdo->prepare("INSERT INTO users (nom, prenoms, email, numero, adresse, username, password) VALUES (?, ?, ?, ?, ?, ?, ?)");
                $stmt->execute([$nom, $prenom, $email, $numero, $adresse, $username, $password]);
            }

           
            $stmt = $pdo->prepare("DELETE FROM demandes WHERE id_user = ?");
            $stmt->execute([$id_user]);

           
            $pdo->commit();

            die("La demande a été approuvée et l'utilisateur a été ajouté.Le flag :LILA{DeMand3_Approuve5_2hd2j3}");
        } else {
           
            $stmt = $pdo->prepare("DELETE FROM demandes WHERE id_user = ?");
            $stmt->execute([$id_user]);

           
            $pdo->commit();

            die("La demande a été rejetée. Le flag :LILA{DeMand3_Rject3R_2hd2j3}");
        }
    } catch (Exception $e) {
       
        $pdo->rollBack();
        die("Erreur lors du traitement de la demande : " . $e->getMessage());
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="../styles.css">
</head>
<body>
<div class="content">
    <h1>Demandes d'Approvisionnement</h1>
    <table>
        <tr>
            <th>Nom</th>
            <th>Prénoms</th>
            <th>Email</th>
            <th>Numéro de téléphone</th>
            <th>Adresse</th>
            <th>Nom d'utilisateur</th>
            <th>Action</th>
        </tr>
        <?php foreach ($demandes as $demande): ?>
        <tr>
            <td><?= htmlspecialchars($demande['nom']) ?></td>
            <td><?= htmlspecialchars($demande['prenoms']) ?></td>
            <td><?= htmlspecialchars($demande['email']) ?></td>
            <td><?= htmlspecialchars($demande['numero']) ?></td>
            <td><?= htmlspecialchars($demande['adresse']) ?></td>
            <td><?= htmlspecialchars($demande['username']) ?></td>
            <td>
                <form action="demandes.php" method="post" style="display:inline;">
                    <input type="hidden" name="id_user" value="<?= $demande['id_user'] ?>">
                    <button type="submit" name="action" value="approve">Approuver</button>
                </form>
                <form action="demandes.php" method="post" style="display:inline;">
                    <input type="hidden" name="id_user" value="<?= $demande['id_user'] ?>">
                    <button type="submit" name="action" value="reject">Rejeter</button>
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</div>
</body>
</html>
