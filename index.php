<?php
session_start();
date_default_timezone_set('Europe/Bucharest');
require '../db.php';

if (!isset($_SESSION['team_id'])) { 
    header("Location: login.php"); 
    exit; 
}

$team_id = $_SESSION['team_id'];

$stmt = $pdo->prepare("SELECT current_stage FROM teams WHERE id = ?");
$stmt->execute([$team_id]);
$stage = $stmt->fetchColumn();

if ($stage > 4) {
    echo "<h1>Felicitari! Ai finalizat toate etapele.</h1>";
    echo "<a href='rezultate.php'>Vezi scorul</a>";
    exit;
}

// INLOCUIT: Citim programul direct din baza de date
$stmt_sch = $pdo->query("SELECT * FROM schedule");
$schedule = [];
while ($row = $stmt_sch->fetch(PDO::FETCH_ASSOC)) {
    $schedule[$row['stage']] = [
        'start' => $row['start_time'],
        'end' => $row['end_time']
    ];
}

$now = time();
$start_time = strtotime($schedule[$stage]['start']);
$end_time = strtotime($schedule[$stage]['end']);

if ($now < $start_time) {
    $seconds_left = $start_time - $now;
    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>Asteptare Etapa <?php echo $stage; ?></title>
    </head>
    <body>
        <h1>Etapa <?php echo $stage; ?> nu a inceput inca!</h1>
        <p>Echipa: <?php echo $_SESSION['team_name']; ?></p>
        <p>Data de inceput: <?php echo $schedule[$stage]['start']; ?></p>
        
        <h2>Timp ramas pana la start: <span id="waitTimer">Se calculeaza...</span></h2>

        <script>
            var distanceInSeconds = <?php echo $seconds_left; ?>;
            
            var waitInterval = setInterval(function() {
                distanceInSeconds--;
                
                if (distanceInSeconds <= 0) {
                    clearInterval(waitInterval);
                    document.getElementById("waitTimer").innerText = "Se incarca...";
                    location.reload();
                } else {
                    var days = Math.floor(distanceInSeconds / (60 * 60 * 24));
                    var hours = Math.floor((distanceInSeconds % (60 * 60 * 24)) / (60 * 60));
                    var minutes = Math.floor((distanceInSeconds % (60 * 60)) / 60);
                    var seconds = distanceInSeconds % 60;
                    
                    document.getElementById("waitTimer").innerText = days + " zile, " + hours + " ore, " + minutes + " minute, " + seconds + " secunde";
                }
            }, 1000);
        </script>
    </body>
    </html>
    <?php
    exit;
}

if ($now > $end_time) {
    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>Etapa Expirata</title>
    </head>
    <body>
        <h1>Timpul pentru Etapa <?php echo $stage; ?> a expirat!</h1>
        <p>Aceasta etapa s-a incheiat la: <?php echo $schedule[$stage]['end']; ?></p>
        <p>Te rugam sa contactezi departamentul de IT.</p>
    </body>
    </html>
    <?php
    exit;
}

$stmt = $pdo->prepare("SELECT * FROM questions WHERE stage = ?");
$stmt->execute([$stage]);
$questions = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Etapa <?php echo $stage; ?></title>
</head>
<body>
    <h1>Etapa <?php echo $stage; ?></h1>
    <p>Echipa: <?php echo $_SESSION['team_name']; ?></p>
    
    <h2>Timp ramas: <span id="timerDisplay">05:00</span></h2>
    
    <form id="quizForm" method="POST" action="submit.php">
        <input type="hidden" name="time_left" id="timeLeftInput" value="300">
        
        <?php foreach ($questions as $index => $q): ?>
            <p><strong><?php echo ($index + 1) . ". " . $q['question_text']; ?></strong></p>
            <input type="radio" name="q_<?php echo $q['id']; ?>" value="a" required> a) <?php echo $q['opt_a']; ?><br>
            <input type="radio" name="q_<?php echo $q['id']; ?>" value="b"> b) <?php echo $q['opt_b']; ?><br>
            <input type="radio" name="q_<?php echo $q['id']; ?>" value="c"> c) <?php echo $q['opt_c']; ?><br>
            <input type="radio" name="q_<?php echo $q['id']; ?>" value="d"> d) <?php echo $q['opt_d']; ?><br>
        <?php endforeach; ?>
        
        <br><br>
        <button type="submit">Trimite Raspunsurile</button>
    </form>

    <script>
        var timeLeft = 300; 
        
        var timerInterval = setInterval(function() {
            timeLeft--;
            
            var minutes = Math.floor(timeLeft / 60);
            var seconds = timeLeft % 60;

            if(minutes < 10) minutes = "0" + minutes;
            if(seconds < 10) seconds = "0" + seconds;
            
            document.getElementById("timerDisplay").innerText = minutes + ":" + seconds;
            document.getElementById("timeLeftInput").value = timeLeft;
            
            if (timeLeft <= 0) {
                clearInterval(timerInterval);
                alert("Timpul a expirat!");
                var radios = document.querySelectorAll('input[type="radio"]');
                radios.forEach(r => r.removeAttribute('required'));
                document.getElementById("quizForm").submit();
            }
        }, 1000);
    </script>
</body>
</html>