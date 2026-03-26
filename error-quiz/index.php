<!DOCTYPE html>
<?php
$quiz_names = [
    1 => 'Quiz Introducere',
    2 => 'Quiz Design',
    3 => 'Electronică',
    4 => 'Betaflight'
];
$quiz_name = isset($quiz_names[$stage]) ? $quiz_names[$stage] : 'Etapa ' . $stage;
?>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Status Etapă | Drone Workshop 2026</title>
    <link rel="icon" type="image/png" href="../images/Logo.svg">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&family=Orbitron:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.cdnfonts.com/css/neoncity-script" rel="stylesheet">
    <!-- Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="../stil.css">
    <style>
        .status-container {
            min-height: 70vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
        }
        .status-icon {
            font-size: 80px;
            margin-bottom: 20px;
            filter: drop-shadow(0 0 15px currentColor);
        }
        .time-box {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            padding: 20px 40px;
            border-radius: 15px;
            margin: 20px 0;
            display: inline-block;
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
                <a href="../index.php" class="nav-btn">Pagina Principală</a>
                <a href="../login/index.php" class="btn-login">Login</a>
            </nav>
        </div>
    </header>

    <main class="content-wrapper" style="padding-top: 100px;">
        <div class="status-container">
            
            <?php if (isset($now) && isset($start_time) && $now < $start_time): ?>
                <!-- CAZUL 1: ETAPA NU A INCEPUT -->
                <section class="section glass-card">
                    <div class="status-icon" style="color: var(--neon-blue);">
                        <i class="fa-solid fa-user-lock"></i>
                    </div>
                    <h1 class="neon-title" style="font-size: 50px; text-shadow: 0 0 20px var(--neon-blue);">ACCESS RESTRICTED</h1>
                    <p style="font-size: 18px; color: #b0bac5;">Sistemul de testare pentru <strong><?php echo htmlspecialchars($quiz_name); ?></strong> este momentan offline.</p>
                    
                    <div class="time-box">
                        <span style="color: var(--neon-blue); font-family: 'Orbitron'; display: block; font-size: 12px; margin-bottom: 10px;">START DISPONIBIL LA:</span>
                        <span style="font-size: 22px; font-weight: bold; color: #fff;">
                            <?php echo date('d.m.Y | H:i', $start_time); ?>
                        </span>
                    </div>

                    <p style="margin-top: 20px;">Te rugăm să revii în intervalul stabilit în programul oficial.</p>
                    <div style="margin-top: 30px;">
                        <a href="../index.php" class="btn-neon">ÎNAPOI LA DASHBOARD</a>
                    </div>
                </section>

            <?php else: ?>
                <!-- CAZUL 2: TIMP EXPIRAT -->
                <section class="section glass-card">
                    <div class="status-icon" style="color: var(--neon-pink);">
                        <i class="fa-solid fa-hourglass-end"></i>
                    </div>
                    <h1 class="neon-title" style="font-size: 50px; text-shadow: 0 0 20px var(--neon-pink);">SYSTEM TIMEOUT</h1>
                    <p style="font-size: 18px; color: #b0bac5;">Ne pare rău, fereastra de timp pentru <strong><?php echo htmlspecialchars($quiz_name); ?></strong> a expirat.</p>
                    
                    <div class="time-box" style="border-color: rgba(255, 0, 127, 0.3);">
                        <span style="color: var(--neon-pink); font-family: 'Orbitron'; display: block; font-size: 12px; margin-bottom: 10px;">SESIUNE ÎNCHISĂ LA:</span>
                        <span style="font-size: 22px; font-weight: bold; color: #fff;">
                            <?php echo isset($end_time) ? date('d.m.Y | H:i', $end_time) : 'N/A'; ?>
                        </span>
                    </div>

                    <p style="margin-top: 20px; color: #ef4444;">Dacă ați întâmpinat probleme tehnice, contactați un organizator.</p>
                    <div style="margin-top: 30px;">
                        <a href="../index.php" class="btn-outline">ÎNAPOI LA DASHBOARD</a>
                    </div>
                </section>
            <?php endif; ?>

        </div>
    </main>

    <footer class="footer-glass">
        <p style="font-size: 12px; opacity: 0.5;">Drone Workshop 2026 automated security system. Access attempts are logged.</p>
    </footer>

</body>
</html>