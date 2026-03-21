<?php
// Simulare preluare date din baza de date
$questions = [
    [
        "id" => 1,
        "question" => "Ce componentă controlează turația motoarelor unei drone?",
        "options" => ["FC (Flight Controller)", "ESC (Electronic Speed Controller)", "PDB (Power Distribution Board)", "Vardar"]
    ],
    // Alte întrebări pot fi adăugate aici...
];
?>
<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz Tehnologic - DroWo 2026</title>
    <link rel="stylesheet" href="stil.css">
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;700&family=Montserrat:wght@400;600&display=swap" rel="stylesheet">
</head>
<body class="content-wrapper">
    <header class="header-fix">
        <div class="container-header">
            <a href="Landing.html" class="logo-link">
                <img src="images/Logo.svg" alt="logo" class="logo-img">
            </a>
            <h2 class="edition" style="margin: 0; font-size: 14px;">MODUL QUIZ</h2>
        </div>
    </header>

    <main style="margin-top: 50px;">
        <section class="section glass-card">
            <h1 class="neon-title" style="font-size: 60px;">Testul Tău</h1>
            
            <form action="process_quiz.php" method="POST" id="quiz-form">
                <?php foreach($questions as $index => $q): ?>
                    <div class="quiz-question-box glass-pod" style="padding: 30px; margin-bottom: 30px; text-align: left;">
                        <h3 style="color: var(--neon-blue); margin-bottom: 20px;">
                            <?php echo ($index + 1) . ". " . $q['question']; ?>
                        </h3>
                        
                        <div class="options-group" style="display: flex; flex-direction: column; gap: 15px;">
                            <?php foreach($q['options'] as $option): ?>
                                <label class="option-label" style="cursor: pointer; display: flex; align-items: center; gap: 10px;">
                                    <input type="radio" name="q<?php echo $q['id']; ?>" value="<?php echo $option; ?>" required>
                                    <span style="font-family: 'Montserrat', sans-serif;"><?php echo $option; ?></span>
                                </label>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endforeach; ?>

                <div style="text-align: center;">
                    <button type="submit" class="btn-neon">TRIMITE RĂSPUNSURILE</button>
                </div>
            </form>
        </section>
    </main>
</body>
</html>