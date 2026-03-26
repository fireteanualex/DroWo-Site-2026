<?php session_start(); ?>
<!DOCTYPE html>
<html lang="ro">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Schedule | Drone Workshop 2026</title>
    <link rel="icon" type="image/png" href="../images/Logo.svg">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&family=Orbitron:wght@400;700&display=swap"
        rel="stylesheet">
    <link href="https://fonts.cdnfonts.com/css/neoncity-script" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="../stil.css">
</head>

<body>
    <header class="header-fix">
        <div class="container-header">
            <a href="/" class="logo-link">
                <img src="../images/Logo.svg" alt="logo" class="logo-img">
            </a>
            <div class="menu-toggle" id="mobile-menu">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </div>
            <nav class="nav-container nav-right">
                <a href="../index.php#about" class="nav-btn">About</a>
                <a href="../schedule/index.php" class="nav-btn">Program</a>
                <a href="../index.php#training" class="nav-btn">Trainings</a>
                <a href="../index.php#faq" class="nav-btn">FAQ</a>
                <?php if (isset($_SESSION['team_logged_in'])): ?>
                    <a href="../logout.php" class="btn-logout" title="Logout">
                        <span class="nav-team-name">Team: <?php echo htmlspecialchars($_SESSION['team_name'] ?? ''); ?></span>
                        <i class="fa-solid fa-right-from-bracket" style="margin-left: 10px;"></i>
                    </a>
                <?php else: ?>
                    <a href="../login/index.php" target="_blank" class="btn-login">LOGIN</a>
                <?php endif; ?>
            </nav>
        </div>
    </header>

    <main class="content-wrapper" style="padding-top: 140px;">
        <section class="section no-bg" style="background: none; border: none; box-shadow: none; margin-bottom: 20px;">
            <h1 class="neon-title">Program Drone Workshop</h1>
            <p>Selectează ziua pentru a vedea detaliile activităților.</p>
        </section>

        <!-- DAY SELECTOR BUTTONS -->
        <div class="team-toggle-container" style="margin-bottom: 30px; flex-wrap: wrap;">
            <button class="team-toggle-btn schedule-tab" data-day="0">Ziua 1 (27.03)</button>
            <button class="team-toggle-btn schedule-tab" data-day="1">Ziua 2 (28.03)</button>
            <button class="team-toggle-btn schedule-tab" data-day="2">Ziua 3 (29.03)</button>
            <button class="team-toggle-btn schedule-tab" data-day="3">Ziua 4 (04.04)</button>
            <button class="team-toggle-btn schedule-tab" data-day="4">Ziua 5 (05.04)</button>
        </div>

        <div id="schedule-container">
            <!-- ZIUA 1 -->
            <div class="day-card glass-pod schedule-content" id="day-0">
                <div class="day-header">
                    <span class="day-date">Vineri 27 Martie</span>
                    <h2 class="day-location"><i class="fa-solid fa-location-dot"></i> Institutul CAMPUS</h2>
                </div>
                <div class="timeline">
                    <div class="time-row"><span>18:00 - 18:30</span><span>Sosire</span></div>
                    <div class="time-row highlight-blue"><span>18:30 - 19:00</span><span>GTK (Get to Know)</span></div>
                    <div class="time-row"><span>19:00 - 19:15</span><span>Deschidere Oficială</span></div>
                    <div class="time-row highlight-pink"><span>19:15 - 20:00</span><span>Training Introducere</span>
                    </div>
                    <div class="time-row"><span>20:00 - 20:30</span><span>Quiz</span></div>
                    <div class="time-row highlight-purple"><span>22:00</span><span>Party <i
                                class="fa-solid fa-music"></i></span></div>
                </div>
            </div>

            <!-- ZIUA 2 -->
            <div class="day-card glass-pod schedule-content" id="day-1" style="display:none;">
                <div class="day-header">
                    <span class="day-date">Sâmbătă 28 Martie</span>
                    <h2 class="day-location"><i class="fa-solid fa-location-dot"></i> Institutul CAMPUS</h2>
                </div>
                <div class="timeline">
                    <div class="time-row"><span>12:00 - 12:30</span><span>Sosire</span></div>
                    <div class="time-row"><span>12:30 - 13:00</span><span>Energizer</span></div>
                    <div class="time-row highlight-pink"><span>13:00 - 13:45</span><span>Training Electronică</span>
                    </div>
                    <div class="time-row"><span>13:45 - 14:15</span><span>Quiz</span></div>
                    <div class="time-row"><span>14:15 - 14:30</span><span>Pauză</span></div>
                    <div class="time-row highlight-pink"><span>14:30 - 15:15</span><span>Training Design</span></div>
                    <div class="time-row"><span>15:15 - 15:45</span><span>Quiz</span></div>
                </div>
            </div>

            <!-- ZIUA 3 -->
            <div class="day-card glass-pod schedule-content" id="day-2" style="display:none;">
                <div class="day-header">
                    <span class="day-date">Duminică 29 Martie</span>
                    <h2 class="day-location"><i class="fa-solid fa-location-dot"></i> CAMPUS & FIMM (CG)</h2>
                </div>
                <div class="timeline">
                    <div class="time-row"><span>10:00 - 10:30</span><span>Sosire</span></div>
                    <div class="time-row highlight-pink"><span>11:00 - 11:45</span><span>Training BetaFlight</span>
                    </div>
                    <div class="time-row"><span>11:45 - 12:15</span><span>Quiz</span></div>
                    <div class="time-row highlight-blue"><span>12:15 - 12:45</span><span>Prezentare NOVA</span></div>
                    <div class="time-row highlight-pink"><span>13:00 - 13:30</span><span>Training Soldering</span></div>
                    <div class="time-row highlight-gold"><span>13:45 - 16:45</span><span>Soldering Session</span></div>
                </div>
            </div>

            <!-- ZIUA 4 -->
            <div class="day-card glass-pod schedule-content" id="day-3" style="display:none;">
                <div class="day-header">
                    <span class="day-date">Sâmbătă 04 Aprilie</span>
                    <h2 class="day-location"><i class="fa-solid fa-location-dot"></i> FIMM - Corp CG</h2>
                </div>
                <div class="timeline">
                    <div class="time-row"><span>09:00 - 09:30</span><span>Sosire</span></div>
                    <div class="time-row highlight-gold"><span>09:30 - 14:00</span><span>Construcție Etapa 1</span>
                    </div>
                    <div class="time-row"><span>14:00 - 15:30</span><span>Pauză de masă</span></div>
                    <div class="time-row highlight-gold"><span>15:30 - 20:00</span><span>Construcție Etapa 2</span>
                    </div>
                    <div class="time-row highlight-blue"><span>20:00 - 21:00</span><span>Configurare BetaFlight</span>
                    </div>
                </div>
            </div>

            <!-- ZIUA 5 -->
            <div class="day-card glass-pod schedule-content" id="day-4" style="display:none;">
                <div class="day-header">
                    <span class="day-date">Duminică 05 Aprilie</span>
                    <h2 class="day-location"><i class="fa-solid fa-plane-up"></i> Aerodrom Geamăna</h2>
                </div>
                <div class="timeline">
                    <div class="time-row"><span>10:30 - 11:00</span><span>Sosire Aerodrom</span></div>
                    <div class="time-row highlight-blue"><span>11:00 - 18:00</span><span>Lansări & Competiție</span>
                    </div>
                    <div class="time-row highlight-gold"><span>18:00 - 18:30</span><span>Premiere</span></div>
                    <div class="time-row"><span>18:30 - 19:00</span><span>Închidere Eveniment</span></div>
                </div>
            </div>
        </div>

        <!-- LOCATIONS SECTION -->
        <section id="locatie" class="section" style="margin-top: 60px;">
            <h1 class="neon-title">Where to meet
            </h1>
            <div class="location-grid">
                <div class="location-card glass-pod">
                    <h3 class="card-title-location">UNSTPB (Campus & FIMM)</h3>
                    <p>Sesiunile de training și asamblare.</p>
                    <div class="iframe-wrapper">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2848.734699423751!2d26.049863!3d44.43860399999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40b201ea132d5141%3A0xf5d5aecb94fa6dc7!2sNational%20University%20of%20Science%20and%20Technology%20POLITEHNICA%20Bucharest!5e0!3m2!1sen!2sro!4v1773241894123!5m2!1sen!2sro"
                            width="100%" height="300" allowfullscreen="" loading="lazy"></iframe>
                    </div>
                </div>
                <div class="location-card glass-pod">
                    <h3 class="card-title-location">Aerodrom Geamăna</h3>
                    <p>Ziua zborului și competiția finală.</p>
                    <div class="iframe-wrapper">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2830.2461052686235!2d24.889904176579!3d44.81655067641679!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40b2bd2cad60cd79%3A0x8b9e5010980d441f!2sAerodromul%20Geam%C4%83na!5e0!3m2!1sen!2sro!4v1773241950864!5m2!1sen!2sro"
                            width="100%" height="300" allowfullscreen="" loading="lazy"></iframe>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <footer class="footer-glass">
        <div class="footer-content">
            <div class="footer-logo">
                <div class="footer-title-wrapper">
                    <h2 class="cursive-neon">Drone Workshop</h2>
                    <a href="https://euroavia-bucuresti.ro/" target="_blank" class="by-euroavia">by Euroavia
                        Bucuresti</a>
                    <a href="mailto:office@euroavia-bucuresti.ro" class="by-euroavia">office@euroavia-bucuresti.ro</a>
                    <br>
                </div>
                <p>Building the wings of your future!</p>
            </div>
            <div class="footer-socials">
                <a href="https://www.instagram.com/euroavia.bucuresti/" target="_blank" class="social-icon"
                    aria-label="Instagram">
                    <i class="fa-brands fa-instagram"></i>
                </a>
                <a href="https://www.facebook.com/EUROAVIABucuresti" target="_blank" class="social-icon"
                    aria-label="Facebook">
                    <i class="fa-brands fa-facebook-f"></i>
                </a>
                <a href="https://www.linkedin.com/company/euroavia-bucuresti/" target="_blank" class="social-icon"
                    aria-label="LinkedIn">
                    <i class="fa-brands fa-linkedin-in"></i>
                </a>
                <a href="https://nova.campus.pub.ro" target="_blank" class="social-icon" aria-label="fa-gift">
                    <i class="fa fa-gift"></i>
                </a>
            </div>
            <div class="footer-copyright">
                <p>&copy; 2026 Euroavia București. Toate drepturile rezervate.</p>
            </div>
        </div>
    </footer>
    <script>
        // --- BURGER MENU ---
        const menuBtn = document.querySelector('#mobile-menu');
        const navContainer = document.querySelector('.nav-container');
        menuBtn.addEventListener('click', () => {
            menuBtn.classList.toggle('is-active');
            navContainer.classList.toggle('active');
        });

        // --- SCHEDULE TABS LOGIC ---
        const tabs = document.querySelectorAll('.schedule-tab');
        const contents = document.querySelectorAll('.schedule-content');

        function showDay(dayIndex) {
            tabs.forEach(tab => tab.classList.remove('active'));
            contents.forEach(content => content.style.display = 'none');

            const activeTab = document.querySelector(`.schedule-tab[data-day="${dayIndex}"]`);
            const activeContent = document.getElementById(`day-${dayIndex}`);

            if (activeTab && activeContent) {
                activeTab.classList.add('active');
                activeContent.style.display = 'block';
            }
        }

        tabs.forEach(tab => {
            tab.addEventListener('click', () => {
                showDay(tab.getAttribute('data-day'));
            });
        });

        // --- AUTO-DETECT CURRENT DAY ---
        function detectInitialDay() {
            const today = new Date();
            const dateStr = `${today.getDate().toString().padStart(2, '0')}.${(today.getMonth() + 1).toString().padStart(2, '0')}`;

            // Map dates to day indices
            const dateMap = {
                "27.03": 0,
                "28.03": 1,
                "29.03": 2,
                "04.04": 3,
                "05.04": 4
            };

            if (dateMap[dateStr] !== undefined) {
                showDay(dateMap[dateStr]);
            } else {
                showDay(0); // Default to Day 1
            }
        }

        window.addEventListener('DOMContentLoaded', detectInitialDay);
    </script>
</body>

</html>