<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tentacit Records | Admin Dashboard</title>
    <link rel="icon" type="image/png" href="{{ asset('images/Tentacit Shape-0.png') }}">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="{{ asset('succesor/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: 'Montserrat', sans-serif;
            background: #f0f2f5;
            color: #333;
            display: flex;
            min-height: 100vh;
        }
        .sidebar {
            width: 260px;
            background: #ffffff;
            border-right: 1px solid #e0e0e0;
            padding: 25px 0;
            position: fixed;
            top: 0;
            left: 0;
            bottom: 0;
            z-index: 100;
            overflow-y: auto;
        }
        .sidebar-logo {
            text-align: center;
            padding: 0 20px 25px;
            border-bottom: 1px solid #eee;
            margin-bottom: 15px;
        }
        .sidebar-logo img { height: 45px; background: #000; border-radius: 8px; padding: 5px 10px; }
        .sidebar-logo h4 {
            font-size: 14px;
            font-weight: 700;
            margin-top: 10px;
            color: #1a1a2e;
        }
        .nav-item {
            display: flex;
            align-items: center;
            padding: 12px 25px;
            color: #666;
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
            transition: all 0.3s;
            border-left: 3px solid transparent;
        }
        .nav-item:hover, .nav-item.active {
            color: #a855f7;
            background: rgba(168,85,247,0.06);
            border-left-color: #a855f7;
        }
        .nav-item i { width: 24px; margin-right: 12px; font-size: 16px; }
        .nav-item.logout { margin-top: auto; color: #ef4444; }
        .nav-item.logout:hover { background: rgba(239,68,68,0.06); border-left-color: #ef4444; }

        .main-content {
            margin-left: 260px;
            flex: 1;
            padding: 30px;
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }
        .header h1 { font-size: 1.8rem; font-weight: 800; color: #1a1a2e; }
        .header h1 span { color: #a855f7; }
        .header .user-info { color: #888; font-size: 14px; }
        .header .user-info i { color: #a855f7; margin-right: 6px; }

        .stat-card {
            background: #ffffff;
            border: 1px solid #e0e0e0;
            border-radius: 16px;
            padding: 25px;
            transition: all 0.3s;
        }
        .stat-card:hover {
            border-color: #a855f7;
            box-shadow: 0 10px 40px rgba(168,85,247,0.1);
            transform: translateY(-3px);
        }
        .stat-card .stat-icon {
            width: 50px;
            height: 50px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 22px;
            margin-bottom: 15px;
        }
        .stat-card .stat-number { font-size: 2rem; font-weight: 800; color: #1a1a2e; }
        .stat-card .stat-label { color: #888; font-size: 13px; font-weight: 500; margin-top: 5px; }

        .table-card {
            background: #ffffff;
            border: 1px solid #e0e0e0;
            border-radius: 16px;
            padding: 25px;
            margin-top: 25px;
        }
        .table-card h5 { font-weight: 700; margin-bottom: 15px; color: #1a1a2e; }
        .table { color: #555; font-size: 13px; margin: 0; }
        .table thead th {
            border-bottom: 1px solid #e0e0e0;
            color: #888;
            font-weight: 600;
            font-size: 11px;
            text-transform: uppercase;
            letter-spacing: 1px;
            padding: 12px 8px;
        }
        .table td { border-bottom: 1px solid #f0f0f0; padding: 12px 8px; vertical-align: middle; }
        .table tr:hover { background: rgba(168,85,247,0.03); }
        .badge-genre {
            background: rgba(168,85,247,0.1);
            color: #a855f7;
            padding: 3px 12px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 600;
        }
        .alert {
            border-radius: 12px;
            font-size: 13px;
            padding: 12px 18px;
        }
        .alert-success { background: #f0fdf4; border: 1px solid #bbf7d0; color: #16a34a; }
    </style>
</head>
<body>
    <div class="sidebar">
        <div class="sidebar-logo">
            <img src="{{ asset('images/TentacitV1.1.png') }}" alt="Tentacit Records">
            <h4>Admin Panel</h4>
        </div>
        <a href="{{ route('admin.dashboard') }}" class="nav-item active"><i class="fas fa-home"></i> Dashboard</a>
        <a href="{{ route('admin.songs') }}" class="nav-item"><i class="fas fa-music"></i> Songs</a>
        <a href="{{ route('admin.artists') }}" class="nav-item"><i class="fas fa-users"></i> Artists</a>
        <div style="flex:1;"></div>
        <a href="{{ route('admin.logout') }}" class="nav-item logout"><i class="fas fa-sign-out-alt"></i> Logout</a>
    </div>

    <div class="main-content">
        <div class="header">
            <div>
                <h1>Welcome back, <span>{{ session('admin_username') }}</span></h1>
            </div>
            <div class="user-info">
                <i class="fas fa-user-circle"></i> {{ session('admin_username') }}
            </div>
        </div>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="row g-4">
            <div class="col-md-6">
                <div class="stat-card">
                    <div class="stat-icon" style="background: rgba(168,85,247,0.1); color: #a855f7;">
                        <i class="fas fa-music"></i>
                    </div>
                    <div class="stat-number">{{ $songCount }}</div>
                    <div class="stat-label">Total Songs</div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="stat-card">
                    <div class="stat-icon" style="background: rgba(56,189,248,0.1); color: #38bdf8;">
                        <i class="fas fa-users"></i>
                    </div>
                    <div class="stat-number">{{ $artistCount }}</div>
                    <div class="stat-label">Total Artists</div>
                </div>
            </div>
        </div>

        <div class="row g-4">
            <div class="col-lg-6">
                <div class="table-card">
                    <h5><i class="fas fa-music" style="color: #a855f7; margin-right: 8px;"></i> Recent Songs</h5>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Artist</th>
                                <th>Genre</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($recentSongs as $song)
                            <tr>
                                <td>{{ $song->songname }}</td>
                                <td>{{ $song->author }}</td>
                                <td><span class="badge-genre">{{ $song->genre }}</span></td>
                            </tr>
                            @empty
                            <tr><td colspan="3" style="color: #aaa; text-align: center;">No songs yet</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="table-card">
                    <h5><i class="fas fa-users" style="color: #38bdf8; margin-right: 8px;"></i> Recent Artists</h5>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Genre</th>
                                <th>Nationality</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($recentArtists as $artist)
                            <tr>
                                <td>{{ $artist->artistname }}</td>
                                <td><span class="badge-genre">{{ $artist->genre }}</span></td>
                                <td>{{ $artist->nationality ?? 'N/A' }}</td>
                            </tr>
                            @empty
                            <tr><td colspan="3" style="color: #aaa; text-align: center;">No artists yet</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
