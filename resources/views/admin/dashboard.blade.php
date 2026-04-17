<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dosen</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        :root {
            --dark: #1e293b;
            --blue-primary: #1a56db;
            --blue-light: #e8f0fe;
            --green: #0a9f6e;
            --green-light: #d1fae5;
            --yellow: #d97706;
            --yellow-light: #fef3c7;
            --red: #dc2626;
            --red-light: #fee2e2;
            --gray-50: #f8fafc;
            --gray-100: #f1f5f9;
            --gray-200: #e2e8f0;
            --gray-400: #94a3b8;
            --gray-600: #475569;
            --gray-800: #1e293b;
            --radius: 16px;
            --radius-sm: 10px;
            --shadow: 0 1px 3px rgba(0,0,0,.08), 0 4px 16px rgba(0,0,0,.06);
        }

        * { box-sizing: border-box; }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: var(--gray-100);
            color: var(--gray-800);
            margin: 0; padding: 0;
        }

        /* ─── SIDEBAR ─── */
        .sidebar {
            width: 260px;
            min-height: 100vh;
            background: var(--dark);
            display: flex;
            flex-direction: column;
            position: fixed;
            top: 0; left: 0;
            z-index: 100;
        }

        .sidebar-brand {
            padding: 24px 24px 20px;
            border-bottom: 1px solid rgba(255,255,255,.08);
        }

        .sidebar-brand-title { font-size: 15px; font-weight: 800; color: white; }
        .sidebar-brand-sub { font-size: 11px; color: rgba(255,255,255,.4); font-weight: 500; }
        .sidebar-nav { padding: 16px 12px; flex: 1; }

        .sidebar-nav-label {
            font-size: 10px;
            text-transform: uppercase;
            letter-spacing: .08em;
            color: rgba(255,255,255,.3);
            font-weight: 700;
            padding: 0 12px;
            margin-bottom: 8px;
            margin-top: 16px;
        }

        .sidebar-nav-link {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 11px 14px;
            border-radius: var(--radius-sm);
            color: rgba(255,255,255,.6);
            text-decoration: none;
            font-size: 14px;
            font-weight: 600;
            transition: all .18s;
            margin-bottom: 2px;
        }

        .sidebar-nav-link:hover { background: rgba(255,255,255,.07); color: white; }
        .sidebar-nav-link.active { background: rgba(255,255,255,.12); color: white; }
        .sidebar-nav-link i { width: 20px; text-align: center; font-size: 15px; }

        .sidebar-footer {
            padding: 16px 12px;
            border-top: 1px solid rgba(255,255,255,.08);
        }

        .sidebar-date {
            padding: 10px 14px;
            border-radius: var(--radius-sm);
            background: rgba(255,255,255,.06);
            font-size: 12px;
            color: rgba(255,255,255,.5);
            font-weight: 600;
            margin-bottom: 10px;
        }

        .btn-logout-web {
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 10px 14px;
            border-radius: var(--radius-sm);
            background: rgba(220,38,38,.15);
            color: #f87171;
            border: 1px solid rgba(220,38,38,.2);
            font-size: 13px;
            font-weight: 700;
            cursor: pointer;
            text-decoration: none;
            transition: all .18s;
            width: 100%;
            justify-content: center;
        }

        .btn-logout-web:hover { background: rgba(220,38,38,.25); color: #fca5a5; }

        /* ─── MAIN CONTENT ─── */
        .main-content {
            margin-left: 260px;
            padding: 32px;
            min-height: 100vh;
        }

        /* ─── MOBILE HEADER ─── */
        .mobile-header {
            background: linear-gradient(135deg, #212529, #343a40);
            color: white;
            padding: 20px;
            border-bottom-left-radius: 20px;
            border-bottom-right-radius: 20px;
        }

        /* ─── STAT CARDS ─── */
        .stat-card {
            background: white;
            border-radius: var(--radius);
            padding: 22px 24px;
            box-shadow: var(--shadow);
            border: 1px solid var(--gray-200);
            display: flex;
            align-items: center;
            gap: 16px;
            text-decoration: none;
            transition: transform .18s, box-shadow .18s;
            height: 100%;
        }

        .stat-card:hover { transform: translateY(-3px); box-shadow: 0 8px 24px rgba(0,0,0,.1); }

        .stat-icon {
            width: 52px; height: 52px;
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 22px;
            flex-shrink: 0;
        }

        .stat-value { font-size: 30px; font-weight: 800; line-height: 1; }
        .stat-label { font-size: 12px; color: var(--gray-400); font-weight: 700; margin-top: 4px; text-transform: uppercase; }

        /* Mobile stat card */
        .stat-card-mobile {
            border-radius: 15px;
            text-align: center;
            padding: 15px 10px;
            text-decoration: none;
            display: block;
            transition: transform .2s;
        }

        .stat-card-mobile:hover { transform: translateY(-3px); }

        /* ─── CONTENT CARD ─── */
        .content-card {
            background: white;
            border-radius: var(--radius);
            box-shadow: var(--shadow);
            border: 1px solid var(--gray-200);
            overflow: hidden;
            margin-bottom: 20px;
        }

        .content-card-header {
            padding: 16px 20px;
            border-bottom: 1px solid var(--gray-200);
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .content-card-title { font-size: 15px; font-weight: 700; color: var(--gray-800); margin: 0; }

        /* ─── MENU LINKS ─── */
        .menu-link {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 14px 20px;
            text-decoration: none;
            color: var(--gray-800);
            border-bottom: 1px solid var(--gray-100);
            transition: background .15s;
            font-size: 14px;
            font-weight: 600;
        }

        .menu-link:last-child { border-bottom: none; }
        .menu-link:hover { background: var(--gray-50); color: var(--gray-800); }

        .menu-link-icon {
            width: 34px; height: 34px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 14px;
            margin-right: 12px;
            flex-shrink: 0;
        }

        /* ─── ALERT CARDS ─── */
        .alert-item {
            padding: 14px 20px;
            border-bottom: 1px solid var(--gray-100);
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .alert-item:last-child { border-bottom: none; }

        .status-pill {
            display: inline-flex;
            align-items: center;
            padding: 4px 12px;
            border-radius: 999px;
            font-size: 12px;
            font-weight: 700;
        }

        .status-pill.alpha { background: var(--red-light); color: var(--red); }
        .status-pill.terlambat { background: var(--yellow-light); color: var(--yellow); }

        /* ─── MODAL ─── */
        .modal-custom .modal-content { border: none; border-radius: 20px; overflow: hidden; }
        .modal-custom .modal-header { background: linear-gradient(135deg, #dc3545, #c82333); border: none; padding: 20px 25px; }
        .modal-custom .modal-body { padding: 25px; text-align: center; }
        .modal-custom .modal-footer { border: none; padding: 0 25px 25px; justify-content: center; gap: 12px; }
        .btn-cancel-custom { border-radius: 12px; padding: 10px 30px; font-weight: 700; border: 2px solid #e9ecef; background: white; color: #6c757d; }
        .btn-logout-custom { border-radius: 12px; padding: 10px 30px; font-weight: 700; background: linear-gradient(135deg, #dc3545, #c82333); border: none; color: white; }

        /* ─── RESPONSIVE ─── */
        @media (max-width: 767px) {
            .sidebar { display: none; }
            .main-content { margin-left: 0; padding: 0 0 70px 0; }
        }
    </style>
</head>

<body>

    {{-- Sidebar (Desktop Only) --}}
    <aside class="sidebar d-none d-md-flex flex-column">
        <div class="sidebar-brand">
            <div class="sidebar-brand-title"><i class="fas fa-chalkboard-teacher me-2"></i>Panel Dosen</div>
            <div class="sidebar-brand-sub">Sistem Absensi Mahasiswa</div>
        </div>
        <nav class="sidebar-nav">
            <div class="sidebar-nav-label">Menu</div>
            <a href="{{ route('admin.dashboard') }}" class="sidebar-nav-link active">
                <i class="fas fa-home"></i> Dashboard
            </a>
            <a href="{{ route('mahasiswa.index') }}" class="sidebar-nav-link">
                <i class="fas fa-user-graduate"></i> Data Mahasiswa
            </a>
            <a href="{{ route('admin.riwayat') }}" class="sidebar-nav-link">
                <i class="fas fa-history"></i> Riwayat Absensi
            </a>
            <a href="{{ route('admin.pengaturan') }}" class="sidebar-nav-link">
                <i class="fas fa-cog"></i> Pengaturan Jam
            </a>
        </nav>
        <div class="sidebar-footer">
            <div class="sidebar-date">
                <i class="far fa-calendar-alt me-2"></i>
                {{ \Carbon\Carbon::now()->translatedFormat('l, d F Y') }}
            </div>
            <a href="#" class="btn-logout-web" data-bs-toggle="modal" data-bs-target="#modalLogout">
                <i class="fas fa-sign-out-alt"></i> Keluar
            </a>
        </div>
    </aside>

    {{-- Main Content --}}
    <div class="main-content">

        {{-- Mobile Header (hanya muncul di mobile) --}}
        <div class="mobile-header d-md-none mb-4">
            <div class="d-flex justify-content-between align-items-center mb-1">
                <h5 class="m-0 fw-bold">
                    <i class="fas fa-chalkboard-teacher me-2"></i> Panel Dosen
                </h5>
                <a href="#" class="text-white" data-bs-toggle="modal" data-bs-target="#modalLogout">
                    <i class="fas fa-power-off fa-lg"></i>
                </a>
            </div>
            <small class="opacity-75">
                <i class="far fa-calendar-alt me-1"></i>
                {{ \Carbon\Carbon::now()->translatedFormat('l, d F Y') }}
            </small>
        </div>

        {{-- Desktop Topbar (hanya muncul di desktop) --}}
        <div class="d-none d-md-flex justify-content-between align-items-center mb-4">
            <div>
                <div style="font-size:22px; font-weight:800;">Dashboard</div>
                <div style="font-size:13px; color:var(--gray-400);">Selamat datang di Panel Dosen — ringkasan kehadiran hari ini</div>
            </div>
        </div>

        {{-- Stat Cards --}}
        <div class="px-3 px-md-0">
            <div class="row g-3 mb-4">

                {{-- Desktop: stat card dengan icon | Mobile: stat card warna solid --}}
                <div class="col-4 col-md">
                    <a href="{{ route('mahasiswa.index') }}"
                        class="stat-card-mobile bg-primary text-white shadow-sm d-md-none">
                        <h3 class="fw-bold m-0">{{ $total_mhs }}</h3>
                        <small style="font-size:11px;">Total Mhs</small>
                    </a>
                    <a href="{{ route('mahasiswa.index') }}" class="stat-card d-none d-md-flex">
                        <div class="stat-icon" style="background:var(--blue-light);color:var(--blue-primary);">
                            <i class="fas fa-users"></i>
                        </div>
                        <div>
                            <div class="stat-value" style="color:var(--blue-primary);">{{ $total_mhs }}</div>
                            <div class="stat-label">Total Mahasiswa</div>
                        </div>
                    </a>
                </div>

                <div class="col-4 col-md">
                    <a href="{{ route('admin.riwayat', ['status' => 'Hadir', 'hari_ini' => 'true']) }}"
                        class="stat-card-mobile bg-success text-white shadow-sm d-md-none">
                        <h3 class="fw-bold m-0">{{ $hadir }}</h3>
                        <small style="font-size:11px;">Hadir</small>
                    </a>
                    <a href="{{ route('admin.riwayat', ['status' => 'Hadir', 'hari_ini' => 'true']) }}" class="stat-card d-none d-md-flex">
                        <div class="stat-icon" style="background:var(--green-light);color:var(--green);">
                            <i class="fas fa-check-circle"></i>
                        </div>
                        <div>
                            <div class="stat-value" style="color:var(--green);">{{ $hadir }}</div>
                            <div class="stat-label">Hadir Hari Ini</div>
                        </div>
                    </a>
                </div>

                <div class="col-4 col-md">
                    <a href="{{ route('admin.riwayat', ['status' => 'Alpha', 'hari_ini' => 'true']) }}"
                        class="stat-card-mobile bg-danger text-white shadow-sm d-md-none">
                        <h3 class="fw-bold m-0">{{ $alpha }}</h3>
                        <small style="font-size:11px;">Alpha</small>
                    </a>
                    <a href="{{ route('admin.riwayat', ['status' => 'Alpha', 'hari_ini' => 'true']) }}" class="stat-card d-none d-md-flex">
                        <div class="stat-icon" style="background:var(--red-light);color:var(--red);">
                            <i class="fas fa-times-circle"></i>
                        </div>
                        <div>
                            <div class="stat-value" style="color:var(--red);">{{ $alpha }}</div>
                            <div class="stat-label">Alpha Hari Ini</div>
                        </div>
                    </a>
                </div>

            </div>
        </div>

        {{-- Content --}}
        <div class="px-3 px-md-0">
            <div class="row g-3 align-items-start">

                {{-- Perlu Perhatian --}}
                <div class="col-12 col-md-8">
                    <div class="content-card">
                        <div class="content-card-header">
                            <h6 class="content-card-title">
                                <i class="fas fa-exclamation-circle me-2" style="color:var(--red)"></i>Perlu Perhatian Hari Ini
                            </h6>
                            <span style="font-size:12px; color:var(--gray-400); font-weight:600;">{{ count($bermasalah) }} mahasiswa</span>
                        </div>
                        @forelse($bermasalah as $item)
                            <div class="alert-item">
                                <div>
                                    <div style="font-weight:700; font-size:14px; margin-bottom:3px;">{{ $item->mahasiswa->nama_lengkap }}</div>
                                    <div style="font-size:12px; color:var(--gray-400); font-weight:600;">
                                        <i class="fas fa-id-card me-1"></i> {{ $item->mahasiswa->prodi }}
                                    </div>
                                </div>
                                <span class="status-pill {{ strtolower($item->status) == 'terlambat' ? 'terlambat' : 'alpha' }}">
                                    {{ $item->status }}
                                </span>
                            </div>
                        @empty
                            <div class="text-center py-4 text-muted">
                                <i class="fas fa-check-circle fa-2x mb-2 d-block" style="color:var(--green);"></i>
                                <strong class="d-block mb-1" style="color:var(--gray-800);">Aman Terkendali!</strong>
                                <small>Tidak ada mahasiswa Alpha/Terlambat hari ini.</small>
                            </div>
                        @endforelse
                    </div>
                </div>

                {{-- Menu Utama --}}
                <div class="col-12 col-md-4">
                    <div class="content-card">
                        <div class="content-card-header">
                            <h6 class="content-card-title">
                                <i class="fas fa-layer-group me-2" style="color:var(--blue-primary)"></i>Menu Utama
                            </h6>
                        </div>
                        <a href="{{ route('mahasiswa.index') }}" class="menu-link">
                            <div class="d-flex align-items-center">
                                <div class="menu-link-icon" style="background:var(--blue-light);color:var(--blue-primary);">
                                    <i class="fas fa-user-graduate"></i>
                                </div>
                                Data Mahasiswa
                            </div>
                            <i class="fas fa-chevron-right" style="color:var(--gray-400); font-size:12px;"></i>
                        </a>
                        <a href="{{ route('admin.riwayat') }}" class="menu-link">
                            <div class="d-flex align-items-center">
                                <div class="menu-link-icon" style="background:var(--green-light);color:var(--green);">
                                    <i class="fas fa-history"></i>
                                </div>
                                Riwayat Absensi
                            </div>
                            <i class="fas fa-chevron-right" style="color:var(--gray-400); font-size:12px;"></i>
                        </a>
                        <a href="{{ route('admin.pengaturan') }}" class="menu-link">
                            <div class="d-flex align-items-center">
                                <div class="menu-link-icon" style="background:var(--gray-100);color:var(--gray-600);">
                                    <i class="fas fa-cog"></i>
                                </div>
                                Pengaturan Jam
                            </div>
                            <i class="fas fa-chevron-right" style="color:var(--gray-400); font-size:12px;"></i>
                        </a>
                    </div>
                </div>

            </div>
        </div>

    </div>

    {{-- Modal Logout --}}
    <div class="modal fade modal-custom" id="modalLogout" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" style="max-width:350px;">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="text-white w-100 text-center">
                        <i class="fas fa-sign-out-alt fa-2x mb-2 d-block"></i>
                        <h5 class="fw-bold mb-0">Konfirmasi Keluar</h5>
                    </div>
                </div>
                <div class="modal-body">
                    <p class="text-dark fw-semibold mb-1" style="font-size:15px;">Apakah Anda yakin ingin keluar?</p>
                    <small class="text-muted">Anda harus login kembali untuk mengakses panel dosen.</small>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn-cancel-custom" data-bs-dismiss="modal">Batal</button>
                    <form action="{{ url('/logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn-logout-custom">
                            <i class="fas fa-sign-out-alt me-1"></i> Ya, Keluar
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>