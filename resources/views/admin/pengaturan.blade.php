<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengaturan Jam - Admin</title>
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
            --red: #dc2626;
            --red-light: #fee2e2;
            --purple: #6c5ce7;
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

            /* Sidebar */
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

            /* Content grid */
            .settings-grid {
                display: grid;
                grid-template-columns: 1fr;
                gap: 20px;
                align-items: start;
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

            .web-card-body {
                padding: 24px;
            }

            /* Clock widget */
            .clock-widget {
                background: linear-gradient(135deg, var(--purple), #a29bfe);
                border-radius: var(--radius);
                padding: 28px 24px;
                text-align: center;
                color: white;
                margin-bottom: 20px;
            }

            .clock-widget .clock-time {
                font-size: 48px;
                font-weight: 800;
                letter-spacing: 3px;
                line-height: 1;
                font-variant-numeric: tabular-nums;
            }

            .clock-widget .clock-label {
                font-size: 12px;
                opacity: .7;
                font-weight: 600;
                margin-bottom: 8px;
            }

            .clock-widget .clock-date {
                font-size: 13px;
                opacity: .75;
                font-weight: 600;
                margin-top: 8px;
            }

            /* Form */
            .time-input-large {
                font-size: 2.5rem !important;
                font-weight: 800 !important;
                height: 90px !important;
                border-radius: 14px !important;
                border: 2px solid var(--gray-200) !important;
                text-align: center;
                letter-spacing: 4px;
                color: var(--gray-800);
                transition: border-color .2s;
            }

            .time-input-large:focus {
                border-color: var(--purple) !important;
                box-shadow: 0 0 0 4px rgba(108, 92, 231, .12) !important;
                outline: none;
            }

            .btn-save-web {
                background: linear-gradient(135deg, var(--purple), #5849c4);
                border: none;
                padding: 14px 32px;
                font-size: 14px;
                font-weight: 800;
                border-radius: var(--radius-sm);
                color: white;
                cursor: pointer;
                transition: all .2s;
                letter-spacing: .04em;
            }

            .btn-save-web:hover {
                transform: translateY(-2px);
                box-shadow: 0 6px 20px rgba(108, 92, 231, .35);
            }

            /* Info box */
            .info-box {
                background: var(--gray-50);
                border-radius: var(--radius-sm);
                border-left: 4px solid #fbbf24;
                padding: 14px 16px;
                font-size: 13px;
                color: var(--gray-600);
                line-height: 1.6;
            }
        }

        /* ─── MOBILE LAYOUT ─── */
        .mobile-layout {
            display: block;
        }

        .mobile-wrapper {
            background: white;
            min-height: 100vh;
            padding: 20px 25px;
            box-shadow: 0 0 20px rgba(0, 0, 0, .05);
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        .clock-section {
            background: linear-gradient(135deg, #6c5ce7, #a29bfe);
            color: white;
            border-radius: 15px;
            padding: 20px;
            margin-bottom: 25px;
        }

        .form-control-lg {
            font-size: 2rem;
            height: 80px;
            border-radius: 12px;
            border: 2px solid #dee2e6;
        }

        .form-control-lg:focus {
            border-color: #6c5ce7;
            box-shadow: 0 0 0 4px rgba(108, 92, 231, .15);
        }

        .btn-save {
            background-color: #6c5ce7;
            border: none;
            padding: 15px;
            font-size: 1.1rem;
            border-radius: 12px;
            transition: all .3s;
        }

        .btn-save:hover {
            background-color: #5849c4;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(108, 92, 231, .3);
        }

        /* Modal */
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
                <a href="{{ route('admin.riwayat') }}" class="sidebar-nav-link">
                    <i class="fas fa-history"></i> Riwayat Absensi
                </a>
                <a href="{{ route('admin.pengaturan') }}" class="sidebar-nav-link active">
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
        <main class="main-content">

            <div class="topbar">
                <div>
                    <div class="page-title"><i class="fas fa-cog me-2" style="color:var(--purple)"></i>Pengaturan Sistem
                    </div>
                    <div class="page-subtitle">Atur batas toleransi waktu masuk mahasiswa</div>
                </div>
            </div>

            @if(session('success'))
                <div class="alert alert-success border-0 shadow-sm d-flex align-items-center mb-4" role="alert"
                    style="border-radius:var(--radius-sm); font-weight:600; font-size:14px;">
                    <i class="fas fa-check-circle me-2"></i>
                    {{ session('success') }}
                </div>
            @endif

            <div class="settings-grid">

                {{-- Sesi Absensi Card --}}
                <div class="web-card">
                    <div class="web-card-header">
                        <span class="web-card-title">
                            <i class="fas fa-play-circle me-2" style="color:var(--green)"></i>Sesi Absensi
                        </span>
                        @if($pengaturan && $pengaturan->sesi_aktif)
                            <span class="badge"
                                style="background:var(--green-light);color:var(--green);font-size:12px;padding:6px 12px;border-radius:999px;font-weight:700;">
                                <i class="fas fa-circle me-1" style="font-size:8px;"></i> Sesi Aktif:
                                {{ $pengaturan->nama_matkul }}
                            </span>
                        @else
                            <span class="badge"
                                style="background:var(--gray-100);color:var(--gray-400);font-size:12px;padding:6px 12px;border-radius:999px;font-weight:700;">
                                <i class="fas fa-circle me-1" style="font-size:8px;"></i> Tidak Ada Sesi
                            </span>
                        @endif
                    </div>
                    <div class="web-card-body">
                        @if($pengaturan && $pengaturan->sesi_aktif)
                            {{-- Tutup Sesi --}}
                            <div class="info-box mb-4"
                                style="border-left-color:var(--green);background:var(--green-light);">
                                <i class="fas fa-info-circle me-2" style="color:var(--green);"></i>
                                Sesi <strong>{{ $pengaturan->nama_matkul }}</strong> sedang berlangsung. Tutup sesi untuk
                                mencatat Alpha otomatis bagi yang belum absen.
                            </div>
                            <form action="{{ route('sesi.tutup') }}" method="POST">
                                @csrf
                                <button type="submit" class="btn-save-web w-100"
                                    style="background:linear-gradient(135deg,var(--red),#b91c1c);"
                                    onclick="return confirm('Tutup sesi? Mahasiswa yang belum absen akan otomatis Alpha.')">
                                    <i class="fas fa-stop-circle me-2"></i> TUTUP SESI & REKAP ALPHA
                                </button>
                            </form>
                        @else
                            {{-- Buka Sesi --}}
                            <p style="font-size:14px;color:var(--gray-600);margin-bottom:20px;line-height:1.7;">
                                Buka sesi absensi untuk mata kuliah yang akan berlangsung. Mahasiswa bisa absen setelah sesi
                                dibuka.
                            </p>
                            <form action="{{ route('sesi.buka') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label
                                        style="font-size:12px;font-weight:700;color:var(--gray-400);text-transform:uppercase;letter-spacing:.06em;display:block;margin-bottom:8px;">
                                        Nama Mata Kuliah
                                    </label>
                                    <input type="text" name="nama_matkul" placeholder="Contoh: Pemrograman Web"
                                        class="form-control"
                                        style="border-radius:var(--radius-sm);border:2px solid var(--gray-200);padding:12px 16px;font-family:'Plus Jakarta Sans',sans-serif;font-size:14px;font-weight:600;"
                                        required>
                                </div>
                                <div class="mb-4">
                                    <label
                                        style="font-size:12px;font-weight:700;color:var(--gray-400);text-transform:uppercase;letter-spacing:.06em;display:block;margin-bottom:8px;">
                                        Batas Waktu Masuk
                                    </label>
                                    <input type="time" name="batas_waktu" class="form-control time-input-large w-100"
                                        value="{{ $pengaturan ? \Carbon\Carbon::parse($pengaturan->batas_waktu)->format('H:i') : '08:00' }}"
                                        required>
                                </div>
                                <div class="mb-4">
                                    <label
                                        style="font-size:12px;font-weight:700;color:var(--gray-400);text-transform:uppercase;letter-spacing:.06em;display:block;margin-bottom:8px;">
                                        Target Prodi
                                    </label>
                                    @php
                                        $daftarProdi = \App\Models\Mahasiswa::select('prodi')->distinct()->orderBy('prodi')->pluck('prodi');
                                    @endphp
                                    @foreach($daftarProdi as $prodi)
                                        <label
                                            style="display:flex;align-items:center;gap:8px;margin-bottom:8px;cursor:pointer;font-size:14px;">
                                            <input type="checkbox" name="target_prodi[]" value="{{ $prodi }}"
                                                style="width:16px;height:16px;accent-color:var(--purple, #6d28d9);">
                                            {{ $prodi }}
                                        </label>
                                    @endforeach
                                    @error('target_prodi')
                                        <div style="color:red;font-size:12px;margin-top:4px;">Pilih minimal satu prodi.</div>
                                    @enderror
                                </div>
                                <button type="submit" class="btn-save-web w-100">
                                    <i class="fas fa-play-circle me-2"></i> BUKA SESI ABSENSI
                                </button>
                            </form>
                        @endif
                    </div>
                </div>
                {{-- Clock + Info Panel --}}
                <div>
                    <div class="clock-widget">
                        <div class="clock-label"><i class="fas fa-globe-asia me-1"></i> Waktu Server (WIB)</div>
                        <div class="clock-time" id="live-clock-desktop">00:00:00</div>
                        <div class="clock-date">{{ \Carbon\Carbon::now()->translatedFormat('l, d F Y') }}</div>
                    </div>

                    <div class="web-card">
                        <div class="web-card-header">
                            <span class="web-card-title"><i class="fas fa-lightbulb me-2"
                                    style="color:#fbbf24;"></i>Panduan</span>
                        </div>
                        <div class="web-card-body" style="padding:20px;">
                            <div style="display:flex; flex-direction:column; gap:14px;">
                                <div style="display:flex; gap:12px; align-items:flex-start;">
                                    <div
                                        style="width:32px;height:32px;border-radius:8px;background:var(--green-light);color:var(--green);display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                                        <i class="fas fa-check" style="font-size:13px;"></i>
                                    </div>
                                    <div>
                                        <div style="font-size:13px;font-weight:700;margin-bottom:2px;">Hadir</div>
                                        <div style="font-size:12px;color:var(--gray-400);">Absen sebelum atau tepat pada
                                            batas waktu</div>
                                    </div>
                                </div>
                                <div style="display:flex; gap:12px; align-items:flex-start;">
                                    <div
                                        style="width:32px;height:32px;border-radius:8px;background:var(--red-light);color:var(--red);display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                                        <i class="fas fa-clock" style="font-size:13px;"></i>
                                    </div>
                                    <div>
                                        <div style="font-size:13px;font-weight:700;margin-bottom:2px;">Terlambat</div>
                                        <div style="font-size:12px;color:var(--gray-400);">Absen setelah batas waktu
                                            yang ditentukan</div>
                                    </div>
                                </div>
                                <div style="display:flex; gap:12px; align-items:flex-start;">
                                    <div
                                        style="width:32px;height:32px;border-radius:8px;background:var(--gray-100);color:var(--gray-400);display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                                        <i class="fas fa-times" style="font-size:13px;"></i>
                                    </div>
                                    <div>
                                        <div style="font-size:13px;font-weight:700;margin-bottom:2px;">Alpha</div>
                                        <div style="font-size:12px;color:var(--gray-400);">Tidak melakukan absen sama
                                            sekali</div>
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
    MOBILE LAYOUT (< 768px) ══════════════════════════════════════════ --}} <div class="mobile-layout">
        <div class="container-fluid p-0">
            <div class="row justify-content-center m-0">
                <div class="col-12 col-md-8 col-lg-5 mobile-wrapper">

                    <div class="d-flex align-items-center mb-4 mt-2">
                        <a href="{{ route('admin.dashboard') }}" class="text-dark me-3">
                            <i class="fas fa-arrow-left fa-lg"></i>
                        </a>
                        <h5 class="fw-bold m-0">Pengaturan Sistem</h5>
                    </div>

                    {{-- Sesi Absensi Mobile --}}
                    <div class="card border-0 shadow-sm p-4 mt-3">
                        <h6 class="fw-bold text-dark mb-3">
                            <i class="fas fa-play-circle text-success me-2"></i> Sesi Absensi
                            @if($pengaturan && $pengaturan->sesi_aktif)
                                <span class="badge bg-success ms-2" style="font-size:11px;">Aktif:
                                    {{ $pengaturan->nama_matkul }}</span>
                            @endif
                        </h6>

                        @if($pengaturan && $pengaturan->sesi_aktif)
                            <div class="alert alert-success py-2 px-3 small mb-3">
                                <i class="fas fa-info-circle me-1"></i>
                                Sesi <strong>{{ $pengaturan->nama_matkul }}</strong> sedang berlangsung.
                            </div>
                            <form action="{{ route('sesi.tutup') }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-danger w-100 fw-bold rounded-3 py-3"
                                    onclick="return confirm('Tutup sesi? Mahasiswa yang belum absen akan otomatis Alpha.')">
                                    <i class="fas fa-stop-circle me-2"></i> TUTUP SESI & REKAP ALPHA
                                </button>
                            </form>
                        @else
                            <form action="{{ route('sesi.buka') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label class="form-label small fw-bold text-muted">Nama Mata Kuliah</label>
                                    <input type="text" name="nama_matkul" class="form-control"
                                        placeholder="Contoh: Pemrograman Web" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label small fw-bold text-muted">Batas Waktu Masuk</label>
                                    <input type="time" name="batas_waktu"
                                        class="form-control form-control-lg fw-bold text-center"
                                        value="{{ $pengaturan ? \Carbon\Carbon::parse($pengaturan->batas_waktu)->format('H:i') : '08:00' }}"
                                        required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label small fw-bold text-muted">Target Prodi</label>
                                    @php
                                        $daftarProdi = \App\Models\Mahasiswa::select('prodi')->distinct()->orderBy('prodi')->pluck('prodi');
                                    @endphp
                                    @foreach($daftarProdi as $prodi)
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="target_prodi[]"
                                                value="{{ $prodi }}" id="prodi_mobile_{{ $loop->index }}">
                                            <label class="form-check-label small" for="prodi_mobile_{{ $loop->index }}">
                                                {{ $prodi }}
                                            </label>
                                        </div>
                                    @endforeach
                                    @error('target_prodi')
                                        <div class="text-danger small mt-1">Pilih minimal satu prodi.</div>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-success w-100 fw-bold rounded-3 py-3">
                                    <i class="fas fa-play-circle me-2"></i> BUKA SESI ABSENSI
                                </button>
                            </form>
                        @endif
                    </div>

                    <div class="clock-section text-center shadow-sm">
                        <small class="opacity-75 d-block mb-1"><i class="fas fa-globe-asia me-1"></i> Waktu Server
                            (WIB)</small>
                        <h1 id="live-clock-mobile" class="fw-bold m-0" style="letter-spacing:2px;">00:00:00</h1>
                        <small class="opacity-75">{{ \Carbon\Carbon::now()->translatedFormat('l, d F Y') }}</small>
                    </div>

                    @if(session('success'))
                        <div class="alert alert-success border-0 shadow-sm d-flex align-items-center mb-4" role="alert">
                            <i class="fas fa-check-circle me-2"></i>
                            <div>{{ session('success') }}</div>
                        </div>
                    @endif

                    <div class="mt-4 p-3 bg-light rounded-3 border-start border-4 border-warning">
                        <small class="text-muted">
                            <i class="fas fa-info-circle me-1"></i>
                            Perubahan ini akan langsung berdampak pada perhitungan status kehadiran mahasiswa yang
                            melakukan absen setelah tombol simpan ditekan.
                        </small>
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
            function updateClock() {
                const now = new Date();
                const h = String(now.getHours()).padStart(2, '0');
                const m = String(now.getMinutes()).padStart(2, '0');
                const s = String(now.getSeconds()).padStart(2, '0');
                const time = `${h}:${m}:${s}`;

                const desktop = document.getElementById('live-clock-desktop');
                const mobile = document.getElementById('live-clock-mobile');
                if (desktop) desktop.textContent = time;
                if (mobile) mobile.textContent = time;
            }

            setInterval(updateClock, 1000);
            updateClock();
        </script>
</body>

</html>