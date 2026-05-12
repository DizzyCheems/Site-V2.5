<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tentacit Records | Update {{ $vibe['name'] }} Vibe</title>
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
        .header { margin-bottom: 30px; }
        .header h1 { font-size: 1.8rem; font-weight: 800; color: #1a1a2e; }
        .header h1 span { color: #a855f7; }
        .form-card { background: #ffffff; border: 1px solid #e0e0e0; border-radius: 16px; padding: 30px; max-width: 600px; }
        .form-label { color: #555; font-size: 12px; font-weight: 600; text-transform: uppercase; letter-spacing: 1px; margin-bottom: 8px; }
        .form-control { background: #f8f9fa; border: 1px solid #ddd; border-radius: 10px; padding: 12px 16px; color: #333; font-size: 14px; transition: all 0.3s; }
        .form-control:focus { background: #fff; border-color: #a855f7; box-shadow: 0 0 0 3px rgba(168,85,247,0.15); color: #333; }
        .form-control[type="file"] { padding: 10px; }
        .form-control[type="file"]::file-selector-button { background: rgba(168,85,247,0.1); border: 1px solid rgba(168,85,247,0.2); color: #a855f7; padding: 6px 14px; border-radius: 6px; cursor: pointer; font-size: 12px; }
        .current-img-wrap { margin-bottom: 16px; border-radius: 12px; overflow: hidden; max-width: 300px; border: 1px solid #e0e0e0; }
        .current-img-wrap img { width: 100%; display: block; }
        .no-img-box { display: flex; align-items: center; justify-content: center; height: 160px; max-width: 300px; background: #1a1a2e; border-radius: 12px; color: #555; font-size: 13px; margin-bottom: 16px; }
        .btn-save { background: linear-gradient(135deg, #a855f7, #38bdf8); color: #fff; border: none; padding: 12px 30px; border-radius: 10px; font-weight: 700; font-size: 14px; cursor: pointer; transition: all 0.3s; }
        .btn-save:hover { transform: translateY(-2px); box-shadow: 0 8px 30px rgba(168,85,247,0.3); }
        .btn-cancel { background: #f0f0f0; color: #666; border: 1px solid #ddd; padding: 12px 30px; border-radius: 10px; font-weight: 600; font-size: 14px; text-decoration: none; transition: all 0.3s; display: inline-block; }
        .btn-cancel:hover { background: #e0e0e0; color: #333; }
        .alert { border-radius: 12px; font-size: 13px; padding: 12px 18px; }
        .alert-danger { background: #fef2f2; border: 1px solid #fecaca; color: #dc2626; }
        #imgPreview { max-width: 300px; border-radius: 12px; margin-top: 12px; display: none; border: 1px solid #e0e0e0; }
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
            <h1>Update <span>{{ $vibe['name'] }}</span> Vibe</h1>
            <p style="color:#888; font-size:13px; margin-top:4px;">{{ $vibe['desc'] }}</p>
        </div>

        @if($errors->any())
            <div class="alert alert-danger mb-3">
                <ul style="margin:0; padding-left:18px;">
                    @foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach
                </ul>
            </div>
        @endif

        <div class="form-card">
            @php
                $currentImg = null;
                foreach(['jpg','jpeg','png','webp','gif'] as $ext) {
                    if(file_exists(public_path('assets/vibes/'.$vibe['slug'].'.'.$ext))) {
                        $currentImg = asset('assets/vibes/'.$vibe['slug'].'.'.$ext);
                        break;
                    }
                }
            @endphp

            <div class="mb-3">
                <label class="form-label">Current Image</label>
                @if($currentImg)
                    <div class="current-img-wrap">
                        <img src="{{ $currentImg }}" alt="{{ $vibe['name'] }}" id="currentImg">
                    </div>
                @else
                    <div class="no-img-box"><i class="fas fa-image" style="margin-right:8px;"></i> No image set</div>
                @endif
            </div>

            <form action="{{ route('admin.vibe.save', $vibe['slug']) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-4">
                    <label class="form-label">Upload New Image</label>
                    <input type="file" name="image" class="form-control" accept="image/*" required
                        onchange="previewImg(this)">
                    <img id="imgPreview" src="" alt="Preview">
                </div>
                <div class="d-flex gap-3">
                    <button type="submit" class="btn-save"><i class="fas fa-save"></i> Save Image</button>
                    <a href="{{ route('admin.vibes') }}" class="btn-cancel"><i class="fas fa-times"></i> Cancel</a>
                </div>
            </form>
        </div>
    </div>

    <script>
        function previewImg(input) {
            const preview = document.getElementById('imgPreview');
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = e => { preview.src = e.target.result; preview.style.display = 'block'; };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
</body>
</html>
