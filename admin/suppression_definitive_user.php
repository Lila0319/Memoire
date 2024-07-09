<?php
session_start();
require_once 'config.php';

if (!isset($_SESSION['selected_users']) || !isset($_POST['post_action'])) {
    header("Location: afficher.php");
    exit;
}

$selectedUsers = $_SESSION['selected_users'];
$postAction = $_POST['post_action'];
$newUserId = isset($_POST['new_user_id']) ? $_POST['new_user_id'] : null;


try{
    foreach ($selectedUsers as $userId) {
        if ($postAction === 'delete_info') {
           
            $stmt = $pdo->prepare("DELETE FROM users WHERE id_user = ?");
            $stmt->execute([$userId]);
            die("L'utilisateur a ete supprimer. Voici le flag :LILA{use5_d3_pR0VISION_22j3}");
        } elseif ($postAction === 'transfer_info' && $newUserId) {
        
            $stmt = $pdo->prepare("UPDATE users SET id_user = ? WHERE id_user = ?");
            $stmt->execute([$newUserId, $userId]);
            die ("Les informations de l'utilisateurs sont transferer avec succes.Voici to flag :LILA{1nFo_Use5_TransFer1NG} ");
        }
        
        $stmt = $pdo->prepare("DELETE FROM users WHERE id_user = ?");
        $stmt->execute([$userId]);
    }

    unset($_SESSION['selected_users']);
    unset($_SESSION['action']);
    header("Location: afficher.php");
    exit;
} catch (PDOException $e) {
    die("La connexion à la base de données a échoué : " . $e->getMessage());
}
