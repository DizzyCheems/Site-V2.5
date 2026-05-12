<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tentacit Records | Music Library</title>

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
            background: rgba(56, 189, 248, 0.08);
            border: 1px solid rgba(56, 189, 248, 0.2);
            border-radius: 50px;
            font-size: 10px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 2.5px;
            color: var(--neon-blue);
            margin-bottom: 22px;
        }

        .page-hero h1 {
            font-size: 4.5rem;
            font-weight: 900;
            background: linear-gradient(135deg, #fff 10%, var(--neon-blue) 50%, var(--neon-cyan) 90%);
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
        }

        .page-hero-bar {
            width: 80px;
            height: 2px;
            background: linear-gradient(90deg, var(--neon-blue), var(--neon-cyan), transparent);
            margin: 22px auto 0;
            border-radius: 2px;
            box-shadow: 0 0 16px rgba(56,189,248,0.4);
        }

        /* ============================================
           FILTER BAR
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
            color: rgba(56, 189, 248, 0.5);
            font-size: 14px;
            pointer-events: none;
        }

        #songSearch {
            width: 100%;
            background: rgba(10, 10, 20, 0.7);
            border: 1px solid rgba(56, 189, 248, 0.2);
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

        #songSearch::placeholder { color: rgba(255,255,255,0.2); }

        #songSearch:focus {
            border-color: rgba(56, 189, 248, 0.5);
            box-shadow: 0 0 25px rgba(56, 189, 248, 0.1);
        }

        /* ============================================
           MUSIC TILE GALLERY
           ============================================ */
        .music-gallery {
            padding: 0 0 120px;
            position: relative;
            z-index: 1;
        }

        .music-tile-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 18px;
        }

        .song-tile {
            position: relative;
            border-radius: 14px;
            overflow: hidden;
            aspect-ratio: 1;
            cursor: pointer;
            background: rgba(10,10,20,0.7);
            border: 1px solid rgba(255,255,255,0.06);
            transition: all 0.35s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }

        .song-tile:hover {
            transform: translateY(-8px) scale(1.02);
            border-color: rgba(56, 189, 248, 0.3);
            box-shadow: 0 20px 50px rgba(0,0,0,0.5), 0 0 40px rgba(56, 189, 248, 0.08);
        }

        .song-tile.playing {
            border-color: rgba(168, 85, 247, 0.5);
            box-shadow: 0 0 50px rgba(168, 85, 247, 0.15);
        }

        /* Album art */
        .song-tile-img {
            position: absolute;
            inset: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .song-tile:hover .song-tile-img,
        .song-tile.playing .song-tile-img {
            transform: scale(1.06);
        }

        /* Gradient overlay */
        .song-tile-gradient {
            position: absolute;
            inset: 0;
            background: linear-gradient(
                180deg,
                transparent 20%,
                rgba(5, 5, 15, 0.5) 60%,
                rgba(5, 5, 15, 0.96) 100%
            );
        }

        /* Hover overlay */
        .song-tile-overlay {
            position: absolute;
            inset: 0;
            background: rgba(5, 5, 15, 0.55);
            opacity: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: opacity 0.3s;
        }

        .song-tile:hover .song-tile-overlay { opacity: 1; }

        /* Play button */
        .song-tile-play {
            width: 56px; height: 56px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--neon-purple), var(--neon-blue));
            border: none;
            color: #fff;
            font-size: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            box-shadow: 0 0 50px rgba(168, 85, 247, 0.6);
            transform: scale(0.8);
            transition: transform 0.3s;
        }

        .song-tile:hover .song-tile-play { transform: scale(1); }

        /* Top left: neon bar for playing state */
        .song-tile-playing-bar {
            position: absolute;
            top: 0; left: 0; right: 0;
            height: 3px;
            background: linear-gradient(90deg, transparent, var(--neon-purple), var(--neon-blue), transparent);
            opacity: 0;
            transition: opacity 0.3s;
        }

        .song-tile.playing .song-tile-playing-bar { opacity: 1; }

        /* NEW badge */
        .song-tile-badge {
            position: absolute;
            top: 12px; left: 12px;
            padding: 3px 10px;
            background: rgba(168, 85, 247, 0.85);
            backdrop-filter: blur(8px);
            border-radius: 50px;
            font-size: 9px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            color: #fff;
        }

        /* Mini equalizer bars when playing */
        .song-tile-eq {
            position: absolute;
            top: 12px; right: 12px;
            display: flex;
            align-items: flex-end;
            gap: 2px;
            height: 18px;
            opacity: 0;
            transition: opacity 0.3s;
        }

        .song-tile.playing .song-tile-eq { opacity: 1; }

        .song-tile-eq span {
            width: 3px;
            border-radius: 2px;
            background: var(--neon-cyan);
            animation: eqBar 0.8s ease-in-out infinite;
        }

        .song-tile-eq span:nth-child(1) { height: 6px; animation-delay: 0s; }
        .song-tile-eq span:nth-child(2) { height: 14px; animation-delay: 0.15s; }
        .song-tile-eq span:nth-child(3) { height: 10px; animation-delay: 0.3s; }
        .song-tile-eq span:nth-child(4) { height: 16px; animation-delay: 0.1s; }

        @keyframes eqBar {
            0%, 100% { transform: scaleY(0.4); }
            50% { transform: scaleY(1); }
        }

        /* Info at bottom */
        .song-tile-info {
            position: absolute;
            bottom: 0; left: 0; right: 0;
            padding: 16px 14px;
            z-index: 2;
        }

        .song-tile-genre {
            font-size: 9px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 2px;
            color: var(--neon-cyan);
            margin-bottom: 4px;
            display: block;
        }

        .song-tile-title {
            color: #fff;
            font-size: 14px;
            font-weight: 800;
            margin: 0 0 3px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .song-tile-artist {
            color: rgba(255,255,255,0.38);
            font-size: 11px;
            margin: 0;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        /* Empty state */
        .empty-state {
            grid-column: 1 / -1;
            text-align: center;
            padding: 80px 0;
        }

        /* ============================================
           FULLSCREEN PLAYER OVERLAY
           ============================================ */
        .player-overlay {
            display: none;
            position: fixed;
            inset: 0;
            background: rgba(4, 4, 12, 0.97);
            backdrop-filter: blur(40px);
            z-index: 10000;
            justify-content: center;
            align-items: center;
            animation: fadeOverlay 0.35s ease;
        }

        .player-overlay.active { display: flex; }

        @keyframes fadeOverlay {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        /* Background glow blobs */
        .player-overlay::before {
            content: '';
            position: absolute;
            width: 500px; height: 500px;
            border-radius: 50%;
            background: rgba(168, 85, 247, 0.07);
            filter: blur(100px);
            top: -10%; left: -10%;
            pointer-events: none;
        }

        .player-overlay::after {
            content: '';
            position: absolute;
            width: 400px; height: 400px;
            border-radius: 50%;
            background: rgba(56, 189, 248, 0.06);
            filter: blur(80px);
            bottom: -10%; right: -10%;
            pointer-events: none;
        }

        .player-modal {
            position: relative;
            width: 100%;
            max-width: 480px;
            padding: 50px 36px 40px;
            text-align: center;
            z-index: 1;
        }

        /* Top bar buttons */
        .player-topbar {
            position: absolute;
            top: 16px; right: 20px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .player-top-btn {
            width: 36px; height: 36px;
            border-radius: 50%;
            background: rgba(255,255,255,0.05);
            border: 1px solid rgba(255,255,255,0.08);
            color: rgba(255,255,255,0.4);
            font-size: 14px;
            cursor: pointer;
            transition: all 0.25s;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .player-top-btn:hover {
            background: rgba(168, 85, 247, 0.15);
            border-color: rgba(168, 85, 247, 0.3);
            color: #fff;
        }

        .player-top-btn.close-btn:hover {
            background: rgba(255, 60, 60, 0.15);
            border-color: rgba(255, 60, 60, 0.3);
            color: #ff6b6b;
        }

        /* Track counter */
        .player-track-counter {
            position: absolute;
            top: 22px; left: 36px;
            font-size: 11px;
            font-weight: 600;
            color: rgba(255,255,255,0.25);
            letter-spacing: 2px;
        }

        /* Artwork */
        .player-artwork-wrap {
            position: relative;
            width: 220px;
            height: 220px;
            margin: 0 auto 28px;
        }

        /* Spinning ring when playing */
        .player-artwork-ring {
            position: absolute;
            inset: -6px;
            border-radius: 50%;
            border: 2px solid transparent;
            background: conic-gradient(from 0deg, var(--neon-purple), var(--neon-blue), var(--neon-cyan), var(--neon-purple)) border-box;
            -webkit-mask: linear-gradient(#fff 0 0) padding-box, linear-gradient(#fff 0 0);
            -webkit-mask-composite: destination-out;
            mask-composite: exclude;
            opacity: 0;
            transition: opacity 0.4s;
        }

        .player-overlay.playing .player-artwork-ring {
            opacity: 1;
            animation: spinRing 4s linear infinite;
        }

        @keyframes spinRing {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }

        .player-artwork {
            width: 220px;
            height: 220px;
            border-radius: 18px;
            object-fit: cover;
            display: block;
            border: 2px solid rgba(168, 85, 247, 0.2);
            box-shadow: 0 20px 70px rgba(0,0,0,0.6), 0 0 60px rgba(168, 85, 247, 0.15);
            transition: all 0.4s;
        }

        .player-overlay.playing .player-artwork {
            box-shadow: 0 20px 80px rgba(0,0,0,0.7), 0 0 80px rgba(168, 85, 247, 0.25);
        }

        /* Track info */
        .player-track-info {
            margin-bottom: 20px;
        }

        .player-title {
            font-size: 1.6rem;
            font-weight: 900;
            color: #fff;
            margin-bottom: 4px;
            line-height: 1.2;
        }

        .player-artist {
            font-size: 13px;
            font-weight: 600;
            color: var(--neon-purple);
            letter-spacing: 1px;
        }

        /* ============================================
           SPECTROGRAM CANVAS
           ============================================ */
        #spectrogramCanvas {
            width: 100%;
            height: 80px;
            border-radius: 10px;
            background: rgba(5, 5, 15, 0.6);
            border: 1px solid rgba(168, 85, 247, 0.1);
            margin-bottom: 18px;
            display: block;
        }

        /* ============================================
           PROGRESS BAR
           ============================================ */
        .progress-wrap {
            margin-bottom: 8px;
            user-select: none;
        }

        .progress-track {
            width: 100%;
            height: 4px;
            background: rgba(255,255,255,0.1);
            border-radius: 10px;
            cursor: pointer;
            position: relative;
            transition: height 0.15s;
        }

        .progress-track:hover { height: 6px; }

        .progress-fill {
            width: 0%;
            height: 100%;
            background: linear-gradient(90deg, var(--neon-purple), var(--neon-blue));
            border-radius: 10px;
            position: relative;
            transition: width 0.1s linear;
        }

        .progress-thumb {
            position: absolute;
            right: -6px;
            top: 50%;
            transform: translateY(-50%);
            width: 12px; height: 12px;
            border-radius: 50%;
            background: #fff;
            opacity: 0;
            transition: opacity 0.2s;
            box-shadow: 0 0 12px var(--neon-purple);
        }

        .progress-track:hover .progress-thumb { opacity: 1; }

        .time-row {
            display: flex;
            justify-content: space-between;
            color: rgba(255,255,255,0.3);
            font-size: 11px;
            font-weight: 600;
            letter-spacing: 0.5px;
            margin-top: 6px;
        }

        /* ============================================
           PLAYER CONTROLS
           ============================================ */
        .player-controls {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 12px;
            margin: 16px 0 12px;
        }

        .ctrl-btn {
            background: none;
            border: none;
            color: rgba(255,255,255,0.45);
            cursor: pointer;
            transition: all 0.25s;
            width: 42px; height: 42px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
        }

        .ctrl-btn:hover {
            color: #fff;
            background: rgba(255,255,255,0.06);
        }

        .ctrl-btn.skip-btn {
            font-size: 20px;
        }

        .ctrl-btn.skip-btn:hover {
            color: var(--neon-blue);
            background: rgba(56, 189, 248, 0.08);
        }

        .ctrl-btn-play {
            width: 64px; height: 64px;
            border-radius: 50%;
            font-size: 24px;
            background: linear-gradient(135deg, var(--neon-purple), var(--neon-blue));
            color: #fff;
            box-shadow: 0 0 40px rgba(168, 85, 247, 0.35);
            border: none;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s;
        }

        .ctrl-btn-play:hover {
            transform: scale(1.1);
            box-shadow: 0 0 60px rgba(168, 85, 247, 0.55);
        }

        /* Shuffle / repeat */
        .ctrl-btn.mode-btn {
            font-size: 14px;
            color: rgba(255,255,255,0.25);
        }

        .ctrl-btn.mode-btn.on {
            color: var(--neon-cyan);
        }

        /* Volume */
        .volume-row {
            display: flex;
            align-items: center;
            gap: 10px;
            justify-content: center;
            margin-top: 4px;
        }

        .volume-row i {
            color: rgba(255,255,255,0.3);
            font-size: 13px;
            width: 16px;
        }

        .vol-slider {
            width: 110px;
            height: 3px;
            -webkit-appearance: none;
            appearance: none;
            background: rgba(255,255,255,0.12);
            border-radius: 10px;
            outline: none;
            cursor: pointer;
        }

        .vol-slider::-webkit-slider-thumb {
            -webkit-appearance: none;
            width: 12px; height: 12px;
            border-radius: 50%;
            background: var(--neon-purple);
            cursor: pointer;
            box-shadow: 0 0 10px rgba(168, 85, 247, 0.5);
        }

        /* ============================================
           MINI PLAYER
           ============================================ */
        .mini-player {
            display: none;
            position: fixed;
            bottom: 0; left: 0; right: 0;
            background: rgba(6, 6, 18, 0.97);
            backdrop-filter: blur(24px);
            border-top: 1px solid rgba(168, 85, 247, 0.2);
            z-index: 9999;
            animation: slideUpMini 0.3s ease;
        }

        .mini-player.active { display: block; }

        @keyframes slideUpMini {
            from { transform: translateY(100%); }
            to { transform: translateY(0); }
        }

        /* Mini progress line */
        .mini-prog-line {
            position: absolute;
            top: 0; left: 0; right: 0;
            height: 2px;
            background: rgba(255,255,255,0.06);
            cursor: pointer;
        }

        .mini-prog-fill {
            height: 100%;
            width: 0%;
            background: linear-gradient(90deg, var(--neon-purple), var(--neon-blue));
            transition: width 0.1s linear;
        }

        .mini-inner {
            display: flex;
            align-items: center;
            padding: 10px 20px;
            gap: 14px;
        }

        .mini-art {
            width: 46px; height: 46px;
            border-radius: 10px;
            object-fit: cover;
            border: 1px solid rgba(168, 85, 247, 0.25);
            flex-shrink: 0;
            cursor: pointer;
            transition: border-color 0.3s;
        }

        .mini-art:hover { border-color: var(--neon-purple); }

        .mini-info {
            flex: 1;
            min-width: 0;
            cursor: pointer;
        }

        .mini-title {
            color: #fff;
            font-size: 13px;
            font-weight: 700;
            margin: 0;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .mini-artist {
            color: var(--neon-purple);
            font-size: 11px;
            margin: 0;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .mini-controls {
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .mini-btn {
            background: none;
            border: none;
            color: rgba(255,255,255,0.55);
            font-size: 17px;
            cursor: pointer;
            width: 36px; height: 36px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.25s;
        }

        .mini-btn:hover { color: #fff; background: rgba(255,255,255,0.06); }

        .mini-btn.play-mini {
            background: linear-gradient(135deg, var(--neon-purple), var(--neon-blue));
            color: #fff;
            font-size: 15px;
            width: 40px; height: 40px;
        }

        .mini-btn.play-mini:hover {
            transform: scale(1.08);
            box-shadow: 0 0 20px rgba(168, 85, 247, 0.4);
            background: linear-gradient(135deg, var(--neon-purple), var(--neon-blue));
            color: #fff;
        }

        .mini-btn.close-mini { font-size: 20px; color: rgba(255,255,255,0.2); }
        .mini-btn.close-mini:hover { color: #ff6b6b; background: rgba(255,60,60,0.08); }

        body.has-mini { padding-bottom: 70px; }

        /* ============================================
           RESPONSIVE
           ============================================ */
        @media (max-width: 1200px) {
            .music-tile-grid { grid-template-columns: repeat(3, 1fr); }
        }

        @media (max-width: 900px) {
            .music-tile-grid { grid-template-columns: repeat(2, 1fr); gap: 14px; }
            .page-hero h1 { font-size: 3rem; letter-spacing: 4px; }
        }

        @media (max-width: 600px) {
            .music-tile-grid { grid-template-columns: repeat(2, 1fr); gap: 10px; }
            .page-hero h1 { font-size: 2.2rem; letter-spacing: 2px; }
            .player-modal { padding: 40px 20px 30px; }
            .player-artwork, .player-artwork-wrap { width: 170px; height: 170px; }
            .player-title { font-size: 1.2rem; }
            #spectrogramCanvas { height: 60px; }
        }
    </style>
</head>
<body>
    <!-- Page Background Image -->
    <div class="page-bg-wrap">
        <img src="{{ asset('assets/bg-images/bg-5.jpg') }}" class="page-bg-img" alt="">
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
                    <li class="nav-item"><a class="nav-link active" href="{{ route('musics') }}">Music</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('artists') }}">Artists</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('details') }}">About</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero -->
    <section class="page-hero">
        <div class="container">
            <div class="page-hero-eyebrow animate__animated animate__fadeInDown">
                <i class="fas fa-headphones"></i> Catalog
            </div>
            <h1 class="animate__animated animate__fadeInUp">Music Library</h1>
            <p class="animate__animated animate__fadeInUp animate__delay-1s">Browse our full catalog of tracks</p>
            <div class="page-hero-bar"></div>
        </div>
    </section>

    <!-- Filter bar -->
    <div class="filter-bar">
        <div class="container">
            <div class="filter-input-wrap">
                <i class="fas fa-search"></i>
                <input type="text" id="songSearch" placeholder="Search tracks, artists..." autocomplete="off">
            </div>
        </div>
    </div>

    <!-- Music Tile Gallery -->
    <section class="music-gallery">
        <div class="container">
            <div class="music-tile-grid" id="songGrid">
                @forelse($song as $i => $s)
                <div class="song-tile"
                     data-index="{{ $i }}"
                     data-title="{{ strtolower($s->songname) }}"
                     data-artist-name="{{ strtolower($s->author) }}"
                     data-song="{{ $s->songname }}"
                     data-artist="{{ $s->author }}"
                     data-img="/song-images/{{ $s->image }}"
                     data-audio="{{ (str_starts_with($s->audio ?? '', '/') ? $s->audio : '/succesor/songs/' . $s->audio) }}"
                     onclick="openPlayer(this)">

                    <div class="song-tile-playing-bar"></div>

                    <img class="song-tile-img"
                         src="/song-images/{{ $s->image }}"
                         alt="{{ $s->songname }}"
                         onerror="this.src='{{ asset('images/TentacitV1.1.png') }}'">

                    <div class="song-tile-gradient"></div>

                    <div class="song-tile-overlay">
                        <div class="song-tile-play"><i class="fas fa-play" style="margin-left:3px;"></i></div>
                    </div>

                    @if($i < 3)
                    <div class="song-tile-badge">New</div>
                    @endif

                    <div class="song-tile-eq">
                        <span></span><span></span><span></span><span></span>
                    </div>

                    <div class="song-tile-info">
                        @if($s->genre)
                        <span class="song-tile-genre">{{ $s->genre }}</span>
                        @endif
                        <p class="song-tile-title">{{ $s->songname }}</p>
                        <p class="song-tile-artist">{{ $s->author }}</p>
                    </div>
                </div>
                @empty
                <div class="empty-state">
                    <div style="font-size:3.5rem;color:rgba(56,189,248,0.3);margin-bottom:18px;">
                        <i class="fas fa-music"></i>
                    </div>
                    <h3 style="color:#fff;font-weight:700;margin-bottom:8px;">No Tracks Yet</h3>
                    <p style="color:var(--text-muted);font-size:14px;">Music will appear here once added.</p>
                </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- FULLSCREEN PLAYER -->
    <div id="playerOverlay" class="player-overlay">
        <div class="player-modal">

            <span class="player-track-counter" id="trackCounter">1 / 1</span>

            <div class="player-topbar">
                <button class="player-top-btn" onclick="minimizePlayer()" title="Minimize">
                    <i class="fas fa-compress-alt"></i>
                </button>
                <button class="player-top-btn close-btn" onclick="closePlayer()" title="Close">
                    <i class="fas fa-times"></i>
                </button>
            </div>

            <!-- Artwork -->
            <div class="player-artwork-wrap">
                <div class="player-artwork-ring" id="artworkRing"></div>
                <img id="playerArtwork" class="player-artwork" src="" alt="Album Art">
            </div>

            <!-- Track info -->
            <div class="player-track-info">
                <div class="player-title" id="playerTitle">No Track</div>
                <div class="player-artist" id="playerArtist">-</div>
            </div>

            <!-- Spectrogram -->
            <canvas id="spectrogramCanvas"></canvas>

            <!-- Progress -->
            <div class="progress-wrap">
                <div class="progress-track" id="progressTrack" onclick="seekAudio(event)">
                    <div class="progress-fill" id="progressFill">
                        <div class="progress-thumb"></div>
                    </div>
                </div>
                <div class="time-row">
                    <span id="currentTime">0:00</span>
                    <span id="duration">0:00</span>
                </div>
            </div>

            <!-- Controls -->
            <div class="player-controls">
                <button class="ctrl-btn mode-btn" id="shuffleBtn" onclick="toggleShuffle()" title="Shuffle">
                    <i class="fas fa-random"></i>
                </button>
                <button class="ctrl-btn skip-btn" onclick="prevTrack()" title="Previous">
                    <i class="fas fa-step-backward"></i>
                </button>
                <button class="ctrl-btn-play" id="mainPlayBtn" onclick="togglePlayPause()">
                    <i class="fas fa-play" id="playPauseIcon" style="margin-left:3px;"></i>
                </button>
                <button class="ctrl-btn skip-btn" onclick="nextTrack()" title="Next">
                    <i class="fas fa-step-forward"></i>
                </button>
                <button class="ctrl-btn mode-btn" id="repeatBtn" onclick="toggleRepeat()" title="Repeat">
                    <i class="fas fa-redo"></i>
                </button>
            </div>

            <!-- Volume -->
            <div class="volume-row">
                <i class="fas fa-volume-down"></i>
                <input type="range" class="vol-slider" id="volSlider" min="0" max="1" step="0.02" value="0.75">
                <i class="fas fa-volume-up"></i>
            </div>

            <audio id="mainAudio" preload="auto">
                <source id="audioSource" src="" type="audio/mpeg">
            </audio>
        </div>
    </div>

    <!-- MINI PLAYER -->
    <div id="miniPlayer" class="mini-player">
        <div class="mini-prog-line" onclick="seekMini(event)">
            <div class="mini-prog-fill" id="miniProgFill"></div>
        </div>
        <div class="mini-inner">
            <img id="miniArt" class="mini-art" src="" alt="" onclick="maximizePlayer()">
            <div class="mini-info" onclick="maximizePlayer()">
                <p class="mini-title" id="miniTitle">No Track</p>
                <p class="mini-artist" id="miniArtist">-</p>
            </div>
            <div class="mini-controls">
                <button class="mini-btn" onclick="prevTrack()"><i class="fas fa-step-backward"></i></button>
                <button class="mini-btn play-mini" onclick="togglePlayPause()">
                    <i class="fas fa-play" id="miniPlayIcon" style="margin-left:2px;"></i>
                </button>
                <button class="mini-btn" onclick="nextTrack()"><i class="fas fa-step-forward"></i></button>
                <button class="mini-btn close-mini" onclick="closePlayer()"><i class="fas fa-times"></i></button>
            </div>
        </div>
    </div>

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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
    // ============================================================
    //  STATE
    // ============================================================
    const audio        = document.getElementById('mainAudio');
    const canvas       = document.getElementById('spectrogramCanvas');
    const ctx2d        = canvas.getContext('2d');
    const overlay      = document.getElementById('playerOverlay');
    const miniPlayer   = document.getElementById('miniPlayer');

    let allTiles       = [];
    let currentIndex   = -1;
    let isPlaying      = false;
    let shuffleOn      = false;
    let repeatOn       = false;
    let animFrame      = null;
    let audioCtx       = null;
    let analyser       = null;
    let sourceNode     = null;

    function collectTiles() {
        allTiles = Array.from(document.querySelectorAll('.song-tile'));
    }
    collectTiles();

    function resizeCanvas() {
        canvas.width  = canvas.clientWidth  || 400;
        canvas.height = canvas.clientHeight || 80;
    }
    resizeCanvas();
    window.addEventListener('resize', resizeCanvas);

    // ============================================================
    //  AUDIO CONTEXT
    // ============================================================
    function setupAudioCtx() {
        if (!audioCtx) {
            audioCtx = new (window.AudioContext || window.webkitAudioContext)();
            analyser  = audioCtx.createAnalyser();
            analyser.fftSize = 512;
            connectSrc();
        }
        if (audioCtx.state === 'suspended') audioCtx.resume();
    }

    function connectSrc() {
        if (sourceNode) { try { sourceNode.disconnect(); } catch(e){} sourceNode = null; }
        try {
            sourceNode = audioCtx.createMediaElementSource(audio);
            sourceNode.connect(analyser);
            analyser.connect(audioCtx.destination);
        } catch(e) { console.warn('Audio ctx:', e); }
    }

    function teardownAudioCtx() {
        stopViz();
        if (sourceNode) { try { sourceNode.disconnect(); } catch(e){} sourceNode = null; }
        if (audioCtx) { audioCtx.close().catch(()=>{}); audioCtx = null; analyser = null; }
    }

    // ============================================================
    //  SPECTROGRAM VISUALIZER
    // ============================================================
    function drawViz() {
        if (!analyser) return;
        const binCount  = analyser.frequencyBinCount;
        const dataArr   = new Uint8Array(binCount);

        function draw() {
            animFrame = requestAnimationFrame(draw);
            analyser.getByteFrequencyData(dataArr);

            const W = canvas.width;
            const H = canvas.height;

            // Fade trail
            ctx2d.fillStyle = 'rgba(4, 4, 12, 0.45)';
            ctx2d.fillRect(0, 0, W, H);

            const barCount = Math.min(binCount, 100);
            const gap      = 2;
            const barW     = (W - (barCount - 1) * gap) / barCount;
            const baseY    = H * 0.72;

            ctx2d.shadowBlur = 0;

            for (let i = 0; i < barCount; i++) {
                const v        = dataArr[i] / 255;
                const barH     = v * baseY;
                const x        = i * (barW + gap);

                // Bar gradient: cyan bottom -> purple -> white tip
                const grad = ctx2d.createLinearGradient(x, baseY, x, baseY - barH);
                grad.addColorStop(0,   `rgba(56, 189, 248, ${0.5 + v * 0.5})`);
                grad.addColorStop(0.55, `rgba(168, 85, 247, ${0.7 + v * 0.3})`);
                grad.addColorStop(1,   `rgba(255, 255, 255, ${v > 0.7 ? 0.9 : 0.3})`);

                ctx2d.shadowBlur  = v > 0.5 ? 8 : 0;
                ctx2d.shadowColor = 'rgba(168, 85, 247, 0.6)';
                ctx2d.fillStyle   = grad;

                // Rounded top
                const r = Math.min(barW / 2, 2.5);
                ctx2d.beginPath();
                ctx2d.moveTo(x + r, baseY);
                ctx2d.lineTo(x + barW - r, baseY);
                ctx2d.arcTo(x + barW, baseY, x + barW, baseY - r, r);
                ctx2d.lineTo(x + barW, baseY - barH + r);
                ctx2d.arcTo(x + barW, baseY - barH, x + barW - r, baseY - barH, r);
                ctx2d.lineTo(x + r, baseY - barH);
                ctx2d.arcTo(x, baseY - barH, x, baseY - barH + r, r);
                ctx2d.lineTo(x, baseY);
                ctx2d.closePath();
                ctx2d.fill();

                // Reflection
                const reflH = barH * 0.3;
                const reflGrad = ctx2d.createLinearGradient(x, baseY, x, baseY + reflH);
                reflGrad.addColorStop(0, `rgba(56, 189, 248, ${v * 0.22})`);
                reflGrad.addColorStop(1, 'rgba(56, 189, 248, 0)');
                ctx2d.shadowBlur  = 0;
                ctx2d.fillStyle   = reflGrad;
                ctx2d.fillRect(x, baseY, barW, reflH);
            }

            // Base line
            ctx2d.shadowBlur    = 0;
            ctx2d.strokeStyle   = 'rgba(168, 85, 247, 0.25)';
            ctx2d.lineWidth     = 1;
            ctx2d.beginPath();
            ctx2d.moveTo(0, baseY);
            ctx2d.lineTo(W, baseY);
            ctx2d.stroke();
        }
        draw();
    }

    function stopViz() {
        if (animFrame) { cancelAnimationFrame(animFrame); animFrame = null; }
        ctx2d.clearRect(0, 0, canvas.width, canvas.height);
    }

    // ============================================================
    //  UI SYNC
    // ============================================================
    function setPlayingTile(index) {
        allTiles.forEach((t, i) => {
            t.classList.toggle('playing', i === index);
        });
    }

    function updateUI(tile) {
        const title  = tile.dataset.song;
        const artist = tile.dataset.artist;
        const img    = tile.dataset.img;
        const total  = allTiles.length;

        document.getElementById('playerTitle').textContent  = title;
        document.getElementById('playerArtist').textContent = artist;
        document.getElementById('playerArtwork').src        = img || '{{ asset("images/TentacitV1.1.png") }}';
        document.getElementById('miniTitle').textContent    = title;
        document.getElementById('miniArtist').textContent   = artist;
        document.getElementById('miniArt').src              = img || '{{ asset("images/TentacitV1.1.png") }}';
        document.getElementById('trackCounter').textContent = `${currentIndex + 1} / ${total}`;
    }

    function setPlayIcons(playing) {
        const icon = playing ? 'fa-pause' : 'fa-play';
        document.getElementById('playPauseIcon').className  = `fas ${icon}`;
        document.getElementById('miniPlayIcon').className   = `fas ${icon}`;
        overlay.classList.toggle('playing', playing);
    }

    // ============================================================
    //  OPEN / CLOSE / MINIMIZE
    // ============================================================
    function openPlayer(tile) {
        collectTiles();
        currentIndex = allTiles.indexOf(tile);

        updateUI(tile);
        setPlayingTile(currentIndex);

        overlay.classList.add('active');
        miniPlayer.classList.remove('active');
        document.body.classList.remove('has-mini');

        stopViz();
        teardownAudioCtx();

        document.getElementById('audioSource').src = tile.dataset.audio;
        audio.load();

        const onCanPlay = () => {
            audio.removeEventListener('canplay', onCanPlay);
            setupAudioCtx();
            audio.play().then(() => {
                isPlaying = true;
                setPlayIcons(true);
                drawViz();
            }).catch(e => console.log(e));
        };
        audio.addEventListener('canplay', onCanPlay, { once: true });
        if (audio.readyState >= 3) onCanPlay();
    }

    function closePlayer() {
        audio.pause();
        audio.currentTime = 0;
        isPlaying = false;
        setPlayIcons(false);
        setPlayingTile(-1);
        overlay.classList.remove('active', 'playing');
        miniPlayer.classList.remove('active');
        document.body.classList.remove('has-mini');
        teardownAudioCtx();
        document.getElementById('progressFill').style.width = '0%';
        document.getElementById('miniProgFill').style.width = '0%';
        document.getElementById('currentTime').textContent = '0:00';
        document.getElementById('duration').textContent    = '0:00';
    }

    function minimizePlayer() {
        overlay.classList.remove('active');
        miniPlayer.classList.add('active');
        document.body.classList.add('has-mini');
    }

    function maximizePlayer() {
        miniPlayer.classList.remove('active');
        document.body.classList.remove('has-mini');
        overlay.classList.add('active');
    }

    // ============================================================
    //  PLAYBACK
    // ============================================================
    function togglePlayPause() {
        if (!allTiles[currentIndex]) return;
        if (audio.paused) {
            setupAudioCtx();
            audio.play().then(() => { isPlaying = true; setPlayIcons(true); drawViz(); });
        } else {
            audio.pause();
            isPlaying = false;
            setPlayIcons(false);
            stopViz();
        }
    }

    function playByIndex(index) {
        if (index < 0 || index >= allTiles.length) return;
        openPlayer(allTiles[index]);
    }

    function prevTrack() {
        if (!allTiles.length) return;
        let idx = currentIndex - 1;
        if (idx < 0) idx = allTiles.length - 1;
        playByIndex(idx);
    }

    function nextTrack() {
        if (!allTiles.length) return;
        let idx;
        if (shuffleOn) {
            idx = Math.floor(Math.random() * allTiles.length);
        } else {
            idx = (currentIndex + 1) % allTiles.length;
        }
        playByIndex(idx);
    }

    // ============================================================
    //  AUDIO EVENTS
    // ============================================================
    audio.addEventListener('timeupdate', () => {
        if (!audio.duration) return;
        const pct = (audio.currentTime / audio.duration) * 100;
        document.getElementById('progressFill').style.width = pct + '%';
        document.getElementById('miniProgFill').style.width  = pct + '%';
        document.getElementById('currentTime').textContent  = fmt(audio.currentTime);
        document.getElementById('duration').textContent     = fmt(audio.duration);
    });

    audio.addEventListener('ended', () => {
        if (repeatOn) {
            audio.currentTime = 0;
            audio.play();
        } else {
            nextTrack();
        }
    });

    audio.addEventListener('play',  () => { isPlaying = true;  setPlayIcons(true);  });
    audio.addEventListener('pause', () => { isPlaying = false; setPlayIcons(false); stopViz(); });

    // ============================================================
    //  SEEKING
    // ============================================================
    function seekAudio(e) {
        const rect = document.getElementById('progressTrack').getBoundingClientRect();
        const pct  = Math.max(0, Math.min((e.clientX - rect.left) / rect.width, 1));
        if (audio.duration) audio.currentTime = pct * audio.duration;
    }

    function seekMini(e) {
        const rect = document.querySelector('.mini-prog-line').getBoundingClientRect();
        const pct  = Math.max(0, Math.min((e.clientX - rect.left) / rect.width, 1));
        if (audio.duration) audio.currentTime = pct * audio.duration;
    }

    // ============================================================
    //  VOLUME
    // ============================================================
    document.getElementById('volSlider').addEventListener('input', function() {
        audio.volume = parseFloat(this.value);
    });
    audio.volume = 0.75;

    // ============================================================
    //  SHUFFLE / REPEAT
    // ============================================================
    function toggleShuffle() {
        shuffleOn = !shuffleOn;
        document.getElementById('shuffleBtn').classList.toggle('on', shuffleOn);
    }

    function toggleRepeat() {
        repeatOn = !repeatOn;
        document.getElementById('repeatBtn').classList.toggle('on', repeatOn);
    }

    // ============================================================
    //  SEARCH / FILTER
    // ============================================================
    document.getElementById('songSearch').addEventListener('input', function() {
        const q = this.value.toLowerCase().trim();
        document.querySelectorAll('.song-tile').forEach(tile => {
            const t = (tile.dataset.title || '') + ' ' + (tile.dataset.artistName || '');
            tile.style.display = (!q || t.includes(q)) ? 'block' : 'none';
        });
    });

    // ============================================================
    //  HELPERS
    // ============================================================
    function fmt(s) {
        const m = Math.floor(s / 60);
        const sec = Math.floor(s % 60);
        return m + ':' + (sec < 10 ? '0' : '') + sec;
    }

    // ============================================================
    //  KEYBOARD SHORTCUTS
    // ============================================================
    document.addEventListener('keydown', (e) => {
        const active = overlay.classList.contains('active') || miniPlayer.classList.contains('active');
        if (!active) return;
        if (e.key === 'Escape')       closePlayer();
        if (e.key === ' ')            { e.preventDefault(); togglePlayPause(); }
        if (e.key === 'ArrowLeft')    { e.preventDefault(); audio.currentTime = Math.max(0, audio.currentTime - 5); }
        if (e.key === 'ArrowRight')   { e.preventDefault(); audio.currentTime = Math.min(audio.duration || 0, audio.currentTime + 5); }
        if (e.key === 'ArrowUp')      { e.preventDefault(); prevTrack(); }
        if (e.key === 'ArrowDown')    { e.preventDefault(); nextTrack(); }
    });

    // ============================================================
    //  STAGGER-IN TILES
    // ============================================================
    const tileObs = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                setTimeout(() => {
                    entry.target.style.opacity   = '1';
                    entry.target.style.transform = 'translateY(0) scale(1)';
                }, parseInt(entry.target.dataset.delay) || 0);
                tileObs.unobserve(entry.target);
            }
        });
    }, { threshold: 0.08 });

    document.querySelectorAll('.song-tile').forEach((tile, i) => {
        tile.style.opacity   = '0';
        tile.style.transform = 'translateY(28px) scale(0.97)';
        tile.style.transition = 'opacity 0.5s ease, transform 0.5s ease, border-color 0.35s, box-shadow 0.35s';
        tile.dataset.delay   = (i % 4) * 70;
        tileObs.observe(tile);
    });
    </script>
</body>
</html>
