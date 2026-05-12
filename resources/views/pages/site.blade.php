<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tentacit Records | Home</title>

    <link rel="icon" type="image/png" href="{{ asset('images/Tentacit Shape-0.png') }}">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="{{ asset('succesor/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="stylesheet" href="{{ asset('succesor/assets/css/tentacit.css') }}">

    <style>
        /* ============================================
           HERO - CYBERPUNK NEON
           ============================================ */
        .hero-section {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            position: relative;
            padding: 120px 0;
            overflow: hidden;
        }

        /* Animated grid lines */
        .hero-section::before {
            content: '';
            position: absolute;
            top: 0; left: 0; right: 0; bottom: 0;
            background:
                repeating-linear-gradient(0deg, transparent, transparent 40px, rgba(56, 189, 248, 0.04) 40px, rgba(56, 189, 248, 0.04) 41px),
                repeating-linear-gradient(90deg, transparent, transparent 40px, rgba(168, 85, 247, 0.04) 40px, rgba(168, 85, 247, 0.04) 41px);
            z-index: 1;
            animation: gridScroll 20s linear infinite;
        }

        @keyframes gridScroll {
            0% { transform: translate(0, 0); }
            100% { transform: translate(40px, 40px); }
        }

        /* Glowing orbs */
        .hero-orb {
            position: absolute;
            border-radius: 50%;
            filter: blur(80px);
            z-index: 1;
            pointer-events: none;
        }
        .hero-orb-1 {
            width: 400px; height: 400px;
            background: rgba(168, 85, 247, 0.12);
            top: -10%; left: -5%;
            animation: orbFloat 8s ease-in-out infinite alternate;
        }
        .hero-orb-2 {
            width: 350px; height: 350px;
            background: rgba(56, 189, 248, 0.1);
            bottom: -10%; right: -5%;
            animation: orbFloat 10s ease-in-out infinite alternate-reverse;
        }
        .hero-orb-3 {
            width: 250px; height: 250px;
            background: rgba(34, 211, 238, 0.08);
            top: 50%; left: 50%;
            transform: translate(-50%, -50%);
            animation: orbPulse 6s ease-in-out infinite;
        }

        @keyframes orbFloat {
            0% { transform: translate(0, 0) scale(1); }
            100% { transform: translate(50px, -30px) scale(1.1); }
        }
        @keyframes orbPulse {
            0%, 100% { opacity: 0.5; transform: translate(-50%, -50%) scale(1); }
            50% { opacity: 1; transform: translate(-50%, -50%) scale(1.2); }
        }

        .hero-section .hero-content { position: relative; z-index: 3; }

        .hero-section .logo-big {
            width: 140px;
            margin-bottom: 25px;
            filter: drop-shadow(0 0 50px var(--glow-purple));
            animation: logoFloat 4s ease-in-out infinite;
        }
        @keyframes logoFloat {
            0%, 100% { transform: translateY(0); filter: drop-shadow(0 0 50px var(--glow-purple)); }
            50% { transform: translateY(-10px); filter: drop-shadow(0 0 80px var(--glow-blue)); }
        }

        .hero-section h1 {
            font-size: 5.5rem;
            font-weight: 900;
            background: linear-gradient(135deg, #fff 10%, var(--neon-purple) 40%, var(--neon-blue) 70%, var(--neon-cyan) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            text-transform: uppercase;
            letter-spacing: 10px;
            margin-bottom: 15px;
            line-height: 1.1;
            text-shadow: none;
            position: relative;
        }

        /* Glitch text effect */
        .hero-section h1::before,
        .hero-section h1::after {
            content: attr(data-text);
            position: absolute;
            top: 0; left: 0;
            width: 100%; height: 100%;
            background: linear-gradient(135deg, #fff 10%, var(--neon-purple) 40%, var(--neon-blue) 70%, var(--neon-cyan) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        .hero-section h1::before {
            animation: glitch1 3s infinite;
            clip-path: polygon(0 0, 100% 0, 100% 45%, 0 45%);
            -webkit-clip-path: polygon(0 0, 100% 0, 100% 45%, 0 45%);
        }
        .hero-section h1::after {
            animation: glitch2 3s infinite;
            clip-path: polygon(0 55%, 100% 55%, 100% 100%, 0 100%);
            -webkit-clip-path: polygon(0 55%, 100% 55%, 100% 100%, 0 100%);
        }

        @keyframes glitch1 {
            0%, 90%, 100% { transform: translate(0); }
            92% { transform: translate(-3px, 2px); }
            94% { transform: translate(3px, -1px); }
            96% { transform: translate(-2px, 1px); }
            98% { transform: translate(2px, -2px); }
        }
        @keyframes glitch2 {
            0%, 90%, 100% { transform: translate(0); }
            92% { transform: translate(3px, -2px); }
            94% { transform: translate(-3px, 1px); }
            96% { transform: translate(2px, -1px); }
            98% { transform: translate(-2px, 2px); }
        }

        .hero-section .tagline {
            font-size: 1.2rem;
            color: rgba(255, 255, 255, 0.4);
            max-width: 600px;
            margin: 0 auto 35px;
            letter-spacing: 3px;
            font-weight: 300;
        }

        .hero-section .tagline span {
            background: linear-gradient(135deg, var(--neon-blue), var(--neon-cyan));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            font-weight: 700;
        }

        /* Neon line decoration */
        .hero-line {
            width: 120px;
            height: 2px;
            background: linear-gradient(90deg, transparent, var(--neon-purple), var(--neon-blue), transparent);
            margin: 0 auto 30px;
            border-radius: 2px;
            box-shadow: 0 0 20px var(--glow-purple);
        }

        .scroll-indicator {
            position: absolute;
            bottom: 30px;
            left: 50%;
            transform: translateX(-50%);
            z-index: 3;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 8px;
            color: rgba(255, 255, 255, 0.3);
            font-size: 12px;
            letter-spacing: 2px;
            text-transform: uppercase;
            animation: fadeInOut 2s ease-in-out infinite;
        }
        .scroll-indicator i {
            font-size: 18px;
            animation: scrollBounce 2s infinite;
        }
        @keyframes scrollBounce {
            0%, 20%, 50%, 80%, 100% { transform: translateY(0); }
            40% { transform: translateY(-10px); }
            60% { transform: translateY(-5px); }
        }
        @keyframes fadeInOut {
            0%, 100% { opacity: 0.3; }
            50% { opacity: 0.8; }
        }

        /* ============================================
           FEATURES - NEON CARDS
           ============================================ */
        .features-section {
            padding: 120px 0;
            position: relative;
            z-index: 1;
        }

        .feature-card {
            background: var(--card-bg);
            border: 1px solid var(--card-border);
            border-radius: 20px;
            padding: 50px 35px;
            text-align: center;
            transition: all 0.5s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            margin-bottom: 30px;
            position: relative;
            overflow: hidden;
            backdrop-filter: blur(10px);
        }

        .feature-card::before {
            content: '';
            position: absolute;
            top: 0; left: 0; right: 0;
            height: 2px;
            background: linear-gradient(90deg, transparent, var(--neon-purple), var(--neon-blue), transparent);
            opacity: 0;
            transition: 0.5s;
        }

        .feature-card:hover::before { opacity: 1; }

        .feature-card:hover {
            transform: translateY(-15px) scale(1.02);
            border-color: rgba(168, 85, 247, 0.3);
            box-shadow:
                0 25px 60px var(--glow-purple),
                inset 0 0 60px rgba(168, 85, 247, 0.03);
        }

        .feature-card .icon-circle {
            width: 90px; height: 90px;
            background: rgba(168, 85, 247, 0.08);
            border-radius: 50%;
            display: flex; align-items: center; justify-content: center;
            margin: 0 auto 25px;
            font-size: 36px;
            color: var(--neon-purple);
            transition: all 0.4s;
            border: 1px solid rgba(168, 85, 247, 0.15);
            position: relative;
        }

        .feature-card .icon-circle::after {
            content: '';
            position: absolute;
            width: 100%; height: 100%;
            border-radius: 50%;
            border: 1px solid rgba(56, 189, 248, 0.2);
            animation: ringPulse 3s ease-in-out infinite;
        }

        @keyframes ringPulse {
            0%, 100% { transform: scale(1); opacity: 0.5; }
            50% { transform: scale(1.15); opacity: 0; }
        }

        .feature-card:hover .icon-circle {
            background: linear-gradient(135deg, var(--neon-purple), var(--neon-blue));
            color: #fff;
            box-shadow: 0 0 50px var(--glow-purple);
            transform: rotateY(360deg);
        }

        .feature-card h4 {
            color: #fff;
            font-weight: 700;
            font-size: 1.3rem;
            margin-bottom: 15px;
        }

        .feature-card p {
            color: var(--text-muted);
            font-size: 14px;
            line-height: 1.8;
        }

        /* ============================================
           STATS - CYBER COUNTERS
           ============================================ */
        .stats-section {
            padding: 100px 0;
            position: relative;
            z-index: 1;
            background: linear-gradient(180deg, transparent, rgba(168, 85, 247, 0.03), transparent);
            border-top: 1px solid rgba(168, 85, 247, 0.08);
            border-bottom: 1px solid rgba(168, 85, 247, 0.08);
        }

        .stat-item {
            text-align: center;
            padding: 30px 20px;
            position: relative;
        }

        .stat-item:not(:last-child)::after {
            content: '';
            position: absolute;
            right: 0;
            top: 50%;
            transform: translateY(-50%);
            width: 1px;
            height: 60px;
            background: linear-gradient(180deg, transparent, rgba(168, 85, 247, 0.3), transparent);
        }

        .stat-item .stat-number {
            font-size: 4rem;
            font-weight: 900;
            background: linear-gradient(135deg, #fff, var(--neon-purple), var(--neon-blue));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            line-height: 1.2;
            position: relative;
            display: inline-block;
        }

        .stat-item .stat-number::after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 10%;
            width: 80%;
            height: 2px;
            background: linear-gradient(90deg, transparent, var(--neon-purple), transparent);
            border-radius: 2px;
        }

        .stat-item .stat-label {
            color: var(--text-muted);
            font-size: 14px;
            text-transform: uppercase;
            letter-spacing: 3px;
            font-weight: 600;
            margin-top: 15px;
        }

        /* ============================================
           CTA - NEON CALL TO ACTION
           ============================================ */
        .cta-section {
            padding: 120px 0;
            text-align: center;
            position: relative;
            z-index: 1;
        }

        .cta-section::before {
            content: '';
            position: absolute;
            top: 0; left: 50%;
            transform: translateX(-50%);
            width: 60%;
            height: 1px;
            background: linear-gradient(90deg, transparent, var(--neon-purple), var(--neon-blue), transparent);
        }

        .cta-section h2 {
            font-size: 3.5rem;
            font-weight: 900;
            background: linear-gradient(135deg, #fff, var(--neon-purple), var(--neon-blue));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            margin-bottom: 20px;
            text-transform: uppercase;
            letter-spacing: 4px;
        }

        .cta-section p {
            color: var(--text-muted);
            font-size: 1.15rem;
            margin-bottom: 35px;
            max-width: 550px;
            margin-left: auto;
            margin-right: auto;
            letter-spacing: 1px;
        }

        /* ============================================
           RESPONSIVE
           ============================================ */
        @media (max-width: 992px) {
            .stat-item:not(:last-child)::after { display: none; }
        }

        @media (max-width: 768px) {
            .hero-section h1 {
                font-size: 2.8rem;
                letter-spacing: 5px;
            }
            .hero-section .tagline { font-size: 0.95rem; letter-spacing: 2px; }
            .hero-section .logo-big { width: 100px; }
            .stat-item .stat-number { font-size: 2.8rem; }
            .cta-section h2 { font-size: 2.2rem; letter-spacing: 2px; }
            .features-section { padding: 80px 0; }
            .stats-section { padding: 60px 0; }
            .cta-section { padding: 80px 0; }
        }

        @media (max-width: 576px) {
            .hero-section h1 { font-size: 2rem; letter-spacing: 3px; }
            .hero-line { width: 80px; }
        }
    </style>
</head>
<body>
    <div class="bg-grid"></div>
    <div class="bg-gradient"></div>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark navbar-tentacit fixed-top">
        <div class="container">
            <a class="navbar-brand" href="{{route('homepage')}}">
                <img src="{{ asset('images/TentacitV1.1.png') }}" alt="Tentacit Records">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link active" href="{{route('homepage')}}">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{route('artists')}}">Artists</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{route('musics')}}">Music</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{route('details')}}">About</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero -->
    <section class="hero-section">
        <div class="hero-orb hero-orb-1"></div>
        <div class="hero-orb hero-orb-2"></div>
        <div class="hero-orb hero-orb-3"></div>

        <div class="container hero-content">
            <img src="{{ asset('images/TentacitV1.1.png') }}" class="logo-big" alt="Tentacit Records">
            <h1 data-text="Tentacit Records" class="animate__animated animate__fadeInDown">Tentacit Records</h1>
            <div class="hero-line"></div>
            <p class="tagline animate__animated animate__fadeInUp animate__delay-1s">
                <i class="fas fa-bolt" style="color: var(--neon-blue); margin-right: 6px;"></i>
                Discover. Create. Inspire.
                <i class="fas fa-bolt" style="color: var(--neon-purple); margin-left: 6px;"></i>
                <br><span>Your music, our mission.</span>
            </p>
            <div class="animate__animated animate__fadeInUp animate__delay-1s">
                <a href="{{route('musics')}}" class="btn-tentacit"><i class="fas fa-headphones me-2"></i>Explore Music</a>
                <a href="{{route('artists')}}" class="btn-tentacit-outline"><i class="fas fa-users me-2"></i>Our Artists</a>
            </div>
        </div>

        <div class="scroll-indicator">
            <span>Scroll</span>
            <i class="fas fa-chevron-down"></i>
        </div>
    </section>

    <!-- Features -->
    <section class="features-section">
        <div class="container">
            <div class="section-header">
                <h2>What We Do</h2>
                <p>Empowering artists to build their music careers</p>
            </div>
            <div class="row">
                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="feature-card">
                        <div class="icon-circle"><i class="fas fa-handshake"></i></div>
                        <h4>Artist Development</h4>
                        <p>We nurture talent from the ground up, providing the resources and guidance needed to turn musical passion into a thriving career.</p>
                    </div>
                </div>
                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="feature-card">
                        <div class="icon-circle"><i class="fas fa-globe-americas"></i></div>
                        <h4>Global Distribution</h4>
                        <p>Get your music on Spotify, Apple Music, YouTube Music, and all major streaming platforms worldwide.</p>
                    </div>
                </div>
                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="feature-card">
                        <div class="icon-circle"><i class="fas fa-chart-line"></i></div>
                        <h4>Rights Management</h4>
                        <p>We handle the business side so you can focus on what matters most — creating incredible music.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats -->
    <section class="stats-section">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="stat-item">
                        <div class="stat-number">{{ $artistCount ?? 0 }}+</div>
                        <div class="stat-label">Artists Signed</div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="stat-item">
                        <div class="stat-number">{{ $songCount ?? 0 }}+</div>
                        <div class="stat-label">Tracks Released</div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="stat-item">
                        <div class="stat-number">∞</div>
                        <div class="stat-label">Possibilities</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA -->
    <section class="cta-section">
        <div class="container">
            <h2>Ready to Make Your Mark?</h2>
            <p>Join Tentacit Records and let's create something extraordinary together.</p>
            <a href="{{route('details')}}" class="btn-tentacit"><i class="fas fa-info-circle me-2"></i>Learn More</a>
        </div>
    </section>

    <!-- Footer -->
    <footer class="site-footer">
        <div class="container">
            <div class="social-links mb-4">
                <a href="#" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                <a href="#" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                <a href="#" aria-label="Spotify"><i class="fab fa-spotify"></i></a>
                <a href="#" aria-label="YouTube"><i class="fab fa-youtube"></i></a>
                <a href="#" aria-label="SoundCloud"><i class="fab fa-soundcloud"></i></a>
            </div>
            <p>&copy; {{ date('Y') }} Tentacit Records. All Rights Reserved.</p>
        </div>
    </footer>

    <script src="{{ asset('succesor/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('succesor/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
