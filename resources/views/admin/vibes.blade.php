<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tentacit Records | Manage Vibes</title>
    <link rel="icon" type="image/png" href="{{ asset('images/Tentacit Shape-0.png') }}">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="{{ asset('succesor/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Montserrat', sans-serif; background: #f0f2f5; color: #333; display: flex; min-height: 100vh; }
        .sidebar { width: 260px; background: #ffffff; border-right: 1px solid #e0e0e0; padding: 25px 0; position: fixed; top: 0; left: 0; bottom: 0; z-index: 100; overflow-y: auto; }
        .sidebar-logo { text-align: center; padding: 0 20px 25px; border-bottom: 1px solid #eee; margin-bottom: 15px; }
        .sidebar-logo img { height: 45px; background: #000; border-radius: 8px; padding: 5px 10px; }
        .sidebar-logo h4 { font-size: 14px; font-weight: 700; margin-top: 10px; color: #1a1a2e; }
        .nav-item { display: flex; align-items: center; padding: 12px 25px; color: #666; text-decoration: none; font-size: 14px; font-weight: 500; transition: all 0.3s; border-left: 3px solid transparent; }
        .nav-item:hover, .nav-item.active { color: #a855f7; background: rgba(168,85,247,0.06); border-left-color: #a855f7; }
        .nav-item i { width: 24px; margin-right: 12px; font-size: 16px; }
        .nav-item.logout { color: #ef4444; }
        .nav-item.logout:hover { background: rgba(239,68,68,0.06); border-left-color: #ef4444; }
        .main-content { margin-left: 260px; flex: 1; padding: 30px; animation: fadeIn 0.4s ease; }
        @keyframes fadeIn { from { opacity: 0; transform: translateY(10px); } to { opacity: 1; transform: translateY(0); } }
        .header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px; }
        .header h1 { font-size: 1.8rem; font-weight: 800; color: #1a1a2e; }
        .header h1 span { color: #a855f7; }
        .vibes-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(320px, 1fr)); gap: 24px; }
        .vibe-card {
            background: #fff; border: 1px solid #e0e0e0; border-radius: 16px; overflow: hidden;
            transition: all 0.3s; box-shadow: 0 2px 12px rgba(0,0,0,0.04);
        }
        .vibe-card:hover { transform: translateY(-4px); box-shadow: 0 12px 40px rgba(168,85,247,0.12); border-color: #a855f7; }
        .vibe-img-wrap { position: relative; height: 180px; background: #1a1a2e; overflow: hidden; }
        .vibe-img-wrap img { width: 100%; height: 100%; object-fit: cover; display: block; }
        .vibe-img-wrap .no-img { display: flex; align-items: center; justify-content: center; height: 100%; color: #555; font-size: 13px; }
        .vibe-body { padding: 20px; }
        .vibe-name { font-weight: 800; font-size: 1.1rem; color: #1a1a2e; text-transform: uppercase; letter-spacing: 1px; }
        .vibe-desc { color: #888; font-size: 12px; margin-top: 4px; margin-bottom: 16px; }
        .btn-edit-vibe {
            display: inline-flex; align-items: center; gap: 6px;
            background: linear-gradient(135deg, #a855f7, #38bdf8); color: #fff;
            border: none; padding: 9px 20px; border-radius: 10px; font-weight: 600;
            font-size: 13px; text-decoration: none; transition: all 0.3s;
        }
        .btn-edit-vibe:hover { transform: translateY(-2px); box-shadow: 0 8px 30px rgba(168,85,247,0.3); color: #fff; }
        .alert { border-radius: 12px; font-size: 13px; padding: 12px 18px; margin-bottom: 20px; }
        .alert-success { background: #f0fdf4; border: 1px solid #bbf7d0; color: #16a34a; }
    </style>
</head>
<body>
    <div class="sidebar">
        <div class="sidebar-logo">
            <img src="{{ asset('images/TentacitV1.1.png') }}" alt="Tentacit Records">
            <h4>Admin Panel</h4>
        </div>
        <a href="{{ route('admin.dashboard') }}" class="nav-item"><i class="fas fa-home"></i> Dashboard</a>
        <a href="{{ route('admin.songs') }}" class="nav-item"><i class="fas fa-music"></i> Songs</a>
        <a href="{{ route('admin.artists') }}" class="nav-item"><i class="fas fa-users"></i> Artists</a>
        <a href="{{ route('admin.vibes') }}" class="nav-item active"><i class="fas fa-fire"></i> Vibes</a>
        <div style="flex:1;"></div>
        <a href="{{ route('admin.logout') }}" class="nav-item logout"><i class="fas fa-sign-out-alt"></i> Logout</a>
    </div>

    <div class="main-content">
        <div class="header">
            <h1>Manage <span>Vibes</span></h1>
        </div>

        <div class="vibes-grid">
            @foreach($vibes as $slug => $vibe)
            @php
                $imgPath = null;
                foreach(['jpg','jpeg','png','webp','gif'] as $ext) {
                    if(file_exists(public_path('assets/vibes/'.$slug.'.'.$ext))) {
                        $imgPath = asset('assets/vibes/'.$slug.'.'.$ext);
                        break;
                    }
                }
            @endphp
            <div class="vibe-card">
                <div class="vibe-img-wrap">
                    @if($imgPath)
                        <img src="{{ $imgPath }}" alt="{{ $vibe['name'] }}">
                    @else
                        <div class="no-img"><i class="fas fa-image" style="margin-right:8px;"></i> No image</div>
                    @endif
                </div>
                <div class="vibe-body">
                    <div class="vibe-name">{{ $vibe['name'] }}</div>
                    <div class="vibe-desc">{{ $vibe['desc'] }}</div>
                    <a href="{{ route('admin.vibe.form', $slug) }}" class="btn-edit-vibe">
                        <i class="fas fa-image"></i> Update Image
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <script>
        @if(session('success'))
        Swal.fire({ toast: true, position: 'top-end', icon: 'success', title: @json(session('success')), showConfirmButton: false, timer: 3000, timerProgressBar: true });
        @endif
    </script>
</body>
</html>
