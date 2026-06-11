<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login | KTSPM Law College</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        body { background: linear-gradient(135deg, #0a1228 0%, #162450 60%, #1e3368 100%); min-height: 100vh; display: flex; align-items: center; justify-content: center; }
        .login-card { background: #fff; border-radius: 16px; box-shadow: 0 20px 60px rgba(0,0,0,.4); overflow: hidden; max-width: 420px; width: 100%; }
        .login-header { background: linear-gradient(135deg, #162450, #0a1228); padding: 35px 30px; text-align: center; color: #fff; }
        .login-header h4 { font-family: Georgia, serif; font-size: 1.3rem; }
        .login-body { padding: 35px 30px; }
        .btn-login { background: #162450; color: #fff; border: none; padding: 12px; font-size: 1rem; border-radius: 8px; }
        .btn-login:hover { background: #0a1228; color: #fff; }
    </style>
</head>
<body>
    <div class="login-card">
        <div class="login-header">
            <div class="mb-3">
                <img src="{{ asset('images/logo.png') }}" alt="Logo" style="height:80px;width:80px;object-fit:contain;background:#0a1228;border-radius:50%;padding:5px;">
            </div>
            <h4>K.T.S.P.M's Law College</h4>
            <small class="opacity-75">Admin Panel Login</small>
        </div>
        <div class="login-body">
            @if(session('error'))
                <div class="alert alert-danger py-2">{{ session('error') }}</div>
            @endif
            <form action="{{ route('admin.login.post') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label fw-semibold">Email Address</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-envelope text-muted"></i></span>
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="admin@college.edu.in" required autofocus>
                        @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Password</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-lock text-muted"></i></span>
                        <input type="password" name="password" class="form-control" placeholder="••••••••" required>
                    </div>
                </div>
                <div class="form-check mb-3">
                    <input type="checkbox" class="form-check-input" name="remember" id="remember">
                    <label class="form-check-label" for="remember">Remember me</label>
                </div>
                <button type="submit" class="btn btn-login w-100">
                    <i class="fas fa-sign-in-alt me-2"></i>Login to Admin Panel
                </button>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
