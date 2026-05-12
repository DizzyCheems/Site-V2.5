<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tentacit Records | {{ $songs->songname ?? 'Song Details' }}</title>

    <link rel="icon" type="image/png" href="{{ asset('images/Tentacit Shape-0.png') }}">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="stylesheet" href="{{ asset('succesor/assets/css/tentacit.css') }}">

    <style>
        /* ============================================
           IMMERSIVE SONG BACKGROUND
           ============================================ */
        .song-bg-layer {
            position: fixed;
            inset: 0;
            z-index: 0;
            background-image: url('/song-images/{{ $songs->background_image ?? $songs->image }}');
            background-size: cover;
            background-position: center;
            filter: blur(50px) brightness(0.2) saturate(0.7);
            transform: scale(1.08);
            pointer-events: none;
        }

        /* Dark vignette over the bg */
        .song-bg-vignette {
            position: fixed;
            inset: 0;
            z-index: 0;
            background:
                radial-gradient(ellipse at center, transparent 20%, rgba(4,4,12,0.7) 100%),
                linear-gradient(180deg, rgba(4,4,12,0.5) 0%, transparent 30%, transparent 70%, rgba(4,4,12,0.8) 100%);
            pointer-events: none;
        }

        /* Neon color tint matching the page theme */
        .song-bg-tint {
            position: fixed;
            inset: 0;
            z-index: 0;
            background:
                radial-gradient(ellipse 60% 40% at 20% 50%, rgba(168,85,247,0.06), transparent),
                radial-gradient(ellipse 50% 40% at 80% 50%, rgba(56,189,248,0.05), transparent);
            pointer-events: none;
        }

        /* ============================================
           LAYOUT
           ============================================ */
        .song-page {
            min-height: 100vh;
            padding: 100px 0 80px;
            position: relative;
            z-index: 1;
            display: flex;
            align-items: center;
        }

        /* ============================================
           ALBUM ART
           ============================================ */
        .album-art-wrap {
            position: relative;
            display: inline-block;
            width: 100%;
            max-width: 360px;
        }

        /* Spinning ring when playing */
        .art-ring {
            position: absolute;
            inset: -8px;
            border-radius: 24px;
            border: 2px solid transparent;
            background: conic-gradient(from 0deg, var(--neon-purple), var(--neon-blue), var(--neon-cyan), transparent, var(--neon-purple)) border-box;
            -webkit-mask: linear-gradient(#fff 0 0) padding-box, linear-gradient(#fff 0 0);
            -webkit-mask-composite: destination-out;
            mask-composite: exclude;
            opacity: 0;
            transition: opacity 0.4s;
        }

        .art-ring.spinning {
            opacity: 1;
            animation: spinRing 5s linear infinite;
        }

        @keyframes spinRing {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }

        .album-art {
            width: 100%;
            max-width: 360px;
            aspect-ratio: 1;
            border-radius: 20px;
            object-fit: cover;
            border: 2px solid rgba(168, 85, 247, 0.25);
            box-shadow:
                0 30px 80px rgba(0,0,0,0.6),
                0 0 80px rgba(168,85,247,0.15);
            display: block;
            transition: box-shadow 0.4s;
        }

        .album-art.playing {
            box-shadow:
                0 30px 100px rgba(0,0,0,0.7),
                0 0 120px rgba(168,85,247,0.25);
        }

        /* Thumbnail mini inside art on mobile */
        .album-art-col {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        /* ============================================
           SONG INFO
           ============================================ */
        .song-info-col {
            padding-left: 20px;
        }

        .song-eyebrow {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            font-size: 10px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 3px;
            color: var(--neon-cyan);
            margin-bottom: 16px;
        }

        .song-genre-badge {
            display: inline-block;
            padding: 5px 16px;
            background: rgba(168,85,247,0.12);
            border: 1px solid rgba(168,85,247,0.25);
            border-radius: 50px;
            font-size: 10px;
            font-weight: 700;
            color: var(--neon-purple);
            text-transform: uppercase;
            letter-spacing: 1.5px;
            margin-bottom: 18px;
        }

        .song-title {
            font-size: 3.5rem;
            font-weight: 900;
            background: linear-gradient(135deg, #fff 20%, var(--neon-purple) 60%, var(--neon-blue) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            line-height: 1.05;
            margin-bottom: 10px;
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        .song-artist-link {
            font-size: 1.1rem;
            font-weight: 700;
            color: var(--neon-purple);
            text-decoration: none;
            letter-spacing: 1px;
            margin-bottom: 20px;
            display: inline-block;
            transition: color 0.3s;
        }

        .song-artist-link:hover { color: var(--neon-blue); }

        .song-meta-row {
            display: flex;
            gap: 30px;
            margin-bottom: 24px;
            flex-wrap: wrap;
        }

        .song-meta-item {}

        .song-meta-label {
            font-size: 9px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 2px;
            color: rgba(255,255,255,0.3);
            margin-bottom: 4px;
        }

        .song-meta-value {
            font-size: 14px;
            font-weight: 600;
            color: rgba(255,255,255,0.8);
        }

        .song-neon-divider {
            width: 100%;
            height: 1px;
            background: linear-gradient(90deg, rgba(168,85,247,0.4), rgba(56,189,248,0.2), transparent);
            margin-bottom: 24px;
        }

        /* ============================================
           INTEGRATED PLAYER
           ============================================ */
        .player-wrap {
            background: rgba(5,5,15,0.5);
            border: 1px solid rgba(168,85,247,0.12);
            border-radius: 18px;
            padding: 22px 22px 18px;
            backdrop-filter: blur(20px);
        }

        /* Spectrogram */
        #spectrogramCanvas {
            width: 100%;
            height: 70px;
            display: block;
            border-radius: 10px;
            background: rgba(5,5,15,0.5);
            border: 1px solid rgba(168,85,247,0.1);
            margin-bottom: 16px;
        }

        /* Progress */
        .prog-track {
            width: 100%;
            height: 4px;
            background: rgba(255,255,255,0.1);
            border-radius: 10px;
            cursor: pointer;
            position: relative;
            transition: height 0.15s;
            margin-bottom: 6px;
        }

        .prog-track:hover { height: 6px; }

        .prog-fill {
            width: 0%;
            height: 100%;
            background: linear-gradient(90deg, var(--neon-purple), var(--neon-blue));
            border-radius: 10px;
            position: relative;
            transition: width 0.1s linear;
        }

        .prog-thumb {
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

        .prog-track:hover .prog-thumb { opacity: 1; }

        .time-row {
            display: flex;
            justify-content: space-between;
            color: rgba(255,255,255,0.3);
            font-size: 11px;
            font-weight: 600;
            margin-bottom: 16px;
        }

        /* Controls */
        .player-controls {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 14px;
            margin-bottom: 14px;
        }

        .ctrl-btn {
            background: none;
            border: none;
            color: rgba(255,255,255,0.45);
            cursor: pointer;
            transition: all 0.25s;
            width: 40px; height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 17px;
        }

        .ctrl-btn:hover {
            color: #fff;
            background: rgba(255,255,255,0.06);
        }

        .ctrl-btn-play {
            width: 58px; height: 58px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--neon-purple), var(--neon-blue));
            color: #fff;
            font-size: 22px;
            border: none;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s;
            box-shadow: 0 0 40px rgba(168,85,247,0.4);
        }

        .ctrl-btn-play:hover {
            transform: scale(1.1);
            box-shadow: 0 0 60px rgba(168,85,247,0.6);
        }

        .ctrl-btn.mode-btn { font-size: 13px; color: rgba(255,255,255,0.25); }
        .ctrl-btn.mode-btn.on { color: var(--neon-cyan); }

        /* Volume */
        .vol-row {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .vol-row i { color: rgba(255,255,255,0.3); font-size: 12px; }

        .vol-slider {
            flex: 1;
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
            box-shadow: 0 0 8px rgba(168,85,247,0.5);
        }

        /* Back button */
        .back-btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            font-size: 11px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 2px;
            color: rgba(255,255,255,0.4);
            text-decoration: none;
            padding: 8px 18px;
            border: 1px solid rgba(255,255,255,0.1);
            border-radius: 50px;
            transition: all 0.3s;
            margin-top: 20px;
            backdrop-filter: blur(10px);
        }

        .back-btn:hover {
            color: #fff;
            border-color: rgba(168,85,247,0.4);
            background: rgba(168,85,247,0.08);
        }

        /* ============================================
           RESPONSIVE
           ============================================ */
        @media (max-width: 991px) {
            .song-page { padding: 120px 0 60px; align-items: flex-start; }
            .album-art-col { margin-bottom: 36px; }
            .song-info-col { padding-left: 0; }
            .song-title { font-size: 2.4rem; }
            .album-art-wrap, .album-art { max-width: 280px; }
        }

        @media (max-width: 576px) {
            .song-title { font-size: 1.8rem; letter-spacing: 1px; }
            .album-art-wrap, .album-art { max-width: 220px; }
        }
    </style>
</head>
<body>
    <!-- Immersive song background -->
    <div class="song-bg-layer"></div>
    <div class="song-bg-vignette"></div>
    <div class="song-bg-tint"></div>
    <div class="bg-grid"></div>

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

    <!-- Main Song Page -->
    <section class="song-page">
        <div class="container">
            <div class="row align-items-center gy-5">

                <!-- Album Art -->
                <div class="col-lg-5 col-md-6 album-art-col animate__animated animate__fadeInLeft">
                    <div class="album-art-wrap" id="artWrap">
                        <div class="art-ring" id="artRing"></div>
                        <img id="albumArt"
                             src="/song-images/{{ $songs->image }}"
                             class="album-art"
                             alt="{{ $songs->songname }}"
                             onerror="this.src='{{ asset('images/TentacitV1.1.png') }}'">
                    </div>
                </div>

                <!-- Song Info + Player -->
                <div class="col-lg-7 col-md-6 song-info-col animate__animated animate__fadeInRight">

                    <div class="song-eyebrow">
                        <i class="fas fa-headphones"></i> Now Playing
                    </div>

                    @if($songs->genre)
                    <div class="song-genre-badge">{{ $songs->genre }}</div>
                    @endif

                    <h1 class="song-title">{{ $songs->songname }}</h1>

                    @php
                        $artistId = null;
                        if(isset($songs->artist) && $songs->artist) {
                            $artistId = $songs->artist->id ?? null;
                        }
                    @endphp

                    @if($artistId)
                    <a href="{{ route('artist_info', $artistId) }}" class="song-artist-link">
                        <i class="fas fa-user me-1"></i>{{ $songs->author }}
                    </a>
                    @else
                    <span class="song-artist-link" style="cursor:default;">
                        <i class="fas fa-user me-1"></i>{{ $songs->author }}
                    </span>
                    @endif

                    <div class="song-meta-row">
                        @if($songs->album)
                        <div class="song-meta-item">
                            <div class="song-meta-label">Album</div>
                            <div class="song-meta-value">{{ $songs->album }}</div>
                        </div>
                        @endif
                        @if($songs->date_registered)
                        <div class="song-meta-item">
                            <div class="song-meta-label">Released</div>
                            <div class="song-meta-value">{{ $songs->date_registered }}</div>
                        </div>
                        @endif
                    </div>

                    <div class="song-neon-divider"></div>

                    <!-- Integrated Player -->
                    <div class="player-wrap">
                        <!-- Spectrogram -->
                        <canvas id="spectrogramCanvas"></canvas>

                        <!-- Progress -->
                        <div class="prog-track" id="progTrack" onclick="seekAudio(event)">
                            <div class="prog-fill" id="progFill">
                                <div class="prog-thumb"></div>
                            </div>
                        </div>
                        <div class="time-row">
                            <span id="curTime">0:00</span>
                            <span id="durTime">0:00</span>
                        </div>

                        <!-- Controls -->
                        <div class="player-controls">
                            <button class="ctrl-btn mode-btn" id="shuffleBtn" title="Shuffle">
                                <i class="fas fa-random"></i>
                            </button>
                            <button class="ctrl-btn" style="font-size:20px;" onclick="seekRelative(-10)" title="-10s">
                                <i class="fas fa-backward"></i>
                            </button>
                            <button class="ctrl-btn-play" id="mainPlayBtn" onclick="togglePlay()">
                                <i class="fas fa-play" id="playIcon" style="margin-left:3px;"></i>
                            </button>
                            <button class="ctrl-btn" style="font-size:20px;" onclick="seekRelative(10)" title="+10s">
                                <i class="fas fa-forward"></i>
                            </button>
                            <button class="ctrl-btn mode-btn" id="repeatBtn" title="Repeat">
                                <i class="fas fa-redo"></i>
                            </button>
                        </div>

                        <!-- Volume -->
                        <div class="vol-row">
                            <i class="fas fa-volume-down"></i>
                            <input type="range" class="vol-slider" id="volSlider" min="0" max="1" step="0.02" value="0.75">
                            <i class="fas fa-volume-up"></i>
                        </div>
                    </div>

                    <!-- Hidden audio element -->
                    <audio id="audioEl" preload="auto">
                        <source src="{{ (str_starts_with($songs->audio ?? '', '/') ? $songs->audio : '/succesor/songs/' . $songs->audio) }}" type="audio/mpeg">
                    </audio>

                    <div>
                        <a href="{{ route('musics') }}" class="back-btn">
                            <i class="fas fa-arrow-left"></i> Back to Library
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="site-footer" style="position:relative;z-index:1;">
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
    const audio   = document.getElementById('audioEl');
    const canvas  = document.getElementById('spectrogramCanvas');
    const ctx2d   = canvas.getContext('2d');
    const artRing = document.getElementById('artRing');
    const albumArt = document.getElementById('albumArt');

    let isPlaying  = false;
    let repeatOn   = false;
    let audioCtx   = null;
    let analyser   = null;
    let sourceNode = null;
    let animFrame  = null;

    function resizeCanvas() {
        canvas.width  = canvas.clientWidth  || 400;
        canvas.height = canvas.clientHeight || 70;
    }
    resizeCanvas();
    window.addEventListener('resize', resizeCanvas);

    // ── Audio Context ──
    function setupCtx() {
        if (!audioCtx) {
            audioCtx  = new (window.AudioContext || window.webkitAudioContext)();
            analyser  = audioCtx.createAnalyser();
            analyser.fftSize = 512;
            try {
                sourceNode = audioCtx.createMediaElementSource(audio);
                sourceNode.connect(analyser);
                analyser.connect(audioCtx.destination);
            } catch(e) {}
        }
        if (audioCtx.state === 'suspended') audioCtx.resume();
    }

    // ── Spectrogram ──
    function drawViz() {
        if (!analyser) return;
        const binCount = analyser.frequencyBinCount;
        const dataArr  = new Uint8Array(binCount);

        function draw() {
            animFrame = requestAnimationFrame(draw);
            analyser.getByteFrequencyData(dataArr);

            const W = canvas.width, H = canvas.height;
            ctx2d.fillStyle = 'rgba(4,4,12,0.4)';
            ctx2d.fillRect(0, 0, W, H);

            const barCount = Math.min(binCount, 90);
            const gap = 2;
            const barW = (W - (barCount - 1) * gap) / barCount;
            const baseY = H * 0.72;

            for (let i = 0; i < barCount; i++) {
                const v    = dataArr[i] / 255;
                const barH = v * baseY;
                const x    = i * (barW + gap);

                const g = ctx2d.createLinearGradient(x, baseY, x, baseY - barH);
                g.addColorStop(0,   `rgba(56,189,248,${0.5 + v * 0.5})`);
                g.addColorStop(0.55,`rgba(168,85,247,${0.7 + v * 0.3})`);
                g.addColorStop(1,   `rgba(255,255,255,${v > 0.7 ? 0.9 : 0.3})`);

                ctx2d.shadowBlur  = v > 0.45 ? 8 : 0;
                ctx2d.shadowColor = 'rgba(168,85,247,0.5)';
                ctx2d.fillStyle   = g;

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
                const rg = ctx2d.createLinearGradient(x, baseY, x, baseY + barH * 0.3);
                rg.addColorStop(0, `rgba(56,189,248,${v * 0.2})`);
                rg.addColorStop(1, 'rgba(56,189,248,0)');
                ctx2d.shadowBlur = 0;
                ctx2d.fillStyle  = rg;
                ctx2d.fillRect(x, baseY, barW, barH * 0.3);
            }

            // Base line
            ctx2d.shadowBlur  = 0;
            ctx2d.strokeStyle = 'rgba(168,85,247,0.2)';
            ctx2d.lineWidth   = 1;
            ctx2d.beginPath();
            ctx2d.moveTo(0, baseY); ctx2d.lineTo(W, baseY);
            ctx2d.stroke();
        }
        draw();
    }

    function stopViz() {
        if (animFrame) { cancelAnimationFrame(animFrame); animFrame = null; }
        ctx2d.clearRect(0, 0, canvas.width, canvas.height);
    }

    // ── Play/Pause ──
    function setPlayingState(playing) {
        isPlaying = playing;
        document.getElementById('playIcon').className = playing ? 'fas fa-pause' : 'fas fa-play';
        if (!playing) document.getElementById('playIcon').style.marginLeft = '3px';
        artRing.classList.toggle('spinning', playing);
        albumArt.classList.toggle('playing', playing);
    }

    function togglePlay() {
        if (audio.paused) {
            setupCtx();
            audio.play().then(() => {
                setPlayingState(true);
                drawViz();
            }).catch(e => console.log(e));
        } else {
            audio.pause();
        }
    }

    audio.addEventListener('play',  () => { setPlayingState(true);  if(analyser) drawViz(); });
    audio.addEventListener('pause', () => { setPlayingState(false); stopViz(); });
    audio.addEventListener('ended', () => {
        if (repeatOn) { audio.currentTime = 0; audio.play(); }
        else setPlayingState(false);
    });

    // ── Progress ──
    audio.addEventListener('timeupdate', () => {
        if (!audio.duration) return;
        const pct = (audio.currentTime / audio.duration) * 100;
        document.getElementById('progFill').style.width = pct + '%';
        document.getElementById('curTime').textContent  = fmt(audio.currentTime);
        document.getElementById('durTime').textContent  = fmt(audio.duration);
    });

    function seekAudio(e) {
        const rect = document.getElementById('progTrack').getBoundingClientRect();
        const pct  = Math.max(0, Math.min((e.clientX - rect.left) / rect.width, 1));
        if (audio.duration) audio.currentTime = pct * audio.duration;
    }

    function seekRelative(secs) {
        audio.currentTime = Math.max(0, Math.min((audio.currentTime + secs), audio.duration || 0));
    }

    // ── Volume ──
    document.getElementById('volSlider').addEventListener('input', function() {
        audio.volume = parseFloat(this.value);
    });
    audio.volume = 0.75;

    // ── Repeat ──
    document.getElementById('repeatBtn').addEventListener('click', function() {
        repeatOn = !repeatOn;
        this.classList.toggle('on', repeatOn);
    });

    // ── Keyboard ──
    document.addEventListener('keydown', e => {
        if (e.key === ' ')          { e.preventDefault(); togglePlay(); }
        if (e.key === 'ArrowLeft')  { e.preventDefault(); seekRelative(-5); }
        if (e.key === 'ArrowRight') { e.preventDefault(); seekRelative(5); }
    });

    function fmt(s) {
        const m = Math.floor(s / 60);
        const sec = Math.floor(s % 60);
        return m + ':' + (sec < 10 ? '0' : '') + sec;
    }
    </script>
</body>
</html>
