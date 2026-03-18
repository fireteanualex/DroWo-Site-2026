<?php
session_start();
require 'db.php';

if (!isset($_SESSION['team_id']) || $_SERVER['REQUEST_METHOD'] !== 'POST') { 
    header("Location: index.php"); 
    exit; 
}

$team_id = $_SESSION['team_id'];

// Luam etapa curenta
$stmt = $pdo->prepare("SELECT current_stage FROM teams WHERE id = ?");
$stmt->execute([$team_id]);
$stage = $stmt->fetchColumn();

// Luam raspunsurile corecte din DB
$stmt = $pdo->prepare("SELECT id, correct_opt FROM questions WHERE stage = ?");
$stmt->execute([$stage]);
$questions = $stmt->fetchAll();

$total_questions = count($questions);
$correct_answers = 0;

// Verificam raspunsurile
foreach ($questions as $q) {
    $q_id = 'q_' . $q['id'];
    if (isset($_POST[$q_id]) && $_POST[$q_id] == $q['correct_opt']) {
        $correct_answers++;
    }
}

// NOU: Fiecare raspuns corect valoreaza 30 de puncte
$points_per_answer = 30;
$base_score = $correct_answers * $points_per_answer;

// Logica de Bonusare (ramane la fel: 1 punct per 20 de secunde x procentajul de corectitudine)
$time_left = (int)$_POST['time_left'];

// Cate pachete intregi de 20 de secunde au ramas?
$bonus_pachete = floor($time_left / 20); 

// Cat la suta din intrebari au raspuns corect? (ex: 2/4 = 0.5)
$procentaj_corectitudine = $total_questions > 0 ? ($correct_answers / $total_questions) : 0;

// Calcul final bonus
$bonus_points = $bonus_pachete * $procentaj_corectitudine;

// NOU: Scorul total = Scorul de baza (pe cele de 30 pct) + bonusul
$total_stage_score = $base_score + $bonus_points;

// Salvam in baza de date (pastram nr de raspunsuri corecte pentru statistici)
$stmt = $pdo->prepare("INSERT INTO scores (team_id, stage, correct_answers, time_left, bonus_points, total_stage_score) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->execute([$team_id, $stage, $correct_answers, $time_left, $bonus_points, $total_stage_score]);

// Trecem echipa la etapa urmatoare
$next_stage = $stage + 1;
$stmt = $pdo->prepare("UPDATE teams SET current_stage = ? WHERE id = ?");
$stmt->execute([$next_stage, $team_id]);

?>
<!DOCTYPE html>
<html>
<head>
    <title>Rezultat Etapa</title>
</head>
<body>
    <h1>Rezultate Etapa <?php echo $stage; ?></h1>
    <ul>
        <li>Raspunsuri corecte: <?php echo $correct_answers; ?> din <?php echo $total_questions; ?></li>
        <li>Punctaj raspunsuri (30p/buc): <?php echo $base_score; ?> puncte</li>
        <li>Timp ramas: <?php echo $time_left; ?> secunde</li>
        <li>Bonus de viteza primit: <?php echo $bonus_points; ?> puncte</li>
        <li><strong>Scor TOTAL etapa: <?php echo $total_stage_score; ?> puncte</strong></li>
    </ul>
    
    <a href="quiz.php"><button>Continua la etapa urmatoare</button></a>
</body>
</html>
