<?php
session_start();
require '../db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user = trim($_POST['user']);
    $pass = trim($_POST['pass']);

    $stmt = $pdo->prepare("SELECT * FROM teams WHERE name = ? AND password = ?");
    $stmt->execute([$user, $pass]);
    $team = $stmt->fetch();

    if ($team) {
        // We set team session variables for EVERYONE including admin
        $_SESSION['team_logged_in'] = true;
        $_SESSION['team_id'] = $team['id'];
        $_SESSION['team_name'] = $team['name'];

        if (strtolower($team['name']) === 'admin') {
            $_SESSION['trainer_logged_in'] = true;
            header("Location: ../admin/index.php");
            exit;
        } else {
            header("Location: ../index.php");
            exit;
        }
    } else {
        $_SESSION['login_error'] = "User sau parolă incorectă!";
        header("Location: index.php");
        exit;
    }
}
?>
