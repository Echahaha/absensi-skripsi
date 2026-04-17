<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login SiAbsen</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <style>
        * { box-sizing: border-box; }

        body {
            min-height: 100vh;
            margin: 0;
            font-family: 'Segoe UI', sans-serif;
        }

        /* ================================
           MOBILE: Full screen tanpa card
        ================================ */
        .mobile-bg {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            background: linear-gradient(160deg, #0d47a1 0%, #1976d2 50%, #42a5f5 100%);
            padding: 0;
        }

        .mobile-top {
            flex: 0;
            padding: 60px 30px 40px;
            text-align: center;
        }

        .mobile-logo-circle {
            width: 90px;
            height: 90px;
            background: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 18px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
        }

        .mobile-logo-circle img {
            width: 70px;
            height: 70px;
            object-fit: contain;
            border-radius: 50%;
        }

        .mobile-form-area {
            flex: 1;
            background: white;
            border-radius: 30px 30px 0 0;
            padding: 35px 28px 40px;
            margin-top: 10px;
        }

        /* ================================
           DESKTOP: Form di tengah, background lebar
        ================================ */
        .desktop-bg {
            display: none;
            min-height: 100vh;
            background: linear-gradient(135deg, #0d47a1 0%, #1565c0 40%, #1976d2 70%, #42a5f5 100%);
            align-items: center;
            justify-content: center;
            padding: 40px;
            position: relative;
            overflow: hidden;
        }

        /* Dekorasi lingkaran background */
        .desktop-bg::before {
            content: '';
            position: absolute;
            width: 500px;
            height: 500px;
            background: rgba(255, 255, 255, 0.05);
            border-radius: 50%;
            top: -150px;
            left: -150px;
        }

        .desktop-bg::after {
            content: '';
            position: absolute;
            width: 400px;
            height: 400px;
            background: rgba(255, 255, 255, 0.05);
            border-radius: 50%;
            bottom: -100px;
            right: -100px;
        }

        .desktop-card {
            background: white;
            border-radius: 28px;
            box-shadow: 0 30px 80px rgba(0, 0, 0, 0.25);
            width: 100%;
            max-width: 480px;
            padding: 50px 45px;
            position: relative;
            z-index: 10;
        }

        .desktop-logo-circle {
            width: 85px;
            height: 85px;
            background: linear-gradient(135deg, #0d6efd, #0b5ed7);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            box-shadow: 0 8px 20px rgba(13, 110, 253, 0.35);
        }

        .desktop-logo-circle img {
            width: 65px;
            height: 65px;
            object-fit: contain;
            border-radius: 50%;
        }

        /* ================================
           SHARED STYLES
        ================================ */
        .form-control-custom {
            border: 2px solid #e9ecef;
            border-radius: 12px;
            padding: 13px 45px 13px 15px;
            font-size: 14px;
            transition: all 0.3s ease;
            background-color: #f8f9fa;
            width: 100%;
        }

        .form-control-custom:focus {
            border-color: #0d6efd;
            box-shadow: 0 0 0 4px rgba(13, 110, 253, 0.1);
            background-color: white;
            outline: none;
        }

        .input-wrapper {
            position: relative;
        }

        .input-icon {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #adb5bd;
            font-size: 15px;
            cursor: pointer;
        }

        .btn-login {
            background: linear-gradient(135deg, #0d6efd, #0b5ed7);
            border: none;
            border-radius: 12px;
            padding: 13px;
            font-size: 15px;
            font-weight: 700;
            letter-spacing: 1px;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
            box-shadow: 0 5px 15px rgba(13, 110, 253, 0.35);
            width: 100%;
            color: white;
        }

        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(13, 110, 253, 0.45);
            color: white;
        }

        .form-label-custom {
            font-size: 13px;
            font-weight: 600;
            color: #495057;
            margin-bottom: 8px;
            display: block;
        }

        .alert-custom {
            border: none;
            border-radius: 12px;
            background: #fff5f5;
            color: #dc3545;
            border-left: 4px solid #dc3545;
            font-size: 13px;
            padding: 12px 15px;
            margin-bottom: 20px;
        }

        .divider {
            display: flex;
            align-items: center;
            gap: 10px;
            margin: 22px 0;
            color: #adb5bd;
            font-size: 13px;
        }

        .divider::before,
        .divider::after {
            content: '';
            flex: 1;
            height: 1px;
            background: #e9ecef;
        }

        /* ================================
           RESPONSIVE BREAKPOINT
        ================================ */
        @media (min-width: 768px) {
            .mobile-bg { display: none; }
            .desktop-bg { display: flex; }
        }

        @media (max-width: 767px) {
            .mobile-bg { display: flex; }
            .desktop-bg { display: none; }
        }
    </style>
</head>

<body>

    <!-- ================================
         TAMPILAN MOBILE
    ================================ -->
    <div class="mobile-bg">

        <div class="mobile-top">
            <div class="mobile-logo-circle">
                <img src="{{ asset('images/logo_splash.png') }}" alt="Logo"
                    onerror="this.style.display='none'; this.parentElement.innerHTML='<i class=\'fas fa-fingerprint\' style=\'font-size:38px; color:#0d6efd;\'></i>'">
            </div>
            <h4 class="fw-bold text-white mb-1">SiAbsen Kampus</h4>
            <small class="text-white-50">Sistem Absensi Mahasiswa</small>
        </div>

        <div class="mobile-form-area">
            <h5 class="fw-bold text-dark mb-1">Selamat Datang! 👋</h5>
            <p class="text-muted mb-4" style="font-size: 13px;">Masuk untuk melanjutkan</p>

            @if($errors->any())
                <div class="alert-custom">
                    <i class="fas fa-exclamation-circle me-2"></i>{{ $errors->first() }}
                </div>
            @endif

            <form action="{{ url('/login-proses') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label class="form-label-custom">
                        <i class="fas fa-user me-1 text-primary"></i> Email / NIM
                    </label>
                    <div class="input-wrapper">
                        <input type="text" name="identity"
                            class="form-control-custom"
                            placeholder="Masukkan Email atau NIM..."
                            value="{{ old('identity') }}" required>
                        <i class="fas fa-envelope input-icon"></i>
                    </div>
                </div>

                <div class="mb-4">
                    <label class="form-label-custom">
                        <i class="fas fa-lock me-1 text-primary"></i> Password
                    </label>
                    <div class="input-wrapper">
                        <input type="password" name="password" id="mobilePassword"
                            class="form-control-custom"
                            placeholder="Masukkan Password..." required>
                        <i class="fas fa-eye input-icon" onclick="togglePass('mobilePassword', this)"></i>
                    </div>
                </div>

                <button type="submit" class="btn-login">
                    <i class="fas fa-sign-in-alt me-2"></i> MASUK
                </button>
            </form>

            <div class="divider">atau</div>

            <div class="text-center">
                <small class="text-muted">
                    <i class="fas fa-headset me-1"></i> Masalah login? Hubungi Admin.
                </small>
            </div>
        </div>
    </div>


    <!-- ================================
         TAMPILAN DESKTOP
    ================================ -->
    <div class="desktop-bg">
        <div class="desktop-card">

            <div class="text-center mb-4">
                <div class="desktop-logo-circle">
                    <img src="{{ asset('images/logo_splash.png') }}" alt="Logo"
                        onerror="this.style.display='none'; this.parentElement.innerHTML='<i class=\'fas fa-fingerprint\' style=\'font-size:38px; color:white;\'></i>'">
                </div>
                <h4 class="fw-bold text-dark mb-1">SiAbsen Kampus</h4>
                <small class="text-muted">Sistem Absensi Mahasiswa</small>
            </div>

            <hr class="mb-4">

            @if($errors->any())
                <div class="alert-custom">
                    <i class="fas fa-exclamation-circle me-2"></i>{{ $errors->first() }}
                </div>
            @endif

            <form action="{{ url('/login-proses') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label class="form-label-custom">
                        <i class="fas fa-user me-1 text-primary"></i> Email / NIM
                    </label>
                    <div class="input-wrapper">
                        <input type="text" name="identity"
                            class="form-control-custom"
                            placeholder="Masukkan Email atau NIM..."
                            value="{{ old('identity') }}" required>
                        <i class="fas fa-envelope input-icon"></i>
                    </div>
                </div>

                <div class="mb-4">
                    <label class="form-label-custom">
                        <i class="fas fa-lock me-1 text-primary"></i> Password
                    </label>
                    <div class="input-wrapper">
                        <input type="password" name="password" id="desktopPassword"
                            class="form-control-custom"
                            placeholder="Masukkan Password..." required>
                        <i class="fas fa-eye input-icon" onclick="togglePass('desktopPassword', this)"></i>
                    </div>
                </div>

                <button type="submit" class="btn-login">
                    <i class="fas fa-sign-in-alt me-2"></i> MASUK
                </button>

            </form>

            <div class="divider">atau</div>

            <div class="text-center">
                <small class="text-muted">
                    <i class="fas fa-headset me-1"></i> Masalah login? Hubungi Admin.
                </small>
            </div>

            <p class="text-center text-muted mt-4 mb-0" style="font-size: 12px;">
                © 2026 SiAbsen Kampus. All rights reserved.
            </p>

        </div>
    </div>

    <script>
        function togglePass(inputId, icon) {
            const input = document.getElementById(inputId);
            if (input.type === 'password') {
                input.type = 'text';
                icon.classList.replace('fa-eye', 'fa-eye-slash');
            } else {
                input.type = 'password';
                icon.classList.replace('fa-eye-slash', 'fa-eye');
            }
        }
    </script>

</body>
</html>