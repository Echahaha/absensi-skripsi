<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\OrtuController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Api\FingerprintController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SimulatorController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// ============================================================
// 1. RUTE PUBLIK — Tidak butuh login
// ============================================================

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login-proses', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);

Route::get('/', function () {
    return redirect('/login');
});

// ============================================================
// 2. RUTE UNTUK ARDUINO — HARUS di luar middleware apapun
//    Arduino tidak punya session/cookie login!
// ============================================================

// [FIX #1] reset-mode-alat dipindah ke sini (sebelumnya di dalam auth → selalu 302)
Route::get('/admin/mahasiswa/reset-mode-alat', [MahasiswaController::class, 'resetAlat']);

// Polling perintah dari Arduino (scan / enroll)
Route::get('/api/alat-request', [MahasiswaController::class, 'apiCekAlat']);

// Terima hasil hapus data fingerprint dari Arduino
Route::get('/api/fingerprint/hasil-hapus', [MahasiswaController::class, 'hasilHapus']);

// Terima hasil enroll dari Arduino
Route::get('/api/fingerprint/hasil-enroll', [MahasiswaController::class, 'hasilEnroll']);

// Polling status enroll dari halaman web admin
Route::get('/api/cek-status-registrasi', [MahasiswaController::class, 'cekStatusRegistrasi']);

// batalkan proses enroll (jika admin klik batal di web)
Route::post('/admin/batal-enroll', [AdminController::class, 'batalEnroll'])->name('enroll.batal');

// Endpoint absensi utama yang dipanggil Arduino
// [FIX #2] Sekarang langsung panggil controller, lebih bersih
Route::get('/simulasi-alat/{finger_id}', function ($finger_id) {
    $request = new \Illuminate\Http\Request();
    $request->replace(['fingerprint_id' => $finger_id]);
    $controller = new FingerprintController();
    return $controller->store($request);
});

// API untuk notifikasi mobile orang tua
Route::get('/api/cek-absen-terbaru', [OrtuController::class, 'apiCekAbsen']);

// ============================================================
// 3. RUTE ORANG TUA — Middleware custom cek.ortu
// ============================================================

Route::middleware(['cek.ortu'])->group(function () {
    Route::get('/dashboard', [OrtuController::class, 'index'])->name('ortu.dashboard');
    Route::get('/dashboard/riwayat', [OrtuController::class, 'riwayat'])->name('ortu.riwayat');
    Route::get('/profil', [ProfileController::class, 'index'])->name('profil.index');
    Route::post('/profil/password', [ProfileController::class, 'updatePassword'])->name('profil.password');
});

// ============================================================
// 4. RUTE ADMIN/DOSEN — Butuh login (middleware auth)
// ============================================================

Route::middleware(['auth'])->group(function () {

    // Dashboard & Riwayat
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/riwayat', [AdminController::class, 'riwayat'])->name('admin.riwayat');

    Route::post('/admin/sesi/buka', [AdminController::class, 'bukaSesi'])->name('sesi.buka');
    Route::post('/admin/sesi/tutup', [AdminController::class, 'tutupSesi'])->name('sesi.tutup');
    Route::post('/admin/absensi/{id}/status', [AdminController::class, 'editStatus'])->name('absensi.editStatus');

    // Pengaturan
    Route::get('/admin/pengaturan', [AdminController::class, 'pengaturan'])->name('admin.pengaturan');

    // [FIX #3] Route custom registrasi HARUS di atas Route::resource
    //          Jika di bawah, Laravel salah tangkap 'registrasi' sebagai {mahasiswa} (show)
    Route::get('/admin/mahasiswa/registrasi/{id_finger}', [MahasiswaController::class, 'registrasi'])->name('mahasiswa.registrasi');

    // Resource CRUD Mahasiswa (generate: index, create, store, show, edit, update, destroy)
    Route::resource('/admin/mahasiswa', MahasiswaController::class);
});

// ============================================================
// 5. SIMULATOR (Opsional - untuk testing tanpa alat fisik)
// ============================================================

Route::get('/simulator', [SimulatorController::class, 'index']);