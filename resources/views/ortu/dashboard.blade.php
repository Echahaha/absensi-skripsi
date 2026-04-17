<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Wali Murid</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        :root {
            --blue-primary: #1a56db;
            --blue-dark: #1342b0;
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
            --shadow-lg: 0 8px 32px rgba(26,86,219,.12);
        }

        * { box-sizing: border-box; }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: var(--gray-100);
            color: var(--gray-800);
            margin: 0;
            padding: 0;
        }

        /* ─── DESKTOP SIDEBAR LAYOUT ─── */
        .desktop-layout {
            display: none;
        }

        @media (min-width: 768px) {
            body { background: var(--gray-100); }

            .desktop-layout {
                display: flex;
                min-height: 100vh;
            }

            .mobile-layout { display: none !important; }

            /* Sidebar */
            .sidebar {
                width: 260px;
                min-height: 100vh;
                background: white;
                border-right: 1px solid var(--gray-200);
                display: flex;
                flex-direction: column;
                position: fixed;
                top: 0; left: 0;
                z-index: 100;
                padding: 0;
            }

            .sidebar-brand {
                padding: 24px 24px 20px;
                border-bottom: 1px solid var(--gray-200);
            }

            .sidebar-brand-title {
                font-size: 15px;
                font-weight: 800;
                color: var(--blue-primary);
                line-height: 1.2;
            }

            .sidebar-brand-sub {
                font-size: 11px;
                color: var(--gray-400);
                font-weight: 500;
            }

            .sidebar-nav {
                padding: 16px 12px;
                flex: 1;
            }

            .sidebar-nav-label {
                font-size: 10px;
                text-transform: uppercase;
                letter-spacing: .08em;
                color: var(--gray-400);
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
                color: var(--gray-600);
                text-decoration: none;
                font-size: 14px;
                font-weight: 600;
                transition: all .18s;
                margin-bottom: 2px;
            }

            .sidebar-nav-link:hover {
                background: var(--gray-100);
                color: var(--gray-800);
            }

            .sidebar-nav-link.active {
                background: var(--blue-light);
                color: var(--blue-primary);
            }

            .sidebar-nav-link i {
                width: 20px;
                text-align: center;
                font-size: 15px;
            }

            .sidebar-footer {
                padding: 16px 12px;
                border-top: 1px solid var(--gray-200);
            }

            .sidebar-user {
                display: flex;
                align-items: center;
                gap: 12px;
                padding: 10px 14px;
                border-radius: var(--radius-sm);
                background: var(--gray-50);
            }

            .sidebar-avatar {
                width: 38px; height: 38px;
                border-radius: 50%;
                background: linear-gradient(135deg, var(--blue-primary), var(--blue-dark));
                color: white;
                font-weight: 800;
                font-size: 15px;
                display: flex;
                align-items: center;
                justify-content: center;
                flex-shrink: 0;
            }

            .sidebar-user-name {
                font-size: 13px;
                font-weight: 700;
                color: var(--gray-800);
                line-height: 1.3;
            }

            .sidebar-user-nim {
                font-size: 11px;
                color: var(--gray-400);
                font-weight: 500;
            }

            /* Main Content */
            .main-content {
                margin-left: 260px;
                flex: 1;
                padding: 32px;
                max-width: calc(100% - 260px);
            }

            /* Top bar */
            .topbar {
                display: flex;
                justify-content: space-between;
                align-items: center;
                margin-bottom: 28px;
            }

            .page-title {
                font-size: 22px;
                font-weight: 800;
                color: var(--gray-800);
            }

            .page-subtitle {
                font-size: 13px;
                color: var(--gray-400);
                font-weight: 500;
            }

            /* Stat Cards Row */
            .stats-row {
                display: grid;
                grid-template-columns: repeat(3, 1fr);
                gap: 16px;
                margin-bottom: 24px;
            }

            .stat-card {
                background: white;
                border-radius: var(--radius);
                padding: 22px 24px;
                box-shadow: var(--shadow);
                border: 1px solid var(--gray-200);
                display: flex;
                align-items: center;
                gap: 16px;
            }

            .stat-icon {
                width: 48px; height: 48px;
                border-radius: 12px;
                display: flex;
                align-items: center;
                justify-content: center;
                font-size: 20px;
                flex-shrink: 0;
            }

            .stat-value {
                font-size: 26px;
                font-weight: 800;
                line-height: 1;
            }

            .stat-label {
                font-size: 12px;
                color: var(--gray-400);
                font-weight: 600;
                margin-top: 3px;
                text-transform: uppercase;
                letter-spacing: .04em;
            }

            /* Content Grid */
            .content-grid {
                display: grid;
                grid-template-columns: 1fr 380px;
                gap: 20px;
                align-items: start;
            }

            /* Card */
            .web-card {
                background: white;
                border-radius: var(--radius);
                box-shadow: var(--shadow);
                border: 1px solid var(--gray-200);
                overflow: hidden;
            }

            .web-card-header {
                padding: 18px 24px;
                border-bottom: 1px solid var(--gray-200);
                display: flex;
                align-items: center;
                justify-content: space-between;
            }

            .web-card-title {
                font-size: 15px;
                font-weight: 700;
                color: var(--gray-800);
            }

            .web-card-body { padding: 0; }

            /* Status Banner (desktop) */
            .status-banner {
                padding: 28px 24px;
                text-align: center;
                border-radius: var(--radius);
                margin-bottom: 16px;
            }

            .status-banner.hadir { background: var(--green-light); border: 1.5px solid #6ee7b7; }
            .status-banner.terlambat { background: var(--yellow-light); border: 1.5px solid #fcd34d; }
            .status-banner.tidak-hadir { background: var(--red-light); border: 1.5px solid #fca5a5; }
            .status-banner.belum { background: var(--gray-100); border: 1.5px solid var(--gray-200); }

            /* Table */
            .history-table { width: 100%; border-collapse: collapse; }
            .history-table thead th {
                padding: 12px 20px;
                font-size: 11px;
                text-transform: uppercase;
                letter-spacing: .06em;
                color: var(--gray-400);
                font-weight: 700;
                text-align: left;
                border-bottom: 1px solid var(--gray-200);
            }

            .history-table tbody td {
                padding: 14px 20px;
                font-size: 13px;
                border-bottom: 1px solid var(--gray-100);
                vertical-align: middle;
            }

            .history-table tbody tr:last-child td { border-bottom: none; }
            .history-table tbody tr:hover td { background: var(--gray-50); }

            .status-pill {
                display: inline-flex;
                align-items: center;
                gap: 6px;
                padding: 4px 12px;
                border-radius: 999px;
                font-size: 12px;
                font-weight: 700;
            }

            .status-pill.hadir { background: var(--green-light); color: var(--green); }
            .status-pill.terlambat { background: var(--yellow-light); color: var(--yellow); }
            .status-pill.alpha { background: var(--red-light); color: var(--red); }

            /* Logout btn */
            .btn-logout-web {
                display: flex;
                align-items: center;
                gap: 8px;
                padding: 9px 18px;
                border-radius: var(--radius-sm);
                background: var(--red-light);
                color: var(--red);
                border: 1px solid #fca5a5;
                font-size: 13px;
                font-weight: 700;
                cursor: pointer;
                text-decoration: none;
                transition: all .18s;
            }

            .btn-logout-web:hover { background: #fca5a5; color: var(--red); }
        }

        /* ─── MOBILE LAYOUT (≤ 767px) ─── */
        .mobile-layout {
            display: block;
        }

        .app-wrapper {
            background-color: #f4f7f6;
            min-height: 100vh;
            position: relative;
            padding-bottom: 100px;
            display: flex;
            flex-direction: column;
        }

        .header-app {
            background: linear-gradient(135deg, var(--blue-primary), var(--blue-dark));
            color: white;
            padding: 40px 20px 65px;
            border-bottom-left-radius: 28px;
            border-bottom-right-radius: 28px;
            position: relative;
        }

        .card-status {
            margin-top: -45px;
            border: none;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0,0,0,.08);
            background: white;
            position: relative;
            z-index: 10;
        }

        .history-item {
            transition: transform .2s ease;
            border-radius: 15px !important;
            background: white;
        }

        .history-item:hover { transform: scale(1.02); }

        .bottom-nav {
            position: fixed;
            bottom: 0; left: 0; right: 0;
            background: white;
            border-top: 1px solid var(--gray-200);
            display: flex;
            justify-content: space-around;
            padding: 12px 0 28px;
            z-index: 1000;
        }

        .nav-item {
            text-align: center;
            color: var(--gray-400);
            text-decoration: none;
            font-size: 11px;
            font-weight: 700;
            flex: 1;
        }

        .nav-item.active { color: var(--blue-primary); }
        .nav-icon { font-size: 22px; display: block; margin-bottom: 4px; }

        /* Modal */
        .modal-custom .modal-content { border: none; border-radius: 20px; overflow: hidden; }
        .modal-custom .modal-header { background: linear-gradient(135deg, var(--red), #c82333); border: none; }
        .btn-logout-custom { border-radius: 12px; padding: 10px 30px; background: linear-gradient(135deg, var(--red), #c82333); border: none; color: white; font-weight: 700; }
        .btn-cancel-custom { border-radius: 12px; padding: 10px 30px; border: 2px solid var(--gray-200); background: white; color: var(--gray-600); font-weight: 700; }
    </style>
</head>

<body>

{{-- ══════════════════════════════════════════
     DESKTOP LAYOUT (≥ 768px)
══════════════════════════════════════════ --}}
<div class="desktop-layout">

    {{-- Sidebar --}}
    <aside class="sidebar">
        <div class="sidebar-brand">
            <div class="sidebar-brand-title"><i class="fas fa-graduation-cap me-2" style="color:var(--blue-primary)"></i>Portal Wali</div>
            <div class="sidebar-brand-sub">Monitoring Kehadiran Mahasiswa</div>
        </div>

        <nav class="sidebar-nav">
            <div class="sidebar-nav-label">Menu</div>
            <a href="{{ route('ortu.dashboard') }}" class="sidebar-nav-link active">
                <i class="fas fa-home"></i> Beranda
            </a>
            <a href="{{ route('ortu.riwayat') }}" class="sidebar-nav-link">
                <i class="fas fa-calendar-alt"></i> Riwayat Kehadiran
            </a>
        </nav>

        <div class="sidebar-footer">
            <div class="sidebar-user">
                <div class="sidebar-avatar">{{ substr($mahasiswa->nama_lengkap, 0, 1) }}</div>
                <div>
                    <div class="sidebar-user-name">{{ $mahasiswa->nama_lengkap }}</div>
                    <div class="sidebar-user-nim">NIM: {{ $mahasiswa->nim }}</div>
                </div>
            </div>
            <a href="#" class="btn-logout-web mt-3 w-100 justify-content-center" data-bs-toggle="modal" data-bs-target="#modalLogout">
                <i class="fas fa-sign-out-alt"></i> Keluar
            </a>
        </div>
    </aside>

    {{-- Main Content --}}
    <main class="main-content">

        {{-- Topbar --}}
        <div class="topbar">
            <div>
                <div class="page-title">Dashboard Kehadiran</div>
                <div class="page-subtitle">Selamat datang, Wali dari <strong>{{ $mahasiswa->nama_lengkap }}</strong></div>
            </div>
            <div style="font-size:13px; color:var(--gray-400); font-weight:600;">
                <i class="fas fa-calendar me-1"></i>
                {{ \Carbon\Carbon::now()->translatedFormat('l, d F Y') }}
            </div>
        </div>

        {{-- Stats Row --}}
        @php
            $totalHadir    = $riwayat->where('status', 'Hadir')->count();
            $totalTerlambat = $riwayat->where('status', 'Terlambat')->count();
            $totalAlpha    = $riwayat->where('status', '!=', 'Hadir')->where('status', '!=', 'Terlambat')->count();
        @endphp
        <div class="stats-row">
            <div class="stat-card">
                <div class="stat-icon" style="background:var(--green-light); color:var(--green);">
                    <i class="fas fa-check-circle"></i>
                </div>
                <div>
                    <div class="stat-value" style="color:var(--green);">{{ $totalHadir }}</div>
                    <div class="stat-label">Hadir</div>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-icon" style="background:var(--yellow-light); color:var(--yellow);">
                    <i class="fas fa-clock"></i>
                </div>
                <div>
                    <div class="stat-value" style="color:var(--yellow);">{{ $totalTerlambat }}</div>
                    <div class="stat-label">Terlambat</div>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-icon" style="background:var(--red-light); color:var(--red);">
                    <i class="fas fa-times-circle"></i>
                </div>
                <div>
                    <div class="stat-value" style="color:var(--red);">{{ $totalAlpha }}</div>
                    <div class="stat-label">Alpha</div>
                </div>
            </div>
        </div>

        {{-- Content Grid --}}
        <div class="content-grid">

            {{-- Riwayat Table --}}
            <div class="web-card">
                <div class="web-card-header">
                    <span class="web-card-title"><i class="fas fa-list-ul me-2" style="color:var(--blue-primary)"></i>Riwayat Kehadiran</span>
                    <a href="{{ route('ortu.riwayat') }}" style="font-size:13px; font-weight:700; color:var(--blue-primary); text-decoration:none;">
                        Lihat Semua <i class="fas fa-arrow-right ms-1"></i>
                    </a>
                </div>
                <div class="web-card-body">
                    <table class="history-table">
                        <thead>
                            <tr>
                                <th>Tanggal</th>
                                <th>Waktu Masuk</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($riwayat as $item)
                                <tr>
                                    <td style="font-weight:600;">
                                        {{ \Carbon\Carbon::parse($item->created_at)->translatedFormat('d M Y') }}
                                    </td>
                                    <td style="font-weight:700; color:var(--gray-800);">
                                        {{ \Carbon\Carbon::parse($item->waktu_masuk)->format('H:i') }} WIB
                                    </td>
                                    <td>
                                        @if($item->status == 'Hadir')
                                            <span class="status-pill hadir"><i class="fas fa-check"></i> Hadir</span>
                                        @elseif($item->status == 'Terlambat')
                                            <span class="status-pill terlambat"><i class="fas fa-exclamation"></i> Terlambat</span>
                                        @else
                                            <span class="status-pill alpha"><i class="fas fa-times"></i> {{ $item->status }}</span>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr><td colspan="3" style="text-align:center; padding:32px; color:var(--gray-400);">Belum ada data riwayat.</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            {{-- Status Hari Ini (Sidebar kanan) --}}
            <div>
                <div class="web-card">
                    <div class="web-card-header">
                        <span class="web-card-title"><i class="fas fa-calendar-day me-2" style="color:var(--blue-primary)"></i>Status Hari Ini</span>
                    </div>
                    <div style="padding:24px;">
                        @if($absen_hari_ini)
                            @if($absen_hari_ini->status == 'Hadir')
                                <div class="status-banner hadir">
                                    <i class="fas fa-check-circle fa-3x mb-3" style="color:var(--green)"></i>
                                    <div style="font-size:22px; font-weight:800; color:var(--green);">SUDAH HADIR</div>
                                    <div class="mt-2" style="font-size:13px; color:var(--gray-600);">
                                        <i class="fas fa-clock me-1"></i>
                                        {{ \Carbon\Carbon::parse($absen_hari_ini->waktu_masuk)->format('H:i') }} WIB
                                    </div>
                                </div>
                            @elseif($absen_hari_ini->status == 'Terlambat')
                                <div class="status-banner terlambat">
                                    <i class="fas fa-exclamation-circle fa-3x mb-3" style="color:var(--yellow)"></i>
                                    <div style="font-size:22px; font-weight:800; color:var(--yellow);">TERLAMBAT</div>
                                    <div class="mt-2" style="font-size:13px; color:var(--gray-600);">
                                        <i class="fas fa-clock me-1"></i>
                                        {{ \Carbon\Carbon::parse($absen_hari_ini->waktu_masuk)->format('H:i') }} WIB
                                    </div>
                                </div>
                            @else
                                <div class="status-banner tidak-hadir">
                                    <i class="fas fa-times-circle fa-3x mb-3" style="color:var(--red)"></i>
                                    <div style="font-size:22px; font-weight:800; color:var(--red);">TIDAK HADIR</div>
                                    <div class="mt-2" style="font-size:13px; color:var(--gray-600);">
                                        <i class="fas fa-info-circle me-1"></i> Alpha / Tanpa Keterangan
                                    </div>
                                </div>
                            @endif
                        @else
                            <div class="status-banner belum">
                                <i class="fas fa-fingerprint fa-3x mb-3" style="color:var(--gray-400)"></i>
                                <div style="font-size:22px; font-weight:800; color:var(--gray-400);">BELUM ABSEN</div>
                                <div class="mt-2" style="font-size:13px; color:var(--gray-400);">Menunggu sensor...</div>
                            </div>
                        @endif

                        {{-- Info mahasiswa --}}
                        <div style="background:var(--gray-50); border-radius:12px; padding:16px; border:1px solid var(--gray-200); margin-top:16px;">
                            <div style="font-size:11px; text-transform:uppercase; letter-spacing:.06em; color:var(--gray-400); font-weight:700; margin-bottom:10px;">Info Mahasiswa</div>
                            <div style="display:flex; align-items:center; gap:12px;">
                                <div style="width:44px;height:44px;border-radius:50%;background:linear-gradient(135deg,var(--blue-primary),var(--blue-dark));color:white;font-weight:800;font-size:18px;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                                    {{ substr($mahasiswa->nama_lengkap, 0, 1) }}
                                </div>
                                <div>
                                    <div style="font-weight:700; font-size:14px;">{{ $mahasiswa->nama_lengkap }}</div>
                                    <div style="font-size:12px; color:var(--gray-400); font-weight:500;">NIM: {{ $mahasiswa->nim }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>
</div>

{{-- ══════════════════════════════════════════
     MOBILE LAYOUT (< 768px)
══════════════════════════════════════════ --}}
<div class="mobile-layout">
    <div class="app-wrapper">

        <div class="header-app">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <small class="d-block fw-semibold mb-1" style="color:rgba(255,255,255,.65);">Selamat Datang, Wali dari</small>
                    <h4 class="fw-bold m-0 mb-1 text-white">{{ $mahasiswa->nama_lengkap }}</h4>
                    <span class="badge bg-white text-primary border-0 rounded-pill px-2" style="font-size:11px;">
                        <i class="fas fa-id-card me-1"></i> {{ $mahasiswa->nim }}
                    </span>
                </div>
                <div class="bg-white text-primary rounded-circle d-flex align-items-center justify-content-center shadow-sm"
                    style="width:50px;height:50px;font-weight:800;font-size:18px;flex-shrink:0;">
                    {{ substr($mahasiswa->nama_lengkap, 0, 1) }}
                </div>
            </div>
        </div>

        <div class="px-3">
            <div class="card card-status mb-4">
                <div class="card-body text-center py-4 px-3">
                    <p class="text-secondary fw-semibold mb-2" style="font-size:12px;text-transform:uppercase;">Status Kehadiran Hari Ini</p>

                    @if($absen_hari_ini)
                        @if($absen_hari_ini->status == 'Hadir')
                            <i class="fas fa-check-circle text-success fa-3x mb-2"></i>
                            <h3 class="fw-bold mb-0" style="color:var(--green)">SUDAH HADIR</h3>
                            <div class="mt-3">
                                <span class="badge px-4 py-2 rounded-pill" style="background:var(--green-light);color:var(--green);border:1px solid #6ee7b7;">
                                    <i class="fas fa-clock me-1"></i> {{ \Carbon\Carbon::parse($absen_hari_ini->waktu_masuk)->format('H:i') }} WIB
                                </span>
                            </div>
                        @elseif($absen_hari_ini->status == 'Terlambat')
                            <i class="fas fa-exclamation-circle fa-3x mb-2" style="color:var(--yellow)"></i>
                            <h3 class="fw-bold mb-0" style="color:var(--yellow)">TERLAMBAT</h3>
                            <div class="mt-3">
                                <span class="badge px-4 py-2 rounded-pill" style="background:var(--yellow-light);color:var(--yellow);border:1px solid #fcd34d;">
                                    <i class="fas fa-clock me-1"></i> {{ \Carbon\Carbon::parse($absen_hari_ini->waktu_masuk)->format('H:i') }} WIB
                                </span>
                            </div>
                        @else
                            <i class="fas fa-times-circle fa-3x mb-2" style="color:var(--red)"></i>
                            <h3 class="fw-bold mb-0" style="color:var(--red)">TIDAK HADIR</h3>
                            <div class="mt-3">
                                <span class="badge px-4 py-2 rounded-pill" style="background:var(--red-light);color:var(--red);border:1px solid #fca5a5;">
                                    <i class="fas fa-info-circle me-1"></i> Alpha / Tanpa Keterangan
                                </span>
                            </div>
                        @endif
                    @else
                        <i class="fas fa-fingerprint fa-3x mb-2" style="color:var(--gray-400)"></i>
                        <h3 class="fw-bold mb-0" style="color:var(--gray-400)">BELUM ABSEN</h3>
                        <div class="mt-3">
                            <span class="badge bg-light text-secondary border px-4 py-2 rounded-pill">Menunggu Sensor...</span>
                        </div>
                    @endif
                </div>
            </div>

            <div class="d-flex justify-content-between align-items-center mb-3">
                <h6 class="fw-bold m-0 text-dark">Riwayat Terakhir</h6>
                <a href="{{ route('ortu.riwayat') }}" class="text-decoration-none small fw-bold" style="color:var(--blue-primary)">Lihat Semua</a>
            </div>

            <div class="list-group border-0 pb-4">
                @forelse($riwayat as $item)
                    <div class="list-group-item history-item border-0 d-flex justify-content-between align-items-center mb-2 shadow-sm py-3 px-3">
                        <div class="d-flex align-items-center">
                            <div class="me-3 rounded-circle d-flex align-items-center justify-content-center bg-light"
                                style="width:40px;height:40px;color:{{ $item->status == 'Hadir' ? 'var(--green)' : ($item->status == 'Terlambat' ? 'var(--yellow)' : 'var(--red)') }}">
                                <i class="fas {{ $item->status == 'Hadir' ? 'fa-check' : ($item->status == 'Terlambat' ? 'fa-exclamation' : 'fa-times') }}"></i>
                            </div>
                            <div>
                                <h6 class="mb-0 fw-bold">{{ $item->status }}</h6>
                                <small class="text-muted">{{ \Carbon\Carbon::parse($item->created_at)->translatedFormat('d M Y') }}</small>
                            </div>
                        </div>
                        <span class="fw-bold text-dark bg-light px-2 py-1 rounded border small">
                            {{ \Carbon\Carbon::parse($item->waktu_masuk)->format('H:i') }}
                        </span>
                    </div>
                @empty
                    <div class="text-center py-4 bg-white rounded-4 border">Belum ada data.</div>
                @endforelse
            </div>
        </div>

        <div class="bottom-nav">
            <a href="{{ route('ortu.dashboard') }}" class="nav-item active">
                <i class="fas fa-home nav-icon"></i>
                <span>Beranda</span>
            </a>
            <a href="{{ route('ortu.riwayat') }}" class="nav-item">
                <i class="fas fa-calendar-alt nav-icon"></i>
                <span>Riwayat</span>
            </a>
            <a href="#" class="nav-item text-danger" data-bs-toggle="modal" data-bs-target="#modalLogout">
                <i class="fas fa-sign-out-alt nav-icon"></i>
                <span>Keluar</span>
            </a>
        </div>

    </div>
</div>

{{-- Modal Logout (shared) --}}
<div class="modal fade modal-custom" id="modalLogout" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered mx-auto" style="max-width:350px;">
        <div class="modal-content">
            <div class="modal-header py-3">
                <div class="text-white w-100 text-center">
                    <h6 class="fw-bold mb-0">Konfirmasi Keluar</h6>
                </div>
            </div>
            <div class="modal-body py-4">
                <p class="mb-0 fw-semibold">Yakin ingin keluar aplikasi?</p>
            </div>
            <div class="modal-footer pb-4">
                <button type="button" class="btn-cancel-custom" data-bs-dismiss="modal">Batal</button>
                <form action="{{ url('/logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn-logout-custom">Ya, Keluar</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>