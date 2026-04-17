<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Absensi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">

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

        /* ─── SIDEBAR ─── */
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

        /* ─── MAIN ─── */
        .main-content {
            margin-left: 260px;
            padding: 32px;
            min-height: 100vh;
        }

        /* ─── STAT CARDS ─── */
        .stat-card {
            background: white;
            border-radius: var(--radius);
            padding: 20px;
            box-shadow: var(--shadow);
            border: 1px solid var(--gray-200);
            display: flex;
            align-items: center;
            gap: 14px;
            height: 100%;
        }

        .stat-icon {
            width: 48px;
            height: 48px;
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
            font-size: 11px;
            color: var(--gray-400);
            font-weight: 700;
            margin-top: 3px;
            text-transform: uppercase;
        }

        /* ─── TOOLBAR ─── */
        .toolbar {
            background: white;
            border-radius: var(--radius);
            padding: 12px 16px;
            box-shadow: var(--shadow);
            border: 1px solid var(--gray-200);
            display: flex;
            gap: 8px;
            align-items: center;
            flex-wrap: wrap;
        }

        .filter-btn {
            padding: 6px 14px;
            border-radius: 999px;
            font-size: 12px;
            font-weight: 700;
            border: 1.5px solid var(--gray-200);
            background: white;
            color: var(--gray-600);
            cursor: pointer;
            transition: all .18s;
        }

        .filter-btn:hover {
            border-color: var(--blue-primary);
            color: var(--blue-primary);
        }

        .filter-btn.active {
            background: var(--blue-primary);
            color: white;
            border-color: var(--blue-primary);
        }

        .filter-btn.green.active {
            background: var(--green);
            border-color: var(--green);
        }

        .filter-btn.red.active {
            background: var(--red);
            border-color: var(--red);
        }

        .filter-btn.yellow.active {
            background: var(--yellow);
            border-color: var(--yellow);
        }

        .filter-select {
            padding: 6px 12px;
            border-radius: 999px;
            font-size: 12px;
            font-weight: 700;
            border: 1.5px solid var(--gray-200);
            background: white;
            color: var(--gray-600);
            cursor: pointer;
            font-family: 'Plus Jakarta Sans', sans-serif;
            outline: none;
            transition: all .18s;
        }

        .filter-select:focus,
        .filter-select:hover {
            border-color: var(--blue-primary);
            color: var(--blue-primary);
        }

        .search-input {
            margin-left: auto;
            padding: 6px 14px;
            border-radius: 999px;
            font-size: 13px;
            font-weight: 600;
            border: 1.5px solid var(--gray-200);
            background: var(--gray-50);
            color: var(--gray-800);
            outline: none;
            transition: all .18s;
            font-family: 'Plus Jakarta Sans', sans-serif;
            width: 100%;
        }

        .search-input:focus {
            border-color: var(--blue-primary);
            background: white;
        }

        /* ─── TABLE ─── */
        .content-card {
            background: white;
            border-radius: var(--radius);
            box-shadow: var(--shadow);
            border: 1px solid var(--gray-200);
            overflow: hidden;
        }

        .content-card-header {
            padding: 16px 20px;
            border-bottom: 1px solid var(--gray-200);
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .history-table {
            width: 100%;
            border-collapse: collapse;
        }

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

        .history-table tbody tr:last-child td {
            border-bottom: none;
        }

        .history-table tbody tr:hover td {
            background: var(--gray-50);
        }

        .avatar-sm {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--blue-primary), #0dcaf0);
            color: white;
            font-weight: 800;
            font-size: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        /* ─── STATUS PILLS ─── */
        .status-pill {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            padding: 4px 12px;
            border-radius: 999px;
            font-size: 12px;
            font-weight: 700;
        }

        .status-pill.hadir {
            background: var(--green-light);
            color: var(--green);
        }

        .status-pill.terlambat {
            background: var(--yellow-light);
            color: var(--yellow);
        }

        .status-pill.alpha {
            background: var(--red-light);
            color: var(--red);
        }

        /* ─── MOBILE CARD ─── */
        .history-card {
            background: white;
            border: 1px solid var(--gray-200) !important;
            border-radius: 12px !important;
            transition: all .2s;
        }

        .history-card:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow) !important;
        }

        .avatar-circle {
            width: 42px;
            height: 42px;
            font-weight: bold;
            font-size: 15px;
            background: linear-gradient(135deg, #0d6efd, #0dcaf0);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            flex-shrink: 0;
        }

        /* ─── MODAL ─── */
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

        /* ─── RESPONSIVE ─── */
        @media (max-width: 767px) {
            .sidebar {
                display: none;
            }

            .main-content {
                margin-left: 0;
                padding: 0 0 40px 0;
            }

            .search-input {
                margin-left: 0;
            }
        }

        @media print {

            .sidebar,
            .toolbar,
            .no-print {
                display: none !important;
            }

            .main-content {
                margin-left: 0;
                padding: 0;
            }
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
            <a href="{{ route('admin.dashboard') }}" class="sidebar-nav-link">
                <i class="fas fa-home"></i> Dashboard
            </a>
            <a href="{{ route('mahasiswa.index') }}" class="sidebar-nav-link">
                <i class="fas fa-user-graduate"></i> Data Mahasiswa
            </a>
            <a href="{{ route('admin.riwayat') }}" class="sidebar-nav-link active">
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

        {{-- Mobile Header --}}
        <div class="d-md-none px-3 pt-4 pb-3 mb-3 border-bottom no-print" style="background:white;">
            <div class="d-flex justify-content-between align-items-center">
                <div class="d-flex align-items-center gap-3">
                    <a href="{{ route('admin.dashboard') }}" class="text-dark">
                        <i class="fas fa-arrow-left fa-lg"></i>
                    </a>
                    <h5 class="fw-bold m-0">
                        <i class="fas fa-history me-2 text-primary"></i>Riwayat Absensi
                    </h5>
                </div>
                <button onclick="window.print()" class="btn btn-outline-primary btn-sm rounded-pill px-3">
                    <i class="fas fa-print me-1"></i> Cetak
                </button>
            </div>
        </div>

        {{-- Desktop Topbar --}}
        <div class="d-none d-md-flex justify-content-between align-items-center mb-4 no-print">
            <div>
                <div style="font-size:22px;font-weight:800;">
                    <i class="fas fa-history me-2" style="color:var(--blue-primary)"></i>Riwayat Absensi
                </div>
                <div style="font-size:13px;color:var(--gray-400);">Semua catatan kehadiran mahasiswa</div>
            </div>
            <button onclick="window.print()" class="btn-logout-web"
                style="width:auto;background:var(--blue-light);color:var(--blue-primary);border-color:#bfdbfe;">
                <i class="fas fa-print"></i> Cetak Laporan
            </button>
        </div>

        {{-- Stats --}}
        @php
            $totalHadir = $riwayat->where('status', 'Hadir')->count();
            $totalTerlambat = $riwayat->where('status', 'Terlambat')->count();
            $totalAlpha = $riwayat->whereNotIn('status', ['Hadir', 'Terlambat'])->count();
        @endphp
        <div class="px-3 px-md-0 mb-3">
            <div class="row g-3">
                <div class="col-4">
                    <div class="stat-card">
                        <div class="stat-icon" style="background:var(--green-light);color:var(--green);">
                            <i class="fas fa-check-circle"></i>
                        </div>
                        <div>
                            <div class="stat-value" style="color:var(--green);">{{ $totalHadir }}</div>
                            <div class="stat-label">Hadir</div>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="stat-card">
                        <div class="stat-icon" style="background:var(--yellow-light);color:var(--yellow);">
                            <i class="fas fa-clock"></i>
                        </div>
                        <div>
                            <div class="stat-value" style="color:var(--yellow);">{{ $totalTerlambat }}</div>
                            <div class="stat-label">Terlambat</div>
                        </div>
                    </div>
                </div>
                <div class="col-4">
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
            </div>
        </div>

        {{-- Toolbar Filter + Search --}}
        <div class="px-3 px-md-0 mb-3 no-print">
            <div class="toolbar">
                <span style="font-size:12px;font-weight:700;color:var(--gray-600);">Filter:</span>
                <button class="filter-btn active" onclick="filterTable('semua', this)">Semua</button>
                <button class="filter-btn green" onclick="filterTable('Hadir', this)"><i
                        class="fas fa-check me-1"></i>Hadir</button>
                <button class="filter-btn yellow" onclick="filterTable('Terlambat', this)"><i
                        class="fas fa-exclamation me-1"></i>Terlambat</button>
                <button class="filter-btn red" onclick="filterTable('Alpha', this)"><i
                        class="fas fa-times me-1"></i>Alpha</button>
                <input type="text" class="search-input mt-2 mt-md-0" id="searchInput"
                    placeholder="🔍 Cari nama mahasiswa..." oninput="searchTable()">
            </div>
            {{-- Filter Tambahan: Prodi, Matkul, Tanggal --}}
            <div class="px-3 px-md-0 mb-3 no-print">
                <form method="GET" action="{{ route('admin.riwayat') }}" id="formFilter">
                    <div class="toolbar" style="gap:10px;flex-wrap:wrap;">

                        <select name="prodi" class="filter-select" onchange="this.form.submit()">
                            <option value="">Semua Prodi</option>
                            @foreach($daftarProdi as $p)
                                <option value="{{ $p }}" {{ request('prodi') == $p ? 'selected' : '' }}>{{ $p }}</option>
                            @endforeach
                        </select>

                        <select name="matkul" class="filter-select" onchange="this.form.submit()">
                            <option value="">Semua Matkul</option>
                            @foreach($daftarMatkul as $m)
                                <option value="{{ $m }}" {{ request('matkul') == $m ? 'selected' : '' }}>{{ $m }}</option>
                            @endforeach
                        </select>

                        <input type="date" name="tanggal" class="filter-select" value="{{ request('tanggal') }}"
                            onchange="this.form.submit()">

                        @if(request('prodi') || request('matkul') || request('tanggal'))
                            <a href="{{ route('admin.riwayat') }}"
                                style="font-size:12px;font-weight:700;color:var(--red);text-decoration:none;padding:6px 10px;">
                                <i class="fas fa-times me-1"></i>Reset Filter
                            </a>
                        @endif

                    </div>
                </form>
            </div>
        </div>

        {{-- Desktop: Tabel --}}
        <div class="px-md-0 d-none d-md-block">
            <div class="content-card">
                <div class="content-card-header">
                    <span style="font-size:15px;font-weight:700;">Daftar Riwayat</span>
                    <span style="font-size:12px;color:var(--gray-400);font-weight:600;" id="rowCount">
                        Total: {{ $riwayat->count() }} catatan
                    </span>
                </div>
                <table class="history-table" id="historyTable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Mahasiswa</th>
                            <th>Program Studi</th>
                            <th>Mata Kuliah</th>
                            <th>Tanggal</th>
                            <th>Waktu Masuk</th>
                            <th>Status</th>
                            <th style="text-align:center;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($riwayat as $i => $item)
                            @php $statusKey = in_array($item->status, ['Hadir', 'Terlambat']) ? $item->status : 'Alpha'; @endphp
                            <tr data-status="{{ $statusKey }}" data-name="{{ strtolower($item->mahasiswa->nama_lengkap) }}">
                                <td style="color:var(--gray-400);font-weight:600;">{{ $i + 1 }}</td>
                                <td>
                                    <div class="d-flex align-items-center gap-3">
                                        <div class="avatar-sm">{{ substr($item->mahasiswa->nama_lengkap, 0, 1) }}</div>
                                        <span style="font-weight:700;">{{ $item->mahasiswa->nama_lengkap }}</span>
                                    </div>
                                </td>
                                <td style="color:var(--gray-600);font-weight:600;">{{ $item->mahasiswa->prodi }}</td>
                                <td style="font-weight:600;">
                                    <span
                                        style="background:var(--blue-light);color:var(--blue-primary);border-radius:8px;padding:3px 10px;font-size:12px;font-weight:700;">
                                        {{ $item->nama_matkul ?? '-' }}
                                    </span>
                                </td>
                                <td style="font-weight:600;">
                                    {{ \Carbon\Carbon::parse($item->created_at)->translatedFormat('d F Y') }}
                                </td>
                                <td style="font-weight:700;">{{ \Carbon\Carbon::parse($item->waktu_masuk)->format('H:i') }}
                                    WIB</td>
                                <td>
                                    @if($item->status == 'Hadir')
                                        <span class="status-pill hadir"><i class="fas fa-check"></i> Hadir</span>
                                    @elseif($item->status == 'Terlambat')
                                        <span class="status-pill terlambat"><i class="fas fa-exclamation"></i> Terlambat</span>
                                    @else
                                        <span class="status-pill alpha"><i class="fas fa-times"></i> {{ $item->status }}</span>
                                    @endif
                                </td>
                                <td style="text-align:center;">
                                    <button onclick="bukaModalEditStatus({{ $item->id }}, '{{ $item->status }}')"
                                        class="tbl-btn"
                                        style="color:var(--blue-primary);border:1px solid var(--gray-200);background:white;width:34px;height:34px;border-radius:var(--radius-sm);cursor:pointer;"
                                        title="Edit Status">
                                        <i class="fas fa-pencil-alt" style="font-size:13px;"></i>
                                    </button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center py-5 text-muted">
                                    <i class="fas fa-box-open fa-2x mb-2 d-block opacity-50"></i>
                                    <strong class="d-block mb-1" style="color:var(--gray-800);">Data Kosong</strong>
                                    Belum ada data absensi yang masuk ke sistem.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        {{-- Mobile: Cards --}}
        <div class="px-3 d-md-none">
            @forelse($riwayat as $item)
                @php $statusKey = in_array($item->status, ['Hadir', 'Terlambat']) ? $item->status : 'Alpha'; @endphp
                <div class="history-card mb-3 p-3" data-status="{{ $statusKey }}"
                    data-name="{{ strtolower($item->mahasiswa->nama_lengkap) }}">
                    <div class="d-flex justify-content-between align-items-center mb-2 pb-2 border-bottom">
                        <small class="text-secondary fw-bold">
                            <i class="far fa-calendar-alt me-1 text-primary"></i>
                            {{ \Carbon\Carbon::parse($item->created_at)->translatedFormat('d F Y') }}
                        </small>
                        <small class="bg-light px-2 py-1 rounded-pill fw-bold border">
                            <i class="far fa-clock me-1"></i>
                            {{ \Carbon\Carbon::parse($item->waktu_masuk)->format('H:i') }} WIB
                        </small>
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="d-flex align-items-center gap-3">
                            <div class="avatar-circle">{{ substr($item->mahasiswa->nama_lengkap, 0, 1) }}</div>
                            <div>
                                <h6 class="fw-bold m-0" style="font-size:15px;">{{ $item->mahasiswa->nama_lengkap }}</h6>
                                <small class="text-muted">{{ $item->mahasiswa->prodi }}</small>
                            </div>
                        </div>
                        @if($item->status == 'Hadir')
                            <span class="status-pill hadir"><i class="fas fa-check"></i> Hadir</span>
                        @elseif($item->status == 'Terlambat')
                            <span class="status-pill terlambat"><i class="fas fa-exclamation"></i> Terlambat</span>
                        @else
                            <span class="status-pill alpha"><i class="fas fa-times"></i> {{ $item->status }}</span>
                        @endif
                    </div>
                </div>
            @empty
                <div class="text-center py-5 text-muted border rounded-3 bg-light" style="border-style:dashed !important;">
                    <i class="fas fa-box-open fa-3x mb-3 opacity-50"></i>
                    <h6 class="fw-bold text-dark">Data Kosong</h6>
                    <small>Belum ada data absensi yang masuk ke sistem.</small>
                </div>
            @endforelse

            <button onclick="window.print()" class="btn btn-primary w-100 rounded-pill py-2 mt-2 no-print">
                <i class="fas fa-print me-2"></i> Cetak Laporan
            </button>
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

    {{-- Modal Edit Status --}}
    <div class="modal fade" id="modalEditStatus" tabindex="-1" data-bs-backdrop="static">
        <div class="modal-dialog modal-dialog-centered" style="max-width:380px;">
            <div class="modal-content border-0" style="border-radius:20px;">
                <div class="modal-body" style="padding:36px 32px;">
                    <h5 class="fw-bold mb-1" style="font-size:18px;">Ubah Status Kehadiran</h5>
                    <p class="text-muted mb-4" style="font-size:13px;">Pilih status baru untuk catatan absensi ini.</p>

                    <form id="formEditStatus" method="POST">
                        @csrf
                        @method('POST')
                        <div class="d-grid gap-2 mb-4">
                            <label class="form-label fw-bold small text-muted">Status</label>
                            <select name="status" id="selectStatus" class="form-select fw-bold"
                                style="border-radius:10px;border:2px solid var(--gray-200);padding:10px 14px;font-family:'Plus Jakarta Sans',sans-serif;">
                                <option value="Hadir">✅ Hadir</option>
                                <option value="Alpha">❌ Alpha</option>
                                <option value="Izin">📋 Izin</option>
                                <option value="Sakit">🤒 Sakit</option>
                            </select>
                        </div>
                        <div class="d-flex gap-3">
                            <button type="button" class="btn w-50 fw-bold" data-bs-dismiss="modal"
                                style="border-radius:12px;border:2px solid var(--gray-200);background:white;color:var(--gray-600);">
                                Batal
                            </button>
                            <button type="submit" class="btn w-50 fw-bold text-white"
                                style="border-radius:12px;background:var(--blue-primary);border:none;">
                                <i class="fas fa-save me-1"></i> Simpan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        let activeStatus = 'semua';
        let searchQuery = '';

        function applyFilter() {
            let visible = 0;

            // Filter tabel desktop
            document.querySelectorAll('#historyTable tbody tr[data-status]').forEach(row => {
                const match = (activeStatus === 'semua' || row.dataset.status === activeStatus)
                    && row.dataset.name.includes(searchQuery);
                row.style.display = match ? '' : 'none';
                if (match) visible++;
            });

            // Filter cards mobile
            document.querySelectorAll('.history-card[data-status]').forEach(card => {
                const match = (activeStatus === 'semua' || card.dataset.status === activeStatus)
                    && card.dataset.name.includes(searchQuery);
                card.style.display = match ? '' : 'none';
            });

            const rc = document.getElementById('rowCount');
            if (rc) rc.textContent = `Menampilkan: ${visible} catatan`;
        }

        function filterTable(status, btn) {
            activeStatus = status;
            document.querySelectorAll('.filter-btn').forEach(b => b.classList.remove('active'));
            btn.classList.add('active');
            applyFilter();
        }

        function searchTable() {
            searchQuery = document.getElementById('searchInput').value.toLowerCase();
            applyFilter();
        }

        function bukaModalEditStatus(id, statusSaat) {
            document.getElementById('formEditStatus').action = '/admin/absensi/' + id + '/status';
            document.getElementById('selectStatus').value = statusSaat;
            new bootstrap.Modal(document.getElementById('modalEditStatus')).show();
        }

    </script>
</body>

</html>