<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tentacit Records | Artists</title>

    <link rel="icon" type="image/png" href="{{ asset('images/Tentacit Shape-0.png') }}">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="stylesheet" href="{{ asset('succesor/assets/css/tentacit.css') }}">

    <style>
        /* ============================================
           PAGE HERO
           ============================================ */
        .page-hero {
            padding: 160px 0 70px;
            text-align: center;
            position: relative;
            z-index: 1;
        }

        .page-hero-eyebrow {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 5px 16px;
            background: rgba(168, 85, 247, 0.1);
            border: 1px solid rgba(168, 85, 247, 0.22);
            border-radius: 50px;
            font-size: 10px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 2.5px;
            color: var(--neon-purple);
            margin-bottom: 22px;
        }

        .page-hero h1 {
            font-size: 4.5rem;
            font-weight: 900;
            background: linear-gradient(135deg, #fff 10%, var(--neon-purple) 50%, var(--neon-blue) 90%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            text-transform: uppercase;
            letter-spacing: 6px;
            margin-bottom: 14px;
            line-height: 1.05;
        }

        .page-hero p {
            color: rgba(255,255,255,0.35);
            font-size: 1rem;
            letter-spacing: 2px;
            text-transform: uppercase;
            max-width: 460px;
            margin: 0 auto;
        }

        .page-hero-bar {
            width: 80px;
            height: 2px;
            background: linear-gradient(90deg, var(--neon-purple), var(--neon-blue), transparent);
            margin: 22px auto 0;
            border-radius: 2px;
            box-shadow: 0 0 16px var(--glow-purple);
        }

        /* ============================================
           SEARCH / FILTER BAR
           ============================================ */
        .filter-bar {
            padding: 0 0 50px;
            position: relative;
            z-index: 1;
        }

        .filter-input-wrap {
            position: relative;
            max-width: 420px;
            margin: 0 auto;
        }

        .filter-input-wrap i {
            position: absolute;
            left: 18px;
            top: 50%;
            transform: translateY(-50%);
            color: rgba(168, 85, 247, 0.5);
            font-size: 14px;
            pointer-events: none;
        }

        #artistSearch {
            width: 100%;
            background: rgba(10, 10, 20, 0.7);
            border: 1px solid rgba(168, 85, 247, 0.2);
            border-radius: 50px;
            padding: 12px 20px 12px 44px;
            color: #fff;
            font-family: 'Montserrat', sans-serif;
            font-size: 13px;
            font-weight: 500;
            letter-spacing: 1px;
            outline: none;
            transition: all 0.3s;
            backdrop-filter: blur(10px);
        }

        #artistSearch::placeholder { color: rgba(255,255,255,0.2); }

        #artistSearch:focus {
            border-color: rgba(168, 85, 247, 0.5);
            box-shadow: 0 0 25px rgba(168, 85, 247, 0.1);
        }

        /* ============================================
           ARTIST TILE GALLERY
           ============================================ */
        .artists-gallery {
            padding: 0 0 120px;
            position: relative;
            z-index: 1;
        }

        .artists-tile-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 18px;
        }

        .artist-tile {
            position: relative;
            border-radius: 16px;
            overflow: hidden;
            aspect-ratio: 3/4;
            cursor: pointer;
            text-decoration: none;
            display: block;
            background: rgba(10,10,20,0.6);
            border: 1px solid rgba(255,255,255,0.06);
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }

        .artist-tile:hover {
            transform: translateY(-10px) scale(1.02);
            border-color: rgba(168, 85, 247, 0.35);
            box-shadow:
                0 25px 60px rgba(0,0,0,0.5),
                0 0 50px rgba(168, 85, 247, 0.1);
        }

        /* Artist image */
        .artist-tile-img {
            position: absolute;
            inset: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.6s cubic-bezier(0.25, 0.46, 0.45, 0.94);
        }

        .artist-tile:hover .artist-tile-img {
            transform: scale(1.08);
        }

        /* Gradient overlay - always visible at bottom */
        .artist-tile-gradient {
            position: absolute;
            inset: 0;
            background: linear-gradient(
                180deg,
                transparent 30%,
                rgba(5, 5, 15, 0.6) 60%,
                rgba(5, 5, 15, 0.97) 100%
            );
            transition: background 0.4s;
        }

        .artist-tile:hover .artist-tile-gradient {
            background: linear-gradient(
                180deg,
                rgba(5, 5, 15, 0.2) 0%,
                rgba(5, 5, 15, 0.5) 40%,
                rgba(5, 5, 15, 0.98) 100%
            );
        }

        /* Neon top glow on hover */
        .artist-tile-glow {
            position: absolute;
            top: 0; left: 0; right: 0;
            height: 3px;
            background: linear-gradient(90deg, transparent, var(--neon-purple), var(--neon-blue), transparent);
            opacity: 0;
            transition: opacity 0.4s;
        }

        .artist-tile:hover .artist-tile-glow { opacity: 1; }

        /* Info at bottom */
        .artist-tile-info {
            position: absolute;
            bottom: 0; left: 0; right: 0;
            padding: 22px 20px;
            z-index: 2;
        }

        .artist-tile-genre {
            display: inline-block;
            font-size: 9px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 2px;
            color: var(--neon-cyan);
            margin-bottom: 6px;
        }

        .artist-tile-name {
            color: #fff;
            font-size: 1.15rem;
            font-weight: 800;
            margin: 0 0 4px;
            letter-spacing: 0.5px;
            line-height: 1.2;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .artist-tile-meta {
            color: rgba(255,255,255,0.38);
            font-size: 11px;
            font-weight: 500;
            letter-spacing: 1px;
            margin: 0;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .artist-tile-meta i {
            color: var(--neon-purple);
            margin-right: 4px;
            font-size: 10px;
        }

        /* View profile button - appears on hover */
        .artist-tile-btn {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, calc(-50% + 10px));
            padding: 10px 24px;
            background: linear-gradient(135deg, var(--neon-purple), var(--neon-blue));
            color: #fff;
            font-size: 11px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            border-radius: 50px;
            opacity: 0;
            transition: all 0.35s;
            white-space: nowrap;
            box-shadow: 0 0 30px var(--glow-purple);
        }

        .artist-tile:hover .artist-tile-btn {
            opacity: 1;
            transform: translate(-50%, -50%);
        }

        /* Track count badge */
        .artist-tile-tracks {
            position: absolute;
            top: 14px; right: 14px;
            display: flex;
            align-items: center;
            gap: 5px;
            padding: 5px 12px;
            background: rgba(5, 5, 15, 0.7);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(168, 85, 247, 0.2);
            border-radius: 50px;
            font-size: 10px;
            font-weight: 700;
            color: rgba(255,255,255,0.6);
            transition: all 0.3s;
        }

        .artist-tile-tracks i {
            color: var(--neon-purple);
            font-size: 9px;
        }

        .artist-tile:hover .artist-tile-tracks {
            border-color: rgba(168, 85, 247, 0.45);
            color: #fff;
        }

        /* Featured/large tile - first item spans 2 cols */
        .artist-tile.featured {
            grid-column: span 2;
            aspect-ratio: 16/9;
        }

        .artist-tile.featured .artist-tile-name {
            font-size: 1.8rem;
        }

        /* Empty state */
        .empty-state {
            grid-column: 1 / -1;
            text-align: center;
            padding: 80px 0;
        }

        .empty-state .empty-icon {
            font-size: 4rem;
            color: rgba(168, 85, 247, 0.3);
            margin-bottom: 20px;
        }

        .empty-state h3 {
            color: #fff;
            font-weight: 700;
            margin-bottom: 8px;
        }

        .empty-state p {
            color: var(--text-muted);
            font-size: 14px;
        }

        /* ============================================
           RESPONSIVE
           ============================================ */
        @media (max-width: 1200px) {
            .artists-tile-grid { grid-template-columns: repeat(3, 1fr); }
            .artist-tile.featured { grid-column: span 2; }
        }

        @media (max-width: 900px) {
            .artists-tile-grid { grid-template-columns: repeat(2, 1fr); gap: 14px; }
            .artist-tile.featured { grid-column: span 2; aspect-ratio: 16/9; }
            .page-hero h1 { font-size: 3rem; letter-spacing: 4px; }
        }

        @media (max-width: 576px) {
            .artists-tile-grid { grid-template-columns: repeat(2, 1fr); gap: 10px; }
            .artist-tile.featured { grid-column: span 2; aspect-ratio: 4/3; }
            .artist-tile-name { font-size: 1rem; }
            .page-hero h1 { font-size: 2.2rem; letter-spacing: 3px; }
            .artist-tile-btn { display: none; }
        }
    </style>
</head>
<body>
    <!-- Page Background Image -->
    <div class="page-bg-wrap">
        <img src="{{ asset('assets/bg-images/bg-3.jpg') }}" class="page-bg-img" alt="">
    </div>

    <div class="bg-grid"></div>
    <div class="bg-gradient"></div>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark navbar-tentacit fixed-top">
        <div class="container">
            <a class="navbar-brand" href="{{ route('homepage') }}">
                <img src="{{ asset('images/TentacitV1.1.png') }}" alt="Tentacit Records">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="{{ route('homepage') }}">Home</a></li>
                    <li class="nav-item"><a class="nav-link active" href="{{ route('artists') }}">Artists</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('musics') }}">Music</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('details') }}">About</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero -->
    <section class="page-hero">
        <div class="container">
            <div class="page-hero-eyebrow animate__animated animate__fadeInDown">
                <i class="fas fa-users"></i> Roster
            </div>
            <h1 class="animate__animated animate__fadeInUp">Our Artists</h1>
            <p class="animate__animated animate__fadeInUp animate__delay-1s">
                The talented musicians behind Tentacit Records
            </p>
            <div class="page-hero-bar"></div>
        </div>
    </section>

    <!-- Filter bar -->
    <div class="filter-bar">
        <div class="container">
            <div class="filter-input-wrap">
                <i class="fas fa-search"></i>
                <input type="text" id="artistSearch" placeholder="Search artists..." autocomplete="off">
            </div>
        </div>
    </div>

    <!-- Tile Gallery -->
    <section class="artists-gallery">
        <div class="container">
            <div class="artists-tile-grid" id="artistGrid">
                @forelse($artists as $i => $artist)
                <a href="{{ route('artist_info', $artist['id']) }}"
                   class="artist-tile{{ $i === 0 ? ' featured' : '' }}"
                   data-name="{{ strtolower($artist->artistname) }}">

                    <div class="artist-tile-glow"></div>

                    <img class="artist-tile-img"
                         src="/artist-profile-images/{{ $artist->image }}"
                         alt="{{ $artist->artistname }}"
                         onerror="this.src='{{ asset('images/TentacitV1.1.png') }}'">

                    <div class="artist-tile-gradient"></div>

                    <div class="artist-tile-tracks">
                        <i class="fas fa-music"></i>
                        {{ $artist->song ? $artist->song->count() : 0 }}
                    </div>

                    <div class="artist-tile-btn">
                        <i class="fas fa-user me-1"></i> View Profile
                    </div>

                    <div class="artist-tile-info">
                        @if($artist->genre)
                        <div class="artist-tile-genre">{{ $artist->genre }}</div>
                        @endif
                        <h3 class="artist-tile-name">{{ $artist->artistname }}</h3>
                        @if($artist->nationality)
                        <p class="artist-tile-meta">
                            <i class="fas fa-globe"></i>{{ $artist->nationality }}
                        </p>
                        @endif
                    </div>
                </a>
                @empty
                <div class="empty-state">
                    <div class="empty-icon"><i class="fas fa-users"></i></div>
                    <h3>No Artists Yet</h3>
                    <p>Artists will appear here once added to the roster.</p>
                </div>
                @endforelse
            </div>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Stagger-in tiles
        const tiles = document.querySelectorAll('.artist-tile');
        const obs = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    setTimeout(() => {
                        entry.target.style.opacity = '1';
                        entry.target.style.transform = entry.target.classList.contains('featured')
                            ? 'translateY(0)'
                            : 'translateY(0) scale(1)';
                    }, parseInt(entry.target.dataset.delay) || 0);
                    obs.unobserve(entry.target);
                }
            });
        }, { threshold: 0.05 });

        tiles.forEach((tile, i) => {
            tile.style.opacity = '0';
            tile.style.transform = 'translateY(28px)';
            tile.style.transition = 'opacity 0.5s ease, transform 0.5s ease, border-color 0.4s, box-shadow 0.4s';
            tile.dataset.delay = i * 60;
            obs.observe(tile);
        });

        // Search / filter
        document.getElementById('artistSearch').addEventListener('input', function() {
            const q = this.value.toLowerCase().trim();
            document.querySelectorAll('.artist-tile').forEach(tile => {
                const name = tile.dataset.name || '';
                tile.style.display = (!q || name.includes(q)) ? 'block' : 'none';
            });
        });
    </script>
</body>
</html>
