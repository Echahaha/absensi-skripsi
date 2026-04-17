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
    public function store(Request $request)
    {
        $finger_id = $request->fingerprint_id;

        // 1. Cek mahasiswa terdaftar
        $mahasiswa = Mahasiswa::where('fingerprint_id', $finger_id)->first();

        if (!$mahasiswa) {
            return response()->json([
                'status'  => 'error',
                'message' => 'tidak terdaftar di database',
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
        $cek_absen = Absensi::where('mahasiswa_id', $mahasiswa->id)
            ->whereDate('created_at', Carbon::today())
            ->where('nama_matkul', $pengaturan->nama_matkul)
            ->first();

        if ($cek_absen) {
            return response()->json([
                'status'  => 'error',
                'message' => 'sudah absen hari ini',
                'data'    => [
                    'nama'             => $mahasiswa->nama_lengkap,
                    'jam_masuk'        => Carbon::parse($cek_absen->waktu_masuk)->format('H:i:s'),
                    'status_kehadiran' => $cek_absen->status,
                ]
            ], 400);
        }

        // 4. Logika waktu
        $jam_sekarang = Carbon::now()->format('H:i:s');
        $batas_waktu  = $pengaturan->batas_waktu ?? '08:00:00';

        if ($jam_sekarang > $batas_waktu) {
            $status = 'Alpha';
            $pesan  = 'Terlambat! Batas masuk jam ' . $batas_waktu;
        } else {
            $status = 'Hadir';
            $pesan  = 'Berhasil! Selamat belajar, ' . $mahasiswa->nama_lengkap . '.';
        }

        // 5. Simpan absensi
        Absensi::create([
            'mahasiswa_id' => $mahasiswa->id,
            'waktu_masuk'  => Carbon::now(),
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