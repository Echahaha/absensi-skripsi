<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Mahasiswa</title>
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
            --red: #dc2626;
            --red-light: #fee2e2;
            --amber: #d97706;
            --amber-light: #fef3c7;
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
            .desktop-layout { display: flex; min-height: 100vh; }
            .mobile-layout { display: none !important; }

            /* Sidebar */
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

            .sidebar-brand-title {
                font-size: 15px;
                font-weight: 800;
                color: white;
                line-height: 1.2;
            }

            .sidebar-brand-sub {
                font-size: 11px;
                color: rgba(255,255,255,.4);
                font-weight: 500;
            }

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

            /* Main */
            .main-content { margin-left: 260px; flex: 1; padding: 32px; }

            .topbar {
                display: flex;
                align-items: center;
                gap: 16px;
                margin-bottom: 28px;
            }

            .btn-back {
                display: flex;
                align-items: center;
                gap: 8px;
                padding: 9px 16px;
                border-radius: var(--radius-sm);
                background: white;
                border: 1px solid var(--gray-200);
                color: var(--gray-600);
                font-size: 13px;
                font-weight: 700;
                text-decoration: none;
                transition: all .18s;
                box-shadow: var(--shadow);
                white-space: nowrap;
            }

            .btn-back:hover { background: var(--gray-50); color: var(--gray-800); }

            .page-title { font-size: 22px; font-weight: 800; color: var(--gray-800); }
            .page-subtitle { font-size: 13px; color: var(--gray-400); font-weight: 500; }

            /* Form Card */
            .web-card {
                background: white;
                border-radius: var(--radius);
                box-shadow: var(--shadow);
                border: 1px solid var(--gray-200);
                overflow: hidden;
                max-width: 760px;
            }

            .web-card-header {
                padding: 18px 28px;
                border-bottom: 1px solid var(--gray-200);
                background: var(--gray-50);
            }

            .web-card-title { font-size: 15px; font-weight: 700; color: var(--gray-800); }
            .web-card-subtitle { font-size: 12px; color: var(--gray-400); font-weight: 500; margin-top: 2px; }

            .web-card-body { padding: 28px; }

            /* Section label */
            .section-label {
                font-size: 11px;
                font-weight: 700;
                text-transform: uppercase;
                letter-spacing: .08em;
                color: var(--gray-400);
                margin-bottom: 16px;
                padding-bottom: 10px;
                border-bottom: 1px solid var(--gray-100);
            }

            /* Form fields */
            .form-label-web {
                font-size: 13px;
                font-weight: 700;
                color: var(--gray-600);
                margin-bottom: 7px;
                display: block;
            }

            .form-control-web,
            .form-select-web {
                width: 100%;
                padding: 10px 14px;
                border-radius: var(--radius-sm);
                border: 1px solid var(--gray-200);
                background: var(--gray-50);
                font-size: 14px;
                font-family: 'Plus Jakarta Sans', sans-serif;
                color: var(--gray-800);
                outline: none;
                transition: all .18s;
                appearance: none;
            }

            .form-control-web:focus,
            .form-select-web:focus {
                border-color: var(--blue-primary);
                background: white;
                box-shadow: 0 0 0 3px rgba(26,86,219,.1);
            }

            /* Readonly / Locked field */
            .form-control-web[readonly] {
                background: var(--gray-100);
                color: var(--gray-400);
                cursor: not-allowed;
                border-style: dashed;
            }

            .form-control-web.is-invalid { border-color: var(--red); background: white; }
            .form-control-web.is-invalid:focus { box-shadow: 0 0 0 3px rgba(220,38,38,.1); }

            .form-hint {
                font-size: 12px;
                color: var(--gray-400);
                font-weight: 500;
                margin-top: 6px;
            }

            /* Input group */
            .input-group-web {
                display: flex;
                border-radius: var(--radius-sm);
                border: 1px solid var(--gray-200);
                overflow: hidden;
                background: var(--gray-50);
                transition: all .18s;
            }

            .input-group-web:focus-within {
                border-color: var(--blue-primary);
                background: white;
                box-shadow: 0 0 0 3px rgba(26,86,219,.1);
            }

            .input-group-web.is-invalid { border-color: var(--red); }
            .input-group-web.is-invalid:focus-within { box-shadow: 0 0 0 3px rgba(220,38,38,.1); }

            .input-group-prefix {
                padding: 10px 14px;
                font-size: 14px;
                font-weight: 700;
                color: var(--gray-400);
                border-right: 1px solid var(--gray-200);
                background: white;
                display: flex;
                align-items: center;
                white-space: nowrap;
                flex-shrink: 0;
            }

            .input-group-web input {
                flex: 1;
                border: none;
                background: transparent;
                padding: 10px 14px;
                font-size: 14px;
                font-family: 'Plus Jakarta Sans', sans-serif;
                color: var(--gray-800);
                outline: none;
                min-width: 0;
            }

            /* Locked NIM input group */
            .input-group-web.locked {
                background: var(--gray-100);
                border-style: dashed;
                cursor: not-allowed;
            }

            .input-group-web.locked .input-group-prefix {
                background: var(--gray-100);
                color: var(--gray-400);
            }

            .input-group-web.locked input {
                background: transparent;
                color: var(--gray-400);
                cursor: not-allowed;
                font-weight: 700;
            }

            /* Hardware/update box — amber accent for edit mode */
            .hardware-box {
                background: #fffbeb;
                border: 1px solid #fde68a;
                border-left: 4px solid var(--amber);
                border-radius: var(--radius-sm);
                padding: 20px 22px;
                margin-top: 24px;
            }

            .hardware-box-title {
                font-size: 13px;
                font-weight: 800;
                color: var(--amber);
                margin-bottom: 16px;
                display: flex;
                align-items: center;
                gap: 8px;
            }

            /* Form grid */
            .form-grid-2 {
                display: grid;
                grid-template-columns: 2fr 1fr;
                gap: 16px;
            }

            /* Error */
            .field-error {
                font-size: 12px;
                font-weight: 700;
                color: var(--red);
                margin-top: 6px;
            }

            /* Submit button */
            .btn-submit {
                display: inline-flex;
                align-items: center;
                justify-content: center;
                gap: 8px;
                padding: 12px 28px;
                border-radius: var(--radius-sm);
                background: var(--blue-primary);
                color: white;
                border: none;
                font-size: 14px;
                font-weight: 700;
                font-family: 'Plus Jakarta Sans', sans-serif;
                cursor: pointer;
                transition: all .18s;
                box-shadow: 0 4px 12px rgba(26,86,219,.3);
            }

            .btn-submit:hover { background: #1447c0; transform: translateY(-1px); box-shadow: 0 6px 16px rgba(26,86,219,.35); }

            .btn-cancel-web {
                display: inline-flex;
                align-items: center;
                gap: 8px;
                padding: 12px 24px;
                border-radius: var(--radius-sm);
                background: white;
                color: var(--gray-600);
                border: 1px solid var(--gray-200);
                font-size: 14px;
                font-weight: 700;
                font-family: 'Plus Jakarta Sans', sans-serif;
                text-decoration: none;
                transition: all .18s;
            }

            .btn-cancel-web:hover { background: var(--gray-50); color: var(--gray-800); }

            .form-actions {
                display: flex;
                gap: 12px;
                justify-content: flex-end;
                margin-top: 28px;
                padding-top: 20px;
                border-top: 1px solid var(--gray-100);
            }
        }

        /* ─── MOBILE LAYOUT ─── */
        .mobile-layout { display: block; }

        .dashboard-wrapper {
            background: white;
            min-height: 100vh;
            padding-bottom: 40px;
        }

        .header-admin {
            background: linear-gradient(135deg, #212529, #343a40);
            color: white;
            padding: 25px 20px;
            border-bottom-left-radius: 20px;
            border-bottom-right-radius: 20px;
        }

        /* Mobile form */
        .mobile-form-label {
            font-weight: 600;
            font-size: 14px;
            color: #495057;
            margin-bottom: 8px;
        }

        .mobile-form-control,
        .mobile-form-select {
            padding: 12px 15px;
            border-radius: 10px;
            border: 1px solid #ced4da;
            font-family: 'Plus Jakarta Sans', sans-serif;
            transition: all .2s;
            width: 100%;
        }

        .mobile-form-control:focus,
        .mobile-form-select:focus {
            border-color: #1a56db;
            box-shadow: 0 0 0 3px rgba(26,86,219,.15);
            outline: none;
        }

        .mobile-form-control[readonly] {
            background-color: #f1f5f9;
            color: #94a3b8;
            border-style: dashed;
            cursor: not-allowed;
        }

        .hardware-setup-box-mobile {
            background: #fffbeb;
            border: 1px solid #fde68a;
            border-left: 4px solid #d97706;
            border-radius: 12px;
            padding: 20px;
            margin-bottom: 20px;
        }

        .btn-simpan-mobile {
            background: linear-gradient(135deg, #1a56db, #1447c0);
            border: none;
            padding: 14px;
            border-radius: 12px;
            font-weight: 700;
            font-size: 16px;
            font-family: 'Plus Jakarta Sans', sans-serif;
            width: 100%;
            color: white;
            letter-spacing: .5px;
            transition: transform .2s, box-shadow .2s;
        }

        .btn-simpan-mobile:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 15px rgba(26,86,219,.3);
        }

        /* Modal Logout */
        .modal-custom .modal-content { border: none; border-radius: 20px; overflow: hidden; }
        .modal-custom .modal-header { background: linear-gradient(135deg, #dc3545, #c82333); border: none; padding: 20px 25px; }
        .modal-custom .modal-body { padding: 25px; text-align: center; }
        .modal-custom .modal-footer { border: none; padding: 0 25px 25px; justify-content: center; gap: 12px; }
        .btn-cancel-custom { border-radius: 12px; padding: 10px 30px; font-weight: 700; border: 2px solid #e9ecef; background: white; color: #6c757d; }
        .btn-logout-custom { border-radius: 12px; padding: 10px 30px; font-weight: 700; background: linear-gradient(135deg, #dc3545, #c82333); border: none; color: white; }
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

    {{-- Main Content --}}
    <main class="main-content">

        <div class="topbar">
            <div>
                <div class="page-title">Edit Data Mahasiswa</div>
                <div class="page-subtitle">Perbarui informasi mahasiswa jika diperlukan</div>
            </div>
        </div>

        <div class="web-card">
            {{-- Error --}}
            @if($errors->any())
                <div style="margin: 20px 28px 0; padding: 14px 18px; background: var(--red-light); border: 1px solid #fecaca; border-radius: var(--radius-sm);">
                    <div style="font-size:13px; font-weight:700; color:var(--red); margin-bottom:8px;">
                        <i class="fas fa-exclamation-triangle me-2"></i>Terdapat Kesalahan Input:
                    </div>
                    <ul style="margin:0; padding-left:18px; font-size:13px; color:var(--red);">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('mahasiswa.update', $mhs->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="web-card-body">

                    {{-- Section: Data Akademik --}}
                    <div class="section-label">
                        <i class="fas fa-user-graduate me-2" style="color:var(--blue-primary)"></i>Data Akademik
                    </div>

                    <div style="display:grid; grid-template-columns:1fr 1fr; gap:16px; margin-bottom:16px;">
                        <div>
                            <label class="form-label-web">NIM <span style="font-size:11px; font-weight:500; color:var(--gray-400);">(tidak dapat diubah)</span></label>
                            <div class="input-group-web locked">
                                <span class="input-group-prefix">
                                    <i class="fas fa-lock" style="font-size:12px;"></i>
                                </span>
                                <input type="text" value="{{ $mhs->nim }}" readonly tabindex="-1">
                            </div>
                            <div class="form-hint">NIM dikunci karena digunakan sebagai relasi data utama.</div>
                        </div>
                        <div>
                            <label class="form-label-web">Semester</label>
                            <input type="number" name="semester" class="form-control-web"
                                value="{{ old('semester', $mhs->semester) }}" min="1">
                        </div>
                    </div>

                    <div style="margin-bottom:16px;">
                        <label class="form-label-web">Nama Lengkap <span style="color:var(--red)">*</span></label>
                        <input type="text" name="nama_lengkap" class="form-control-web"
                            placeholder="Masukkan nama lengkap sesuai KTP/KTM" required
                            value="{{ old('nama_lengkap', $mhs->nama_lengkap) }}">
                        @error('nama_lengkap')<div class="field-error">{{ $message }}</div>@enderror
                    </div>

                    <div style="margin-bottom:8px;">
                        <label class="form-label-web">Program Studi <span style="color:var(--red)">*</span></label>
                        <select name="prodi" class="form-select-web" style="background-image:url(\"data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16'%3e%3cpath fill='none' stroke='%2394a3b8' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M2 5l6 6 6-6'/%3e%3c/svg%3e\"); background-repeat:no-repeat; background-position:right 12px center; background-size:14px; padding-right:36px;">
                            <option value="Teknik Informatika" {{ old('prodi', $mhs->prodi) == 'Teknik Informatika' ? 'selected' : '' }}>Teknik Informatika</option>
                            <option value="Sistem Informasi" {{ old('prodi', $mhs->prodi) == 'Sistem Informasi' ? 'selected' : '' }}>Sistem Informasi</option>
                            <option value="Teknik Sipil" {{ old('prodi', $mhs->prodi) == 'Teknik Sipil' ? 'selected' : '' }}>Teknik Sipil</option>
                        </select>
                        @error('prodi')<div class="field-error">{{ $message }}</div>@enderror
                    </div>

                    {{-- Section: Hardware & Notifikasi --}}
                    <div class="hardware-box">
                        <div class="hardware-box-title">
                            <i class="fas fa-tools"></i> Pembaruan Alat & Kontak
                        </div>

                        <div style="margin-bottom:16px;">
                            <label class="form-label-web" style="color:var(--gray-800);">
                                ID Fingerprint Alat <span style="color:var(--red)">*</span>
                            </label>
                            <div class="input-group-web {{ $errors->has('fingerprint_id') ? 'is-invalid' : '' }}">
                                <span class="input-group-prefix" style="color:var(--amber);">
                                    <i class="fas fa-fingerprint"></i>
                                </span>
                                <input type="number" name="fingerprint_id"
                                    placeholder="Misal: 12" required
                                    value="{{ old('fingerprint_id', $mhs->fingerprint_id ?? '') }}"
                                    style="font-weight:700; color:var(--amber);">
                            </div>
                            @error('fingerprint_id')
                                <div class="field-error">{{ $message }}</div>
                            @enderror
                            <div class="form-hint">Ubah jika mahasiswa melakukan pendaftaran ulang sidik jari di sensor.</div>
                        </div>

                        <div>
                            <label class="form-label-web" style="color:var(--gray-800);">
                                Nomor WA Wali / Orang Tua <span style="color:var(--red)">*</span>
                            </label>
                            <div class="input-group-web">
                                <span class="input-group-prefix">+62</span>
                                <input type="number" name="no_hp_ortu"
                                    placeholder="81234567890" required
                                    value="{{ old('no_hp_ortu', $mhs->no_hp_ortu) }}">
                            </div>
                            @error('no_hp_ortu')<div class="field-error">{{ $message }}</div>@enderror
                            <div class="form-hint">Format tanpa angka 0 di depan (Contoh: 812...).</div>
                        </div>
                    </div>

                </div>

                <div class="form-actions" style="padding: 20px 28px; margin-top:0;">
                    <a href="{{ route('mahasiswa.index') }}" class="btn-cancel-web">
                        <i class="fas fa-times"></i> Batal
                    </a>
                    <button type="submit" class="btn-submit">
                        <i class="fas fa-save"></i> Simpan Perubahan
                    </button>
                </div>

            </form>
        </div>

    </main>
</div>

{{-- ══════════════════════════════════════════
     MOBILE LAYOUT (< 768px)
══════════════════════════════════════════ --}}
<div class="mobile-layout">
    <div class="container-fluid p-0">
        <div class="row justify-content-center m-0">
            <div class="col-12 dashboard-wrapper p-0">

                <div class="header-admin mb-4 shadow-sm">
                    <div class="d-flex align-items-center gap-3 mb-1">
                        <a href="{{ route('mahasiswa.index') }}" class="text-white text-decoration-none">
                            <i class="fas fa-arrow-left fa-lg"></i>
                        </a>
                        <h5 class="m-0 fw-bold">
                            <i class="fas fa-user-edit me-2"></i> Edit Mahasiswa
                        </h5>
                    </div>
                    <small class="opacity-75 d-block" style="padding-left: 28px;">
                        Perbarui informasi mahasiswa jika diperlukan
                    </small>
                </div>

                <div class="px-3">

                    @if($errors->any())
                        <div class="alert alert-danger rounded-3 shadow-sm mb-4 border-0 border-start border-4 border-danger">
                            <div class="d-flex align-items-center mb-2">
                                <i class="fas fa-exclamation-triangle me-2"></i>
                                <strong style="font-size:14px;">Terdapat Kesalahan Input:</strong>
                            </div>
                            <ul class="mb-0 small ps-4">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('mahasiswa.update', $mhs->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <h6 class="fw-bold text-secondary mb-3">
                            <i class="fas fa-user-graduate me-2"></i> Data Akademik
                        </h6>

                        <div class="mb-3">
                            <label class="mobile-form-label">NIM <span class="text-muted" style="font-size:12px; font-weight:500;">(tidak dapat diubah)</span></label>
                            <div class="input-group">
                                <span class="input-group-text bg-light text-muted border-dashed">
                                    <i class="fas fa-lock" style="font-size:12px;"></i>
                                </span>
                                <input type="text" class="mobile-form-control form-control"
                                    value="{{ $mhs->nim }}" readonly tabindex="-1"
                                    style="background:#f1f5f9; color:#94a3b8; border-style:dashed; cursor:not-allowed;">
                            </div>
                            <div class="form-text small mt-1">NIM dikunci karena digunakan sebagai relasi data utama.</div>
                        </div>

                        <div class="mb-3">
                            <label class="mobile-form-label">Nama Lengkap <span class="text-danger">*</span></label>
                            <input type="text" name="nama_lengkap" class="mobile-form-control form-control"
                                placeholder="Masukkan nama lengkap sesuai KTP/KTM" required
                                value="{{ old('nama_lengkap', $mhs->nama_lengkap) }}">
                        </div>

                        <div class="row mb-4">
                            <div class="col-8">
                                <label class="mobile-form-label">Program Studi <span class="text-danger">*</span></label>
                                <select name="prodi" class="mobile-form-select form-select">
                                    <option value="Teknik Informatika" {{ old('prodi', $mhs->prodi) == 'Teknik Informatika' ? 'selected' : '' }}>Teknik Informatika</option>
                                    <option value="Sistem Informasi" {{ old('prodi', $mhs->prodi) == 'Sistem Informasi' ? 'selected' : '' }}>Sistem Informasi</option>
                                    <option value="Teknik Sipil" {{ old('prodi', $mhs->prodi) == 'Teknik Sipil' ? 'selected' : '' }}>Teknik Sipil</option>
                                </select>
                            </div>
                            <div class="col-4">
                                <label class="mobile-form-label">Semester</label>
                                <input type="number" name="semester" class="mobile-form-control form-control"
                                    value="{{ old('semester', $mhs->semester) }}" min="1">
                            </div>
                        </div>

                        <div class="hardware-setup-box-mobile">
                            <h6 class="fw-bold mb-3" style="color:#d97706; font-size:14px;">
                                <i class="fas fa-tools me-2"></i> Pembaruan Alat & Kontak
                            </h6>

                            <div class="mb-3">
                                <label class="mobile-form-label">ID Fingerprint Alat <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <span class="input-group-text bg-white border-end-0">
                                        <i class="fas fa-fingerprint" style="color:#d97706;"></i>
                                    </span>
                                    <input type="number" name="fingerprint_id"
                                        class="form-control border-start-0 ps-0 fw-bold @error('fingerprint_id') is-invalid @enderror"
                                        style="color:#d97706;" placeholder="Misal: 12"
                                        required value="{{ old('fingerprint_id', $mhs->fingerprint_id ?? '') }}">
                                    @error('fingerprint_id')
                                        <div class="invalid-feedback fw-bold">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-text small mt-1">Ubah jika mahasiswa melakukan pendaftaran ulang sidik jari di sensor.</div>
                            </div>

                            <div class="mb-0">
                                <label class="mobile-form-label">No. WA Wali / Orang Tua <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light text-secondary fw-bold">+62</span>
                                    <input type="number" name="no_hp_ortu" class="form-control"
                                        placeholder="81234567890" required
                                        value="{{ old('no_hp_ortu', $mhs->no_hp_ortu) }}">
                                </div>
                                <div class="form-text small mt-1">Tanpa angka 0 di depan (Contoh: 812...).</div>
                            </div>
                        </div>

                        <button type="submit" class="btn-simpan-mobile mt-2">
                            <i class="fas fa-save me-2"></i> SIMPAN PERUBAHAN
                        </button>
                    </form>

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