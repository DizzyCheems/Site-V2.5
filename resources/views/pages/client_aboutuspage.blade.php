<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tentacit Records | About</title>
    
    <link href="/succesor/TentacitV1.1.png" rel="icon">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="/succesor/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="stylesheet" href="/succesor/assets/css/site.css">
    <link rel="stylesheet" href="/succesor/assets/css/main.css">
    
    <style>
        :root {
            --neon-purple: #b44aff;
            --dark-bg: #0a0a0f;
            --card-bg: #14141f;
            --accent-glow: rgba(180, 74, 255, 0.3);
        }
        body {
            background: var(--dark-bg);
            color: #e0e0e0;
            font-family: 'Montserrat', sans-serif;
            overflow-x: hidden;
        }
        .bg-grid {
            position: fixed; top: 0; left: 0;
            width: 100%; height: 100%;
            background: linear-gradient(rgba(180,74,255,0.03) 1px, transparent 1px),
                        linear-gradient(90deg, rgba(180,74,255,0.03) 1px, transparent 1px);
            background-size: 50px 50px;
            z-index: -2;
            animation: gridPulse 4s ease-in-out infinite;
        }
        @keyframes gridPulse {
            0%, 100% { opacity: 0.5; }
            50% { opacity: 1; }
        }
        .bg-gradient {
            position: fixed; top: -50%; left: -50%;
            width: 200%; height: 200%;
            background: radial-gradient(ellipse at center, rgba(180,74,255,0.08) 0%, transparent 60%);
            z-index: -1;
            animation: gradientFloat 15s ease-in-out infinite;
        }
        @keyframes gradientFloat {
            0%, 100% { transform: translate(0,0) rotate(0deg); }
            33% { transform: translate(5%,5%) rotate(2deg); }
            66% { transform: translate(-5%,-5%) rotate(-2deg); }
        }
        .navbar-tentacit {
            background: rgba(10,10,15,0.95);
            backdrop-filter: blur(20px);
            border-bottom: 1px solid rgba(180,74,255,0.2);
            padding: 15px 0;
        }
        .navbar-tentacit .nav-link {
            color: #aaa !important;
            font-weight: 500;
            font-size: 14px;
            text-transform: uppercase;
            letter-spacing: 1px;
            padding: 10px 20px !important;
            transition: all 0.3s;
        }
        .navbar-tentacit .nav-link:hover,
        .navbar-tentacit .nav-link.active {
            color: var(--neon-purple) !important;
        }
        .navbar-brand img { height: 50px; filter: drop-shadow(0 0 10px var(--accent-glow)); }
        
        .about-hero {
            padding: 150px 0 80px;
            text-align: center;
        }
        .about-hero h1 {
            font-size: 4rem;
            font-weight: 900;
            background: linear-gradient(135deg, #fff, var(--neon-purple));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            text-transform: uppercase;
            letter-spacing: 5px;
        }
        .about-hero p {
            font-size: 1.2rem;
            color: #888;
            max-width: 600px;
            margin: 0 auto;
        }
        .about-content {
            padding: 50px 0;
        }
        .about-card {
            background: var(--card-bg);
            border: 1px solid rgba(180,74,255,0.12);
            border-radius: 20px;
            padding: 40px;
            margin-bottom: 30px;
            transition: all 0.4s;
        }
        .about-card:hover {
            border-color: var(--neon-purple);
            box-shadow: 0 20px 60px var(--accent-glow);
            transform: translateY(-5px);
        }
        .about-card h3 {
            color: #fff;
            font-weight: 800;
            font-size: 1.8rem;
            margin-bottom: 20px;
        }
        .about-card h3 i {
            color: var(--neon-purple);
            margin-right: 15px;
        }
        .about-card p {
            color: #aaa;
            line-height: 1.8;
            font-size: 15px;
        }
        .about-card .highlight {
            color: var(--neon-purple);
            font-weight: 600;
        }
        .site-footer {
            background: rgba(10,10,15,0.95);
            border-top: 1px solid rgba(180,74,255,0.2);
            padding: 40px 0;
            text-align: center;
            margin-top: 50px;
        }
        .site-footer .social-links a {
            color: #666; font-size: 20px;
            margin: 0 15px; transition: all 0.3s;
        }
        .site-footer .social-links a:hover { color: var(--neon-purple); }
        .site-footer p { color: #666; font-size: 14px; margin: 0; }
        
        @media (max-width: 768px) {
            .about-hero h1 { font-size: 2.5rem; }
            .about-card { padding: 25px; }
        }
    </style>
</head>
<body>
    <div class="bg-grid"></div>
    <div class="bg-gradient"></div>

    <nav class="navbar navbar-expand-lg navbar-dark navbar-tentacit fixed-top">
        <div class="container">
            <a class="navbar-brand" href="{{route('homepage')}}">
                <img src="/succesor/TentacitV1.1.png" alt="Tentacit Records">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="{{route('homepage')}}">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{route('artists')}}">Artists</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{route('musics')}}">Music</a></li>
                    <li class="nav-item"><a class="nav-link active" href="{{route('details')}}">About</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <section class="about-hero">
        <div class="container">
            <h1 class="animate__animated animate__fadeInDown">About Tentacit</h1>
            <p class="animate__animated animate__fadeInUp">Discover the story behind the music</p>
        </div>
    </section>

    <section class="about-content">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="about-card animate__animated animate__fadeInUp">
                        <h3><i class="fas fa-bullhorn"></i>Who We Are</h3>
                        <p>
                            <span class="highlight">Tentacit Records</span> is a record label and publisher focused on relieving willing artists the business side of music making and giving the artist and their community the flexibility of creating, sharing and supporting their creative endeavors.
                        </p>
                        <p>
                            Founded with a vision to empower musicians worldwide, we provide the tools, resources, and network needed to turn musical passion into a sustainable career.
                        </p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-card animate__animated animate__fadeInUp animate__delay-1s">
                        <h3><i class="fas fa-eye"></i>Our Vision</h3>
                        <p>
                            <span class="highlight">Tentacit Records</span> envisions to be a company that gives hope and opportunity to all artists looking to monetize their artistic fervor and to form a friendly relationship among artists of all ages.
                        </p>
                        <p>
                            We believe that music has the power to connect people across boundaries, and we're committed to being the bridge between artists and their audiences.
                        </p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-card animate__animated animate__fadeInUp">
                        <h3><i class="fas fa-hand-holding-heart"></i>What We Offer</h3>
                        <p>
                            <i class="fas fa-check-circle" style="color: var(--neon-purple);"></i> <strong style="color: #fff;">Artist Development</strong> — Nurturing talent from the ground up<br>
                            <i class="fas fa-check-circle" style="color: var(--neon-purple);"></i> <strong style="color: #fff;">Global Distribution</strong> — Spotify, Apple Music, YouTube & more<br>
                            <i class="fas fa-check-circle" style="color: var(--neon-purple);"></i> <strong style="color: #fff;">Rights Management</strong> — Monetizing your music to mainstream media<br>
                            <i class="fas fa-check-circle" style="color: var(--neon-purple);"></i> <strong style="color: #fff;">Managerial Support</strong> — Releases managed and disseminated to the public<br>
                            <i class="fas fa-check-circle" style="color: var(--neon-purple);"></i> <strong style="color: #fff;">Global Exposure</strong> — Partnered with the right companies for your growth
                        </p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-card animate__animated animate__fadeInUp animate__delay-1s">
                        <h3><i class="fas fa-handshake"></i>Our Partners</h3>
                        <p>
                            We have partnered with <span class="highlight">Otakunity Inc.</span>, a social network company headquartered in Japan that provides anime distribution and streaming services. Together, we bring anime OSTs and more to fans worldwide.
                        </p>
                        <p>
                            Our distribution network spans across all major streaming platforms ensuring your music reaches every corner of the globe.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer class="site-footer">
        <div class="container">
            <div class="social-links mb-3">
                <a href="#"><i class="fab fa-twitter"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
                <a href="#"><i class="fab fa-spotify"></i></a>
                <a href="#"><i class="fab fa-youtube"></i></a>
                <a href="#"><i class="fab fa-soundcloud"></i></a>
            </div>
            <p>&copy; {{ date('Y') }} Tentacit Records. All Rights Reserved.</p>
        </div>
    </footer>

    <script src="/succesor/vendor/jquery/jquery.min.js"></script>
    <script src="/succesor/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/succesor/assets/js/custom.js"></script>
</body>
</html>
