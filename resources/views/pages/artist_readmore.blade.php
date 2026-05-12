<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tentacit Records | {{ $artist->artistname ?? 'Artist Profile' }}</title>

    <link rel="icon" type="image/png" href="{{ asset('images/Tentacit Shape-0.png') }}">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="{{ asset('succesor/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="stylesheet" href="{{ asset('succesor/assets/css/tentacit.css') }}">

    <style>
        /* Artist Profile page-specific styles */
        .artist-header {
            padding: 150px 0 50px;
            text-align: center;
            position: relative;
        }
        .artist-header .artist-avatar {
            width: 200px;
            height: 200px;
            border-radius: 50%;
            object-fit: cover;
            border: 4px solid var(--neon-purple);
            box-shadow: 0 0 60px var(--glow-purple);
            margin-bottom: 25px;
        }
        .artist-header h1 {
            font-size: 3.5rem;
            font-weight: 900;
            background: linear-gradient(135deg, #fff, var(--neon-purple));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            margin-bottom: 10px;
        }
        .artist-header .genre-tag {
            display: inline-block;
            background: rgba(180,74,255,0.2);
            color: var(--neon-purple);
            padding: 8px 25px;
            border-radius: 25px;
            font-size: 14px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .artist-info-card {
            background: var(--card-bg);
            border: 1px solid rgba(180,74,255,0.12);
            border-radius: 20px;
            padding: 30px;
            margin-bottom: 20px;
        }
        .artist-info-card h4 { color: #fff; font-weight: 800; margin-bottom: 20px; }
        .artist-info-card h4 i { color: var(--neon-purple); margin-right: 10px; }
        .artist-info-card .info-row { margin-bottom: 12px; }
        .artist-info-card .info-label { color: #666; font-size: 12px; text-transform: uppercase; letter-spacing: 1px; font-weight: 600; }
        .artist-info-card .info-value { color: #e0e0e0; font-size: 1rem; font-weight: 500; }

        @media (max-width: 768px) {
            .artist-header h1 { font-size: 2rem; }
            .artist-header .artist-avatar { width: 150px; height: 150px; }
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
                    <li class="nav-item"><a class="nav-link active" href="{{route('artists')}}">Artists</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{route('musics')}}">Music</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{route('details')}}">About</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <section class="artist-header">
        <div class="container">
            <img src="/artist-profile-images/{{ $artist->image }}" class="artist-avatar animate__animated animate__fadeInDown" alt="{{ $artist->artistname }}"
                 onerror="this.src='{{ asset('images/TentacitV1.1.png') }}'">
            <h1>{{ $artist->artistname }}</h1>
            <span class="genre-tag">{{ $artist->genre }}</span>
        </div>
    </section>

    <section class="py-4">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="artist-info-card animate__animated animate__fadeInLeft">
                        <h4><i class="fas fa-id-card"></i>Artist Info</h4>
                        <div class="info-row">
                            <div class="info-label">Real Name</div>
                            <div class="info-value">{{ $artist->realname }}</div>
                        </div>
                        <div class="info-row">
                            <div class="info-label">Nationality</div>
                            <div class="info-value">{{ $artist->nationality }}</div>
                        </div>
                        <div class="info-row">
                            <div class="info-label">Address</div>
                            <div class="info-value">{{ $artist->address }}</div>
                        </div>
                        <div class="info-row">
                            <div class="info-label">Genre</div>
                            <div class="info-value">{{ $artist->genre }}</div>
                        </div>
                        <div class="info-row">
                            <div class="info-label">Joined</div>
                            <div class="info-value">{{ $artist->dateregistered }}</div>
                        </div>
                        <div class="mt-4">
                            <a href="{{route('artists')}}" class="btn-tentacit-outline">
                                <i class="fas fa-arrow-left me-2"></i>All Artists
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="artist-info-card animate__animated animate__fadeInRight">
                        <h4><i class="fas fa-music"></i>Discography</h4>
                        @if($artist->song && $artist->song->count() > 0)
                            <div class="row">
                                @foreach($artist->song as $track)
                                <div class="col-md-6 mb-3">
                                    <div class="d-flex align-items-center p-3" style="background:rgba(180,74,255,0.05); border-radius:12px; border:1px solid rgba(180,74,255,0.1);">
                                        <div>
                                            <h6 style="color:#fff; font-weight:700; margin:0;">{{ $track->songname }}</h6>
                                            <small style="color: var(--neon-purple);">{{ $track->genre }}</small>
                                        </div>
                                        <a href="{{route('song_info', $track['id'])}}" class="btn-tentacit btn-tentacit-sm ms-auto">
                                            <i class="fas fa-play"></i>
                                        </a>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        @else
                            <p style="color: var(--text-muted);">No tracks available yet.</p>
                        @endif
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
