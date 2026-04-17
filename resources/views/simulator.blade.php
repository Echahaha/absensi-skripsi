<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simulator Alat Fingerprint</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body { background-color: #2c3e50; color: white; height: 100vh; display: flex; align-items: center; justify-content: center; }
        .mesin-finger {
            background: #ecf0f1; color: #333; width: 100%; max-width: 800px;
            border-radius: 20px; padding: 30px; box-shadow: 0 20px 50px rgba(0,0,0,0.5);
            border-bottom: 10px solid #bdc3c7;
        }
        .layar-lcd {
            background: #95a5a6; color: #ecf0f1; font-family: 'Courier New', Courier, monospace;
            padding: 20px; border-radius: 10px; margin-bottom: 20px; height: 80px;
            display: flex; align-items: center; justify-content: center; text-align: center;
            font-weight: bold; font-size: 1.2rem; box-shadow: inset 0 0 10px rgba(0,0,0,0.3);
            text-shadow: 1px 1px 2px black;
        }
        .btn-finger {
            width: 100%; padding: 15px; border-radius: 10px; border: none;
            transition: all 0.2s; font-weight: bold; text-align: left;
        }
        .btn-finger:hover { transform: translateY(-2px); box-shadow: 0 5px 15px rgba(0,0,0,0.2); }
        .finger-icon { font-size: 24px; margin-right: 10px; opacity: 0.7; }
    </style>
</head>
<body>

    <div class="container">
        <div class="mesin-finger mx-auto">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h4 class="fw-bold m-0"><i class="fas fa-fingerprint text-primary"></i> VIRTUAL FINGERPRINT</h4>
                <small class="text-muted">Mode Simulasi</small>
            </div>

            <div class="layar-lcd" id="layar-pesan">
                SILAKAN TEMPEL JARI ANDA...
            </div>

            <p class="small text-muted mb-2">Klik nama di bawah untuk simulasi tempel jari:</p>

            <div class="row g-2">
                @foreach($mahasiswa as $mhs)
                <div class="col-md-6">
                    <button onclick="tempelJari({{ $mhs->fingerprint_id }})" class="btn btn-white bg-white shadow-sm btn-finger d-flex align-items-center">
                        <i class="fas fa-fingerprint finger-icon text-primary"></i>
                        <div>
                            <div class="text-dark">{{ $mhs->nama_lengkap }}</div>
                            <small class="text-muted" style="font-size: 10px;">ID ALAT: {{ $mhs->fingerprint_id }}</small>
                        </div>
                    </button>
                </div>
                @endforeach
            </div>
            
            <div class="text-center mt-4">
                <a href="{{ url('/login') }}" class="text-muted small text-decoration-none">Kembali ke Login</a>
            </div>
        </div>
    </div>

    <script>
        function tempelJari(id) {
            let layar = document.getElementById('layar-pesan');
            layar.innerHTML = "MEMPROSES...";
            layar.style.background = "#f1c40f"; // Kuning (Loading)

            // Tembak ke URL simulasi yang sudah kita buat sebelumnya
            fetch('/simulasi-alat/' + id)
                .then(response => response.json())
                .then(data => {
                    if(data.status == 'success') {
                        layar.innerHTML = "SUKSES: " + data.data.nama;
                        layar.style.background = "#2ecc71"; // Hijau
                    } else {
                        // Kalau error (misal sudah absen / ID salah)
                        layar.innerHTML = data.message; 
                        layar.style.background = "#e74c3c"; // Merah
                    }

                    // Kembalikan ke normal setelah 3 detik
                    setTimeout(() => {
                        layar.innerHTML = "SILAKAN TEMPEL JARI ANDA...";
                        layar.style.background = "#95a5a6";
                    }, 3000);
                })
                .catch(error => {
                    console.error('Error:', error);
                    layar.innerHTML = "SYSTEM ERROR!";
                    layar.style.background = "#e74c3c";
                });
        }
    </script>
</body>
</html>