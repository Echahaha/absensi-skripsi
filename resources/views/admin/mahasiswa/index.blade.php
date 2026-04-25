<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">

    <style>
        :root {
            --dark: #1e293b;
            --dark-2: #334155;
            --blue-primary: #1a56db;
            --blue-light: #e8f0fe;
            --green: #0a9f6e;
            --green-light: #d1fae5;
            --yellow: #d97706;
            --yellow-light: #fef3c7;
            --red: #dc2626;
            --red-light: #fee2e2;
            --purple: #7c3aed;
            --purple-light: #ede9fe;
            --gray-50: #f8fafc;
            --gray-100: #f1f5f9;
            --gray-200: #e2e8f0;
            --gray-400: #94a3b8;
            --gray-600: #475569;
            --gray-800: #1e293b;
            --radius: 16px;
            --radius-sm: 10px;
            --shadow: 0 1px 3px rgba(0, 0, 0, .08), 0 4px 16px rgba(0, 0, 0, .06);
        }

        * {
            box-sizing: border-box;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: var(--gray-100);
            color: var(--gray-800);
            margin: 0;
            padding: 0;
        }

        /* ─── DESKTOP LAYOUT ─── */
        .desktop-layout {
            display: none;
        }

        @media (min-width: 768px) {
            .desktop-layout {
                display: flex;
                min-height: 100vh;
            }

            .mobile-layout {
                display: none !important;
            }

            .sidebar {
                width: 260px;
                min-height: 100vh;
                background: var(--dark);
                display: flex;
                flex-direction: column;
                position: fixed;
                top: 0;
                left: 0;
                z-index: 100;
            }

            .sidebar-brand {
                padding: 24px 24px 20px;
                border-bottom: 1px solid rgba(255, 255, 255, .08);
            }

            .sidebar-brand-title {
                font-size: 15px;
                font-weight: 800;
                color: white;
                line-height: 1.2;
            }

            .sidebar-brand-sub {
                font-size: 11px;
                color: rgba(255, 255, 255, .4);
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
                color: rgba(255, 255, 255, .3);
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
                color: rgba(255, 255, 255, .6);
                text-decoration: none;
                font-size: 14px;
                font-weight: 600;
                transition: all .18s;
                margin-bottom: 2px;
            }

            .sidebar-nav-link:hover {
                background: rgba(255, 255, 255, .07);
                color: white;
            }

            .sidebar-nav-link.active {
                background: rgba(255, 255, 255, .12);
                color: white;
            }

            .sidebar-nav-link i {
                width: 20px;
                text-align: center;
                font-size: 15px;
            }

            .sidebar-footer {
                padding: 16px 12px;
                border-top: 1px solid rgba(255, 255, 255, .08);
            }

            .sidebar-date {
                padding: 10px 14px;
                border-radius: var(--radius-sm);
                background: rgba(255, 255, 255, .06);
                font-size: 12px;
                color: rgba(255, 255, 255, .5);
                font-weight: 600;
                margin-bottom: 10px;
            }

            .btn-logout-web {
                display: flex;
                align-items: center;
                gap: 8px;
                padding: 10px 14px;
                border-radius: var(--radius-sm);
                background: rgba(220, 38, 38, .15);
                color: #f87171;
                border: 1px solid rgba(220, 38, 38, .2);
                font-size: 13px;
                font-weight: 700;
                cursor: pointer;
                text-decoration: none;
                transition: all .18s;
                width: 100%;
                justify-content: center;
            }

            .btn-logout-web:hover {
                background: rgba(220, 38, 38, .25);
                color: #fca5a5;
            }

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

            .topbar-left {
                display: flex;
                align-items: center;
                gap: 16px;
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

            .btn-add {
                display: inline-flex;
                align-items: center;
                gap: 8px;
                padding: 10px 20px;
                border-radius: var(--radius-sm);
                background: var(--blue-primary);
                color: white;
                border: none;
                font-size: 14px;
                font-weight: 700;
                text-decoration: none;
                transition: all .18s;
                box-shadow: 0 4px 12px rgba(26, 86, 219, .3);
            }

            .btn-add:hover {
                background: #1447c0;
                color: white;
                transform: translateY(-1px);
            }

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
                width: 52px;
                height: 52px;
                border-radius: 14px;
                display: flex;
                align-items: center;
                justify-content: center;
                font-size: 22px;
                flex-shrink: 0;
            }

            .stat-value {
                font-size: 30px;
                font-weight: 800;
                line-height: 1;
            }

            .stat-label {
                font-size: 12px;
                color: var(--gray-400);
                font-weight: 700;
                margin-top: 4px;
                text-transform: uppercase;
                letter-spacing: .04em;
            }

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

            .search-box {
                position: relative;
            }

            .search-box input {
                padding-left: 36px;
                border-radius: var(--radius-sm);
                border: 1px solid var(--gray-200);
                background: var(--gray-50);
                font-size: 13px;
                font-family: 'Plus Jakarta Sans', sans-serif;
                width: 230px;
                height: 38px;
                outline: none;
                transition: all .18s;
            }

            .search-box input:focus {
                border-color: var(--blue-primary);
                background: white;
                box-shadow: 0 0 0 3px rgba(26, 86, 219, .1);
            }

            .search-box i {
                position: absolute;
                left: 12px;
                top: 50%;
                transform: translateY(-50%);
                color: var(--gray-400);
                font-size: 13px;
            }

            .data-table {
                width: 100%;
                border-collapse: collapse;
            }

            .data-table thead th {
                background: var(--gray-50);
                font-size: 11px;
                font-weight: 700;
                text-transform: uppercase;
                letter-spacing: .06em;
                color: var(--gray-400);
                padding: 13px 20px;
                border-bottom: 1px solid var(--gray-200);
                white-space: nowrap;
                font-family: 'Plus Jakarta Sans', sans-serif;
            }

            .data-table tbody tr {
                border-bottom: 1px solid var(--gray-100);
                transition: background .15s;
            }

            .data-table tbody tr:last-child {
                border-bottom: none;
            }

            .data-table tbody tr:hover {
                background: var(--gray-50);
            }

            .data-table tbody td {
                padding: 14px 20px;
                font-size: 14px;
                vertical-align: middle;
            }

            .avatar-circle {
                width: 38px;
                height: 38px;
                border-radius: 50%;
                background: var(--blue-light);
                display: flex;
                align-items: center;
                justify-content: center;
                font-weight: 800;
                font-size: 14px;
                color: var(--blue-primary);
                flex-shrink: 0;
            }

            .nama-col {
                display: flex;
                align-items: center;
                gap: 12px;
            }

            .nama-text {
                font-weight: 700;
                color: var(--gray-800);
                font-size: 14px;
            }

            .fp-badge {
                display: inline-flex;
                align-items: center;
                gap: 5px;
                background: var(--purple-light);
                color: var(--purple);
                border-radius: 8px;
                padding: 4px 10px;
                font-size: 12px;
                font-weight: 700;
            }

            .prodi-badge {
                background: var(--gray-100);
                color: var(--gray-600);
                border-radius: 8px;
                padding: 4px 10px;
                font-size: 12px;
                font-weight: 600;
            }

            .action-group {
                display: flex;
                gap: 6px;
                justify-content: center;
            }

            .tbl-btn {
                width: 34px;
                height: 34px;
                border-radius: var(--radius-sm);
                border: 1px solid var(--gray-200);
                background: white;
                display: flex;
                align-items: center;
                justify-content: center;
                font-size: 13px;
                cursor: pointer;
                transition: all .15s;
                text-decoration: none;
                box-shadow: 0 1px 3px rgba(0, 0, 0, .05);
            }

            .tbl-btn:hover {
                transform: translateY(-2px);
                box-shadow: 0 4px 10px rgba(0, 0, 0, .1);
            }

            .tbl-btn.finger {
                color: var(--purple);
            }

            .tbl-btn.finger:hover {
                background: var(--purple-light);
                border-color: #c4b5fd;
            }

            .tbl-btn.edit {
                color: var(--blue-primary);
            }

            .tbl-btn.edit:hover {
                background: var(--blue-light);
                border-color: #bfdbfe;
            }

            .tbl-btn.delete {
                color: var(--red);
            }

            .tbl-btn.delete:hover {
                background: var(--red-light);
                border-color: #fecaca;
            }

            .table-footer {
                padding: 14px 24px;
                border-top: 1px solid var(--gray-200);
                font-size: 13px;
                color: var(--gray-400);
                font-weight: 600;
            }

            .empty-state {
                padding: 60px 20px;
                text-align: center;
                color: var(--gray-400);
            }

            .empty-state i {
                font-size: 40px;
                margin-bottom: 12px;
                display: block;
                opacity: .3;
            }
        }

        /* ─── MOBILE LAYOUT ─── */
        .mobile-layout {
            display: block;
        }

        .dashboard-wrapper {
            background: white;
            min-height: 100vh;
            padding-bottom: 80px;
        }

        .header-admin {
            background: linear-gradient(135deg, #212529, #343a40);
            color: white;
            padding: 25px 20px;
            border-bottom-left-radius: 20px;
            border-bottom-right-radius: 20px;
        }

        .card-stat {
            border: none;
            border-radius: 15px;
            text-align: center;
            padding: 15px 10px;
            transition: transform .2s ease, box-shadow .2s ease;
        }

        .card-stat:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 15px rgba(0, 0, 0, .15) !important;
        }

        .student-card {
            border: 1px solid #f0f0f0 !important;
            border-radius: 12px !important;
            transition: all .2s ease;
            background: #ffffff;
        }

        .student-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 15px rgba(0, 0, 0, .08) !important;
            border-color: #e0e0e0 !important;
        }

        .fab-add {
            position: fixed;
            bottom: 30px;
            right: 20px;
            width: 60px;
            height: 60px;
            border-radius: 50%;
            background: linear-gradient(135deg, #1a56db, #1447c0);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            box-shadow: 0 6px 15px rgba(26, 86, 219, .4);
            z-index: 999;
            transition: transform .2s;
            text-decoration: none;
        }

        .fab-add:hover {
            transform: scale(1.05);
            color: white;
        }

        .action-btn {
            width: 38px;
            height: 38px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all .2s;
        }

        .animate-pulse {
            animation: pulse-animation 2s infinite;
        }

        @keyframes pulse-animation {
            0% {
                transform: scale(1);
                opacity: 1;
            }

            50% {
                transform: scale(1.1);
                opacity: 0.7;
            }

            100% {
                transform: scale(1);
                opacity: 1;
            }
        }

        /* Modal shared */
        .modal-custom .modal-content {
            border: none;
            border-radius: 20px;
            overflow: hidden;
        }

        .modal-custom .modal-header {
            background: linear-gradient(135deg, #dc3545, #c82333);
            border: none;
            padding: 20px 25px;
        }

        .modal-custom .modal-body {
            padding: 25px;
            text-align: center;
        }

        .modal-custom .modal-footer {
            border: none;
            padding: 0 25px 25px;
            justify-content: center;
            gap: 12px;
        }

        .btn-cancel-custom {
            border-radius: 12px;
            padding: 10px 30px;
            font-weight: 700;
            border: 2px solid #e9ecef;
            background: white;
            color: #6c757d;
        }

        .btn-logout-custom {
            border-radius: 12px;
            padding: 10px 30px;
            font-weight: 700;
            background: linear-gradient(135deg, #dc3545, #c82333);
            border: none;
            color: white;
        }

        /* ─── MODAL HAPUS CUSTOM ─── */
        #modalHapus .modal-content {
            border: none;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 20px 60px rgba(0, 0, 0, .18);
        }

        .hapus-icon-wrap {
            width: 76px;
            height: 76px;
            border-radius: 50%;
            background: #fee2e2;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 18px;
            font-size: 30px;
            color: #dc2626;
        }

        .hapus-nama {
            font-weight: 800;
            color: #dc2626;
        }

        .hapus-warning-box {
            background: #fff7ed;
            border: 1px solid #fed7aa;
            border-radius: 10px;
            padding: 12px 14px;
            margin-bottom: 24px;
            font-size: 12px;
            color: #c2410c;
            font-weight: 700;
            display: flex;
            align-items: flex-start;
            gap: 8px;
            text-align: left;
        }

        .btn-hapus-ok {
            border-radius: 12px;
            padding: 11px 28px;
            font-weight: 700;
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-size: 14px;
            background: linear-gradient(135deg, #dc2626, #b91c1c);
            border: none;
            color: white;
            transition: all .18s;
            box-shadow: 0 4px 12px rgba(220, 38, 38, .3);
            cursor: pointer;
        }

        .btn-hapus-ok:hover {
            background: linear-gradient(135deg, #b91c1c, #991b1b);
            transform: translateY(-1px);
            box-shadow: 0 6px 16px rgba(220, 38, 38, .38);
        }

        .btn-hapus-batal {
            border-radius: 12px;
            padding: 11px 28px;
            font-weight: 700;
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-size: 14px;
            background: white;
            border: 2px solid #e2e8f0;
            color: #475569;
            transition: all .18s;
            cursor: pointer;
        }

        .btn-hapus-batal:hover {
            background: #f8fafc;
            color: #1e293b;
            border-color: #cbd5e1;
        }
    </style>
</head>

<body>

    {{-- ══════════════════════════════════════════
    DESKTOP LAYOUT (≥ 768px)
    ══════════════════════════════════════════ --}}
    <div class="desktop-layout">

        <aside class="sidebar">
            <div class="sidebar-brand">
                <div class="sidebar-brand-title"><i class="fas fa-chalkboard-teacher me-2"></i>Panel Dosen</div>
                <div class="sidebar-brand-sub">Sistem Absensi Mahasiswa</div>
            </div>

            <nav class="sidebar-nav">
                <div class="sidebar-nav-label">Menu</div>
                <a href="{{ route('admin.dashboard') }}" class="sidebar-nav-link">
                    <i class="fas fa-home"></i> Dashboard
                </a>
                <a href="{{ route('mahasiswa.index') }}" class="sidebar-nav-link active">
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

        <main class="main-content">

            <div class="topbar">
                <div class="topbar-left">
                    <div>
                        <div class="page-title">
                            <i class="fas fa-user-graduate me-2" style="color:var(--blue-primary)"></i>Data Mahasiswa
                        </div>
                        <div class="page-subtitle">Kelola data mahasiswa yang terdaftar di sistem</div>
                    </div>
                </div>
                <a href="{{ route('mahasiswa.create') }}" class="btn-add">
                    <i class="fas fa-plus"></i> Tambah Mahasiswa
                </a>
            </div>

            @if(session('success'))
                <div class="alert alert-success border-0 rounded-3 shadow-sm mb-4 d-flex align-items-center py-2 px-3"
                    style="font-size:14px; font-family:'Plus Jakarta Sans',sans-serif;">
                    <i class="fas fa-check-circle me-2 text-success"></i> {{ session('success') }}
                </div>
            @endif

            <div class="stats-row">
                <div class="stat-card">
                    <div class="stat-icon" style="background:var(--blue-light); color:var(--blue-primary);">
                        <i class="fas fa-users"></i>
                    </div>
                    <div>
                        <div class="stat-value" style="color:var(--blue-primary);">{{ $data_mhs->count() }}</div>
                        <div class="stat-label">Total Mahasiswa</div>
                    </div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon" style="background:var(--green-light); color:var(--green);">
                        <i class="fas fa-fingerprint"></i>
                    </div>
                    <div>
                        <div class="stat-value" style="color:var(--green);">
                            {{ $data_mhs->where('is_finger_registered', true)->count() }}
                        </div>
                        <div class="stat-label">Sudah Registrasi Jari</div>
                    </div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon" style="background:var(--yellow-light); color:var(--yellow);">
                        <i class="fas fa-exclamation-circle"></i>
                    </div>
                    <div>
                        <div class="stat-value" style="color:var(--yellow);">
                            {{ $data_mhs->where('is_finger_registered', false)->count() }}
                        </div>
                        <div class="stat-label">Belum Registrasi Jari</div>
                    </div>
                </div>
            </div>

            <div class="web-card">
                <div class="web-card-header">
                    <span class="web-card-title">
                        <i class="fas fa-list me-2" style="color:var(--blue-primary)"></i>Daftar Mahasiswa
                    </span>
                    <div class="search-box">
                        <i class="fas fa-search"></i>
                        <input type="text" id="searchInput" placeholder="Cari nama, NIM, prodi..."
                            onkeyup="filterTable()">
                    </div>
                </div>

                @if($data_mhs->isEmpty())
                    <div class="empty-state">
                        <i class="fas fa-users-slash"></i>
                        <strong style="display:block; font-size:15px; color:var(--gray-600); margin-bottom:6px;">Data Masih
                            Kosong</strong>
                        <p style="font-size:13px; margin:0;">Belum ada data mahasiswa yang terdaftar.</p>
                    </div>
                @else
                    <div class="table-responsive">
                        <table class="data-table" id="mahasiswaTable">
                            <thead>
                                <tr>
                                    <th style="width:48px;">#</th>
                                    <th>Mahasiswa</th>
                                    <th>NIM</th>
                                    <th>Program Studi</th>
                                    <th>ID Fingerprint</th>
                                    <th style="text-align:center; width:130px;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data_mhs as $i => $mhs)
                                    <tr>
                                        <td style="color:var(--gray-400); font-size:13px; font-weight:600;">{{ $i + 1 }}</td>
                                        <td>
                                            <div class="nama-col">
                                                <div class="avatar-circle">
                                                    {{ strtoupper(substr($mhs->nama_lengkap, 0, 1)) }}
                                                </div>
                                                <span class="nama-text">{{ $mhs->nama_lengkap }}</span>
                                            </div>
                                        </td>
                                        <td
                                            style="color:var(--gray-400); font-size:13px; font-weight:600; font-family:monospace;">
                                            {{ $mhs->nim }}
                                        </td>
                                        <td><span class="prodi-badge">{{ $mhs->prodi }}</span></td>
                                        <td>
                                            <span class="fp-badge">
                                                <i class="fas fa-fingerprint" style="font-size:11px;"></i>
                                                {{ $mhs->fingerprint_id }}
                                            </span>
                                            @if($mhs->is_finger_registered)
                                                <span
                                                    style="background:#d1fae5; color:#0a9f6e; border-radius:6px; padding:2px 7px; font-size:11px; font-weight:700; margin-left:4px;">
                                                    ✓ Terdaftar
                                                </span>
                                            @else
                                                <span
                                                    style="background:#fee2e2; color:#dc2626; border-radius:6px; padding:2px 7px; font-size:11px; font-weight:700; margin-left:4px;">
                                                    ✗ Belum
                                                </span>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="action-group">
                                                <button
                                                    onclick="konfirmasiRegistrasi('{{ $mhs->fingerprint_id }}', '{{ $mhs->nama_lengkap }}')"
                                                    class="tbl-btn finger" title="Daftarkan Sidik Jari">
                                                    <i class="fas fa-fingerprint"></i>
                                                </button>
                                                <a href="{{ route('mahasiswa.edit', $mhs->id) }}" class="tbl-btn edit"
                                                    title="Edit Data">
                                                    <i class="fas fa-pencil-alt"></i>
                                                </a>
                                                {{-- Tombol hapus → buka modal, bukan confirm() browser --}}
                                                <button type="button" class="tbl-btn delete" title="Hapus"
                                                    onclick="bukaModalHapus('{{ $mhs->id }}', '{{ addslashes($mhs->nama_lengkap) }}')">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="table-footer">
                        Menampilkan <strong>{{ $data_mhs->count() }}</strong> mahasiswa terdaftar
                    </div>
                @endif
            </div>

        </main>
    </div>

    {{-- ══════════════════════════════════════════
    MOBILE LAYOUT (< 768px) ══════════════════════════════════════════ --}} <div class="mobile-layout">
        <div class="container-fluid p-0">
            <div class="row justify-content-center m-0">
                <div class="col-12 col-md-8 col-lg-5 dashboard-wrapper p-0">

                    <div class="header-admin mb-4 shadow-sm">
                        <div class="d-flex justify-content-between align-items-center mb-1">
                            <div class="d-flex align-items-center gap-3">
                                <a href="{{ route('admin.dashboard') }}" class="text-white text-decoration-none">
                                    <i class="fas fa-arrow-left fa-lg"></i>
                                </a>
                                <h5 class="m-0 fw-bold">
                                    <i class="fas fa-user-graduate me-2"></i> Data Mahasiswa
                                </h5>
                            </div>
                        </div>
                        <small class="opacity-75 mt-1 d-block">
                            <i class="far fa-calendar-alt me-1"></i>
                            {{ \Carbon\Carbon::now()->translatedFormat('l, d F Y') }}
                        </small>
                    </div>

                    <div class="px-3">

                        @if(session('success'))
                            <div
                                class="alert alert-success py-2 px-3 small mb-4 shadow-sm border-0 rounded-3 d-flex align-items-center">
                                <i class="fas fa-check-circle fa-lg me-2 text-success"></i>
                                <span>{{ session('success') }}</span>
                            </div>
                        @endif

                        <div class="row g-3 mb-4">
                            <div class="col-4">
                                <div class="card card-stat bg-primary text-white shadow-sm h-100">
                                    <h3 class="fw-bold m-0">{{ $data_mhs->count() }}</h3>
                                    <small style="font-size:11px;">Total Mhs</small>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="card card-stat bg-success text-white shadow-sm h-100">
                                    <h3 class="fw-bold m-0">{{ $data_mhs->whereNotNull('fingerprint_id')->count() }}
                                    </h3>
                                    <small style="font-size:11px;">Sudah Jari</small>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="card card-stat text-white shadow-sm h-100" style="background:#d97706;">
                                    <h3 class="fw-bold m-0">{{ $data_mhs->whereNull('fingerprint_id')->count() }}</h3>
                                    <small style="font-size:11px;">Belum Jari</small>
                                </div>
                            </div>
                        </div>

                        <h6 class="fw-bold text-secondary mb-3">
                            <i class="fas fa-users me-2"></i> Daftar Mahasiswa
                        </h6>

                        <div class="list-group list-group-flush">
                            @forelse($data_mhs as $mhs)
                                <div class="list-group-item student-card mb-3 p-3 shadow-sm">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <h6 class="fw-bold mb-1 text-dark" style="font-size:15px;">
                                                {{ $mhs->nama_lengkap }}
                                            </h6>
                                            <div class="text-muted mb-2" style="font-size:13px;">
                                                <i class="fas fa-id-card me-1"></i> {{ $mhs->nim }}
                                                <span class="mx-1">•</span> {{ $mhs->prodi }}
                                            </div>
                                            <span class="badge rounded-pill px-2 py-1"
                                                style="background:#ede9fe; color:#7c3aed; font-size:11px;">
                                                <i class="fas fa-fingerprint me-1"></i> {{ $mhs->fingerprint_id }}
                                            </span>
                                            @if($mhs->is_finger_registered)
                                                <span class="badge rounded-pill px-2 py-1 ms-1"
                                                    style="background:#d1fae5; color:#0a9f6e; font-size:11px;">
                                                    ✓ Terdaftar
                                                </span>
                                            @else
                                                <span class="badge rounded-pill px-2 py-1 ms-1"
                                                    style="background:#fee2e2; color:#dc2626; font-size:11px;">
                                                    ✗ Belum
                                                </span>
                                            @endif
                                        </div>
                                        <div class="d-flex gap-2">
                                            <button
                                                onclick="konfirmasiRegistrasi('{{ $mhs->fingerprint_id }}', '{{ $mhs->nama_lengkap }}')"
                                                class="btn btn-light action-btn rounded-circle border shadow-sm"
                                                style="color:#7c3aed;" title="Daftarkan Sidik Jari">
                                                <i class="fas fa-fingerprint"></i>
                                            </button>
                                            <a href="{{ route('mahasiswa.edit', $mhs->id) }}"
                                                class="btn btn-light text-primary action-btn rounded-circle border shadow-sm"
                                                title="Edit">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>
                                            {{-- Tombol hapus mobile → buka modal --}}
                                            <button type="button"
                                                class="btn btn-light text-danger action-btn rounded-circle border shadow-sm"
                                                title="Hapus"
                                                onclick="bukaModalHapus('{{ $mhs->id }}', '{{ addslashes($mhs->nama_lengkap) }}')">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="text-center py-5 text-muted bg-light rounded-3 border"
                                    style="border-style:dashed !important;">
                                    <i class="fas fa-users-slash fa-2x text-secondary opacity-50 mb-3 d-block"></i>
                                    <h6 class="fw-bold text-dark">Data Masih Kosong</h6>
                                    <p class="mb-0 small">Belum ada data mahasiswa yang terdaftar.</p>
                                </div>
                            @endforelse
                        </div>

                    </div>

                    <a href="{{ route('mahasiswa.create') }}" class="fab-add" title="Tambah Mahasiswa">
                        <i class="fas fa-plus"></i>
                    </a>

                </div>
            </div>
        </div>
        </div>

        {{-- ══════════════════════════════════════════
        MODAL KONFIRMASI HAPUS
        ══════════════════════════════════════════ --}}
        <div class="modal fade" id="modalHapus" tabindex="-1" aria-hidden="true" data-bs-backdrop="static"
            data-bs-keyboard="false">
            <div class="modal-dialog modal-dialog-centered" style="max-width:400px;">
                <div class="modal-content">
                    <div class="modal-body" style="padding: 40px 32px 32px;">

                        {{-- Ikon merah --}}
                        <div class="hapus-icon-wrap">
                            <i class="fas fa-trash-alt"></i>
                        </div>

                        {{-- Judul --}}
                        <h5 class="fw-bold text-center mb-2" style="font-size:19px; color:#1e293b;">
                            Hapus Data Mahasiswa?
                        </h5>

                        {{-- Keterangan --}}
                        <p class="text-center mb-1" style="font-size:14px; color:#64748b; line-height:1.6;">
                            Anda akan menghapus data milik
                        </p>
                        <p class="text-center mb-4" style="font-size:15px; color:#1e293b;">
                            "<span id="namaHapusTarget" class="hapus-nama"></span>"
                        </p>

                        {{-- Kotak peringatan --}}
                        <div class="hapus-warning-box">
                            <i class="fas fa-exclamation-triangle mt-1 flex-shrink-0"></i>
                            <span>Tindakan ini tidak dapat dibatalkan. Semua data terkait mahasiswa ini akan ikut
                                terhapus secara permanen.</span>
                        </div>

                        {{-- Tombol aksi --}}
                        <div class="d-flex gap-3 justify-content-center">
                            <button type="button" class="btn-hapus-batal" data-bs-dismiss="modal">
                                <i class="fas fa-times me-1"></i> Batal
                            </button>
                            {{-- Satu form hapus, action-nya diisi JS --}}
                            <form id="formHapus" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-hapus-ok">
                                    <i class="fas fa-trash-alt me-1"></i> Ya, Hapus
                                </button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        {{-- ══════════════════════════════════════════
        MODAL FINGERPRINT
        ══════════════════════════════════════════ --}}
        <div class="modal fade" id="modalFinger" data-bs-backdrop="static" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content border-0 shadow" style="border-radius:20px;">
                    <div class="modal-body text-center py-5">
                        <div class="mb-4">
                            <i class="fas fa-fingerprint fa-4x animate-pulse" style="color:var(--purple);"></i>
                        </div>
                        <h5 class="fw-bold mb-2" style="font-family:'Plus Jakarta Sans',sans-serif;">
                            Registrasi Jari: <span id="namaMhsText" style="color:var(--blue-primary);"></span>
                        </h5>
                        <p class="text-muted mb-3" style="font-size:14px;">
                            Status: <span id="statusBadge" class="badge bg-warning text-dark">Menghubungkan...</span>
                        </p>
                        <div class="progress mb-3 mx-4" style="height:8px; border-radius:5px;">
                            <div class="progress-bar progress-bar-striped progress-bar-animated bg-primary"
                                style="width:100%"></div>
                        </div>
                        <p class="small text-muted px-4">Tempelkan jari mahasiswa pada sensor sebanyak 3 kali saat lampu
                            menyala.</p>
                        <button onclick="batalkanRegistrasi()"
                            class="btn btn-outline-danger btn-sm rounded-pill px-4 mt-2">
                            Batalkan
                        </button>
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
                        <p class="text-dark fw-semibold mb-1" style="font-size:15px;">Apakah Anda yakin ingin keluar?
                        </p>
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
        <script>
            // ─── MODAL HAPUS CUSTOM ───────────────────────────────────────────
            function bukaModalHapus(id, nama) {
                // Tampilkan nama mahasiswa di modal
                document.getElementById('namaHapusTarget').innerText = nama;

                // Set route action DELETE ke form
                document.getElementById('formHapus').action = '/admin/mahasiswa/' + id;

                // Tampilkan modal
                new bootstrap.Modal(document.getElementById('modalHapus')).show();
            }

            let intervalCheck;
            let fingerModal;

            function konfirmasiRegistrasi(finger_id, nama) {
                if (confirm(`Mulai registrasi sidik jari untuk ${nama}?`)) {
                    document.getElementById('namaMhsText').innerText = nama;

                    const modalEl = document.getElementById('modalFinger');
                    fingerModal = new bootstrap.Modal(modalEl);
                    document.getElementById('statusBadge').innerText = "Menghubungkan ke alat...";
                    document.getElementById('statusBadge').className = "badge bg-warning text-dark";
                    fingerModal.show();

                    fetch(`/admin/mahasiswa/registrasi/${finger_id}`, {
                        credentials: 'same-origin',
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest',
                            'Accept': 'application/json'
                        }
                    })
                        .then(res => {
                            if (!res.ok) throw new Error('HTTP ' + res.status);
                            return res.json();
                        })
                        .then(data => {
                            if (data.status === 'ready') {
                                document.getElementById('statusBadge').innerText = "Alat Siap! Silakan Tempel Jari";
                                document.getElementById('statusBadge').className = "badge bg-success";
                                intervalCheck = setInterval(cekHasilRegistrasi, 2000);
                            } else {
                                document.getElementById('statusBadge').innerText = "Error: " + data.message;
                                document.getElementById('statusBadge').className = "badge bg-danger";
                            }
                        })
                        .catch(err => {
                            fingerModal.hide();
                            alert("Gagal menghubungkan ke server: " + err.message);
                        });
                }
            }

            function cekHasilRegistrasi() {
                fetch('/api/cek-status-registrasi', {
                    credentials: 'same-origin'
                })
                    .then(res => res.json())
                    .then(data => {
                        if (data.mode === 'enroll') return;

                        // ← PENTING: kalau hasil masih kosong, tunggu dulu jangan tutup modal
                        if (data.hasil_enroll === '' || data.hasil_enroll === null) return;

                        clearInterval(intervalCheck);

                        if (data.hasil_enroll === 'sukses') {
                            document.getElementById('statusBadge').innerText = "✅ Registrasi Berhasil!";
                            document.getElementById('statusBadge').className = "badge bg-success";
                            setTimeout(() => {
                                bootstrap.Modal.getInstance(document.getElementById('modalFinger')).hide();
                                location.reload();
                            }, 1500);
                        } else if (data.hasil_enroll === 'gagal') {
                            document.getElementById('statusBadge').innerText = "❌ Registrasi Gagal!";
                            document.getElementById('statusBadge').className = "badge bg-danger";
                            setTimeout(() => {
                                bootstrap.Modal.getInstance(document.getElementById('modalFinger')).hide();
                            }, 2000);
                        }
                    });
            }

            function batalkanRegistrasi() {
                clearInterval(intervalCheck);

                fetch('/admin/mahasiswa/reset-mode-alat?action=batal', {
                    credentials: 'same-origin'
                })
                    .then(res => res.json())
                    .then(() => {
                        bootstrap.Modal.getInstance(document.getElementById('modalFinger')).hide();
                    });
            }
            // ─── SEARCH TABLE ─────────────────────────────────────────────────
            function filterTable() {
                const q = document.getElementById('searchInput').value.toLowerCase();
                document.querySelectorAll('#mahasiswaTable tbody tr').forEach(row => {
                    row.style.display = row.textContent.toLowerCase().includes(q) ? '' : 'none';
                });
            }
        </script>

</body>

</html>