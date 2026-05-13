<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tentacit Records | {{ $artist->artistname ?? 'Artist Profile' }}</title>

    <link rel="icon" type="image/png" href="{{ asset('images/Tentacit Shape-0.png') }}">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('succesor/assets/css/tentacit.css') }}">

    <style>
        /* ── Artist blurred hero background ── */
        .artist-bg-layer {
            position: fixed;
            inset: 0;
            z-index: 0;
            background-image: url('/artist-profile-images/{{ $artist->image }}');
            background-size: cover;
            background-position: center top;
            filter: blur(55px) brightness(0.18) saturate(0.6);
            transform: scale(1.1);
        }
        .artist-bg-tint {
            position: fixed;
            inset: 0;
            z-index: 1;
            background: radial-gradient(ellipse at 30% 0%, rgba(168,85,247,0.18) 0%, transparent 60%),
                        radial-gradient(ellipse at 80% 100%, rgba(56,189,248,0.12) 0%, transparent 55%),
                        linear-gradient(180deg, rgba(0,0,0,0.55) 0%, rgba(5,5,15,0.92) 100%);
            pointer-events: none;
        }
        .page-content { position: relative; z-index: 2; }

        /* ── Hero ── */
        .artist-hero {
            padding: 130px 0 60px;
            position: relative;
        }
        .artist-hero-inner {
            display: flex;
            align-items: flex-end;
            gap: 40px;
        }
        .artist-avatar-wrap {
            flex-shrink: 0;
            position: relative;
        }
        .artist-avatar {
            width: 200px;
            height: 200px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid rgba(168,85,247,0.6);
            box-shadow: 0 0 0 6px rgba(168,85,247,0.12), 0 0 60px rgba(168,85,247,0.35);
            display: block;
        }
        .artist-avatar-ring {
            position: absolute;
            inset: -10px;
            border-radius: 50%;
            border: 2px solid transparent;
            background: conic-gradient(from 0deg, rgba(168,85,247,0.8), rgba(56,189,248,0.8), rgba(168,85,247,0.8)) border-box;
            -webkit-mask: linear-gradient(#fff 0 0) padding-box, linear-gradient(#fff 0 0);
            -webkit-mask-composite: destination-out;
            mask-composite: exclude;
            animation: ringRotate 4s linear infinite;
            opacity: 0;
            transition: opacity 0.5s;
        }
        .artist-avatar-wrap:hover .artist-avatar-ring { opacity: 1; }
        @keyframes ringRotate { to { transform: rotate(360deg); } }

        .artist-hero-info { flex: 1; min-width: 0; }
        .artist-hero-label {
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 3px;
            text-transform: uppercase;
            color: rgba(168,85,247,0.8);
            margin-bottom: 8px;
        }
        .artist-hero-name {
            font-size: clamp(2.2rem, 5vw, 4.5rem);
            font-weight: 900;
            line-height: 1.05;
            background: linear-gradient(135deg, #fff 30%, rgba(168,85,247,0.9) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 14px;
        }
        .artist-hero-genre {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 6px 18px;
            background: rgba(168,85,247,0.15);
            border: 1px solid rgba(168,85,247,0.35);
            border-radius: 50px;
            font-size: 12px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            color: rgba(168,85,247,0.95);
            margin-bottom: 22px;
        }
        .artist-hero-stats {
            display: flex;
            gap: 32px;
            flex-wrap: wrap;
        }
        .hero-stat { text-align: left; }
        .hero-stat-val {
            font-size: 1.5rem;
            font-weight: 800;
            color: #fff;
            line-height: 1;
        }
        .hero-stat-label {
            font-size: 10px;
            font-weight: 600;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            color: rgba(255,255,255,0.4);
            margin-top: 4px;
        }
        .hero-divider {
            width: 1px;
            height: 40px;
            background: rgba(255,255,255,0.12);
            align-self: center;
        }

        /* ── Divider line ── */
        .section-divider {
            height: 1px;
            background: linear-gradient(90deg, transparent, rgba(168,85,247,0.4), rgba(56,189,248,0.3), transparent);
            margin: 0 0 48px;
        }

        /* ── Info cards ── */
        .glass-card {
            background: rgba(255,255,255,0.03);
            border: 1px solid rgba(255,255,255,0.07);
            border-radius: 20px;
            padding: 28px;
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            transition: border-color 0.3s, box-shadow 0.3s;
        }
        .glass-card:hover {
            border-color: rgba(168,85,247,0.2);
            box-shadow: 0 8px 40px rgba(168,85,247,0.08);
        }
        .card-section-title {
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 3px;
            text-transform: uppercase;
            color: rgba(56,189,248,0.7);
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .card-section-title::after {
            content: '';
            flex: 1;
            height: 1px;
            background: rgba(56,189,248,0.15);
        }
        .info-row {
            display: flex;
            align-items: flex-start;
            gap: 14px;
            padding: 12px 0;
            border-bottom: 1px solid rgba(255,255,255,0.05);
        }
        .info-row:last-child { border-bottom: none; }
        .info-icon {
            width: 34px;
            height: 34px;
            border-radius: 10px;
            background: rgba(168,85,247,0.1);
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            font-size: 13px;
            color: rgba(168,85,247,0.8);
        }
        .info-label { font-size: 10px; font-weight: 600; letter-spacing: 1.2px; text-transform: uppercase; color: rgba(255,255,255,0.35); }
        .info-value { font-size: 0.95rem; font-weight: 500; color: rgba(255,255,255,0.85); margin-top: 2px; }

        /* ── Discography tiles ── */
        .discography-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(180px, 1fr));
            gap: 16px;
        }
        .track-tile {
            background: rgba(255,255,255,0.03);
            border: 1px solid rgba(255,255,255,0.07);
            border-radius: 14px;
            overflow: hidden;
            cursor: pointer;
            transition: transform 0.25s, border-color 0.25s, box-shadow 0.25s;
            position: relative;
        }
        .track-tile:hover {
            transform: translateY(-4px);
            border-color: rgba(168,85,247,0.4);
            box-shadow: 0 12px 40px rgba(168,85,247,0.18);
        }
        .track-tile-thumb {
            width: 100%;
            aspect-ratio: 1/1;
            object-fit: cover;
            display: block;
        }
        .track-tile-thumb-placeholder {
            width: 100%;
            aspect-ratio: 1/1;
            background: linear-gradient(135deg, rgba(168,85,247,0.2), rgba(56,189,248,0.1));
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .track-tile-thumb-placeholder i { font-size: 2rem; color: rgba(168,85,247,0.4); }
        .track-tile-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(to top, rgba(0,0,0,0.85) 0%, transparent 60%);
            opacity: 0;
            transition: opacity 0.25s;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .track-tile:hover .track-tile-overlay { opacity: 1; }
        .track-play-btn {
            width: 48px;
            height: 48px;
            border-radius: 50%;
            background: rgba(168,85,247,0.9);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 16px;
            color: #fff;
            box-shadow: 0 0 20px rgba(168,85,247,0.6);
            transition: transform 0.2s;
        }
        .track-play-btn:hover { transform: scale(1.1); }
        .track-tile-info {
            padding: 12px 14px;
        }
        .track-tile-name {
            font-size: 13px;
            font-weight: 700;
            color: #fff;
            margin: 0 0 4px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
        .track-tile-genre {
            font-size: 11px;
            color: rgba(168,85,247,0.75);
            font-weight: 600;
        }
        .track-tile-top-bar {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: linear-gradient(90deg, rgba(168,85,247,0.9), rgba(56,189,248,0.9));
            transform: scaleX(0);
            transform-origin: left;
            transition: transform 0.3s;
        }
        .track-tile:hover .track-tile-top-bar { transform: scaleX(1); }

        /* ── Empty state ── */
        .empty-discography {
            text-align: center;
            padding: 60px 20px;
            color: rgba(255,255,255,0.25);
        }
        .empty-discography i { font-size: 3rem; margin-bottom: 16px; display: block; }

        /* ── Back button ── */
        .btn-back {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 10px 22px;
            background: rgba(255,255,255,0.05);
            border: 1px solid rgba(255,255,255,0.12);
            border-radius: 50px;
            color: rgba(255,255,255,0.7);
            font-size: 13px;
            font-weight: 600;
            text-decoration: none;
            transition: background 0.2s, border-color 0.2s, color 0.2s;
        }
        .btn-back:hover {
            background: rgba(168,85,247,0.12);
            border-color: rgba(168,85,247,0.4);
            color: #fff;
        }

        /* ── Responsive ── */
        @media (max-width: 768px) {
            .artist-hero-inner { flex-direction: column; align-items: center; text-align: center; gap: 24px; }
            .artist-hero-stats { justify-content: center; }
            .artist-hero-name { font-size: 2.2rem; }
            .artist-avatar { width: 150px; height: 150px; }
            .discography-grid { grid-template-columns: repeat(auto-fill, minmax(140px, 1fr)); }
        }
    </style>
</head>
<body>
    <!-- Blurred artist background -->
    <div class="artist-bg-layer"></div>
    <div class="artist-bg-tint"></div>
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
                    <li class="nav-item"><a class="nav-link active" href="{{ route('artists') }}">Artists</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('musics') }}">Music</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('details') }}">About</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="page-content">

        <!-- Hero -->
        <section class="artist-hero">
            <div class="container">
                <div class="artist-hero-inner">
                    <div class="artist-avatar-wrap">
                        <img src="/artist-profile-images/{{ $artist->image }}"
                             class="artist-avatar"
                             alt="{{ $artist->artistname }}"
                             onerror="this.src='{{ asset('images/TentacitV1.1.png') }}'">
                        <div class="artist-avatar-ring"></div>
                    </div>
                    <div class="artist-hero-info">
                        <div class="artist-hero-label">Artist Profile</div>
                        <h1 class="artist-hero-name">{{ $artist->artistname }}</h1>
                        @php $genres = array_map('trim', explode(',', $artist->genre)); @endphp
                        <div style="display:flex; flex-wrap:wrap; gap:8px; margin-bottom:22px;">
                            @foreach($genres as $g)
                            <div class="artist-hero-genre" style="margin-bottom:0;">
                                <i class="fas fa-music" style="font-size:10px;"></i>
                                {{ $g }}
                            </div>
                            @endforeach
                        </div>
                        <div class="artist-hero-stats">
                            <div class="hero-stat">
                                <div class="hero-stat-val">{{ $artist->song ? $artist->song->count() : 0 }}</div>
                                <div class="hero-stat-label">Tracks</div>
                            </div>
                            @if($artist->dateregistered)
                            <div class="hero-divider"></div>
                            <div class="hero-stat">
                                <div class="hero-stat-val">{{ substr($artist->dateregistered, -4) }}</div>
                                <div class="hero-stat-label">Activation</div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Main content -->
        <section class="pb-5">
            <div class="container">
                <div class="section-divider"></div>

                <div class="row g-4">
                    <!-- Left: Artist Info -->
                    <div class="col-lg-4">
                        <div class="glass-card h-100">
                            <div class="card-section-title">Artist Info</div>

                            <div class="info-row">
                                <div class="info-icon"><i class="fas fa-id-badge"></i></div>
                                <div>
                                    <div class="info-label">Artist</div>
                                    <div class="info-value">{{ $artist->artistname ?? '—' }}</div>
                                </div>
                            </div>

                            <div class="info-row">
                                <div class="info-icon"><i class="fas fa-map-pin"></i></div>
                                <div>
                                    <div class="info-label">Root Vibe</div>
                                    <div class="info-value">{{ $artist->nationality ?? '—' }}</div>
                                </div>
                            </div>

                            <div class="info-row">
                                <div class="info-icon"><i class="fas fa-broadcast-tower"></i></div>
                                <div>
                                    <div class="info-label">Resonance Point</div>
                                    <div class="info-value">{{ $artist->address ?? '—' }}</div>
                                </div>
                            </div>

                            <div class="info-row">
                                <div class="info-icon"><i class="fas fa-fingerprint"></i></div>
                                <div>
                                    <div class="info-label">Spectral Style</div>
                                    <div class="info-value">{{ $artist->realname ?? '—' }}</div>
                                </div>
                            </div>

                            <div class="info-row">
                                <div class="info-icon"><i class="fas fa-bolt"></i></div>
                                <div>
                                    <div class="info-label">Activation</div>
                                    <div class="info-value">{{ $artist->dateregistered ?? '—' }}</div>
                                </div>
                            </div>

                            <div class="info-row" style="border-bottom:none;">
                                <div class="info-icon"><i class="fas fa-wave-square"></i></div>
                                <div style="flex:1;">
                                    <div class="info-label" style="margin-bottom:8px;">Frequencies</div>
                                    @php $genres = array_map('trim', explode(',', $artist->genre)); @endphp
                                    <div style="display:flex; flex-wrap:wrap; gap:6px;">
                                        @foreach($genres as $g)
                                        <span style="display:inline-flex; align-items:center; gap:5px; padding:4px 12px; background:rgba(168,85,247,0.12); border:1px solid rgba(168,85,247,0.3); border-radius:50px; font-size:11px; font-weight:600; letter-spacing:1px; color:rgba(168,85,247,0.9);">{{ $g }}</span>
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                            <div class="mt-4">
                                <a href="{{ route('artists') }}" class="btn-back">
                                    <i class="fas fa-arrow-left"></i> All Artists
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Right: Discography -->
                    <div class="col-lg-8">
                        <div class="glass-card">
                            <div class="card-section-title">
                                Discography
                                @if($artist->song && $artist->song->count() > 0)
                                    <span style="font-size:12px; letter-spacing:0; text-transform:none; color:rgba(255,255,255,0.3); font-weight:500;">
                                        {{ $artist->song->count() }} {{ $artist->song->count() === 1 ? 'track' : 'tracks' }}
                                    </span>
                                @endif
                            </div>

                            @if($artist->song && $artist->song->count() > 0)
                                <div class="discography-grid">
                                    @foreach($artist->song as $track)
                                    <a href="{{ route('song_info', $track['id']) }}" class="track-tile text-decoration-none">
                                        <div class="track-tile-top-bar"></div>
                                        @if($track->image)
                                            <img src="/song-images/{{ $track->image }}"
                                                 class="track-tile-thumb"
                                                 alt="{{ $track->songname }}"
                                                 onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                            <div class="track-tile-thumb-placeholder" style="display:none;">
                                                <i class="fas fa-music"></i>
                                            </div>
                                        @else
                                            <div class="track-tile-thumb-placeholder">
                                                <i class="fas fa-music"></i>
                                            </div>
                                        @endif
                                        <div class="track-tile-overlay">
                                            <div class="track-play-btn">
                                                <i class="fas fa-play" style="margin-left:3px;"></i>
                                            </div>
                                        </div>
                                        <div class="track-tile-info">
                                            <div class="track-tile-name" title="{{ $track->songname }}">{{ $track->songname }}</div>
                                            <div class="track-tile-genre">{{ $track->genre }}</div>
                                        </div>
                                    </a>
                                    @endforeach
                                </div>
                            @else
                                <div class="empty-discography">
                                    <i class="fas fa-compact-disc"></i>
                                    No tracks available yet.
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Footer -->
        <footer class="site-footer">
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
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
