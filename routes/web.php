<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\OrtuController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Api\FingerprintController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SimulatorController;

// ============================================================
// 1. RUTE PUBLIK
// ============================================================

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login-proses', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);

Route::get('/', function () {
    return redirect('/login');
});

// ============================================================
// 2. RUTE ARDUINO — Di luar middleware (tidak punya session)
// ============================================================

Route::get('/admin/mahasiswa/reset-mode-alat', [MahasiswaController::class, 'resetAlat']);
Route::get('/api/alat-request', [MahasiswaController::class, 'apiCekAlat']);
Route::get('/api/fingerprint/hasil-hapus', [MahasiswaController::class, 'hasilHapus']);
Route::get('/api/fingerprint/hasil-enroll', [MahasiswaController::class, 'hasilEnroll']);
Route::get('/api/cek-status-registrasi', [MahasiswaController::class, 'cekStatusRegistrasi']);
Route::post('/admin/batal-enroll', [AdminController::class, 'batalEnroll'])->name('enroll.batal');

Route::get('/api/nama-mahasiswa', function (\Illuminate\Http\Request $request) {
    $mhs = \App\Models\Mahasiswa::where('fingerprint_id', $request->fingerprint_id)->first();
    if (!$mhs) return response()->json(['nama' => '']);
    return response()->json(['nama' => $mhs->nama_lengkap]);
});

Route::get('/simulasi-alat/{finger_id}', function ($finger_id) {
    $request = new \Illuminate\Http\Request();
    $request->replace(['fingerprint_id' => $finger_id]);
    $controller = new FingerprintController();
    return $controller->store($request);
});

// ============================================================
// 3. RUTE API MOBILE (Android)
// ✅ FIX: Pakai middleware 'web' agar session terbaca dari cookie,
//         ditambah 'cek.ortu' agar return JSON 401 bukan redirect
// ============================================================

Route::middleware(['web', 'cek.ortu'])->group(function () {
    Route::get('/api/cek-absen-terbaru', [OrtuController::class, 'apiCekAbsen']);
});

// ============================================================
// 4. RUTE ORANG TUA
// ============================================================

Route::middleware(['cek.ortu'])->group(function () {
    Route::get('/dashboard', [OrtuController::class, 'index'])->name('ortu.dashboard');
    Route::get('/dashboard/cek-status', [OrtuController::class, 'cekStatusDashboard'])->name('ortu.cek.status');
    Route::get('/dashboard/riwayat', [OrtuController::class, 'riwayat'])->name('ortu.riwayat');
    Route::get('/profil', [ProfileController::class, 'index'])->name('profil.index');
    Route::post('/profil/password', [ProfileController::class, 'updatePassword'])->name('profil.password');
});

// ============================================================
// 5. RUTE ADMIN/DOSEN
// ============================================================

Route::middleware(['auth'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/riwayat', [AdminController::class, 'riwayat'])->name('admin.riwayat');

    Route::post('/admin/sesi/buka', [AdminController::class, 'bukaSesi'])->name('sesi.buka');
    Route::post('/admin/sesi/tutup', [AdminController::class, 'tutupSesi'])->name('sesi.tutup');
    Route::post('/admin/absensi/{id}/status', [AdminController::class, 'editStatus'])->name('absensi.editStatus');

    Route::get('/admin/pengaturan', [AdminController::class, 'pengaturan'])->name('admin.pengaturan');

    Route::get('/admin/mahasiswa/registrasi/{id_finger}', [MahasiswaController::class, 'registrasi'])->name('mahasiswa.registrasi');
    Route::resource('/admin/mahasiswa', MahasiswaController::class);
});

// ============================================================
// 6. SIMULATOR
// ============================================================

Route::get('/simulator', [SimulatorController::class, 'index']);