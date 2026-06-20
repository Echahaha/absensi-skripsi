<?php

namespace App\Http\Controllers\Api;

use App\Models\Pengaturan;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mahasiswa;
use App\Models\Absensi;
use Carbon\Carbon;

class FingerprintController extends Controller
{
    // Fungsi khusus untuk menerima request murni dari alat ESP32
    public function absenHardware(Request $request)
    {
        if (!$request->has('fingerprint_id')) {
            return response()->json([
                'status'  => 'error',
                'message' => 'ID jari kosong',
                'data'    => null
            ], 400);
        }

        // Lempar datanya ke fungsi store utama
        return $this->store($request);
    }

    public function store(Request $request)
    {
        $finger_id = $request->fingerprint_id;

        // 1. Cek mahasiswa terdaftar
        $mahasiswa = Mahasiswa::where('fingerprint_id', $finger_id)->first();

        if (!$mahasiswa) {
            return response()->json([
                'status'  => 'error',
                'message' => 'Tidak terdaftar di database',
                'data'    => null
            ], 404);
        }

        // 2. Cek sesi aktif
        $pengaturan = Pengaturan::first();

        if (!$pengaturan || !$pengaturan->sesi_aktif) {
            return response()->json([
                'status'  => 'error',
                'message' => 'Tidak ada sesi absensi yang aktif',
                'data'    => null
            ], 400);
        }

        // 3. Cek double absen hari ini di matkul yang sama
        // Menggunakan zona waktu Jakarta agar sinkron dengan perangkat
        $hari_ini = Carbon::today('Asia/Jakarta');
        
        $cek_absen = Absensi::where('mahasiswa_id', $mahasiswa->id)
            ->whereDate('created_at', $hari_ini)
            ->where('nama_matkul', $pengaturan->nama_matkul)
            ->first();

        if ($cek_absen) {
            return response()->json([
                'status'  => 'error',
                'message' => 'Sudah absen hari ini',
                'data'    => [
                    'nama'             => $mahasiswa->nama_lengkap,
                    'jam_masuk'        => Carbon::parse($cek_absen->waktu_masuk)->timezone('Asia/Jakarta')->format('H:i:s'),
                    'status_kehadiran' => $cek_absen->status,
                ]
            ], 400);
        }

        // 4. Logika waktu
        // Kunci zona waktu ke WIB (Asia/Jakarta)
        $waktu_sekarang = Carbon::now('Asia/Jakarta');
        $jam_sekarang   = $waktu_sekarang->format('H:i:s');
        $batas_waktu    = $pengaturan->batas_waktu ?? '08:00:00';

        if ($jam_sekarang > $batas_waktu) {
            $status = 'Terlambat'; // FIX: Diubah dari 'Alpha' menjadi 'Terlambat'
            $pesan  = 'Terlambat! Batas masuk jam ' . $batas_waktu;
        } else {
            $status = 'Hadir';
            $pesan  = 'Berhasil! Selamat belajar, ' . $mahasiswa->nama_lengkap . '.';
        }

        // 5. Simpan absensi
        Absensi::create([
            'mahasiswa_id' => $mahasiswa->id,
            'waktu_masuk'  => $waktu_sekarang,
            'status'       => $status,
            'nama_matkul'  => $pengaturan->nama_matkul
        ]);

        return response()->json([
            'status'  => 'success',
            'message' => $pesan,
            'data'    => [
                'nama'             => $mahasiswa->nama_lengkap,
                'jam_masuk'        => $jam_sekarang,
                'status_kehadiran' => $status,
            ]
        ], 200);
    }
}