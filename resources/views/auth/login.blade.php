<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SPMS - Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            min-height: 100vh;
            background: linear-gradient(135deg, #1a237e 0%, #3949ab 50%, #5c6bc0 100%);
            display: flex; align-items: center; justify-content: center;
            font-family: 'Segoe UI', sans-serif;
        }
        .login-card {
            background: #fff; border-radius: 20px; padding: 48px 40px;
            box-shadow: 0 20px 60px rgba(0,0,0,0.3); width: 100%; max-width: 420px;
        }
        .login-logo { text-align: center; margin-bottom: 32px; }
        .login-logo .icon-wrap {
            width: 72px; height: 72px; background: linear-gradient(135deg, #1a237e, #3949ab);
            border-radius: 18px; display: inline-flex; align-items: center; justify-content: center;
            margin-bottom: 16px;
        }
        .login-logo h4 { font-weight: 700; color: #1a237e; margin: 0; }
        .login-logo p { color: #888; font-size: 0.85rem; margin: 4px 0 0; }
        .form-control { border-radius: 10px; padding: 12px 16px; border: 1.5px solid #e0e0e0; }
        .form-control:focus { border-color: #3949ab; box-shadow: 0 0 0 3px rgba(57,73,171,0.1); }
        .btn-login {
            background: linear-gradient(135deg, #1a237e, #3949ab); border: none;
            border-radius: 10px; padding: 13px; font-weight: 600; font-size: 1rem;
            width: 100%; color: #fff; transition: opacity 0.2s;
        }
        .btn-login:hover { opacity: 0.9; color: #fff; }
        .input-group-text { border-radius: 10px 0 0 10px; background: #f5f5f5; border: 1.5px solid #e0e0e0; border-right: none; }
        .input-group .form-control { border-radius: 0 10px 10px 0; }
    </style>
</head>
<body>
<div class="login-card">
    <div class="login-logo">
        <div class="icon-wrap">
            <i class="bi bi-shield-check text-white" style="font-size:2rem;"></i>
        </div>
        <h4>SPMS</h4>
        <p>Student Permission Management System</p>
    </div>

    @if($errors->any())
        <div class="alert alert-danger rounded-3 py-2 px-3 mb-3" style="font-size:0.875rem;">
            <i class="bi bi-exclamation-circle me-1"></i>{{ $errors->first() }}
        </div>
    @endif

    <form method="POST" action="{{ route('login.post') }}">
        @csrf
        <div class="mb-3">
            <label class="form-label fw-semibold text-secondary small">Email Address</label>
            <div class="input-group">
                <span class="input-group-text"><i class="bi bi-envelope text-secondary"></i></span>
                <input type="email" name="email" class="form-control" placeholder="Enter your email" value="{{ old('email') }}" required autofocus>
            </div>
        </div>
        <div class="mb-4">
            <label class="form-label fw-semibold text-secondary small">Password</label>
            <div class="input-group">
                <span class="input-group-text"><i class="bi bi-lock text-secondary"></i></span>
                <input type="password" name="password" class="form-control" placeholder="Enter your password" required>
            </div>
        </div>
        <div class="form-check mb-4">
            <input class="form-check-input" type="checkbox" name="remember" id="remember">
            <label class="form-check-label text-secondary small" for="remember">Remember me</label>
        </div>
        <button type="submit" class="btn-login">
            <i class="bi bi-box-arrow-in-right me-2"></i>Sign In
        </button>
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
