<?php
session_start();
date_default_timezone_set('Europe/Bucharest');
require '../db.php';

if (!isset($_SESSION['team_id'])) { 
    header("Location: ../login"); 
    exit; 
}

$team_id = $_SESSION['team_id'];

$stmt = $pdo->prepare("SELECT current_stage FROM teams WHERE id = ?");
$stmt->execute([$team_id]);
$stage = $stmt->fetchColumn();

// Pagina de Finalizare
if ($stage > 4) {
    include 'header_minimal.php'; // Sau repetă header-ul de mai jos
    ?>
    <!DOCTYPE html>
    <html lang="ro">
    <head>
        <meta charset="UTF-8">
        <title>Felicitări! | DroWo 2026</title>
        <link rel="stylesheet" href="../stil.css">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&family=Orbitron:wght@400;700&display=swap" rel="stylesheet">
    </head>
    <body class="content-wrapper">
        <section class="section glass-card" style="margin-top: 150px; text-align: center;">
            <h1 class="neon-title">MISIUNE ÎNDEPLINITĂ</h1>
            <p style="font-size: 24px; color: #fff;">Felicitări, <strong><?php echo $_SESSION['team_name']; ?></strong>! Ați finalizat toate etapele workshop-ului.</p>
            <div style="margin-top: 30px;">
                <a href="rezultate.php" class="btn-neon">Vezi Leaderboard Final</a>
            </div>
        </section>
    </body>
    </html>
    <?php
    exit;
}

// Citim programul
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

if ($now < $start_time || $now > $end_time) {
    include '../error-quiz/index.php';
    exit;
}

// --- LOGICA DE AFIȘARE (START HTML) ---
?>
<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Etapa <?php echo $stage; ?> | DroWo 2026</title>
    <link rel="icon" type="image/png" href="../images/Logo.svg">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&family=Orbitron:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.cdnfonts.com/css/neoncity-script" rel="stylesheet">
    <link rel="stylesheet" href="../stil.css">
    <style>
        /* Ajustări specifice pentru Quiz */
        .quiz-option {
            display: block;
            background: rgba(255, 255, 255, 0.05);
            padding: 15px 20px;
            margin: 10px 0;
            border-radius: 12px;
            border: 1px solid rgba(255, 255, 255, 0.1);
            cursor: pointer;
            transition: 0.3s;
            text-align: left;
        }
        .quiz-option:hover {
            background: rgba(0, 229, 255, 0.1);
            border-color: var(--neon-blue);
        }
        .quiz-option input {
            margin-right: 15px;
            accent-color: var(--neon-blue);
        }
        .timer-container {
            position: sticky;
            top: 100px;
            z-index: 100;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

    <header class="header-fix">
        <div class="container-header">
            <a href="index.php" class="logo-link">
                <img src="../images/Logo.svg" alt="logo" class="logo-img">
            </a>
            <nav class="nav-container nav-right">
                <a href="../index.php" class="nav-btn">Home</a>
                <a href="../logout.php" class="btn-logout" title="Logout">
                    <span class="nav-team-name">Team: <?php echo htmlspecialchars($_SESSION['team_name'] ?? ''); ?></span>
                    <i class="fa-solid fa-right-from-bracket" style="margin-left: 10px;"></i>
                </a>
            </nav>
        </div>
    </header>

    <main class="content-wrapper" style="padding-top: 140px;">

    <?php 
        // --- AFISARE QUIZ ACTIV ---
        $stmt = $pdo->prepare("SELECT * FROM questions WHERE stage = ?");
        $stmt->execute([$stage]);
        $questions = $stmt->fetchAll();
    ?>
        <div class="timer-container">
            <div class="glass-pod" style="display: flex; justify-content: space-between; align-items: center; padding: 15px 40px; border-color: var(--neon-blue);">
                <div style="text-align: left;">
                    <span style="color: var(--neon-blue); font-family: 'Orbitron'; font-size: 14px;">ETAPA CURENTĂ:</span>
                    <h3 style="margin: 0; color: #fff;">0<?php echo $stage; ?>. QUIZ</h3>
                </div>
                <div style="text-align: right;">
                    <span style="color: var(--neon-pink); font-family: 'Orbitron'; font-size: 14px;">TIMP RĂMAS:</span>
                    <h2 id="timerDisplay" style="margin: 0; color: #fff; font-family: 'Orbitron'; text-shadow: 0 0 10px var(--neon-pink);">05:00</h2>
                </div>
            </div>
        </div>

        <form id="quizForm" method="POST" action="submit.php">
            <input type="hidden" name="time_left" id="timeLeftInput" value="300">
            
            <?php foreach ($questions as $index => $q): ?>
                <div class="section glass-pod" style="text-align: left; margin-bottom: 25px;">
                    <h3 style="color: var(--neon-blue); margin-bottom: 20px;">
                        <span style="opacity: 0.5;">#<?php echo ($index + 1); ?></span> 
                        <?php echo $q['question_text']; ?>
                    </h3>
                    
                    <?php if (isset($q['image_url']) && !empty($q['image_url'])): ?>
                    <div style="text-align: center; margin-bottom: 20px;">
                        <img src="../images/<?php echo htmlspecialchars($q['image_url']); ?>" alt="Imagine Intrebare" style="max-width: 100%; max-height: 400px; border-radius: 12px; border: 1px solid var(--neon-blue); box-shadow: 0 0 10px rgba(0, 229, 255, 0.2);">
                    </div>
                    <?php endif; ?>
                    
                    <label class="quiz-option">
                        <input type="radio" name="q_<?php echo $q['id']; ?>" value="a" required> 
                        <span><?php echo $q['opt_a']; ?></span>
                    </label>
                    <label class="quiz-option">
                        <input type="radio" name="q_<?php echo $q['id']; ?>" value="b"> 
                        <span><?php echo $q['opt_b']; ?></span>
                    </label>
                    <label class="quiz-option">
                        <input type="radio" name="q_<?php echo $q['id']; ?>" value="c"> 
                        <span><?php echo $q['opt_c']; ?></span>
                    </label>
                    <label class="quiz-option">
                        <input type="radio" name="q_<?php echo $q['id']; ?>" value="d"> 
                        <span><?php echo $q['opt_d']; ?></span>
                    </label>
                </div>
            <?php endforeach; ?>
            
            <div style="padding: 40px 0; text-align: center;">
                <button type="submit" class="btn-neon" style="padding: 20px 60px; font-size: 18px;">
                    <i class="fa-solid fa-paper-plane"></i> TRIMITE RĂSPUNSURILE
                </button>
            </div>
        </form>

        <script>
            var timeLeft = 300; 
            var timerInterval = setInterval(function() {
                timeLeft--;
                var m = Math.floor(timeLeft / 60);
                var s = timeLeft % 60;
                document.getElementById("timerDisplay").innerText = (m < 10 ? "0"+m : m) + ":" + (s < 10 ? "0"+s : s);
                document.getElementById("timeLeftInput").value = timeLeft;
                
                if (timeLeft <= 0) {
                    clearInterval(timerInterval);
                    alert("Timpul a expirat! Sistemul va trimite automat răspunsurile selectate.");
                    document.querySelectorAll('input[type="radio"]').forEach(r => r.removeAttribute('required'));
                    document.getElementById("quizForm").submit();
                }
            }, 1000);
        </script>


    </main>

    <footer class="footer-glass">
        <div class="footer-copyright">
            <p>&copy; 2026 Euroavia București. Technical Support: office@euroavia-bucuresti.ro</p>
        </div>
    </footer>

</body>
</html>