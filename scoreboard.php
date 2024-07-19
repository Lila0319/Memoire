<?php
session_start();
require_once 'config.php';

if (isset($_POST['points']) && isset($_POST['challenge_name']) && isset($_SESSION['id_user'])) {
    $challenge_name = $_POST['challenge_name'];
    $points = (int)$_POST['points'];
    $user_id = $_SESSION['id_user'];

    // Vérifier si le défi est déjà validé
    $stmt = $pdo->prepare("SELECT * FROM user_challenges WHERE id_user = ? AND challenge_name = ?");
    $stmt->execute([$user_id, $challenge_name]);
    $existingChallenge = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$existingChallenge) {
        // Insérer un nouvel enregistrement de défi
        $stmt = $pdo->prepare("INSERT INTO user_challenges (id_user, challenge_name, points, status) VALUES (?, ?, ?, 'valid')");
        $stmt->execute([$user_id, $challenge_name, $points]);

        // Mettre à jour les points de l'utilisateur dans la session
        if (!isset($_SESSION['points'])) {
            $_SESSION['points'] = 0;
        }
        $_SESSION['points'] += $points;
    }
}
?>
