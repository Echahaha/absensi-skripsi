<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Akun</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <style>
        body {
            background-color: #e9ecef;
        }

        .app-wrapper {
            background-color: #f4f7f6;
            min-height: 100vh;
            position: relative;
            box-shadow: 0 0 40px rgba(0, 0, 0, 0.1);
            padding-bottom: 30px;
            /* Tambahan jarak bawah biar nggak mentok */
        }

        @media (min-width: 768px) {
            .app-wrapper {
                min-height: 90vh;
                margin-top: 5vh;
                margin-bottom: 5vh;
                border-radius: 30px;
                overflow: hidden;
                overflow-y: auto;
                /* Biar bisa discroll kalau kepanjangan di PC */
            }
        }

        /* Modifikasi border input agar menyatu dengan ikon mata */
        .form-control:focus {
            box-shadow: none;
            border-color: #ced4da;
        }

        .input-group-text {
            border-left: none;
        }

        .form-control {
            border-right: none;
        }
    </style>
</head>

<body>

    <div class="container-fluid p-0">
        <div class="row justify-content-center m-0">
            <div class="col-12 col-md-6 col-lg-4 app-wrapper p-0">

                <div class="bg-primary text-white p-4"
                    style="border-bottom-left-radius: 20px; border-bottom-right-radius: 20px;">
                    <div class="d-flex align-items-center">
                        <a href="{{ route('ortu.dashboard') }}" class="text-white text-decoration-none me-3">
                            <h4 class="mb-0"><i class="fas fa-arrow-left"></i></h4>
                        </a>
                        <h4 class="mb-0">Profil Akun</h4>
                    </div>
                </div>

                <div class="container mt-4 mb-5">

                    <div class="card shadow-sm border-0 mb-4" style="border-radius: 15px;">
                        <div class="card-body text-center">
                            <div class="bulatan-profil bg-primary text-white mx-auto mb-3 d-flex justify-content-center align-items-center"
                                style="width: 70px; height: 70px; border-radius: 50%; font-size: 30px; font-weight: bold;">
                                {{ substr($mahasiswa->nama_lengkap, 0, 1) }}
                            </div>
                            <h5 class="font-weight-bold mb-1">{{ $mahasiswa->nama_lengkap }}</h5>
                            <p class="text-muted mb-2">Wali Mahasiswa</p>

                            <div class="d-flex justify-content-center align-items-center flex-column gap-1">
                                <span
                                    class="badge bg-light text-primary border border-primary border-opacity-25 rounded-pill px-3 py-2">
                                    <i class="fas fa-id-card me-1"></i> {{ $mahasiswa->nim }}
                                </span>
                                <span class="badge bg-light text-secondary border rounded-pill px-3 py-2 mt-1">
                                    <i class="fas fa-phone-alt me-1"></i>
                                    {{ $mahasiswa->no_hp_ortu ?? 'Nomor HP Belum Diisi' }}
                                </span>
                            </div>
                        </div>
                    </div>

                    @if(session('success'))
                        <div class="alert alert-success border-0" style="border-radius: 10px;">{{ session('success') }}
                        </div>
                    @endif
                    @if(session('error'))
                        <div class="alert alert-danger border-0" style="border-radius: 10px;">{{ session('error') }}</div>
                    @endif

                    <div class="card shadow-sm border-0 mb-4" style="border-radius: 15px;">
                        <div class="card-body">
                            <h6 class="font-weight-bold mb-3 text-primary">Ubah Password</h6>

                            <form action="{{ route('profil.password') }}" method="POST">
                                @csrf

                                <div class="form-group mb-3">
                                    <label class="text-muted small">Password Lama</label>
                                    <div class="input-group">
                                        <input type="password" name="password_lama" id="pass_lama" class="form-control"
                                            style="border-radius: 10px 0 0 10px;" required>
                                        <span class="input-group-text bg-white"
                                            onclick="togglePassword('pass_lama', 'icon_lama')"
                                            style="border-radius: 0 10px 10px 0; cursor: pointer;">
                                            <i class="fas fa-eye text-muted" id="icon_lama"></i>
                                        </span>
                                    </div>
                                </div>

                                <div class="form-group mb-3">
                                    <label class="text-muted small">Password Baru</label>
                                    <div class="input-group">
                                        <input type="password" name="password_baru" id="pass_baru" class="form-control"
                                            style="border-radius: 10px 0 0 10px;" required>
                                        <span class="input-group-text bg-white"
                                            onclick="togglePassword('pass_baru', 'icon_baru')"
                                            style="border-radius: 0 10px 10px 0; cursor: pointer;">
                                            <i class="fas fa-eye text-muted" id="icon_baru"></i>
                                        </span>
                                    </div>
                                </div>

                                <div class="form-group mb-4">
                                    <label class="text-muted small">Konfirmasi Password Baru</label>
                                    <div class="input-group">
                                        <input type="password" name="konfirmasi_password" id="pass_konfirm"
                                            class="form-control" style="border-radius: 10px 0 0 10px;" required>
                                        <span class="input-group-text bg-white"
                                            onclick="togglePassword('pass_konfirm', 'icon_konfirm')"
                                            style="border-radius: 0 10px 10px 0; cursor: pointer;">
                                            <i class="fas fa-eye text-muted" id="icon_konfirm"></i>
                                        </span>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary w-100 py-2"
                                    style="border-radius: 10px; font-weight: bold;">Simpan Perubahan</button>
                            </form>
                        </div>
                    </div>

                    <div class="card shadow-sm border-0 border-start border-success border-4"
                        style="border-radius: 15px;">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-2">
                                <div class="bg-success bg-opacity-10 text-success rounded-circle d-flex justify-content-center align-items-center me-3"
                                    style="width: 40px; height: 40px;">
                                    <i class="fas fa-headset"></i>
                                </div>
                                <h6 class="font-weight-bold mb-0 text-dark">Butuh Bantuan?</h6>
                            </div>
                            <p class="text-muted small mb-3">Jika Anda lupa password lama dan tidak bisa menggantinya,
                                silakan hubungi Admin Kampus.</p>

                            <a href="https://wa.me/6281234567890?text=Halo%20Admin,%20saya%20wali%20dari%20mahasiswa%20*{{ $mahasiswa->nama_lengkap }}*%20(*{{ $mahasiswa->nim }}*).%20Saya%20ingin%20meminta%20bantuan%20reset%20password%20aplikasi%20absensi."
                                target="_blank" class="btn btn-outline-success w-100 py-2"
                                style="border-radius: 10px; font-weight: bold;">
                                <i class="fab fa-whatsapp me-2"></i> Hubungi Admin
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        function togglePassword(inputId, iconId) {
            var input = document.getElementById(inputId);
            var icon = document.getElementById(iconId);

            if (input.type === "password") {
                input.type = "text";
                icon.classList.remove("fa-eye");
                icon.classList.add("fa-eye-slash");
            } else {
                input.type = "password";
                icon.classList.remove("fa-eye-slash");
                icon.classList.add("fa-eye");
            }
        }
    </script>

</body>

</html>