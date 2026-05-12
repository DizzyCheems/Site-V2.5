<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tentacit Records | Artists</title>
    
    <link rel="icon" type="image/png" href="{{ asset('images/Tentacit Shape-0.png') }}">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="{{ asset('succesor/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="stylesheet" href="{{ asset('succesor/assets/css/tentacit.css') }}">
    
    <style>
        .artists-hero {
            padding: 150px 0 60px;
            text-align: center;
        }
        .artists-hero h1 {
            font-size: 4rem;
            font-weight: 900;
            background: linear-gradient(135deg, #fff, var(--neon-purple), var(--neon-pink));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            text-transform: uppercase;
            letter-spacing: 5px;
            margin-bottom: 15px;
        }
        .artists-hero p { color: var(--text-muted); font-size: 1.15rem; max-width: 500px; margin: 0 auto; }
        
        .artist-card {
            background: var(--card-bg);
            border: 1px solid var(--card-border);
            border-radius: 20px;
            overflow: hidden;
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            margin-bottom: 30px;
        }
        .artist-card:hover {
            transform: translateY(-10px) scale(1.02);
            border-color: var(--neon-purple);
            box-shadow: 0 20px 60px var(--glow-purple);
        }
        .artist-card-img {
            width: 100%;
            height: 260px;
            object-fit: cover;
            transition: all 0.5s;
        }
        .artist-card:hover .artist-card-img { transform: scale(1.1); }
        .artist-card-body {
            padding: 25px;
            background: linear-gradient(180deg, transparent, var(--card-bg));
        }
        .artist-card h3 {
            font-size: 1.8rem;
            font-weight: 800;
            color: #fff;
            margin-bottom: 5px;
        }
        .artist-card .genre-tag {
            display: inline-block;
            background: rgba(180,74,255,0.2);
            color: var(--neon-purple);
            padding: 5px 15px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 12px;
        }
        .artist-card .artist-info { color: var(--text-muted); font-size: 14px; margin-bottom: 5px; }
        .artist-card .artist-info i { color: var(--neon-purple); width: 20px; margin-right: 5px; }
        
        @media (max-width: 768px) {
            .artists-hero h1 { font-size: 2.5rem; }
            .artist-card-img { height: 200px; }
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
                    <li class="nav-item"><a class="nav-link active" href="{{route('artists')}}">Artists</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{route('musics')}}">Music</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{route('details')}}">About</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <section class="artists-hero">
        <div class="container">
            <h1 class="animate__animated animate__fadeInDown">Our Artists</h1>
            <p class="animate__animated animate__fadeInUp">Discover the talented musicians behind Tentacit Records</p>
        </div>
    </section>

    <section class="py-5">
        <div class="container">
            <div class="row">
                @forelse($artists as $artist)
                <div class="col-lg-4 col-md-6">
                    <div class="artist-card">
                        <img src="/artist-profile-images/{{ $artist->image }}" class="artist-card-img" alt="{{ $artist->artistname }}"
                             onerror="this.src='{{ asset('images/TentacitV1.1.png') }}'">
                        <div class="artist-card-body">
                            <h3>{{ $artist->artistname }}</h3>
                            <span class="genre-tag">{{ $artist->genre }}</span>
                            <p class="artist-info"><i class="fas fa-globe"></i> {{ $artist->nationality }}</p>
                            <p class="artist-info"><i class="fas fa-calendar-alt"></i> Joined {{ $artist->dateregistered }}</p>
                            <div class="d-flex justify-content-between align-items-center mt-3">
                                <a href="{{route('artist_info', $artist['id'])}}" class="btn-tentacit-outline btn-tentacit-sm">
                                    <i class="fas fa-user"></i> Profile
                                </a>
                                <span class="text-muted" style="font-size:13px;">
                                    <i class="fas fa-music"></i> {{ $artist->song ? $artist->song->count() : 0 }} tracks
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-12 text-center py-5">
                    <div class="display-1 mb-4" style="color: var(--neon-purple);">�</div>
                    <h3 style="color: #fff;">No Artists Yet</h3>
                    <p style="color: var(--text-muted);">Artists will appear here once added.</p>
                </div>
                @endforelse
            </div>
        </div>
    </section>

    <footer class="site-footer">
        <div class="container">
            <div class="social-links mb-4">
                <a href="#"><i class="fab fa-twitter"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
                <a href="#"><i class="fab fa-spotify"></i></a>
                <a href="#"><i class="fab fa-youtube"></i></a>
                <a href="#"><i class="fab fa-soundcloud"></i></a>
            </div>
            <p>&copy; {{ date('Y') }} Tentacit Records. All Rights Reserved.</p>
        </div>
    </footer>

    <script src="{{ asset('succesor/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('succesor/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
