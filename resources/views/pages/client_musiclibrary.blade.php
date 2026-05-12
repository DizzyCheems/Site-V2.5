<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tentacit Records | Music Library</title>

    <link rel="icon" type="image/png" href="{{ asset('images/Tentacit Shape-0.png') }}">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="{{ asset('succesor/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="stylesheet" href="{{ asset('succesor/assets/css/tentacit.css') }}">

    <style>
        .music-hero { padding: 150px 0 60px; text-align: center; }
        .music-hero h1 {
            font-size: 4rem; font-weight: 900;
            background: linear-gradient(135deg, #fff, var(--neon-purple));
            -webkit-background-clip: text; -webkit-text-fill-color: transparent;
            text-transform: uppercase; letter-spacing: 5px;
        }
        .song-card {
            background: var(--card-bg);
            border: 1px solid rgba(180, 74, 255, 0.12);
            border-radius: 16px; overflow: hidden;
            transition: all 0.4s ease; margin-bottom: 25px;
        }
        .song-card:hover {
            border-color: var(--neon-purple);
            box-shadow: 0 10px 40px var(--glow-purple);
            transform: translateY(-5px);
        }
        .song-card-img { width: 100%; height: 200px; object-fit: cover; }
        .song-card-body { padding: 20px; }
        .song-card h4 { color: #fff; font-weight: 700; font-size: 1.2rem; margin-bottom: 5px; }
        .song-card .artist-name { color: var(--neon-purple); font-size: 14px; font-weight: 500; }
        .song-card .song-meta { color: #777; font-size: 12px; margin-bottom: 15px; }
        .song-card .song-meta span { margin-right: 15px; }

        .btn-play {
            background: linear-gradient(135deg, var(--neon-purple), #7c3aed);
            color: #fff; border: none; width: 45px; height: 45px; border-radius: 50%;
            display: flex; align-items: center; justify-content: center;
            font-size: 18px; transition: all 0.3s; cursor: pointer; flex-shrink: 0;
        }
        .btn-play:hover { transform: scale(1.1); box-shadow: 0 0 30px var(--glow-purple); color: #fff; }

        /* Fullscreen Overlay */
        .music-player-overlay {
            display: none; position: fixed; top: 0; left: 0; right: 0; bottom: 0;
            background: rgba(5, 5, 15, 0.95); backdrop-filter: blur(30px);
            z-index: 10000; justify-content: center; align-items: center;
            animation: fadeInOverlay 0.4s ease;
        }
        .music-player-overlay.active { display: flex; }
        @keyframes fadeInOverlay { from { opacity: 0; } to { opacity: 1; } }

        .player-modal { position: relative; width: 100%; max-width: 500px; padding: 40px 30px; text-align: center; }
        .player-close {
            position: absolute; top: 20px; right: 25px; color: rgba(255,255,255,0.4);
            font-size: 36px; cursor: pointer; transition: 0.3s; background: none; border: none; line-height: 1; z-index: 10;
        }
        .player-close:hover { color: var(--neon-purple); transform: rotate(90deg); }
        .player-minimize-btn {
            position: absolute; top: 22px; right: 75px; color: rgba(255,255,255,0.4);
            font-size: 24px; cursor: pointer; transition: 0.3s; background: none; border: none; line-height: 1; z-index: 10;
        }
        .player-minimize-btn:hover { color: var(--neon-purple); }

        .player-artwork {
            width: 280px; height: 280px; border-radius: 20px; object-fit: cover;
            margin: 0 auto 25px; display: block;
            box-shadow: 0 20px 80px rgba(180, 74, 255, 0.3);
            border: 2px solid rgba(180,74,255,0.2); transition: 0.4s;
        }
        .player-artwork:hover { transform: scale(1.02); box-shadow: 0 30px 100px rgba(180, 74, 255, 0.5); }

        .player-song-title {
            font-size: 1.8rem; font-weight: 900; color: #fff; margin-bottom: 5px;
            background: linear-gradient(135deg, #fff, var(--neon-purple));
            -webkit-background-clip: text; -webkit-text-fill-color: transparent;
        }
        .player-artist-name { font-size: 1.1rem; font-weight: 600; color: var(--neon-purple); margin-bottom: 20px; }

        #spectrogramCanvas {
            width: 100%; height: 120px; border-radius: 12px;
            background: rgba(180, 74, 255, 0.05);
            border: 1px solid rgba(180, 74, 255, 0.15); margin-bottom: 20px;
        }

        .progress-container { width: 100%; margin-bottom: 12px; }
        .progress-bar-custom {
            width: 100%; height: 6px; background: rgba(255,255,255,0.15);
            border-radius: 10px; cursor: pointer; position: relative; transition: height 0.15s;
        }
        .progress-bar-custom:hover { height: 8px; }
        .progress-bar-custom .progress-fill {
            width: 0%; height: 100%; background: linear-gradient(90deg, var(--neon-purple), #a855f7);
            border-radius: 10px; position: relative; transition: width 0.1s linear;
        }
        .progress-bar-custom .progress-fill::after {
            content: ''; position: absolute; right: -6px; top: -4px; width: 14px; height: 14px;
            background: #fff; border-radius: 50%; opacity: 0; transition: opacity 0.2s;
            box-shadow: 0 0 20px var(--neon-purple);
        }
        .progress-bar-custom:hover .progress-fill::after { opacity: 1; }
        .time-display {
            display: flex; justify-content: space-between; color: rgba(255,255,255,0.5);
            font-size: 12px; font-weight: 500; letter-spacing: 0.5px; margin-top: 4px;
        }

        .player-controls {
            display: flex; justify-content: center; align-items: center; gap: 25px; margin-top: 10px;
        }
        .ctrl-btn {
            background: none; border: none; color: rgba(255,255,255,0.6); font-size: 22px;
            cursor: pointer; transition: 0.3s; width: 45px; height: 45px; border-radius: 50%;
            display: flex; align-items: center; justify-content: center;
        }
        .ctrl-btn:hover { color: #fff; background: rgba(180,74,255,0.15); }
        .ctrl-btn-main {
            width: 60px; height: 60px; font-size: 26px;
            background: linear-gradient(135deg, var(--neon-purple), #7c3aed);
            color: #fff; box-shadow: 0 0 40px rgba(180,74,255,0.3);
        }
        .ctrl-btn-main:hover {
            transform: scale(1.08); box-shadow: 0 0 60px rgba(180,74,255,0.5);
            background: linear-gradient(135deg, var(--neon-purple), #7c3aed); color: #fff;
        }

        .volume-wrap { display: flex; align-items: center; gap: 8px; justify-content: center; margin-top: 15px; }
        .volume-wrap i { color: rgba(255,255,255,0.4); font-size: 14px; }
        .volume-slider {
            width: 120px; height: 4px; -webkit-appearance: none; appearance: none;
            background: rgba(255,255,255,0.15); border-radius: 10px; outline: none; cursor: pointer;
        }
        .volume-slider::-webkit-slider-thumb {
            -webkit-appearance: none; width: 14px; height: 14px; border-radius: 50%;
            background: var(--neon-purple); cursor: pointer; box-shadow: 0 0 15px rgba(180,74,255,0.4);
        }
        .volume-slider::-moz-range-thumb {
            width: 14px; height: 14px; border-radius: 50%; background: var(--neon-purple);
            cursor: pointer; border: none;
        }

        /* Mini Player Bar */
        .mini-player {
            display: none; position: fixed; bottom: 0; left: 0; right: 0;
            background: rgba(10, 10, 25, 0.97); backdrop-filter: blur(20px);
            border-top: 2px solid var(--neon-purple); z-index: 9999;
            padding: 10px 20px; box-shadow: 0 -10px 40px rgba(0,0,0,0.6);
            animation: slideUpMini 0.35s ease;
        }
        .mini-player.active { display: block; }
        @keyframes slideUpMini { from { transform: translateY(100%); } to { transform: translateY(0); } }
        .mini-img {
            width: 48px; height: 48px; border-radius: 10px; object-fit: cover;
            border: 1px solid rgba(180,74,255,0.3); cursor: pointer; transition: 0.3s; flex-shrink: 0;
        }
        .mini-img:hover { border-color: var(--neon-purple); }
        .mini-info { min-width: 0; margin-left: 12px; cursor: pointer; }
        .mini-info h6 { color: #fff; font-weight: 700; margin: 0; font-size: 14px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; }
        .mini-info p { color: var(--neon-purple); margin: 0; font-size: 12px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; }
        .mini-controls { display: flex; align-items: center; justify-content: flex-end; gap: 12px; }
        .mini-btn {
            background: none; border: none; color: rgba(255,255,255,0.7); font-size: 18px;
            cursor: pointer; transition: 0.3s; width: 36px; height: 36px; border-radius: 50%;
            display: flex; align-items: center; justify-content: center; flex-shrink: 0;
        }
        .mini-btn:hover { color: #fff; background: rgba(180,74,255,0.15); }
        .mini-btn-play {
            background: linear-gradient(135deg, var(--neon-purple), #7c3aed);
            color: #fff; font-size: 16px; width: 40px; height: 40px;
        }
        .mini-btn-play:hover {
            transform: scale(1.05); box-shadow: 0 0 20px rgba(180,74,255,0.4);
            background: linear-gradient(135deg, var(--neon-purple), #7c3aed); color: #fff;
        }
        .mini-btn-close { font-size: 22px; color: rgba(255,255,255,0.3); }
        .mini-btn-close:hover { color: #ff4444; background: rgba(255,68,68,0.1); }
        .mini-progress {
            position: absolute; top: -2px; left: 0; right: 0; height: 2px;
            background: rgba(255,255,255,0.1); cursor: pointer;
        }
        .mini-progress .mini-progress-fill { width: 0%; height: 100%; background: linear-gradient(90deg, var(--neon-purple), #a855f7); transition: width 0.1s linear; }
        body.has-mini-player { padding-bottom: 75px; }

        @media (max-width: 768px) {
            .music-hero h1 { font-size: 2.5rem; }
            .player-artwork { width: 200px; height: 200px; }
            .player-modal { padding: 25px 15px; }
            .player-song-title { font-size: 1.3rem; }
            #spectrogramCanvas { height: 80px; }
            .mini-info h6 { font-size: 12px; }
            .mini-info p { font-size: 11px; }
            .mini-controls { gap: 6px; }
        }
    </style>
</head>
<body>
    <div class="bg-grid"></div>
    <div class="bg-gradient"></div>

    <nav class="navbar navbar-expand-lg navbar-dark navbar-tentacit fixed-top">
        <div class="container">
            <a class="navbar-brand" href="{{route('homepage')}}">
                <img src="{{ asset('images/TentacitV1.1.png') }}" alt="Tentacit Records">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="{{route('homepage')}}">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{route('artists')}}">Artists</a></li>
                    <li class="nav-item"><a class="nav-link active" href="{{route('musics')}}">Music</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{route('details')}}">About</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <section class="music-hero">
        <div class="container">
            <h1 class="animate__animated animate__fadeInDown">Music Library</h1>
            <p style="color: var(--text-muted);" class="mt-3 animate__animated animate__fadeInUp">Browse our catalog of tracks</p>
        </div>
    </section>

    <section class="py-4">
        <div class="container">
            <div class="row">
                @forelse($song as $s)
                <div class="col-lg-4 col-md-6">
                    <div class="song-card animate__animated animate__fadeInUp">
                        <img src="/song-images/{{ $s->image }}" class="song-card-img" alt="{{ $s->songname }}"
                             onerror="this.src='{{ asset('images/TentacitV1.1.png') }}'">
                        <div class="song-card-body">
                            <div class="d-flex justify-content-between align-items-start">
                                <div>
                                    <h4>{{ $s->songname }}</h4>
                                    <p class="artist-name">{{ $s->author }}</p>
                                </div>
                                <button class="btn-play play-song-btn"
                                        data-song="{{ $s->songname }}"
                                        data-artist="{{ $s->author }}"
                                        data-img="/song-images/{{ $s->image }}"
                                        data-audio="{{ asset('music/' . (str_ends_with($s->audio, '.mp3') ? $s->audio : $s->audio . '.mp3')) }}"
                                        onclick="openPlayer(this)">
                                    <i class="fas fa-play"></i>
                                </button>
                            </div>
                            <div class="song-meta">
                                <span><i class="far fa-calendar-alt"></i> {{ $s->date_registered }}</span>
                                <span><i class="fas fa-compact-disc"></i> {{ $s->album }}</span>
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="genre-badge">{{ $s->genre }}</span>
                                <a href="{{route('song_info', $s['id'])}}" style="color:var(--text-muted); font-size:13px; text-decoration:none;">
                                    Details <i class="fas fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-12 text-center py-5">
                    <div class="display-1 mb-4" style="color: var(--neon-purple);">&#127925;</div>
                    <h3 style="color: #fff;">No Tracks Yet</h3>
                    <p style="color: #888;">Music will appear here once added to the catalog.</p>
                </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- Fullscreen Player Overlay -->
    <div id="playerOverlay" class="music-player-overlay">
        <div class="player-modal">
            <button class="player-close" onclick="closePlayer()">&times;</button>
            <button class="player-minimize-btn" onclick="minimizePlayer()" title="Minimize">
                <i class="fas fa-window-minimize"></i>
            </button>

            <img id="playerArtwork" class="player-artwork" src="" alt="Album Art">
            <div class="player-song-title" id="playerTitle">No Track Playing</div>
            <div class="player-artist-name" id="playerArtist">-</div>

            <canvas id="spectrogramCanvas"></canvas>

            <div class="progress-container">
                <div class="progress-bar-custom" id="progressBar" onclick="seekAudio(event)">
                    <div class="progress-fill" id="progressFill"></div>
                </div>
                <div class="time-display">
                    <span id="currentTime">0:00</span>
                    <span id="duration">0:00</span>
                </div>
            </div>

            <div class="player-controls">
                <button class="ctrl-btn" onclick="prevTrack()"><i class="fas fa-step-backward"></i></button>
                <button class="ctrl-btn ctrl-btn-main" id="playPauseBtn" onclick="togglePlayPause()">
                    <i class="fas fa-play" id="playPauseIcon"></i>
                </button>
                <button class="ctrl-btn" onclick="nextTrack()"><i class="fas fa-step-forward"></i></button>
            </div>

            <div class="volume-wrap">
                <i class="fas fa-volume-down"></i>
                <input type="range" class="volume-slider" id="volumeSlider" min="0" max="1" step="0.01" value="0.7">
                <i class="fas fa-volume-up"></i>
            </div>

            <audio id="mainAudioPlayer" preload="auto">
                <source id="audioSource" src="" type="audio/mpeg">
            </audio>
        </div>
    </div>

    <!-- Mini Player Bar -->
    <div id="miniPlayer" class="mini-player">
        <div class="mini-progress" onclick="seekMini(event)">
            <div class="mini-progress-fill" id="miniProgressFill"></div>
        </div>
        <div class="container-fluid px-0">
            <div class="row g-0">
                <div class="col d-flex align-items-center" style="min-width:0;">
                    <img id="miniImg" class="mini-img" src="" alt="Art" onclick="maximizePlayer()">
                    <div class="mini-info" onclick="maximizePlayer()">
                        <h6 id="miniTitle">No Track</h6>
                        <p id="miniArtist">-</p>
                    </div>
                </div>
                <div class="col-auto">
                    <div class="mini-controls">
                        <button class="mini-btn" onclick="prevTrack()"><i class="fas fa-step-backward"></i></button>
                        <button class="mini-btn mini-btn-play" onclick="togglePlayPause()">
                            <i class="fas fa-play" id="miniPlayIcon"></i>
                        </button>
                        <button class="mini-btn" onclick="nextTrack()"><i class="fas fa-step-forward"></i></button>
                        <button class="mini-btn mini-btn-close" onclick="closePlayer()"><i class="fas fa-times"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>

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

    <script>
        // ===== STATE =====
        let isPlaying = false;
        let audioCtx = null;
        let analyser = null;
        let sourceNode = null;
        let animFrame = null;
        let currentButtons = [];
        let currentIndex = -1;
        let currentTrack = { title: '', artist: '', img: '', audioUrl: '' };

        const audio = document.getElementById('mainAudioPlayer');
        const canvas = document.getElementById('spectrogramCanvas');
        const ctxCanvas = canvas.getContext('2d');

        function resizeCanvas() {
            canvas.width = canvas.clientWidth || 400;
            canvas.height = canvas.clientHeight || 120;
        }
        resizeCanvas();
        window.addEventListener('resize', resizeCanvas);

        // ===== AUDIO CONTEXT MANAGEMENT =====
        function setupAudioContext() {
            if (!audioCtx) {
                audioCtx = new (window.AudioContext || window.webkitAudioContext)();
                analyser = audioCtx.createAnalyser();
                analyser.fftSize = 256;
                // Must create new source for each new audio src change
                connectSource();
            }
            if (audioCtx.state === 'suspended') audioCtx.resume();
        }

        function connectSource() {
            if (sourceNode) {
                try { sourceNode.disconnect(); } catch(e) {}
                sourceNode = null;
            }
            try {
                sourceNode = audioCtx.createMediaElementSource(audio);
                sourceNode.connect(analyser);
                analyser.connect(audioCtx.destination);
            } catch(e) {
                console.warn('Could not connect audio source:', e);
            }
        }

        function teardownAudioContext() {
            stopSpectrum();
            if (sourceNode) {
                try { sourceNode.disconnect(); } catch(e) {}
                sourceNode = null;
            }
            if (audioCtx) {
                audioCtx.close().catch(() => {});
                audioCtx = null;
                analyser = null;
            }
        }

        // ===== SPECTRUM VISUALIZER =====
        function drawSpectrum() {
            if (!analyser) return;
            const bufferLength = analyser.frequencyBinCount;
            const dataArray = new Uint8Array(bufferLength);

            function draw() {
                animFrame = requestAnimationFrame(draw);
                analyser.getByteFrequencyData(dataArray);
                const w = canvas.width;
                const h = canvas.height;
                ctxCanvas.clearRect(0, 0, w, h);
                const barCount = bufferLength;
                const barWidth = w / barCount;
                for (let i = 0; i < barCount; i++) {
                    const barHeight = (dataArray[i] / 255) * h;
                    const x = i * barWidth;
                    const ratio = barHeight / h;
                    const r = Math.round(100 + ratio * 80);
                    const g = Math.round(40 + ratio * 30);
                    const b = Math.round(180 + ratio * 75);
                    ctxCanvas.fillStyle = `rgb(${r}, ${g}, ${b})`;
                    ctxCanvas.fillRect(x, h - barHeight, barWidth - 1, barHeight);
                }
                const gradient = ctxCanvas.createLinearGradient(0, 0, 0, h);
                gradient.addColorStop(0, 'rgba(180, 74, 255, 0.05)');
                gradient.addColorStop(0.5, 'rgba(180, 74, 255, 0)');
                ctxCanvas.fillStyle = gradient;
                ctxCanvas.fillRect(0, 0, w, h);
            }
            draw();
        }

        function stopSpectrum() {
            if (animFrame) { cancelAnimationFrame(animFrame); animFrame = null; }
            ctxCanvas.clearRect(0, 0, canvas.width, canvas.height);
        }

        // ===== COLLECT BUTTONS =====
        function collectButtons() { currentButtons = document.querySelectorAll('.play-song-btn'); }
        collectButtons();

        function updateUI(track) {
            document.getElementById('playerTitle').textContent = track.title;
            document.getElementById('playerArtist').textContent = track.artist;
            document.getElementById('playerArtwork').src = track.img;
            document.getElementById('miniTitle').textContent = track.title;
            document.getElementById('miniArtist').textContent = track.artist;
            document.getElementById('miniImg').src = track.img;
        }

        // ===== OPEN PLAYER =====
        function openPlayer(button) {
            const title = button.getAttribute('data-song');
            const artist = button.getAttribute('data-artist');
            const img = button.getAttribute('data-img');
            const audioUrl = button.getAttribute('data-audio');

            collectButtons();
            currentButtons.forEach((btn, i) => {
                if (btn === button) currentIndex = i;
            });

            currentTrack = { title, artist, img, audioUrl };
            updateUI(currentTrack);

            // Show fullscreen overlay
            document.getElementById('playerOverlay').classList.add('active');
            document.getElementById('miniPlayer').classList.remove('active');
            document.body.classList.remove('has-mini-player');

            // Reset visualizer
            stopSpectrum();

            // Before changing src, tear down old AudioContext connections
            teardownAudioContext();

            // Set new source and load
            const sourceEl = document.getElementById('audioSource');
            sourceEl.src = audioUrl;
            audio.load();

            // Wait for canplay then play
            const onCanPlay = () => {
                audio.removeEventListener('canplay', onCanPlay);
                setupAudioContext();
                audio.play().then(() => {
                    isPlaying = true;
                    document.getElementById('playPauseIcon').className = 'fas fa-pause';
                    document.getElementById('miniPlayIcon').className = 'fas fa-pause';
                    drawSpectrum();
                }).catch(e => console.log('Play error:', e));
            };
            audio.addEventListener('canplay', onCanPlay, { once: true });

            // Fallback if already loaded
            if (audio.readyState >= 3) {
                onCanPlay();
            }
        }

        // ===== CLOSE PLAYER =====
        function closePlayer() {
            audio.pause();
            audio.currentTime = 0;
            isPlaying = false;
            document.getElementById('playPauseIcon').className = 'fas fa-play';
            document.getElementById('miniPlayIcon').className = 'fas fa-play';
            document.getElementById('playerOverlay').classList.remove('active');
            document.getElementById('miniPlayer').classList.remove('active');
            document.body.classList.remove('has-mini-player');
            teardownAudioContext();
        }

        // ===== MINIMIZE / MAXIMIZE =====
        function minimizePlayer() {
            document.getElementById('playerOverlay').classList.remove('active');
            document.getElementById('miniPlayer').classList.add('active');
            document.body.classList.add('has-mini-player');
        }
        function maximizePlayer() {
            document.getElementById('miniPlayer').classList.remove('active');
            document.body.classList.remove('has-mini-player');
            document.getElementById('playerOverlay').classList.add('active');
        }

        // ===== PLAYBACK =====
        function togglePlayPause() {
            if (!currentTrack.audioUrl) return;
            if (audio.paused) {
                setupAudioContext();
                audio.play().then(() => {
                    isPlaying = true;
                    document.getElementById('playPauseIcon').className = 'fas fa-pause';
                    document.getElementById('miniPlayIcon').className = 'fas fa-pause';
                    drawSpectrum();
                }).catch(e => console.log('Play error:', e));
            } else {
                audio.pause();
                isPlaying = false;
                document.getElementById('playPauseIcon').className = 'fas fa-play';
                document.getElementById('miniPlayIcon').className = 'fas fa-play';
                stopSpectrum();
            }
        }

        function playTrack(index) {
            if (index >= 0 && index < currentButtons.length) openPlayer(currentButtons[index]);
        }
        function prevTrack() {
            if (!currentButtons.length) return;
            const newIndex = (currentIndex - 1 + currentButtons.length) % currentButtons.length;
            playTrack(newIndex);
        }
        function nextTrack() {
            if (!currentButtons.length) return;
            const newIndex = (currentIndex + 1) % currentButtons.length;
            playTrack(newIndex);
        }

        // ===== EVENT LISTENERS (attached once to the persistent audio element) =====
        audio.addEventListener('timeupdate', function() {
            if (audio.duration) {
                const pct = (audio.currentTime / audio.duration) * 100;
                document.getElementById('progressFill').style.width = pct + '%';
                document.getElementById('miniProgressFill').style.width = pct + '%';
                document.getElementById('currentTime').textContent = formatTime(audio.currentTime);
                document.getElementById('duration').textContent = formatTime(audio.duration);
            }
        });

        audio.addEventListener('ended', function() { nextTrack(); });

        audio.addEventListener('play', function() {
            isPlaying = true;
            document.getElementById('playPauseIcon').className = 'fas fa-pause';
            document.getElementById('miniPlayIcon').className = 'fas fa-pause';
        });
        audio.addEventListener('pause', function() {
            isPlaying = false;
            document.getElementById('playPauseIcon').className = 'fas fa-play';
            document.getElementById('miniPlayIcon').className = 'fas fa-play';
            stopSpectrum();
        });

        // ===== SEEKING =====
        function seekAudio(e) {
            const bar = document.getElementById('progressBar');
            const rect = bar.getBoundingClientRect();
            const percent = (e.clientX - rect.left) / rect.width;
            if (audio.duration) audio.currentTime = percent * audio.duration;
        }
        function seekMini(e) {
            const bar = document.querySelector('.mini-progress');
            const rect = bar.getBoundingClientRect();
            const percent = (e.clientX - rect.left) / rect.width;
            if (audio.duration) audio.currentTime = percent * audio.duration;
        }

        // ===== VOLUME =====
        document.getElementById('volumeSlider').addEventListener('input', function() {
            audio.volume = parseFloat(this.value);
        });

        // ===== TIME FORMAT =====
        function formatTime(seconds) {
            const m = Math.floor(seconds / 60);
            const s = Math.floor(seconds % 60);
            return m + ':' + (s < 10 ? '0' : '') + s;
        }

        // ===== KEYBOARD SHORTCUTS =====
        document.addEventListener('keydown', function(e) {
            const overlayActive = document.getElementById('playerOverlay').classList.contains('active');
            const miniActive = document.getElementById('miniPlayer').classList.contains('active');
            if (!overlayActive && !miniActive) return;
            if (e.key === 'Escape') closePlayer();
            if (e.key === ' ' || e.key === 'Space') { e.preventDefault(); togglePlayPause(); }
            if (e.key === 'ArrowLeft') seekRelative(-5);
            if (e.key === 'ArrowRight') seekRelative(5);
        });
        function seekRelative(secs) {
            audio.currentTime = Math.max(0, Math.min(audio.currentTime + secs, audio.duration || 0));
        }
    </script>

    <script src="{{ asset('succesor/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('succesor/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('succesor/assets/js/custom.js') }}"></script>
</body>
</html>
