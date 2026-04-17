<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class MahasiswaController extends Controller
{
    // 1. Tampilkan Daftar Mahasiswa
    public function index()
    {
        $data_mhs = Mahasiswa::all(); // Ambil semua data
        return view('admin.mahasiswa.index', compact('data_mhs'));
    }

    // 2. Tampilkan Form Tambah
    public function create()
    {
        return view('admin.mahasiswa.create');
    }

    // 3. Proses Simpan Data Baru
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nim' => 'required|unique:mahasiswas,nim',
            'nama_lengkap' => 'required',
            // Validasi 'unique' memastikan ID Fingerprint tidak boleh kembar di tabel mahasiswas
            'fingerprint_id' => 'required|numeric|unique:mahasiswas,fingerprint_id',
            'no_hp_ortu' => 'required'
        ], [
            // Custom pesan error agar dosen lebih paham
            'fingerprint_id.unique' => 'ID Fingerprint ini sudah digunakan oleh mahasiswa lain!',
            'fingerprint_id.numeric' => 'ID Fingerprint harus berupa angka!',
            'nim.unique' => 'NIM ini sudah terdaftar di sistem!'
        ]);

        // Proses simpan (kode selanjutnya tetap sama)
        Mahasiswa::create([
            'nim' => $request->nim,
            'password' => Hash::make('123456'),
            'nama_lengkap' => $request->nama_lengkap,
            'prodi' => $request->prodi,
            'semester' => $request->semester,
            'fingerprint_id' => $request->fingerprint_id,
            'no_hp_ortu' => $request->no_hp_ortu,
        ]);

        return redirect()->route('mahasiswa.index')->with('success', 'Data Berhasil Ditambahkan!');
    }
    // 5. TAMPILKAN FORM EDIT (Ambil data lama)
    public function edit($id)
    {
        $mhs = Mahasiswa::find($id);
        return view('admin.mahasiswa.edit', compact('mhs'));
    }

    // 6. PROSES UPDATE DATA
    public function update(Request $request, $id)
    {
        $mhs = Mahasiswa::find($id);

        $request->validate([
            'nama_lengkap' => 'required',
            'prodi' => 'required',
            'no_hp_ortu' => 'required',
            // Unique kecuali untuk ID milik mahasiswa ini sendiri
            'fingerprint_id' => 'required|numeric|unique:mahasiswas,fingerprint_id,' . $mhs->id,
        ], [
            'fingerprint_id.unique' => 'Gagal update! ID Fingerprint ini sudah dipakai mahasiswa lain.',
        ]);

        $mhs->update([
            'nama_lengkap' => $request->nama_lengkap,
            'prodi' => $request->prodi,
            'semester' => $request->semester,
            'no_hp_ortu' => $request->no_hp_ortu,
            'fingerprint_id' => $request->fingerprint_id, // Sekarang kita izinkan edit ID jika perlu
        ]);

        return redirect()->route('mahasiswa.index')->with('success', 'Data Berhasil Diupdate!');
    }
    // 4. Hapus Data
    // MahasiswaController.php
    // Saat delete mahasiswa, set mode alat ke "delete"
    public function destroy($id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        $fingerprintId = $mahasiswa->id_fingerprint;

        // ✅ Tulis ke tabel pengaturans (sama seperti yang dibaca apiCekAlat)
        DB::table('pengaturans')->where('id', 1)->update([
            'mode_alat' => 'delete',
            'id_enroll' => $fingerprintId,
        ]);

        $mahasiswa->delete();

        return redirect()->back()->with('success', 'Mahasiswa dihapus');
    }

    public function registrasi($id_finger)
    {
        // Cek apakah fingerprint_id ini sudah dipakai mahasiswa LAIN
        // yang sudah terdaftar (is_finger_registered = true)
        $sudahTerdaftar = Mahasiswa::where('fingerprint_id', (int) $id_finger)
            ->where('is_finger_registered', true)
            ->exists();

        if ($sudahTerdaftar) {
            return response()->json([
                'status' => 'error',
                'message' => 'ID Fingerprint ini sudah digunakan mahasiswa lain!'
            ], 400);
        }

        // Cek apakah ada mahasiswa lain (bukan yang punya id_finger ini)
        // yang sudah registered dengan fingerprint_id yang sama
        $konflik = Mahasiswa::where('fingerprint_id', '!=', (int) $id_finger)
            ->where('is_finger_registered', true)
            ->whereRaw('fingerprint_id = ?', [(int) $id_finger])
            ->exists();

        DB::table('pengaturans')->where('id', 1)->update([
            'mode_alat' => 'enroll',
            'id_enroll' => (int) $id_finger,
            'updated_at' => now()
        ]);

        return response()->json(['status' => 'ready']);
    }

    public function resetAlat(Request $request)
    {
        $status = DB::table('pengaturans')->where('id', 1)->first();

        // Hanya tandai registered kalau BUKAN dibatalkan
        if ($status->id_enroll > 0 && $request->action !== 'batal') {

            $sudahDipakai = Mahasiswa::where('fingerprint_id', $status->id_enroll)
                ->where('is_finger_registered', true)
                ->exists();

            if ($sudahDipakai) {
                DB::table('pengaturans')->where('id', 1)->update([
                    'mode_alat' => 'scan',
                    'id_enroll' => 0
                ]);

                return response()->json([
                    'status' => 'duplikat',
                    'message' => 'Sidik jari sudah terdaftar untuk mahasiswa lain!'
                ], 400);
            }

            // Registrasi sukses — tandai registered
            Mahasiswa::where('fingerprint_id', $status->id_enroll)
                ->update(['is_finger_registered' => true]);
        }

        // Reset alat (baik sukses maupun dibatalkan)
        DB::table('pengaturans')->where('id', 1)->update([
            'mode_alat' => 'scan',
            'id_enroll' => 0
        ]);

        return response()->json(['status' => 'reset']);
    }

    public function cekStatusRegistrasi()
    {
        $status = DB::table('pengaturans')->where('id', 1)->first();
        return response()->json([
            'mode' => $status->mode_alat,
            'hasil_enroll' => $status->hasil_enroll ?? '',
        ]);
    }

    public function apiCekAlat()
    {
        $status = DB::table('pengaturans')->where('id', 1)->first();

        // Jika tabel kosong, return default
        if (!$status) {
            return response()->json(['m' => 'scan', 'i' => 0]);
        }

        return response()->json([
            'm' => $status->mode_alat,
            'i' => (int) $status->id_enroll
        ]);
    }

    public function hasilEnroll(Request $request)
    {
        $fingerprint_id = (int) $request->fingerprint_id;
        $status = $request->status; // 'sukses' atau 'gagal'

        if ($status === 'sukses') {
            // Update mahasiswa jadi terdaftar
            Mahasiswa::where('fingerprint_id', $fingerprint_id)
                ->update(['is_finger_registered' => true]);
        }

        // Simpan hasil ke tabel pengaturans agar web bisa baca
        DB::table('pengaturans')->where('id', 1)->update([
            'hasil_enroll' => $status, // 'sukses' atau 'gagal'
            'mode_alat' => 'scan',
            'id_enroll' => 0,
        ]);

        return response()->json(['status' => 'ok']);
    }
    public function hasilHapus(Request $request)
    {
        DB::table('pengaturans')->where('id', 1)->update([
            'mode_alat' => 'scan',
            'id_enroll' => 0,
        ]);

        return response()->json(['status' => $request->status]);
    }
}