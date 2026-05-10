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
        /* ===== HERO SECTION ===== */
        .hero-section {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            position: relative;
            padding: 120px 0;
        }
        
        .hero-section .hero-content { position: relative; z-index: 2; }
        
        .hero-section .logo-big {
            width: 160px;
            margin-bottom: 30px;
            filter: drop-shadow(0 0 40px var(--glow-purple));
            animation: logoPulse 3s ease-in-out infinite;
        }
        @keyframes logoPulse {
            0%, 100% { transform: scale(1); filter: drop-shadow(0 0 40px var(--glow-purple)); }
            50% { transform: scale(1.05); filter: drop-shadow(0 0 70px var(--glow-purple)); }
        }
        
        .hero-section h1 {
            font-size: 5rem;
            font-weight: 900;
            background: linear-gradient(135deg, #fff 20%, var(--neon-purple) 50%, var(--neon-pink) 80%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            text-transform: uppercase;
            letter-spacing: 8px;
            margin-bottom: 20px;
            line-height: 1.1;
        }
        
        .hero-section .tagline {
            font-size: 1.3rem;
            color: rgba(255,255,255,0.5);
            max-width: 600px;
            margin: 0 auto 40px;
            letter-spacing: 2px;
        }
        
        .hero-section .tagline span {
            background: linear-gradient(135deg, var(--neon-purple), var(--neon-pink));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            font-weight: 700;
        }
        
        .scroll-indicator {
            position: absolute;
            bottom: 30px;
            left: 50%;
            transform: translateX(-50%);
            animation: bounce 2s infinite;
            color: rgba(255,255,255,0.3);
            font-size: 24px;
        }
        @keyframes bounce {
            0%,20%,50%,80%,100% { transform: translateX(-50%) translateY(0); }
            40% { transform: translateX(-50%) translateY(-20px); }
            60% { transform: translateX(-50%) translateY(-10px); }
        }
        
        /* ===== FEATURE CARDS ===== */
        .features-section { padding: 100px 0; }
        
        .feature-card {
            background: var(--card-bg);
            border: 1px solid var(--card-border);
            border-radius: 20px;
            padding: 45px 30px;
            text-align: center;
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            margin-bottom: 30px;
        }
        .feature-card:hover {
            transform: translateY(-12px) scale(1.02);
            border-color: var(--neon-purple);
            box-shadow: 0 25px 60px var(--glow-purple);
        }
        .feature-card .icon-circle {
            width: 85px; height: 85px;
            background: rgba(180,74,255,0.1);
            border-radius: 50%;
            display: flex; align-items: center; justify-content: center;
            margin: 0 auto 25px;
            font-size: 35px;
            color: var(--neon-purple);
            transition: all 0.3s;
            border: 1px solid rgba(180,74,255,0.2);
        }
        .feature-card:hover .icon-circle {
            background: linear-gradient(135deg, var(--neon-purple), #7c3aed);
            color: #fff;
            box-shadow: 0 0 40px var(--glow-purple);
        }
        .feature-card h4 { color: #fff; font-weight: 700; font-size: 1.3rem; margin-bottom: 15px; }
        .feature-card p { color: var(--text-muted); font-size: 14px; line-height: 1.7; }
        
        /* ===== STATS ===== */
        .stats-section {
            padding: 80px 0;
            background: linear-gradient(135deg, rgba(180,74,255,0.05), transparent);
            border-top: 1px solid rgba(180,74,255,0.1);
            border-bottom: 1px solid rgba(180,74,255,0.1);
        }
        .stat-item { text-align: center; padding: 20px; }
        .stat-item .stat-number {
            font-size: 3.5rem;
            font-weight: 900;
            background: linear-gradient(135deg, #fff, var(--neon-purple));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            line-height: 1.2;
        }
        .stat-item .stat-label {
            color: var(--text-muted);
            font-size: 14px;
            text-transform: uppercase;
            letter-spacing: 2px;
            font-weight: 600;
            margin-top: 5px;
        }
        
        /* ===== CTA ===== */
        .cta-section {
            padding: 100px 0;
            text-align: center;
        }
        .cta-section h2 {
            font-size: 3rem;
            font-weight: 900;
            background: linear-gradient(135deg, #fff, var(--neon-purple));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            margin-bottom: 20px;
        }
        .cta-section p { color: var(--text-muted); font-size: 1.1rem; margin-bottom: 30px; max-width: 600px; margin-left: auto; margin-right: auto; }
        
        @media (max-width: 768px) {
            .hero-section h1 { font-size: 2.8rem; letter-spacing: 4px; }
            .hero-section .tagline { font-size: 1rem; }
            .stat-item .stat-number { font-size: 2.5rem; }
            .cta-section h2 { font-size: 2rem; }
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
        <div class="container hero-content">
            <img src="{{ asset('images/TentacitV1.1.png') }}" class="logo-big" alt="Tentacit Records">
            <h1 class="animate__animated animate__fadeInDown">Tentacit Records</h1>
            <p class="tagline animate__animated animate__fadeInUp">Discover. Create. Inspire. — Your music, <span>our mission</span>.</p>
            <div class="animate__animated animate__fadeInUp animate__delay-1s">
                <a href="{{route('musics')}}" class="btn-tentacit"><i class="fas fa-headphones me-2"></i>Explore Music</a>
                <a href="{{route('artists')}}" class="btn-tentacit-outline"><i class="fas fa-users me-2"></i>Our Artists</a>
            </div>
        </div>
        <div class="scroll-indicator"><i class="fas fa-chevron-down"></i></div>
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
