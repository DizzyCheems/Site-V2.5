<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tentacit Records | {{ $songs->songname ?? 'Song Details' }}</title>

    <link rel="icon" type="image/png" href="{{ asset('images/Tentacit Shape-0.png') }}">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="{{ asset('succesor/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="stylesheet" href="{{ asset('succesor/assets/css/tentacit.css') }}">

    <style>
        /* Song Detail page-specific styles */
        .song-detail {
            padding: 150px 0 80px;
        }
        .song-detail .album-art {
            width: 100%;
            max-width: 400px;
            border-radius: 20px;
            box-shadow: 0 20px 60px var(--glow-purple);
            transition: all 0.4s;
            border: 1px solid rgba(180,74,255,0.2);
        }
        .song-detail .album-art:hover {
            transform: scale(1.02);
            box-shadow: 0 30px 80px var(--glow-purple);
        }
        .song-detail h1 {
            font-size: 3.5rem;
            font-weight: 900;
            background: linear-gradient(135deg, #fff, var(--neon-purple));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            margin-bottom: 10px;
        }
        .song-detail .meta-label {
            color: #666;
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: 2px;
            font-weight: 600;
        }
        .song-detail .meta-value {
            color: #fff;
            font-size: 1.1rem;
            font-weight: 600;
            margin-bottom: 15px;
        }
        .song-detail .genre-badge {
            display: inline-block;
            background: rgba(180,74,255,0.2);
            color: var(--neon-purple);
            padding: 8px 20px;
            border-radius: 25px;
            font-size: 13px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        audio {
            width: 100%;
            max-width: 400px;
            border-radius: 8px;
        }
        audio::-webkit-media-controls-panel {
            background: rgba(20, 20, 31, 0.9);
        }

        @media (max-width: 768px) {
            .song-detail h1 { font-size: 2rem; }
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
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
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

    <section class="song-detail">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5 text-center animate__animated animate__fadeInLeft">
                    <img src="/song-images/{{ $songs->image }}" class="album-art" alt="{{ $songs->songname }}"
                         onerror="this.src='{{ asset('images/TentacitV1.1.png') }}'">
                </div>
                <div class="col-lg-7 animate__animated animate__fadeInRight">
                    <span class="genre-badge mb-3">{{ $songs->genre }}</span>
                    <h1>{{ $songs->songname }}</h1>
                    <p style="font-size:1.2rem; font-weight:600; color:var(--neon-purple);">{{ $songs->author }}</p>

                    <div class="row mt-4">
                        <div class="col-6">
                            <p class="meta-label">Album</p>
                            <p class="meta-value">{{ $songs->album }}</p>
                        </div>
                        <div class="col-6">
                            <p class="meta-label">Released</p>
                            <p class="meta-value">{{ $songs->date_registered }}</p>
                        </div>
                    </div>

                    <div class="mt-4">
                        <audio controls>
<source src="{{ (str_starts_with($songs->audio, '/') ? $songs->audio : '/succesor/songs/' . $songs->audio) }}" type="audio/mpeg">
                            Your browser does not support the audio element.
                        </audio>
                    </div>

                    <div class="mt-4 d-flex gap-3">
                        <a href="{{route('musics')}}" class="btn-tentacit-outline">
                            <i class="fas fa-arrow-left me-2"></i>Back to Library
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

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

    <script src="{{ asset('succesor/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('succesor/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
