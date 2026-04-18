<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa;
use App\Models\Absensi;
use Carbon\Carbon;

class OrtuController extends Controller
{
    private function restoreSession()
    {
        $id_mhs = session('id_mahasiswa');

        if (!$id_mhs) {
            $id_mhs = request()->cookie('ortu_id');

            if ($id_mhs) {
                $mhs = Mahasiswa::find($id_mhs);
                if ($mhs) {
                    session([
                        'id_mahasiswa' => $mhs->id,
                        'nama_mahasiswa' => $mhs->nama_lengkap,
                        'role' => 'ortu'
                    ]);
                    request()->session()->regenerate();
                }
            }
        }

        return session('id_mahasiswa');
    }

    public function index()
    {
        $id_mhs = $this->restoreSession();

        if (!$id_mhs) {
            return redirect('/login')->withErrors(['msg' => 'Silakan login dulu.']);
        }

        $mahasiswa = Mahasiswa::find($id_mhs);
        $absen_hari_ini = Absensi::where('mahasiswa_id', $id_mhs)
            ->whereDate('created_at', now())
            ->first();
        $riwayat = Absensi::where('mahasiswa_id', $id_mhs)
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        return view('ortu.dashboard', compact('mahasiswa', 'absen_hari_ini', 'riwayat'));
    }

    public function riwayat()
    {
        $id_mhs = $this->restoreSession();

        if (!$id_mhs) {
            return redirect('/login')->withErrors(['msg' => 'Silakan login dulu.']);
        }

        $mahasiswa = Mahasiswa::find($id_mhs); // ← tambah ini

        $riwayat = Absensi::where('mahasiswa_id', $id_mhs)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('ortu.riwayat', compact('riwayat', 'mahasiswa')); // ← tambah 'mahasiswa'
    }

    public function apiCekAbsen()
    {
        // 1. Paksa timezone ke Jakarta agar sinkron dengan jam asli kita
        date_default_timezone_set('Asia/Jakarta');

        // 2. Ambil data absen yang masuk dalam 45 DETIK terakhir
        // Pakai 45 detik agar ada "napas" buat Android Service menangkap datanya
        $absen = \App\Models\Absensi::with('mahasiswa')
            ->where('created_at', '>=', now()->subSeconds(45))
            ->latest()
            ->first();

        if ($absen) {
            return response()->json([
                'ada_data' => true,
                'id' => $absen->id,
                'nama' => $absen->mahasiswa->nama_lengkap ?? 'Ananda',
                // Kirim waktu created_at asli dari database dalam format jam:menit:detik
                'waktu' => $absen->created_at->format('H:i:s'),
                'status' => $absen->status ?? 'hadir'
            ]);
        }

        return response()->json(['ada_data' => false]);
    }
}