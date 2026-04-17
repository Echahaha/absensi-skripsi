<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa;
use App\Models\Absensi;
use App\Models\Pengaturan; // <--- JANGAN LUPA BARIS INI (PENYEBAB ERROR TADI)
use Carbon\Carbon;

class AdminController extends Controller
{
    public function index()
    {
        // Menggunakan now() yang sudah kita set Asia/Jakarta di .env
        $hari_ini = now()->startOfDay();

        // 1. Hitung Statistik Hari Ini
        $total_mhs = Mahasiswa::count();
        $hadir = Absensi::where('created_at', '>=', $hari_ini)
            ->where('status', 'Hadir')
            ->count();
        $alpha = Absensi::where('created_at', '>=', $hari_ini)
            ->where('status', 'Alpha')
            ->count();

        // 2. Ambil Daftar yang TERLAMBAT/ALPHA hari ini
        $bermasalah = Absensi::with('mahasiswa')
            ->where('created_at', '>=', $hari_ini)
            ->whereIn('status', ['Alpha', 'Terlambat'])
            ->get();

        return view('admin.dashboard', compact('total_mhs', 'hadir', 'alpha', 'bermasalah'));
    }

    public function riwayat(\Illuminate\Http\Request $request)
    {
        $query = Absensi::with('mahasiswa')->orderBy('created_at', 'desc');

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->has('hari_ini')) {
            $query->whereDate('created_at', Carbon::today());
        }

        // Filter baru
        if ($request->filled('prodi')) {
            $query->whereHas('mahasiswa', fn($q) => $q->where('prodi', $request->prodi));
        }

        if ($request->filled('matkul')) {
            $query->where('nama_matkul', $request->matkul);
        }

        if ($request->filled('tanggal')) {
            $query->whereDate('created_at', $request->tanggal);
        }

        $riwayat = $query->get();

        // Untuk isi dropdown filter
        $daftarProdi = \App\Models\Mahasiswa::select('prodi')->distinct()->pluck('prodi');
        $daftarMatkul = Absensi::select('nama_matkul')->distinct()->whereNotNull('nama_matkul')->pluck('nama_matkul');

        return view('admin.riwayat', compact('riwayat', 'daftarProdi', 'daftarMatkul'));
    }

    // TAMPILKAN FORM SETTING
    public function pengaturan()
    {
        // Ambil data pengaturan pertama
        $pengaturan = Pengaturan::first();
        return view('admin.pengaturan', compact('pengaturan'));
    }

    // Buka Sesi Absensi
    public function bukaSesi(Request $request)
    {
        $request->validate([
            'nama_matkul' => 'required',
            'batas_waktu' => 'required',
            'target_prodi' => 'required|array|min:1'
        ]);

        Pengaturan::where('id', 1)->update([
            'sesi_aktif' => true,
            'nama_matkul' => $request->nama_matkul,
            'batas_waktu' => $request->batas_waktu,
            'target_prodi' => $request->target_prodi
        ]);

        return back()->with('success', 'Sesi absensi ' . $request->nama_matkul . ' berhasil dibuka!');
    }

    // Tutup Sesi — otomatis Alpha mahasiswa yang belum absen
    public function tutupSesi()
    {
        $pengaturan = Pengaturan::first();

        if (!$pengaturan || !$pengaturan->sesi_aktif) {
            return back()->with('error', 'Tidak ada sesi yang aktif.');
        }

        // Decode target prodi dari JSON
        $target_prodi = $pengaturan->target_prodi ?? [];

        // Ambil HANYA mahasiswa dari prodi yang dipilih
        $semua_mhs = Mahasiswa::whereIn('prodi', $target_prodi)->get();

        // Ambil mahasiswa yang sudah absen hari ini di matkul ini
        $sudah_absen = Absensi::whereDate('created_at', Carbon::today())
            ->where('nama_matkul', $pengaturan->nama_matkul)
            ->pluck('mahasiswa_id')
            ->toArray();

        // Yang belum absen → Alpha
        foreach ($semua_mhs as $mhs) {
            if (!in_array($mhs->id, $sudah_absen)) {
                Absensi::create([
                    'mahasiswa_id' => $mhs->id,
                    'waktu_masuk' => Carbon::now(),
                    'status' => 'Alpha',
                    'nama_matkul' => $pengaturan->nama_matkul
                ]);
            }
        }

        // Tutup sesi
        Pengaturan::where('id', 1)->update([
            'sesi_aktif' => false,
            'nama_matkul' => null,
            'target_prodi' => null,
        ]);

        return back()->with('success', 'Sesi ditutup! Mahasiswa yang tidak hadir sudah tercatat Alpha.');
    }

    // Edit status absensi (Alpha → Izin/Sakit)
    public function editStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:Hadir,Alpha,Izin,Sakit'
        ]);

        Absensi::where('id', $id)->update(['status' => $request->status]);

        return back()->with('success', 'Status berhasil diubah!');
    }
    public function batalEnroll()
    {
        Pengaturan::where('id', 1)->update([
            'mode_alat' => 'scan',
            'id_enroll' => 0,
        ]);

        return response()->json(['status' => 'ok']);
    }
}