<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tentacit Records | {{ $song ? 'Edit' : 'Add' }} Song</title>
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
        .header { margin-bottom: 30px; }
        .header h1 { font-size: 1.8rem; font-weight: 800; color: #1a1a2e; }
        .header h1 span { color: #a855f7; }
        .form-card {
            background: #ffffff; border: 1px solid #e0e0e0;
            border-radius: 16px; padding: 30px; max-width: 750px;
        }
        .form-label { color: #555; font-size: 12px; font-weight: 600; text-transform: uppercase; letter-spacing: 1px; margin-bottom: 8px; }
        .form-control {
            background: #f8f9fa; border: 1px solid #ddd;
            border-radius: 10px; padding: 12px 16px; color: #333; font-size: 14px; transition: all 0.3s;
        }
        .form-control:focus { background: #fff; border-color: #a855f7; box-shadow: 0 0 0 3px rgba(168,85,247,0.15); color: #333; }
        .form-control::placeholder { color: #aaa; }
        .form-control[type="file"] { padding: 10px; }
        .form-control[type="file"]::file-selector-button {
            background: rgba(168,85,247,0.1); border: 1px solid rgba(168,85,247,0.2);
            color: #a855f7; padding: 6px 14px; border-radius: 6px; cursor: pointer; font-size: 12px;
        }
        .btn-save {
            background: linear-gradient(135deg, #a855f7, #38bdf8); color: #fff; border: none;
            padding: 12px 30px; border-radius: 10px; font-weight: 700; font-size: 14px; cursor: pointer; transition: all 0.3s;
        }
        .btn-save:hover { transform: translateY(-2px); box-shadow: 0 8px 30px rgba(168,85,247,0.3); }
        .btn-cancel {
            background: #f0f0f0; color: #666; border: 1px solid #ddd;
            padding: 12px 30px; border-radius: 10px; font-weight: 600; font-size: 14px; text-decoration: none; transition: all 0.3s; display: inline-block;
        }
        .btn-cancel:hover { background: #e0e0e0; color: #333; }
        .current-file { color: #888; font-size: 12px; margin-top: 5px; }
        .preview-img { max-width: 120px; max-height: 80px; border-radius: 6px; margin-top: 5px; border: 1px solid #eee; }
        .alert { border-radius: 12px; font-size: 13px; padding: 12px 18px; }
        .alert-danger { background: #fef2f2; border: 1px solid #fecaca; color: #dc2626; }
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
            <h1>{{ $song ? 'Edit' : 'Add' }} <span>Song</span></h1>
        </div>

        @if($errors->any())
            <div class="alert alert-danger">
                <ul style="margin:0; padding-left:18px;">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="form-card">
            <form action="{{ route('admin.song.save', $song->id ?? '') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Song Title</label>
                        <input type="text" name="songname" class="form-control" value="{{ $song->songname ?? '' }}" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Artist</label>
                        <input type="text" name="author" class="form-control" value="{{ $song->author ?? '' }}" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Genre</label>
                        <input type="text" name="genre" class="form-control" value="{{ $song->genre ?? '' }}" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Album</label>
                        <input type="text" name="album" class="form-control" value="{{ $song->album ?? '' }}">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Date Registered</label>
                        <input type="date" name="date_registered" class="form-control" value="{{ $song->date_registered ?? '' }}">
                    </div>
                    <div class="col-md-12">
                        <label class="form-label">Info</label>
                        <textarea name="info" class="form-control" rows="3">{{ $song->info ?? '' }}</textarea>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Song Image</label>
                        <input type="file" name="image" class="form-control" accept="image/*">
                        @if($song && $song->image)
                            <div class="current-file">Current: {{ $song->image }}</div>
                            <img src="{{ asset('song-images/' . $song->image) }}" class="preview-img">
                        @endif
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Background Image</label>
                        <input type="file" name="background_image" class="form-control" accept="image/*">
                        @if($song && $song->background_image)
                            <div class="current-file">Current: {{ $song->background_image }}</div>
                            <img src="{{ asset('song-images/' . $song->background_image) }}" class="preview-img">
                        @endif
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Audio File</label>
                        <input type="file" name="audio" class="form-control" accept=".mp3,.wav,.ogg,.flac">
                        @if($song && $song->audio)
                            <div class="current-file">Current: {{ $song->audio }}</div>
                        @endif
                    </div>
                </div>
                <div class="mt-4 d-flex gap-3">
                    <button type="submit" class="btn-save"><i class="fas fa-save"></i> {{ $song ? 'Update' : 'Save' }} Song</button>
                    <a href="{{ route('admin.songs') }}" class="btn-cancel"><i class="fas fa-times"></i> Cancel</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
