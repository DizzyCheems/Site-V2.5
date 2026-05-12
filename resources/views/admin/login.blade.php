<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tentacit Records | Admin Login</title>
    <link rel="icon" type="image/png" href="{{ asset('images/Tentacit Shape-0.png') }}">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="{{ asset('succesor/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: 'Montserrat', sans-serif;
            background: #f0f2f5;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
        }
        body::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle at 30% 50%, rgba(168,85,247,0.06) 0%, transparent 50%),
                        radial-gradient(circle at 70% 50%, rgba(56,189,248,0.06) 0%, transparent 50%);
            animation: bgPulse 8s ease-in-out infinite alternate;
        }
        @@keyframes bgPulse {
            0% { transform: scale(1) rotate(0deg); }
            100% { transform: scale(1.1) rotate(3deg); }
        }
        .login-container {
            position: relative;
            z-index: 1;
            width: 100%;
            max-width: 420px;
            padding: 20px;
        }
        .login-card {
            background: #ffffff;
            border: 1px solid #e0e0e0;
            border-radius: 24px;
            padding: 40px 35px;
            box-shadow: 0 10px 40px rgba(0,0,0,0.08);
        }
        .login-logo {
            text-align: center;
            margin-bottom: 30px;
        }
        .login-logo img {
            height: 60px;
            background: #000;
            border-radius: 10px;
            padding: 6px 12px;
        }
        .login-logo h2 {
            color: #1a1a2e;
            font-weight: 800;
            font-size: 1.5rem;
            margin-top: 15px;
        }
        .login-logo p { color: #888; font-size: 13px; margin-top: 5px; }
        .form-control {
            background: #f8f9fa;
            border: 1px solid #ddd;
            border-radius: 12px;
            padding: 14px 18px;
            color: #333;
            font-size: 14px;
            transition: all 0.3s;
        }
        .form-control:focus {
            background: #fff;
            border-color: #a855f7;
            box-shadow: 0 0 0 3px rgba(168,85,247,0.15);
            color: #333;
        }
        .form-control::placeholder { color: #aaa; }
        .form-label { color: #555; font-size: 12px; font-weight: 600; text-transform: uppercase; letter-spacing: 1px; margin-bottom: 8px; }
        .btn-login {
            width: 100%;
            padding: 14px;
            border: none;
            border-radius: 12px;
            background: linear-gradient(135deg, #a855f7, #38bdf8);
            color: #fff;
            font-weight: 700;
            font-size: 15px;
            cursor: pointer;
            transition: all 0.3s;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 40px rgba(168,85,247,0.3);
        }
        .alert {
            border-radius: 12px;
            font-size: 13px;
            padding: 12px 18px;
        }
        .alert-danger { background: #fef2f2; border: 1px solid #fecaca; color: #dc2626; }
        .alert-success { background: #f0fdf4; border: 1px solid #bbf7d0; color: #16a34a; }
        .back-link {
            text-align: center;
            margin-top: 20px;
        }
        .back-link a {
            color: #888;
            font-size: 13px;
            text-decoration: none;
            transition: 0.3s;
        }
        .back-link a:hover { color: #a855f7; }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-card">
            <div class="login-logo">
                <img src="{{ asset('images/TentacitV1.1.png') }}" alt="Tentacit Records">
                <h2>Admin Panel</h2>
                <p>Sign in to manage your content</p>
            </div>

            @if(session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <form action="{{ route('admin.authenticate') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label class="form-label">Username</label>
                    <input type="text" name="username" class="form-control" placeholder="Enter username" required>
                </div>
                <div class="mb-4">
                    <label class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Enter password" required>
                </div>
                <button type="submit" class="btn-login">Sign In</button>
            </form>

            <div class="back-link">
                <a href="{{ route('homepage') }}"><i class="fas fa-arrow-left"></i> Back to Home</a>
            </div>
        </div>
    </div>
</body>
</html>
