<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Absensi Anak</title>
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
        }

        * { box-sizing: border-box; }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: var(--gray-100);
            color: var(--gray-800);
            margin: 0; padding: 0;
        }

        /* ─── DESKTOP LAYOUT ─── */
        .desktop-layout { display: none; }

        @media (min-width: 768px) {
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

            .sidebar-nav { padding: 16px 12px; flex: 1; }

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

            .sidebar-nav-link:hover { background: var(--gray-100); color: var(--gray-800); }
            .sidebar-nav-link.active { background: var(--blue-light); color: var(--blue-primary); }
            .sidebar-nav-link i { width: 20px; text-align: center; font-size: 15px; }

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

            .sidebar-user-name { font-size: 13px; font-weight: 700; color: var(--gray-800); line-height: 1.3; }
            .sidebar-user-nim { font-size: 11px; color: var(--gray-400); font-weight: 500; }

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

            /* Main */
            .main-content {
                margin-left: 260px;
                flex: 1;
                padding: 32px;
            }

            .topbar {
                display: flex;
                justify-content: space-between;
                align-items: center;
                margin-bottom: 28px;
            }

            .page-title { font-size: 22px; font-weight: 800; color: var(--gray-800); }
            .page-subtitle { font-size: 13px; color: var(--gray-400); font-weight: 500; }

            /* Stats */
            .stats-row {
                display: grid;
                grid-template-columns: repeat(3, 1fr);
                gap: 16px;
                margin-bottom: 24px;
            }

            .stat-card {
                background: white;
                border-radius: var(--radius);
                padding: 20px 24px;
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

            .stat-value { font-size: 26px; font-weight: 800; line-height: 1; }
            .stat-label { font-size: 11px; color: var(--gray-400); font-weight: 700; margin-top: 3px; text-transform: uppercase; letter-spacing: .04em; }

            /* Filter Bar */
            .filter-bar {
                background: white;
                border-radius: var(--radius);
                padding: 16px 20px;
                box-shadow: var(--shadow);
                border: 1px solid var(--gray-200);
                display: flex;
                gap: 10px;
                align-items: center;
                margin-bottom: 16px;
                flex-wrap: wrap;
            }

            .filter-btn {
                padding: 7px 16px;
                border-radius: 999px;
                font-size: 12px;
                font-weight: 700;
                border: 1.5px solid var(--gray-200);
                background: white;
                color: var(--gray-600);
                cursor: pointer;
                transition: all .18s;
            }

            .filter-btn:hover { border-color: var(--blue-primary); color: var(--blue-primary); }
            .filter-btn.active { background: var(--blue-primary); color: white; border-color: var(--blue-primary); }
            .filter-btn.green.active { background: var(--green); border-color: var(--green); }
            .filter-btn.yellow.active { background: var(--yellow); border-color: var(--yellow); }
            .filter-btn.red.active { background: var(--red); border-color: var(--red); }

            /* Table Card */
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

            .web-card-title { font-size: 15px; font-weight: 700; color: var(--gray-800); }

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
                background: var(--gray-50);
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

            .empty-state {
                padding: 60px 20px;
                text-align: center;
                color: var(--gray-400);
            }

            .empty-state i { font-size: 40px; margin-bottom: 12px; opacity: .4; display: block; }
            .empty-state p { font-size: 13px; }
        }

        /* ─── MOBILE LAYOUT ─── */
        .mobile-layout { display: block; }

        .app-wrapper {
            background-color: #f4f7f6;
            min-height: 100vh;
            position: relative;
            padding-bottom: 80px;
        }

        .header-app {
            background: linear-gradient(135deg, var(--blue-primary), var(--blue-dark));
            color: white;
            padding: 30px 20px 40px;
            border-bottom-left-radius: 25px;
            border-bottom-right-radius: 25px;
            box-shadow: 0 4px 15px rgba(13,110,253,.2);
        }

        .history-card {
            background: white;
            border-radius: 16px;
            transition: transform .2s ease, box-shadow .2s ease;
            border: 1px solid #f0f0f0;
        }

        .history-card:hover { transform: translateY(-2px); box-shadow: 0 8px 15px rgba(0,0,0,.05) !important; }

        .bottom-nav {
            position: fixed;
            bottom: 0; left: 0; right: 0;
            background: white;
            border-top: 1px solid var(--gray-200);
            display: flex;
            justify-content: space-around;
            padding: 12px 0 28px;
            z-index: 999;
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
        .modal-custom .modal-header { background: linear-gradient(135deg, var(--red), #c82333); border: none; padding: 20px 25px; }
        .modal-custom .modal-body { padding: 25px; text-align: center; }
        .modal-custom .modal-footer { border: none; padding: 0 25px 25px; justify-content: center; gap: 12px; }
        .btn-cancel-custom { border-radius: 12px; padding: 10px 30px; font-weight: 700; border: 2px solid var(--gray-200); background: white; color: var(--gray-600); }
        .btn-logout-custom { border-radius: 12px; padding: 10px 30px; font-weight: 700; background: linear-gradient(135deg, var(--red), #c82333); border: none; color: white; }
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
            <a href="{{ route('ortu.dashboard') }}" class="sidebar-nav-link">
                <i class="fas fa-home"></i> Beranda
            </a>
            <a href="{{ route('ortu.riwayat') }}" class="sidebar-nav-link active">
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

        <div class="topbar">
            <div>
                <div class="page-title"><i class="fas fa-calendar-alt me-2" style="color:var(--blue-primary)"></i>Riwayat Kehadiran</div>
                <div class="page-subtitle">Semua catatan kehadiran <strong>{{ $mahasiswa->nama_lengkap }}</strong></div>
            </div>
            <div style="font-size:13px; color:var(--gray-400); font-weight:600;">
                <i class="fas fa-calendar me-1"></i>
                {{ \Carbon\Carbon::now()->translatedFormat('l, d F Y') }}
            </div>
        </div>

        {{-- Stats --}}
        @php
            $totalHadir     = $riwayat->where('status', 'Hadir')->count();
            $totalTerlambat = $riwayat->where('status', 'Terlambat')->count();
            $totalAlpha     = $riwayat->whereNotIn('status', ['Hadir','Terlambat'])->count();
        @endphp
        <div class="stats-row">
            <div class="stat-card">
                <div class="stat-icon" style="background:var(--green-light);color:var(--green);">
                    <i class="fas fa-check-circle"></i>
                </div>
                <div>
                    <div class="stat-value" style="color:var(--green);">{{ $totalHadir }}</div>
                    <div class="stat-label">Hadir</div>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-icon" style="background:var(--yellow-light);color:var(--yellow);">
                    <i class="fas fa-clock"></i>
                </div>
                <div>
                    <div class="stat-value" style="color:var(--yellow);">{{ $totalTerlambat }}</div>
                    <div class="stat-label">Terlambat</div>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-icon" style="background:var(--red-light);color:var(--red);">
                    <i class="fas fa-times-circle"></i>
                </div>
                <div>
                    <div class="stat-value" style="color:var(--red);">{{ $totalAlpha }}</div>
                    <div class="stat-label">Alpha</div>
                </div>
            </div>
        </div>

        {{-- Filter Bar --}}
        <div class="filter-bar">
            <span style="font-size:12px; font-weight:700; color:var(--gray-600); margin-right:4px;">Filter:</span>
            <button class="filter-btn active" onclick="filterTable('semua', this)">Semua</button>
            <button class="filter-btn green" onclick="filterTable('Hadir', this)"><i class="fas fa-check me-1"></i>Hadir</button>
            <button class="filter-btn yellow" onclick="filterTable('Terlambat', this)"><i class="fas fa-exclamation me-1"></i>Terlambat</button>
            <button class="filter-btn red" onclick="filterTable('Alpha', this)"><i class="fas fa-times me-1"></i>Alpha</button>
        </div>

        {{-- Table --}}
        <div class="web-card">
            <div class="web-card-header">
                <span class="web-card-title">Daftar Kehadiran</span>
                <span style="font-size:12px; color:var(--gray-400); font-weight:600;">Total: {{ $riwayat->count() }} catatan</span>
            </div>
            <table class="history-table" id="historyTable">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Hari &amp; Tanggal</th>
                        <th>Waktu Masuk</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($riwayat as $i => $item)
                        @php
                            $statusKey = in_array($item->status, ['Hadir','Terlambat']) ? $item->status : 'Alpha';
                        @endphp
                        <tr data-status="{{ $statusKey }}">
                            <td style="color:var(--gray-400); font-weight:600;">{{ $i + 1 }}</td>
                            <td style="font-weight:600;">
                                {{ \Carbon\Carbon::parse($item->created_at)->translatedFormat('l, d F Y') }}
                            </td>
                            <td style="font-weight:700;">
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
                        <tr>
                            <td colspan="4">
                                <div class="empty-state">
                                    <i class="fas fa-calendar-times"></i>
                                    <strong>Riwayat Kosong</strong>
                                    <p>Belum ada catatan absensi yang direkam oleh sistem.</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </main>
</div>

{{-- ══════════════════════════════════════════
     MOBILE LAYOUT (< 768px)
══════════════════════════════════════════ --}}
<div class="mobile-layout">
    <div class="app-wrapper">

        <div class="header-app mb-4">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h4 class="fw-bold m-0 mb-1 text-white" style="letter-spacing:.5px;">
                        <i class="fas fa-list-alt me-2"></i> Riwayat Lengkap
                    </h4>
                    <small style="color:rgba(255,255,255,.65);" class="fw-semibold">Semua catatan kehadiran ananda</small>
                </div>
            </div>
        </div>

        <div class="px-3 px-md-4">
            @forelse($riwayat as $item)
                <div class="history-card shadow-sm mb-3">
                    <div class="card-body p-3 d-flex justify-content-between align-items-center">
                        <div class="d-flex align-items-center">
                            @if($item->status == 'Hadir')
                                <div class="me-3 rounded-circle d-flex align-items-center justify-content-center"
                                    style="width:45px;height:45px;font-size:18px;background:var(--green-light);color:var(--green);">
                                    <i class="fas fa-check"></i>
                                </div>
                                @php $textColor = 'color:var(--green)'; @endphp
                            @elseif($item->status == 'Terlambat')
                                <div class="me-3 rounded-circle d-flex align-items-center justify-content-center"
                                    style="width:45px;height:45px;font-size:18px;background:var(--yellow-light);color:var(--yellow);">
                                    <i class="fas fa-exclamation"></i>
                                </div>
                                @php $textColor = 'color:var(--yellow)'; @endphp
                            @else
                                <div class="me-3 rounded-circle d-flex align-items-center justify-content-center"
                                    style="width:45px;height:45px;font-size:18px;background:var(--red-light);color:var(--red);">
                                    <i class="fas fa-times"></i>
                                </div>
                                @php $textColor = 'color:var(--red)'; @endphp
                            @endif
                            <div>
                                <h6 class="mb-1 fw-bold" style="{{ $textColor }}">{{ strtoupper($item->status) }}</h6>
                                <small class="text-muted fw-semibold" style="font-size:12px;">
                                    {{ \Carbon\Carbon::parse($item->created_at)->translatedFormat('l, d F Y') }}
                                </small>
                            </div>
                        </div>
                        <div class="text-end">
                            <span class="fw-bold text-dark bg-light px-3 py-1 rounded-pill border" style="font-size:14px;">
                                {{ \Carbon\Carbon::parse($item->waktu_masuk)->format('H:i') }}
                            </span>
                        </div>
                    </div>
                </div>
            @empty
                <div class="text-center py-5 bg-white rounded-4 shadow-sm border border-light mt-4">
                    <i class="fas fa-calendar-times fa-3x mb-3 text-muted opacity-25"></i>
                    <h6 class="fw-bold text-dark">Riwayat Kosong</h6>
                    <p class="mb-0 text-muted" style="font-size:13px;">Belum ada catatan absensi yang direkam.</p>
                </div>
            @endforelse
        </div>

        <div class="bottom-nav">
            <a href="{{ route('ortu.dashboard') }}" class="nav-item">
                <i class="fas fa-home nav-icon"></i>
                <span>Beranda</span>
            </a>
            <a href="{{ route('ortu.riwayat') }}" class="nav-item active">
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
                <small class="text-muted">Anda harus login kembali untuk mengakses aplikasi.</small>
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
<script>
    function filterTable(status, btn) {
        // Update active button
        document.querySelectorAll('.filter-btn').forEach(b => b.classList.remove('active'));
        btn.classList.add('active');

        // Filter rows
        document.querySelectorAll('#historyTable tbody tr').forEach(row => {
            if (status === 'semua' || row.dataset.status === status) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    }
</script>
</body>
</html>