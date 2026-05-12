<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tentacit Records | About</title>

    <link rel="icon" type="image/png" href="{{ asset('images/Tentacit Shape-0.png') }}">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="stylesheet" href="{{ asset('succesor/assets/css/tentacit.css') }}">

    <style>
        /* ============================================
           VARIABLES & BASE
           ============================================ */
        :root {
            --neon-purple: #a855f7;
            --neon-blue:   #38bdf8;
            --neon-cyan:   #22d3ee;
        }

        body {
            background: #04040c;
            color: #e0e0e0;
            font-family: 'Montserrat', sans-serif;
            overflow-x: hidden;
        }

        /* ============================================
           NAVBAR — 2× logo
           ============================================ */
        .navbar-tentacit { padding: 6px 0; }
        .navbar-tentacit .navbar-brand img {
            height: 90px !important;
            filter: drop-shadow(0 0 14px rgba(168,85,247,0.5)) !important;
            transition: filter 0.3s !important;
        }
        .navbar-tentacit .navbar-brand img:hover {
            filter: drop-shadow(0 0 22px rgba(168,85,247,0.8)) !important;
        }

        /* ============================================
           ANIMATED PAGE BACKGROUND
           ============================================ */
        .page-bg {
            position: fixed;
            inset: 0;
            z-index: -1;
            background:
                radial-gradient(ellipse 80% 60% at 20% -10%, rgba(168,85,247,0.12), transparent 60%),
                radial-gradient(ellipse 60% 50% at 80% 110%, rgba(56,189,248,0.08), transparent 60%),
                #04040c;
        }
        .bg-grid {
            position: fixed;
            inset: 0;
            z-index: -1;
            background:
                linear-gradient(rgba(168,85,247,0.03) 1px, transparent 1px),
                linear-gradient(90deg, rgba(168,85,247,0.03) 1px, transparent 1px);
            background-size: 50px 50px;
        }

        /* ============================================
           HERO
           ============================================ */
        .about-hero {
            padding: 160px 0 80px;
            text-align: center;
            position: relative;
        }

        .hero-eyebrow {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            font-size: 10px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 4px;
            color: var(--neon-cyan);
            margin-bottom: 20px;
        }
        .hero-eyebrow::before,
        .hero-eyebrow::after {
            content: '';
            display: block;
            width: 40px;
            height: 1px;
            background: var(--neon-cyan);
            opacity: 0.4;
        }

        .hero-title {
            font-size: 5rem;
            font-weight: 900;
            text-transform: uppercase;
            letter-spacing: 6px;
            background: linear-gradient(135deg, #fff 20%, var(--neon-purple) 55%, var(--neon-blue) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            line-height: 1.0;
            margin-bottom: 20px;
        }

        .hero-sub {
            font-size: 1.1rem;
            color: rgba(255,255,255,0.4);
            max-width: 560px;
            margin: 0 auto 40px;
            font-weight: 400;
            line-height: 1.7;
        }

        .hero-divider {
            width: 120px;
            height: 2px;
            margin: 0 auto;
            background: linear-gradient(90deg, transparent, var(--neon-purple), var(--neon-blue), transparent);
        }

        /* ============================================
           SECTION LABEL
           ============================================ */
        .section-label {
            font-size: 9px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 4px;
            color: var(--neon-cyan);
            margin-bottom: 12px;
        }

        .section-title {
            font-size: 2.2rem;
            font-weight: 900;
            color: #fff;
            text-transform: uppercase;
            letter-spacing: 2px;
            margin-bottom: 0;
        }

        /* ============================================
           GLASS CARDS
           ============================================ */
        .glass-card {
            background: rgba(255,255,255,0.03);
            border: 1px solid rgba(168,85,247,0.12);
            border-radius: 20px;
            padding: 36px 32px;
            height: 100%;
            transition: border-color 0.35s, box-shadow 0.35s, transform 0.35s;
        }

        .glass-card:hover {
            border-color: rgba(168,85,247,0.35);
            box-shadow: 0 24px 60px rgba(168,85,247,0.12);
            transform: translateY(-4px);
        }

        .card-icon {
            width: 52px;
            height: 52px;
            border-radius: 14px;
            background: rgba(168,85,247,0.1);
            border: 1px solid rgba(168,85,247,0.2);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            color: var(--neon-purple);
            margin-bottom: 20px;
        }

        .glass-card h4 {
            font-size: 1.15rem;
            font-weight: 800;
            color: #fff;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            margin-bottom: 14px;
        }

        .glass-card p {
            color: rgba(255,255,255,0.5);
            font-size: 14px;
            line-height: 1.8;
            margin: 0;
        }

        /* ============================================
           OFFER LIST
           ============================================ */
        .offer-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .offer-list li {
            display: flex;
            align-items: flex-start;
            gap: 14px;
            padding: 14px 0;
            border-bottom: 1px solid rgba(255,255,255,0.05);
            font-size: 14px;
            color: rgba(255,255,255,0.55);
        }

        .offer-list li:last-child { border-bottom: none; }

        .offer-list li .offer-icon {
            width: 28px;
            height: 28px;
            border-radius: 8px;
            background: rgba(168,85,247,0.12);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 11px;
            color: var(--neon-purple);
            flex-shrink: 0;
            margin-top: 1px;
        }

        .offer-list li strong {
            color: #fff;
            font-weight: 700;
            display: block;
            margin-bottom: 2px;
        }

        /* ============================================
           STATS ROW
           ============================================ */
        .stats-row {
            padding: 60px 0;
        }

        .stat-item {
            text-align: center;
            padding: 30px 20px;
            border: 1px solid rgba(168,85,247,0.1);
            border-radius: 16px;
            background: rgba(255,255,255,0.02);
            transition: border-color 0.3s, box-shadow 0.3s;
        }

        .stat-item:hover {
            border-color: rgba(168,85,247,0.3);
            box-shadow: 0 0 40px rgba(168,85,247,0.08);
        }

        .stat-number {
            font-size: 2.8rem;
            font-weight: 900;
            background: linear-gradient(135deg, #fff, var(--neon-purple));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            line-height: 1;
            margin-bottom: 8px;
        }

        .stat-label {
            font-size: 10px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 2.5px;
            color: rgba(255,255,255,0.3);
        }

        /* ============================================
           PARTNER SECTION
           ============================================ */
        .partners-section {
            padding: 80px 0 100px;
        }

        .partner-card {
            background: rgba(255,255,255,0.02);
            border: 1px solid rgba(168,85,247,0.12);
            border-radius: 28px;
            padding: 56px 48px;
            transition: border-color 0.35s, box-shadow 0.35s;
        }

        .partner-card:hover {
            border-color: rgba(168,85,247,0.35);
            box-shadow: 0 40px 100px rgba(168,85,247,0.12);
        }

        .partner-logos-row {
            display: flex;
            gap: 32px;
            margin-bottom: 40px;
            flex-wrap: wrap;
        }

        .partner-logo-wrap {
            flex: 1;
            min-width: 220px;
            height: 220px;
            background: #000;
            border: 1px solid rgba(168,85,247,0.18);
            border-radius: 24px;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            padding: 24px;
            transition: border-color 0.3s, box-shadow 0.3s;
        }

        .partner-logo-wrap:hover {
            border-color: rgba(168,85,247,0.4);
            box-shadow: 0 0 60px rgba(168,85,247,0.15);
        }

        .partner-logo-wrap img {
            max-width: 100%;
            max-height: 100%;
            object-fit: contain;
            filter: drop-shadow(0 0 24px rgba(168,85,247,0.35));
            transition: filter 0.3s, transform 0.3s;
        }

        .partner-logo-wrap:hover img {
            filter: drop-shadow(0 0 36px rgba(168,85,247,0.6));
            transform: scale(1.04);
        }

        .partner-info h3 {
            font-size: 2.2rem;
            font-weight: 900;
            color: #fff;
            text-transform: uppercase;
            letter-spacing: 3px;
            margin-bottom: 8px;
        }

        .partner-badge {
            display: inline-block;
            padding: 5px 18px;
            background: rgba(168,85,247,0.1);
            border: 1px solid rgba(168,85,247,0.25);
            border-radius: 50px;
            font-size: 10px;
            font-weight: 700;
            color: var(--neon-purple);
            text-transform: uppercase;
            letter-spacing: 2px;
            margin-bottom: 20px;
        }

        .partner-info p {
            color: rgba(255,255,255,0.5);
            font-size: 15px;
            line-height: 1.9;
            margin: 0;
            max-width: 680px;
        }

        /* ============================================
           NEON DIVIDER
           ============================================ */
        .neon-divider {
            width: 100%;
            height: 1px;
            background: linear-gradient(90deg, transparent, rgba(168,85,247,0.3), rgba(56,189,248,0.2), transparent);
            margin: 0;
        }

        /* ============================================
           RESPONSIVE
           ============================================ */
        @media (max-width: 768px) {
            .hero-title { font-size: 3rem; letter-spacing: 3px; }
            .partner-card { flex-direction: column; gap: 28px; padding: 32px 24px; }
            .partner-logo-wrap { width: 120px; height: 120px; }
        }

        @media (max-width: 768px) {
            .partner-logos-row { flex-direction: column; }
            .partner-logo-wrap { min-width: unset; height: 180px; }
        }
        @media (max-width: 480px) {
            .hero-title { font-size: 2.2rem; letter-spacing: 2px; }
            .navbar-brand img { height: 80px; }
        }
    </style>
</head>
<body>
    <div class="page-bg"></div>
    <div class="bg-grid"></div>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark navbar-tentacit fixed-top">
        <div class="container">
            <a class="navbar-brand" href="{{ route('homepage') }}">
                <img src="{{ asset('images/TentacitV1.1.png') }}" alt="Tentacit Records">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="{{ route('homepage') }}">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('musics') }}">Music</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('artists') }}">Artists</a></li>
                    <li class="nav-item"><a class="nav-link active" href="{{ route('details') }}">About</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero -->
    <section class="about-hero">
        <div class="container">
            <div class="hero-eyebrow animate__animated animate__fadeIn">
                <span></span> Tentacit Records <span></span>
            </div>
            <h1 class="hero-title animate__animated animate__fadeInDown">Our Story</h1>
            <p class="hero-sub animate__animated animate__fadeInUp animate__delay-1s">
                A record label built for artists — discover who we are,
                what drives us, and the partners we stand with.
            </p>
            <div class="hero-divider animate__animated animate__fadeIn animate__delay-1s"></div>
        </div>
    </section>

    <!-- Stats -->
    <section class="stats-row">
        <div class="container">
            <div class="row g-3">
                <div class="col-6 col-md-3">
                    <div class="stat-item">
                        <div class="stat-number">10+</div>
                        <div class="stat-label">Artists</div>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="stat-item">
                        <div class="stat-number">50+</div>
                        <div class="stat-label">Tracks</div>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="stat-item">
                        <div class="stat-number">5+</div>
                        <div class="stat-label">Platforms</div>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="stat-item">
                        <div class="stat-number">1</div>
                        <div class="stat-label">Vision</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="neon-divider"></div>

    <!-- Who We Are / Vision -->
    <section style="padding: 80px 0 60px;">
        <div class="container">
            <div class="row g-4 mb-4">
                <div class="col-md-4">
                    <p class="section-label">About</p>
                    <h2 class="section-title">What We<br>Stand For</h2>
                </div>
                <div class="col-md-8 d-flex align-items-center">
                    <p style="color: rgba(255,255,255,0.45); font-size: 15px; line-height: 1.9; margin: 0;">
                        Tentacit Records is more than a label — it's a movement. We exist to free artists from the business overhead of music making, giving them space to create, connect, and grow while we handle the rest.
                    </p>
                </div>
            </div>
            <div class="row g-4">
                <div class="col-lg-4 col-md-6">
                    <div class="glass-card">
                        <div class="card-icon"><i class="fas fa-bullhorn"></i></div>
                        <h4>Who We Are</h4>
                        <p>
                            A record label and publisher focused on relieving artists of the business side of music making — giving artists and their communities the flexibility to create, share, and support their creative endeavors without limits.
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="glass-card">
                        <div class="card-icon" style="background: rgba(56,189,248,0.1); border-color: rgba(56,189,248,0.2); color: var(--neon-blue);"><i class="fas fa-eye"></i></div>
                        <h4>Our Vision</h4>
                        <p>
                            We envision a company that gives hope and opportunity to every artist looking to monetize their passion — fostering a friendly, inclusive relationship among artists of all ages, backgrounds, and genres.
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="glass-card">
                        <div class="card-icon" style="background: rgba(34,211,238,0.08); border-color: rgba(34,211,238,0.2); color: var(--neon-cyan);"><i class="fas fa-hand-holding-heart"></i></div>
                        <h4>What We Offer</h4>
                        <ul class="offer-list">
                            <li>
                                <span class="offer-icon"><i class="fas fa-seedling"></i></span>
                                <div><strong>Artist Development</strong>Nurturing talent from the ground up</div>
                            </li>
                            <li>
                                <span class="offer-icon"><i class="fas fa-globe"></i></span>
                                <div><strong>Global Distribution</strong>Spotify, Apple Music, YouTube &amp; more</div>
                            </li>
                            <li>
                                <span class="offer-icon"><i class="fas fa-shield-alt"></i></span>
                                <div><strong>Rights Management</strong>Monetizing music to mainstream media</div>
                            </li>
                            <li>
                                <span class="offer-icon"><i class="fas fa-broadcast-tower"></i></span>
                                <div><strong>Managerial Support</strong>Releases managed &amp; disseminated</div>
                            </li>
                            <li>
                                <span class="offer-icon"><i class="fas fa-rocket"></i></span>
                                <div><strong>Global Exposure</strong>Partnered with the right companies</div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="neon-divider"></div>

    <!-- Partners -->
    <section class="partners-section">
        <div class="container">
            <div class="text-center mb-5">
                <p class="section-label">Partnerships</p>
                <h2 class="section-title">Our Partners</h2>
            </div>
            <div class="partner-card">
                <!-- Both Otakunity images displayed large -->
                <div class="partner-logos-row">
                    <div class="partner-logo-wrap">
                        <img src="{{ asset('assets/partner/otakunity.png') }}" alt="Otakunity PNG">
                    </div>
                    <div class="partner-logo-wrap">
                        <img src="{{ asset('assets/partner/Otakunity.jpg') }}" alt="Otakunity JPG">
                    </div>
                </div>
                <div class="partner-info">
                    <p class="section-label mb-1">Official Partner</p>
                    <h3>Otakunity Inc.</h3>
                    <span class="partner-badge">Anime Distribution &amp; Streaming</span>
                    <p>
                        Headquartered in Japan, Otakunity Inc. is a social network company that provides anime distribution and streaming services. Through our partnership, we bring anime OSTs and original music directly to fans worldwide — connecting culture, music, and community on a global stage.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="site-footer" style="position: relative; z-index: 1;">
        <div class="container">
            <div class="social-links mb-3">
                <a href="#" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                <a href="#" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                <a href="#" aria-label="Spotify"><i class="fab fa-spotify"></i></a>
                <a href="#" aria-label="YouTube"><i class="fab fa-youtube"></i></a>
                <a href="#" aria-label="SoundCloud"><i class="fab fa-soundcloud"></i></a>
            </div>
            <p>&copy; {{ date('Y') }} Tentacit Records. All Rights Reserved.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
