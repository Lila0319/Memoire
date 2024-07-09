<?php

require 'config.php';

function getUserRole($userId, $isAdmin = false) {
    global $pdo;
    $table = $isAdmin ? 'admins' : 'users';
    $stmt = $pdo->prepare("SELECT role FROM $table WHERE id = :userId");
    $stmt->execute(['userId' => $userId]);
    return $stmt->fetchColumn();
}

function hasPermission($userId, $permission, $isAdmin = false) {
    global $pdo;
    $role = getUserRole($userId, $isAdmin);
    $stmt = $pdo->prepare('SELECT COUNT(*) FROM permissions WHERE role = :role AND permission = :permission');
    $stmt->execute(['role' => $role, 'permission' => $permission]);
    return $stmt->fetchColumn() > 0;
}
?>
