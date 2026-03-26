<?php
// get_leaderboard.php
header('Content-Type: application/json');

require 'db.php';

try {
    $stmt = $pdo->query("SELECT name, total_score AS score FROM teams WHERE name != 'admin' ORDER BY total_score DESC LIMIT 10");
    $leaderboard = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($leaderboard);
} catch (Exception $e) {
    echo json_encode(["error" => "Database error"]);
}
?>