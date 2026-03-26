<?php session_start(); ?>
<!DOCTYPE html>
<html lang="ro">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galerie Foto | Drone Workshop 2026</title>
    <link rel="icon" type="image/png" href="../images/Logo.svg">
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
    <link rel="stylesheet" href="../stil.css">
</head>

<body>
    <header class="header-fix">
        <div class="container-header">
            <a href="../" class="logo-link">
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

    <section id="gallery-hero" class="hero-section hero-full-bleed">
        <div class="hero-content" style="align-items: flex-start;">
            <h1 class="neon-title gallery-title"
                style="text-align: left; line-height: 1.2; padding: 30px 10px 0px 10px; margin-left: -10px;">
                Galerie Foto</h1>
            <p class="hero-desc" style="text-align: left; margin-left: -10px;">Descoperă momentele pline de adrenalină
                și inovație de la edițiile anterioare.
                Construcție, testare, zbor și prietenii care prind aripi.</p>
            <div class="hero-btns">
                <a href="#galerie-sect" class="btn-neon"><i class="fa-solid fa-arrow-down"></i> DESCOPERĂ MOMENTELE
                    DROWO</a>
            </div>
        </div>
        <div class="hero-visual gallery-cards-stack" style="padding-top: 30px">
            <div class="card-stack">
                <img src="gallery/WhatsApp Image 2026-03-05 at 18.55.00 (1).jpeg" class="stack-img img-1" alt="Gal 1">
                <img src="gallery/WhatsApp Image 2026-03-05 at 18.55.10.jpeg" class="stack-img img-2" alt="Gal 2">
                <img src="gallery/WhatsApp Image 2026-03-05 at 18.55.13.jpeg" class="stack-img img-3" alt="Gal 3">
            </div>
        </div>
    </section>

    <main class="content-wrapper">
        <section id="galerie-sect" class="section">
            <div class="gallery-grid">

                <div class="gallery-item glass-pod">
                    <img src="gallery/WhatsApp Image 2026-03-05 at 18.55.00 (1).jpeg" alt="DroWo Moment" loading="lazy">
                </div>
                <div class="gallery-item glass-pod">
                    <img src="gallery/WhatsApp Image 2026-03-05 at 18.55.10.jpeg" alt="DroWo Moment" loading="lazy">
                </div>
                <div class="gallery-item glass-pod">
                    <img src="gallery/WhatsApp Image 2026-03-05 at 18.55.13.jpeg" alt="DroWo Moment" loading="lazy">
                </div>
                <div class="gallery-item glass-pod">
                    <img src="gallery/WhatsApp Image 2026-03-05 at 18.55.15 (1).jpeg" alt="DroWo Moment" loading="lazy">
                </div>
                <div class="gallery-item glass-pod">
                    <img src="gallery/WhatsApp Image 2026-03-05 at 18.55.15 (2).jpeg" alt="DroWo Moment" loading="lazy">
                </div>
                <div class="gallery-item glass-pod">
                    <img src="gallery/WhatsApp Image 2026-03-05 at 18.55.15.jpeg" alt="DroWo Moment" loading="lazy">
                </div>
                <div class="gallery-item glass-pod">
                    <img src="gallery/WhatsApp Image 2026-03-05 at 18.55.16.jpeg" alt="DroWo Moment" loading="lazy">
                </div>
                <div class="gallery-item glass-pod">
                    <img src="gallery/WhatsApp Image 2026-03-05 at 18.55.17.jpeg" alt="DroWo Moment" loading="lazy">
                </div>
                <div class="gallery-item glass-pod">
                    <img src="gallery/WhatsApp Image 2026-03-05 at 18.55.21 (2).jpeg" alt="DroWo Moment" loading="lazy">
                </div>
                <div class="gallery-item glass-pod">
                    <img src="gallery/WhatsApp Image 2026-03-05 at 18.55.24.jpeg" alt="DroWo Moment" loading="lazy">
                </div>
                <div class="gallery-item glass-pod">
                    <img src="gallery/WhatsApp Image 2026-03-05 at 18.55.26 (1).jpeg" alt="DroWo Moment" loading="lazy">
                </div>
                <div class="gallery-item glass-pod">
                    <img src="gallery/WhatsApp Image 2026-03-05 at 18.55.26 (2).jpeg" alt="DroWo Moment" loading="lazy">
                </div>
                <div class="gallery-item glass-pod">
                    <img src="gallery/WhatsApp Image 2026-03-05 at 18.55.28 (1).jpeg" alt="DroWo Moment" loading="lazy">
                </div>
                <div class="gallery-item glass-pod">
                    <img src="gallery/WhatsApp Image 2026-03-05 at 18.55.28 (2).jpeg" alt="DroWo Moment" loading="lazy">
                </div>
                <div class="gallery-item glass-pod">
                    <img src="gallery/WhatsApp Image 2026-03-05 at 18.55.31 (1).jpeg" alt="DroWo Moment" loading="lazy">
                </div>
                <div class="gallery-item glass-pod">
                    <img src="gallery/WhatsApp Image 2026-03-05 at 18.55.31 (2).jpeg" alt="DroWo Moment" loading="lazy">
                </div>
                <div class="gallery-item glass-pod">
                    <img src="gallery/WhatsApp Image 2026-03-05 at 18.55.31.jpeg" alt="DroWo Moment" loading="lazy">
                </div>
                <div class="gallery-item glass-pod">
                    <img src="gallery/WhatsApp Image 2026-03-05 at 18.55.32 (2).jpeg" alt="DroWo Moment" loading="lazy">
                </div>
                <div class="gallery-item glass-pod">
                    <img src="gallery/WhatsApp Image 2026-03-05 at 18.55.32 (3).jpeg" alt="DroWo Moment" loading="lazy">
                </div>
                <div class="gallery-item glass-pod">
                    <img src="gallery/WhatsApp Image 2026-03-05 at 18.55.35.jpeg" alt="DroWo Moment" loading="lazy">
                </div>
                <div class="gallery-item glass-pod">
                    <img src="gallery/WhatsApp Image 2026-03-05 at 18.55.38 (2).jpeg" alt="DroWo Moment" loading="lazy">
                </div>
                <div class="gallery-item glass-pod">
                    <img src="gallery/WhatsApp Image 2026-03-05 at 18.55.53.jpeg" alt="DroWo Moment" loading="lazy">
                </div>
                <div class="gallery-item glass-pod">
                    <img src="gallery/WhatsApp Image 2026-03-05 at 18.55.54.jpeg" alt="DroWo Moment" loading="lazy">
                </div>
                <div class="gallery-item glass-pod">
                    <img src="gallery/WhatsApp Image 2026-03-05 at 18.55.55 (1).jpeg" alt="DroWo Moment" loading="lazy">
                </div>
                <div class="gallery-item glass-pod">
                    <img src="gallery/WhatsApp Image 2026-03-05 at 18.55.56 (1).jpeg" alt="DroWo Moment" loading="lazy">
                </div>
                <div class="gallery-item glass-pod">
                    <img src="gallery/WhatsApp Image 2026-03-05 at 18.56.01 (1).jpeg" alt="DroWo Moment" loading="lazy">
                </div>
                <div class="gallery-item glass-pod">
                    <img src="gallery/WhatsApp Image 2026-03-05 at 18.56.02 (1).jpeg" alt="DroWo Moment" loading="lazy">
                </div>
                <div class="gallery-item glass-pod">
                    <img src="gallery/WhatsApp Image 2026-03-05 at 18.56.02.jpeg" alt="DroWo Moment" loading="lazy">
                </div>
                <div class="gallery-item glass-pod">
                    <img src="gallery/WhatsApp Image 2026-03-05 at 18.56.03 (2).jpeg" alt="DroWo Moment" loading="lazy">
                </div>
                <div class="gallery-item glass-pod">
                    <img src="gallery/WhatsApp Image 2026-03-05 at 18.57.57.jpeg" alt="DroWo Moment" loading="lazy">
                </div>
                <div class="gallery-item glass-pod">
                    <img src="gallery/WhatsApp Image 2026-03-05 at 18.57.58 (1).jpeg" alt="DroWo Moment" loading="lazy">
                </div>
                <div class="gallery-item glass-pod">
                    <img src="gallery/WhatsApp Image 2026-03-05 at 18.57.58.jpeg" alt="DroWo Moment" loading="lazy">
                </div>
                <div class="gallery-item glass-pod">
                    <img src="gallery/WhatsApp Image 2026-03-05 at 18.57.59 (1).jpeg" alt="DroWo Moment" loading="lazy">
                </div>
                <div class="gallery-item glass-pod">
                    <img src="gallery/WhatsApp Image 2026-03-05 at 18.57.59 (2).jpeg" alt="DroWo Moment" loading="lazy">
                </div>
                <div class="gallery-item glass-pod">
                    <video autoplay loop muted playsinline
                        style="width: 100%; height: 100%; object-fit: cover; display: block; border-radius: var(--radius-lg);">
                        <source src="gallery/WhatsApp Video 2026-03-05 at 18.55.37.mp4" type="video/mp4">
                    </video>
                </div>
                <div class="gallery-item glass-pod">
                    <video autoplay loop muted playsinline
                        style="width: 100%; height: 100%; object-fit: cover; display: block; border-radius: var(--radius-lg);">
                        <source src="gallery/WhatsApp Video 2026-03-05 at 18.55.40.mp4" type="video/mp4">
                    </video>
                </div>
                <div class="gallery-item glass-pod">
                    <video autoplay loop muted playsinline
                        style="width: 100%; height: 100%; object-fit: cover; display: block; border-radius: var(--radius-lg);">
                        <source src="gallery/WhatsApp Video 2026-03-05 at 18.55.52.mp4" type="video/mp4">
                    </video>
                </div>
                <div class="gallery-item glass-pod">
                    <video autoplay loop muted playsinline
                        style="width: 100%; height: 100%; object-fit: cover; display: block; border-radius: var(--radius-lg);">
                        <source src="gallery/WhatsApp Video 2026-03-05 at 18.55.58.mp4" type="video/mp4">
                    </video>
                </div>
                <div class="gallery-item glass-pod">
                    <video autoplay loop muted playsinline
                        style="width: 100%; height: 100%; object-fit: cover; display: block; border-radius: var(--radius-lg);">
                        <source src="gallery/WhatsApp Video 2026-03-05 at 18.58.45.mp4" type="video/mp4">
                    </video>
                </div>
                <div class="gallery-item glass-pod">
                    <video autoplay loop muted playsinline
                        style="width: 100%; height: 100%; object-fit: cover; display: block; border-radius: var(--radius-lg);">
                        <source src="gallery/WhatsApp Video 2026-03-05 at 18.59.35.mp4" type="video/mp4">
                    </video>
                </div>
            </div>

            <!-- <div class="join-section" style="margin-top: 80px; text-align: center;">
                <h2
                    style="font-family: 'Montserrat', sans-serif; font-weight: 600; font-size: 28px; margin-bottom: 25px;">
                    Vrei să faci parte din ediția de anul acesta? Alătură-te prin a completa formularul de înregistrare!
                </h2>
                <a href="https://forms.gle/VkUStjwMYHUfitMu6" target="_blank" class="btn-neon">ÎNSCRIE-TE ACUM</a>
            </div> -->
        </section>
    </main>

    <div id="lightbox" class="lightbox">
        <button class="lightbox-close">&times;</button>
        <button class="lightbox-nav lightbox-prev"><i class="fa-solid fa-chevron-left"></i></button>
        <img id="lightbox-img" src="" class="lightbox-content" style="display:none;">
        <video id="lightbox-video" src="" class="lightbox-content" controls style="display:none;"></video>
        <button class="lightbox-nav lightbox-next"><i class="fa-solid fa-chevron-right"></i></button>
    </div>

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
                if (targetId.startsWith('#')) {
                    const targetElement = document.querySelector(targetId);
                    if (targetElement) {
                        e.preventDefault();
                        const headerOffset = 100;
                        const elementPosition = targetElement.getBoundingClientRect().top;
                        const offsetPosition = elementPosition + window.pageYOffset - headerOffset;
                        window.scrollTo({ top: offsetPosition, behavior: 'smooth' });
                    }
                }
            });
        });


    </script>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const grid = document.querySelector('.gallery-grid');
            const items = Array.from(grid.children);

            // Shuffle
            for (let i = items.length - 1; i > 0; i--) {
                const j = Math.floor(Math.random() * (i + 1));
                [items[i], items[j]] = [items[j], items[i]];
            }

            grid.innerHTML = '';
            items.forEach(item => grid.appendChild(item));

            const lightbox = document.getElementById('lightbox');
            const lightboxImg = document.getElementById('lightbox-img');
            const lightboxVideo = document.getElementById('lightbox-video');
            const closeBtn = document.querySelector('.lightbox-close');
            const prevBtn = document.querySelector('.lightbox-prev');
            const nextBtn = document.querySelector('.lightbox-next');

            // Make media clickable regardless of video controls area natively
            const mediaElements = items.map(item => item.querySelector('img, video'));
            let currentIndex = 0;

            function openLightbox(index) {
                currentIndex = index;
                const media = mediaElements[index];
                lightbox.classList.add('active');

                if (media.tagName === 'IMG') {
                    lightboxImg.src = media.src;
                    lightboxImg.style.display = 'block';
                    lightboxVideo.style.display = 'none';
                    lightboxVideo.pause();
                } else {
                    const source = media.querySelector('source');
                    lightboxVideo.src = source ? source.src : media.src;
                    lightboxVideo.style.display = 'block';
                    lightboxImg.style.display = 'none';
                    lightboxVideo.play();
                }
            }

            mediaElements.forEach((media, index) => {
                media.style.cursor = 'pointer';
                // Add pointer events override layer so video doesn't absorb click
                const wrapper = media.parentElement;
                wrapper.style.position = 'relative';
                const overlay = document.createElement('div');
                overlay.style.position = 'absolute';
                overlay.style.inset = '0';
                overlay.style.cursor = 'pointer';
                wrapper.appendChild(overlay);

                overlay.addEventListener('click', (e) => {
                    e.preventDefault();
                    openLightbox(index);
                });
            });

            closeBtn.addEventListener('click', () => {
                lightbox.classList.remove('active');
                lightboxVideo.pause();
                lightboxImg.src = '';
                lightboxVideo.src = '';
            });

            nextBtn.addEventListener('click', () => {
                openLightbox((currentIndex + 1) % mediaElements.length);
            });

            prevBtn.addEventListener('click', () => {
                openLightbox((currentIndex - 1 + mediaElements.length) % mediaElements.length);
            });

            lightbox.addEventListener('click', (e) => {
                if (e.target === lightbox || e.target.classList.contains('lightbox-content')) {
                    if (e.target === lightbox) closeBtn.click();
                }
            });

            document.addEventListener('keydown', (e) => {
                if (!lightbox.classList.contains('active')) return;
                if (e.key === 'Escape') closeBtn.click();
                if (e.key === 'ArrowRight') nextBtn.click();
                if (e.key === 'ArrowLeft') prevBtn.click();
            });
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
    </script>

</body>

</html>