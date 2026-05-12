<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tentacit Records | Manage Songs</title>
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
        }
        .sidebar-logo { text-align: center; padding: 0 20px 25px; border-bottom: 1px solid #eee; margin-bottom: 15px; }
        .sidebar-logo img { height: 45px; }
        .sidebar-logo h4 { font-size: 14px; font-weight: 700; margin-top: 10px; color: #1a1a2e; }
        .nav-item {
            display: flex; align-items: center; padding: 12px 25px; color: #666; text-decoration: none;
            font-size: 14px; font-weight: 500; transition: all 0.3s; border-left: 3px solid transparent;
        }
        .nav-item:hover, .nav-item.active { color: #a855f7; background: rgba(168,85,247,0.06); border-left-color: #a855f7; }
        .nav-item i { width: 24px; margin-right: 12px; font-size: 16px; }
        .nav-item.logout { margin-top: auto; color: #ef4444; }
        .nav-item.logout:hover { background: rgba(239,68,68,0.06); border-left-color: #ef4444; }
        .main-content { margin-left: 260px; flex: 1; padding: 30px; }
        .header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px; }
        .header h1 { font-size: 1.8rem; font-weight: 800; color: #1a1a2e; }
        .header h1 span { color: #a855f7; }
        .btn-add {
            background: linear-gradient(135deg, #a855f7, #38bdf8);
            color: #fff; border: none; padding: 10px 22px; border-radius: 10px;
            font-weight: 600; font-size: 13px; text-decoration: none; transition: all 0.3s;
        }
        .btn-add:hover { transform: translateY(-2px); box-shadow: 0 8px 30px rgba(168,85,247,0.3); color: #fff; }
        .table-card {
            background: #ffffff; border: 1px solid #e0e0e0;
            border-radius: 16px; padding: 25px; overflow-x: auto;
        }
        .table { color: #555; font-size: 13px; margin: 0; }
        .table thead th {
            border-bottom: 1px solid #e0e0e0; color: #888;
            font-weight: 600; font-size: 11px; text-transform: uppercase; letter-spacing: 1px; padding: 12px 8px;
        }
        .table td { border-bottom: 1px solid #f0f0f0; padding: 12px 8px; vertical-align: middle; }
        .table tr:hover { background: rgba(168,85,247,0.03); }
        .badge-genre { background: rgba(168,85,247,0.1); color: #a855f7; padding: 3px 12px; border-radius: 20px; font-size: 11px; font-weight: 600; }
        .btn-sm { padding: 4px 12px; font-size: 11px; border-radius: 6px; border: none; font-weight: 600; text-decoration: none; display: inline-block; }
        .btn-edit { background: rgba(56,189,248,0.1); color: #38bdf8; }
        .btn-edit:hover { background: rgba(56,189,248,0.2); color: #38bdf8; }
        .btn-delete { background: rgba(239,68,68,0.1); color: #ef4444; }
        .btn-delete:hover { background: rgba(239,68,68,0.2); color: #ef4444; }
        .alert { border-radius: 12px; font-size: 13px; padding: 12px 18px; }
        .alert-success { background: #f0fdf4; border: 1px solid #bbf7d0; color: #16a34a; }
        .song-thumb { width: 40px; height: 40px; border-radius: 8px; object-fit: cover; }
        .bg-thumb { width: 60px; height: 34px; border-radius: 4px; object-fit: cover; }
    </style>
</head>
<body>
    <div class="sidebar">
        <div class="sidebar-logo">
            <img src="{{ asset('images/TentacitV1.1.png') }}" alt="Tentacit Records">
            <h4>Admin Panel</h4>
        </div>
        <a href="{{ route('admin.dashboard') }}" class="nav-item"><i class="fas fa-home"></i> Dashboard</a>
        <a href="{{ route('admin.songs') }}" class="nav-item active"><i class="fas fa-music"></i> Songs</a>
        <a href="{{ route('admin.artists') }}" class="nav-item"><i class="fas fa-users"></i> Artists</a>
        <div style="flex:1;"></div>
        <a href="{{ route('admin.logout') }}" class="nav-item logout"><i class="fas fa-sign-out-alt"></i> Logout</a>
    </div>

    <div class="main-content">
        <div class="header">
            <h1>Manage <span>Songs</span></h1>
            <a href="{{ route('admin.song.form') }}" class="btn-add"><i class="fas fa-plus"></i> Add Song</a>
        </div>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="table-card">
            <table class="table">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Background</th>
                        <th>Title</th>
                        <th>Artist</th>
                        <th>Genre</th>
                        <th>Album</th>
                        <th>Audio</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($songs as $song)
                    <tr>
                        <td>
                            @if($song->image)
                                <img src="{{ asset('song-images/' . $song->image) }}" class="song-thumb" onerror="this.style.display='none'">
                            @else
                                <span style="color:#aaa;">—</span>
                            @endif
                        </td>
                        <td>
                            @if($song->background_image)
                                <img src="{{ asset('song-images/' . $song->background_image) }}" class="bg-thumb" onerror="this.style.display='none'">
                            @else
                                <span style="color:#aaa;">—</span>
                            @endif
                        </td>
                        <td>{{ $song->songname }}</td>
                        <td>{{ $song->author }}</td>
                        <td><span class="badge-genre">{{ $song->genre }}</span></td>
                        <td>{{ $song->album ?? '—' }}</td>
                        <td style="max-width:150px; overflow:hidden; text-overflow:ellipsis; white-space:nowrap;">{{ $song->audio }}</td>
                        <td>
                            <a href="{{ route('admin.song.form', $song->id) }}" class="btn-sm btn-edit"><i class="fas fa-edit"></i> Edit</a>
                            <a href="{{ route('admin.song.delete', $song->id) }}" class="btn-sm btn-delete" onclick="return confirm('Delete this song?')"><i class="fas fa-trash"></i> Delete</a>
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan="8" style="text-align:center; color:#aaa; padding:40px;">No songs found. Click "Add Song" to get started!</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
