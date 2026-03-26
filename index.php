<?php session_start(); ?>
<!DOCTYPE html>
<html lang="ro">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Drone Workshop 2026</title>
    <link rel="icon" type="image/png" href="images/Logo.svg">
    <meta name="description"
        content="DroWo 2026 — Cea de-a 5-a ediție a Drone Workshop by Euroavia București. Construiește-ți propria dronă!">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&family=Orbitron:wght@400;700&display=swap"
        rel="stylesheet">
    <link href="https://fonts.cdnfonts.com/css/neoncity-script" rel="stylesheet">
    <!-- Font Awesome for social icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="stil.css">
</head>

<body>
    <header class="header-fix">
        <div class="container-header">
            <a href="/" class="logo-link">
                <img src="images/Logo.svg" alt="logo" class="logo-img">
            </a>

            <div class="menu-toggle" id="mobile-menu">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </div>

            <nav class="nav-container nav-right">
                <a href="#about" class="nav-btn">About</a>
                <a href="schedule/index.php" class="nav-btn">Program</a>
                <a href="#training" class="nav-btn">Trainings</a>
                <a href="#faq" class="nav-btn">FAQ</a>
                <?php if (isset($_SESSION['team_logged_in'])): ?>
                    <a href="logout.php" class="btn-logout" title="Logout">
                        <span class="nav-team-name">Team: <?php echo htmlspecialchars($_SESSION['team_name'] ?? ''); ?></span>
                        <i class="fa-solid fa-right-from-bracket" style="margin-left: 10px;"></i>
                    </a>
                <?php else: ?>
                    <a href="login/index.php" class="btn-login">Login</a>
                <?php endif; ?>
            </nav>
        </div>
    </header>

    <!-- 1. Hero -->
    <section id="home" class="hero-section hero-full-bleed">
        <div class="hero-content">
            <h1 class="neon-text">Drone Workshop <span class="edition">VERSION V - 2026</span>
            </h1>
            <p class="hero-desc">Descoperă lumea ingineriei aerospațiale și roboticii la cea de-a cincea ediție
                DroWo. Învață să îți construiești propria dronă de la zero!</p>
            <div class="hero-btns">
                <a href="#about" class="btn-outline">DESPRE</a>
                <a href="#leaderboard" class="btn-neon">LEADERBOARD</a>
                <section class="info-strip" style="margin-top: 25px; justify-content: flex-start; padding: 0;">
                    <div class="info-item glass-pod">
                        <i class="fa-regular fa-calendar"></i>
                        <div class="info-text">
                            <span class="label">DATA</span>
                            <span class="value">27-29 Martie & 4-5 Aprilie</span>
                        </div>
                    </div>
                    <div class="info-item glass-pod">
                        <i class="fa-solid fa-location-dot"></i>
                        <div class="info-text">
                            <span class="label">UNDE?</span>
                            <span class="value">UNSTPB București</span>
                        </div>
                    </div>
                </section>
            </div>
            <!-- Move info-strip here -->

        </div>
        <div class="hero-visual">
            <div class="drone-neon-sketch">
                <img src="images/drone_neon_outline.png" alt="Drone Sketch" class="neon-img hero-img-custom">
            </div>
        </div>
    </section>

    <main class="content-wrapper">

        <!-- ABOUT -->
        <section id="about" class="section glass-card" style="text-align: left;">
            <div class="about-flex" style="align-items: center;">
                <div class="about-title-side"
                    style="flex: 1; min-width: 300px; display: flex; flex-direction: column; justify-content: center; align-items: center; text-align: center; padding: 20px 0px;">
                    <h1 class="neon-title" style="text-align: center; margin-bottom: 0px;">About</h1>
                    <h2
                        style="font-family: 'Montserrat', sans-serif; color: var(--neon-pink); font-size: 28px; font-weight: 300; letter-spacing: 2px; text-transform: uppercase; margin-top: -30px; text-align: center; text-shadow: 0 0 8px rgba(255, 0, 127, 0.8), 0 0 16px rgba(255, 0, 127, 0.4);">
                        Drone Workshop</h2>
                </div>
                <div class="about-content" style="flex: 2; text-align: left;">
                    <p style="text-align: left;">Drone Workshop (DroWo) este un workshop destinat studenților dornici să
                        descopere noi pasiuni în
                        domeniul
                        ingineriei robotice și aerospațiale. Suntem la <strong>a 5-a ediție</strong> a acestui eveniment
                        care a început în 2021, și dorim sa oferim un nou set de cunoștințe și experiențe din domeniul
                        ingineriei robotice și aerospațiale.</p>
                    <p style="text-align: left;">Punem accent pe construcția de drone proprii, de agrement, oferind
                        participanților o experiență
                        practică directă și interactivă.</p>
                    <p style="text-align: left;">Alatură-te ediției a 5-a a DroWo și descoperă noi pasiuni și hobby-uri,
                        sau perfecționează-le pe
                        cele deja existente!</p>
                    <div class="about-action" style="margin-top: 40px; text-align: left;">
                        <a href="https://forms.gle/VkUStjwMYHUfitMu6" target="_blank" class="btn-neon">INSCRIE-TE
                            ACUM</a>
                    </div>
                </div>
            </div>
        </section>

        <!-- GALERIE FOTO -->
        <section id="galerie" class="section">
            <h1 class="neon-title" style="margin-bottom: 5px;">Galerie Foto</h1>
            <p style="margin-top: 5px; margin-bottom: 30px;">Câteva momente din edițiile trecute ale Drone Workshop, ce
                surprind vibe-ul evenimentului și a participanților din fiecare an.</p>
            <div class="gallery-preview">
                <div class="gallery-grid">
                    <div class="gallery-item glass-pod">
                        <img src="gallery/gallery/WhatsApp Image 2026-03-05 at 18.55.15 (1).jpeg" alt="DroWo Moment 1">
                    </div>
                    <div class="gallery-item glass-pod">
                        <img src="gallery/gallery/WhatsApp Image 2026-03-05 at 18.55.16.jpeg" alt="DroWo Moment 2">
                    </div>
                    <div class="gallery-item glass-pod">
                        <img src="gallery/gallery/WhatsApp Image 2026-03-05 at 18.55.35.jpeg" alt="DroWo Moment 3">
                    </div>
                    <div class="gallery-item glass-pod">
                        <img src="gallery/gallery/WhatsApp Image 2026-03-05 at 18.55.54.jpeg" alt="DroWo Moment 4">
                    </div>
                </div>
                <div class="gallery-action">
                    <a href="gallery/index.php" class="btn-glass"><i class="fa-solid fa-images"></i> Descopera mai multe
                        momente</a>
                </div>
            </div>
        </section>

        <section id="echipa" class="section glass-card">
            <h1 class="neon-title" id="team-title">Meet the Trainers</h1>
            <p class="section-subtitle" id="team-subtitle">Echipa de elită care te va ghida în lumea roboticii și a
                zborului autonom.</p>

            <div class="team-toggle-container">
                <button class="team-toggle-btn active" id="btn-trainers">Trainers</button>
                <button class="team-toggle-btn" id="btn-orga">ORGA Team</button>
            </div>

            <div class="trainer-grid" id="grid-trainers">
                <div class="trainer-card">
                    <div class="trainer-card-inner">
                        <div class="trainer-card-image" style="background-image: url('trainers/Trainer1.png');"></div>
                        <div class="trainer-overlay">
                            <div class="trainer-info">
                                <h3 class="trainer-name">Andrei Ionescu</h3>
                                <p class="trainer-title">Expert FPV and Drone Pilot</p>
                            </div>
                            <a href="#" class="trainer-social" aria-label="Instagram" target="_blank"><i
                                    class="fa-brands fa-instagram"></i></a>
                        </div>
                    </div>
                </div>

                <div class="trainer-card">
                    <div class="trainer-card-inner">
                        <div class="trainer-card-image" style="background-image: url('trainers/Trainer2.png');"></div>
                        <div class="trainer-overlay">
                            <div class="trainer-info">
                                <h3 class="trainer-name">Elena Popescu</h3>
                                <p class="trainer-title">Inginer Electronist</p>
                            </div>
                            <a href="#" class="trainer-social" aria-label="Instagram" target="_blank"><i
                                    class="fa-brands fa-instagram"></i></a>
                        </div>
                    </div>
                </div>

                <div class="trainer-card">
                    <div class="trainer-card-inner">
                        <div class="trainer-card-image" style="background-image: url('trainers/trainer3.jpg');"></div>
                        <div class="trainer-overlay">
                            <div class="trainer-info">
                                <h3 class="trainer-name">Matei Stan</h3>
                                <p class="trainer-title">Software Dev. Betaflight</p>
                            </div>
                            <a href="#" class="trainer-social" aria-label="Instagram" target="_blank"><i
                                    class="fa-brands fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="trainer-grid" id="grid-orga" style="display: none;">
                <div class="trainer-card">
                    <div class="trainer-card-inner">
                        <div class="trainer-card-image"
                            style="background-image: url('https://via.placeholder.com/400x500/0a0a14/00e5ff?text=Orga+1');">
                        </div>
                        <div class="trainer-overlay">
                            <div class="trainer-info">
                                <h3 class="trainer-name">Ionut Radu</h3>
                                <p class="trainer-title">Project Manager</p>
                            </div>
                            <a href="#" class="trainer-social" aria-label="Instagram" target="_blank"><i
                                    class="fa-brands fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
                <div class="trainer-card">
                    <div class="trainer-card-inner">
                        <div class="trainer-card-image"
                            style="background-image: url('https://via.placeholder.com/400x500/0a0a14/ff007f?text=Orga+2');">
                        </div>
                        <div class="trainer-overlay">
                            <div class="trainer-info">
                                <h3 class="trainer-name">Maria Tudor</h3>
                                <p class="trainer-title">PR & Media</p>
                            </div>
                            <a href="#" class="trainer-social" aria-label="Instagram" target="_blank"><i
                                    class="fa-brands fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- TRAINING -->
        <section id="training" class="section">
            <h1 class="neon-title">Trainings</h1>
            <div class="training-cards">
                <div class="card glass-pod">
                    <img src="trainings/design-bg.png" alt="Design" class="card-img">
                    <div class="card-body">
                        <h3 class="card-title">Design</h3>
                        <p>Învață conceptele de bază ale designului unei drone și structura necesară pentru un zbor
                            stabil și o rezistență la impact bună.</p>
                    </div>
                </div>
                <div class="card glass-pod">
                    <img src="trainings/electronics-bg.png" alt="Electronică" class="card-img">
                    <div class="card-body">
                        <h3 class="card-title">Electronică</h3>
                        <p>Căutarea și conectarea componentelor, motoarelor și senzorilor esențiali care dau viață
                            proiectului tău.
                        </p>
                    </div>
                </div>
                <div class="card glass-pod">
                    <img src="trainings/betaflight-bg.png" alt="Software" class="card-img">
                    <div class="card-body">
                        <h3 class="card-title">Betaflight</h3>
                        <p>Configurarea software-ului de control pentru un zbor precis și performanțe maxime, precum și
                            control deplin.</p>
                    </div>
                </div>
                <div class="card glass-pod">
                    <img src="trainings/soldering-bg.png" alt="Soldering" class="card-img">
                    <div class="card-body">
                        <h3 class="card-title">Soldering</h3>
                        <p>Tehnici de lipire corectă pentru conexiuni durabile și sigure în orice condiții de zbor.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- QUIZ -->
        <section id="quiz-uri" class="section glass-card">
            <h1 class="neon-title">Quizzes</h1>
            <p style="margin-bottom: 40px;">Verifică-ți cunoștințele înainte de marea asamblare!</p>

            <div class="quiz-grid" style="display: flex; justify-content: center; flex-wrap: wrap; gap: 20px;">
                <?php if (!isset($_SESSION['team_logged_in'])): ?>
                    <div class="quiz-card glass-pod quiz-card-full">
                        <div class="quiz-icon-container"><i class="fa-solid fa-lock" aria-hidden="true" style="color: var(--neon-pink);"></i></div>
                        <div class="quiz-content">
                            <h2 class="neon-title" style="font-size: 38px; margin-bottom: 10px; line-height: 1.2;">Trebuie sa fii logat</h2>
                            <p>Pentru a susține quiz-urile și a vedea progresul echipei tale, te rugăm să te conectezi la contul de echipă.</p>
                            <a href="login/index.php" class="btn-neon">Login</a>
                        </div>
                    </div>
                <?php else:
                    // Fetch current stage from DB
                    require_once 'db.php';
                    $stmt_stage = $pdo->prepare("SELECT current_stage FROM teams WHERE id = ?");
                    $stmt_stage->execute([$_SESSION['team_id']]);
                    $stage_db = $stmt_stage->fetchColumn();
                    $stage = $stage_db ? (int)$stage_db : 1;

                    if ($stage === 1): ?>
                        <div class="quiz-card glass-pod quiz-card-full">
                            <div class="quiz-icon-container"><i class="fa-solid fa-list-check" aria-hidden="true"></i></div>
                            <div class="quiz-content">
                                <h2 class="neon-title" style="font-size: 38px; margin-bottom: 10px; line-height: 1.2;">Quiz Introducere</h2>
                                <p>Primul quiz al Drone Workshop, unde veți răspunde la întrebări introductorii despre drone, reglementări legale precum și elemente esențiale de siguranță!</p>
                                <a href="quiz/index.php" class="btn-neon">Începe Quiz</a>
                            </div>
                        </div>
                    <?php elseif ($stage === 2): ?>
                        <div class="quiz-card glass-pod quiz-card-full">
                            <div class="quiz-icon-container"><i class="fa-solid fa-drafting-compass"></i></div>
                            <div class="quiz-content">
                                <h2 class="neon-title" style="font-size: 38px; margin-bottom: 10px; line-height: 1.2;">Quiz Design</h2>
                                <p>Quiz-ul de DESIGN este menit să asigure că toți participanții sunt pregătiți să înțeleagă principiile de structură și de ansamblare atât ale dronelor pe care le vor construi, precum și ale dronelor FPV în general.</p>
                                <a href="quiz/index.php" class="btn-neon">Începe Quiz</a>
                            </div>
                        </div>
                    <?php elseif ($stage === 3): ?>
                        <div class="quiz-card glass-pod quiz-card-full">
                            <div class="quiz-icon-container"><i class="fa-solid fa-microchip"></i></div>
                            <div class="quiz-content">
                                <h2 class="neon-title" style="font-size: 38px; margin-bottom: 10px; line-height: 1.2;">Electronică</h2>
                                <p>ELECTRONICA devine fundația oricărui UAV, Flight Controller-ul primește rolul creierului dronei. Quiz-ul de ELECTRONICĂ este menit sa valideze cunoștințele participanților despre anatomia dronei.</p>
                                <a href="quiz/index.php" class="btn-neon">Începe Quiz</a>
                            </div>
                        </div>
                    <?php elseif ($stage === 4): ?>
                        <div class="quiz-card glass-pod quiz-card-full">
                            <div class="quiz-icon-container"><i class="fa-solid fa-code"></i></div>
                            <div class="quiz-content">
                                <h2 class="neon-title" style="font-size: 38px; margin-bottom: 10px; line-height: 1.2;">Betaflight</h2>
                                <p>Când aveți drona gata pusă pe masă, ce se întâmplă mai departe? Aici intervine BETAFLIGHT, software-ul dedicat pentru a seta comportamentul oricărei drone în zbor. Quiz-ul BETAFLIGHT este menit să vă asigure că sunteți pregătiți să configurați corect drona.</p>
                                <a href="quiz/index.php" class="btn-neon">Începe Quiz</a>
                            </div>
                        </div>
                    <?php else: ?>
                        <div class="quiz-card glass-pod quiz-card-full">
                            <div class="quiz-icon-container"><i class="fa-solid fa-trophy" style="color: var(--neon-gold);"></i></div>
                            <div class="quiz-content">
                                <h2 class="neon-title" style="font-size: 38px; margin-bottom: 10px; line-height: 1.2; color: var(--neon-gold); text-shadow: 0 0 20px var(--neon-gold);">Felicitări!</h2>
                                <p>Nu mai ai quiz-uri de făcut! Echipa ta a completat cu succes toate etapele teoretice.</p>
                            </div>
                        </div>
                    <?php endif; ?>
                <?php endif; ?>
            </div>
        </section>

        <!-- LEADERBOARD -->
        <section id="leaderboard" class="section glass-card">
            <h1 class="neon-title">Leaderboard</h1>
            <p style="margin-bottom: 40px;">Clasamentul în timp real al participanților bazat pe punctajele obținute.</p>

            <div class="leaderboard-table glass-pod">
                <div class="leaderboard-header">
                    <span>RANG</span>
                    <span>PARTICIPANT</span>
                    <span>PUNCTAJ</span>
                </div>

                <!-- This container will be populated by JavaScript -->
                <div class="leaderboard-body" id="leaderboard-data">
                    <div class="leaderboard-row"><span colspan="3">Se încarcă...</span></div>
                </div>
            </div>
        </section>

        <!-- FAQ -->
        <section id="faq" class="section">
            <h1 class="neon-title">FAQ</h1>
            <div class="faq-container">
                <div class="faq-pod glass-pod">
                    <details>
                        <summary>În ce constă Drone Workshop?</summary>
                        <div class="faq-content">Este un eveniment studențesc unde înveți să asamblezi, configurezi și
                            să zbori propria dronă FPV. Îmbină cunoștințe esențiale de robotică, electronică, precum și
                            structură și design, într-un
                            proiect practic și interactiv.</div>
                    </details>
                </div>
                <div class="faq-pod glass-pod">
                    <details>
                        <summary>Cine poate participa?</summary>
                        <div class="faq-content">Orice student poate participa la Drone Workshop, din orice facultate.
                        </div>
                    </details>
                </div>
                <div class="faq-pod glass-pod">
                    <details>
                        <summary>Ce nivel de experiență tehnică este necesar?</summary>
                        <div class="faq-content">Nu este necesară experiență prealabilă. Trainerii noștri te vor ghida
                            pas cu pas.</div>
                    </details>
                </div>
                <div class="faq-pod glass-pod">
                    <details>
                        <summary>Ce vom face la eveniment?</summary>
                        <div class="faq-content">Vom avea sesiuni de training teoretic, asamblare practică și sesiuni de
                            zbor outdoor.</div>
                    </details>
                </div>
                <div class="faq-pod glass-pod">
                    <details>
                        <summary>Cum vor fi premiate echipele?</summary>
                        <div class="faq-content">Echipele vor fi evaluate pe baza performanței dronei și a abilităților
                            de zbor în concursul final.</div>
                    </details>
                </div>
                <div class="faq-pod glass-pod">
                    <details>
                        <summary>Când se ține?</summary>
                        <div class="faq-content">Ediția a 5-a va avea loc în weekend-ul 27-29 martie 2026, și weekend-ul
                            4-5 aprilie 2026.</div>
                    </details>
                </div>
            </div>
        </section>

        <!-- LOCATIE -->
        <section id="locatie" class="section">
            <h1 class="neon-title">Where to come</h1>
            <div class="location-grid">
                <div class="location-card glass-pod">
                    <h3 class="card-title-location">UNSTPB</h3>
                    <p>Sesiunile de training și asamblare vor avea loc în cadrul campusului UNSTPB.</p>
                    <div class="iframe-wrapper">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2848.734699423751!2d26.049863!3d44.43860399999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40b201ea132d5141%3A0xf5d5aecb94fa6dc7!2sNational%20University%20of%20Science%20and%20Technology%20POLITEHNICA%20Bucharest!5e0!3m2!1sen!2sro!4v1773241894123!5m2!1sen!2sro"
                            width="100%" height="300" allowfullscreen="" loading="lazy"></iframe>
                    </div>
                </div>
                <!-- <div class="location-card glass-pod">
                    <h3 class="card-title-location">Aerodrom Geamăna (Arges)</h3>
                    <p>Zborurile de test și competiția se vor desfășura în aer liber la Geamana.</p>
                    <div class="iframe-wrapper">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2830.2461052686235!2d24.889904176579!3d44.81655067641679!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40b2bd2cad60cd79%3A0x8b9e5010980d441f!2sAerodromul%20Geam%C4%83na!5e0!3m2!1sen!2sro!4v1773241950864!5m2!1sen!2sro"
                            width="100%" height="300" allowfullscreen="" loading="lazy"></iframe>
                    </div>
                </div> -->
            </div>
        </section>

        <!-- PARTENERI -->
        <section id="parteneri" class="section">
            <h1 class="neon-title">Parteneri</h1>
            <div class="sponsor-grid">
                <a href="https://example.com" target="_blank" class="sponsor-card glass-pod">
                    <img src="https://via.placeholder.com/160x90/0a0a14/00e5ff?text=Partner+1" alt="Partner 1"
                        class="sponsor-logo">
                    <span class="sponsor-name">Partener Principal</span>
                </a>
                <a href="https://example.com" target="_blank" class="sponsor-card glass-pod">
                    <img src="https://via.placeholder.com/160x90/0a0a14/ff007f?text=Partner+2" alt="Partner 2"
                        class="sponsor-logo">
                    <span class="sponsor-name">Partener Strategic</span>
                </a>
                <a href="https://example.com" target="_blank" class="sponsor-card glass-pod">
                    <img src="https://via.placeholder.com/160x90/0a0a14/9d00ff?text=Partner+3" alt="Partner 3"
                        class="sponsor-logo">
                    <span class="sponsor-name">Partener Media</span>
                </a>
            </div>
        </section>

        <!-- SPONSORI -->
        <section id="sponsori" class="section">
            <h1 class="neon-title">Sponsori</h1>
            <div class="sponsor-grid">
                <a href="https://example.com" target="_blank" class="sponsor-card glass-pod">
                    <img src="https://via.placeholder.com/160x90/0a0a14/ff007f?text=Logo+1" alt="Sponsor 1"
                        class="sponsor-logo">
                    <span class="sponsor-name">Sponsor Platinum</span>
                </a>
                <a href="https://example.com" target="_blank" class="sponsor-card glass-pod">
                    <img src="https://via.placeholder.com/160x90/0a0a14/00e5ff?text=Logo+2" alt="Sponsor 2"
                        class="sponsor-logo">
                    <span class="sponsor-name">Sponsor Gold</span>
                </a>
                <a href="https://example.com" target="_blank" class="sponsor-card glass-pod">
                    <img src="https://via.placeholder.com/160x90/0a0a14/9d00ff?text=Logo+3" alt="Sponsor 3"
                        class="sponsor-logo">
                    <span class="sponsor-name">Sponsor Silver 1</span>
                </a>
                <a href="https://example.com" target="_blank" class="sponsor-card glass-pod">
                    <img src="https://via.placeholder.com/160x90/0a0a14/ffcc00?text=Logo+4" alt="Sponsor 4"
                        class="sponsor-logo">
                    <span class="sponsor-name">Sponsor Silver 2</span>
                </a>
                <a href="https://example.com" target="_blank" class="sponsor-card glass-pod">
                    <img src="https://via.placeholder.com/160x90/0a0a14/ff007f?text=Logo+5" alt="Sponsor 5"
                        class="sponsor-logo">
                    <span class="sponsor-name">Sponsor Silver 3</span>
                </a>
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
        // --- BURGER MENU LOGIC ---
        const menuBtn = document.querySelector('#mobile-menu');
        const navContainer = document.querySelector('.nav-container');

        menuBtn.addEventListener('click', () => {
            menuBtn.classList.toggle('is-active');
            navContainer.classList.toggle('active');
        });

        // Închidere meniu la click pe link
        document.querySelectorAll('.nav-container a').forEach(link => {
            link.addEventListener('click', () => {
                menuBtn.classList.remove('is-active');
                navContainer.classList.remove('active');
            });
        });

        // --- CUSTOM SMOOTH SCROLL ---
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                const targetId = this.getAttribute('href');
                const targetElement = document.querySelector(targetId);
                if (targetElement) {
                    e.preventDefault();
                    const headerOffset = 100;
                    const elementPosition = targetElement.getBoundingClientRect().top;
                    const offsetPosition = elementPosition + window.pageYOffset - headerOffset;
                    window.scrollTo({ top: offsetPosition, behavior: 'smooth' });
                }
            });
        });

        // --- DOMCONTENTLOADED EFFECTS ---
        document.addEventListener('DOMContentLoaded', () => {
            // 1. Select all elements you want to animate
            const revealElements = document.querySelectorAll('.section');

            // 2. Hide them immediately via JS (so they show up if JS is disabled)
            revealElements.forEach(el => {
                el.style.opacity = "0";
                el.style.transform = "translateY(30px)";
                el.style.transition = "opacity 0.8s ease-out, transform 0.8s ease-out";
            });

            // 3. Setup the Observer
            const revealObserver = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.style.opacity = "1";
                        entry.target.style.transform = "translateY(0)";
                        // Optional: stop observing once shown
                        revealObserver.unobserve(entry.target);
                    }
                });
            }, { 
                threshold: 0.1, // Trigger when 10% of the section is visible
                rootMargin: "0px 0px -50px 0px" // Trigger slightly before it enters the viewport
            });

            revealElements.forEach(el => revealObserver.observe(el));
        });

        // --- HANDLE HASH NAVIGATION FROM OTHER PAGES ---
        window.addEventListener('load', () => {
            if (window.location.hash) {
                const targetElement = document.querySelector(window.location.hash);
                if (targetElement) {
                    setTimeout(() => {
                        const headerOffset = 100;
                        const elementPosition = targetElement.getBoundingClientRect().top;
                        const offsetPosition = elementPosition + window.pageYOffset - headerOffset;
                        window.scrollTo({ top: offsetPosition, behavior: 'smooth' });
                        // Remove hash from URL
                        history.replaceState(null, null, window.location.pathname + window.location.search);
                    }, 100);
                }
            }
        });

        // --- TEAM TOGGLE LOGIC ---
        const btnTrainers = document.getElementById('btn-trainers');
        const btnOrga = document.getElementById('btn-orga');
        const gridTrainers = document.getElementById('grid-trainers');
        const gridOrga = document.getElementById('grid-orga');
        const titleTeam = document.getElementById('team-title');
        const subtitleTeam = document.getElementById('team-subtitle');

        if (btnTrainers && btnOrga) {
            btnTrainers.addEventListener('click', () => {
                btnTrainers.classList.add('active');
                btnOrga.classList.remove('active');
                gridTrainers.style.display = 'grid';
                gridOrga.style.display = 'none';
                titleTeam.textContent = 'Meet the Trainers';
                subtitleTeam.textContent = 'Echipa de elită care te va ghida în lumea roboticii și a zborului autonom.';
            });

            btnOrga.addEventListener('click', () => {
                btnOrga.classList.add('active');
                btnTrainers.classList.remove('active');
                gridTrainers.style.display = 'none';
                gridOrga.style.display = 'grid';
                titleTeam.textContent = 'Meet the Orga Team';
                subtitleTeam.textContent = 'Echipa dedicată care face acest eveniment posibil.';
            });
        }

        function updateLeaderboard() {
            fetch('get_leaderboard.php')
                .then(response => response.json())
                .then(data => {
                    const container = document.getElementById('leaderboard-data');
                    container.innerHTML = ''; // Clear old data

                    data.forEach((user, index) => {
                        const row = document.createElement('div');
                        row.className = 'leaderboard-row';
                        row.innerHTML = `
                            <span class="rank">#${index + 1}</span>
                            <span class="name">${user.name}</span>
                            <span class="score">${user.score} pts</span>
                        `;
                        container.appendChild(row);
                    });
                })
                .catch(err => console.error('Error fetching leaderboard:', err));
        }

        // Update immediately on load
        updateLeaderboard();

        // Update every 30 seconds
        setInterval(updateLeaderboard, 30000);
    </script>
</body>

</html>