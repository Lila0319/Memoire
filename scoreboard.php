<?php
session_start();
require_once 'config.php';

if (isset($_POST['points']) && isset($_POST['challenge_name']) && isset($_SESSION['id_user'])) {
    $challenge_name = $_POST['challenge_name'];
    $points = (int)$_POST['points'];
    $user_id = $_SESSION['id_user'];

   
    $stmt = $pdo->prepare("SELECT * FROM user_challenges WHERE id_user = ? AND challenge_name = ?");
    $stmt->execute([$user_id, $challenge_name]);
    $existingChallenge = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$existingChallenge) {
       
        $stmt = $pdo->prepare("INSERT INTO user_challenges (id_user, challenge_name, points, status) VALUES (?, ?, ?, 'valid')");
        $stmt->execute([$user_id, $challenge_name, $points]);

        
        if (!isset($_SESSION['points'])) {
            $_SESSION['points'] = 0;
        }
        $_SESSION['points'] += $points;
    }
}
?>
