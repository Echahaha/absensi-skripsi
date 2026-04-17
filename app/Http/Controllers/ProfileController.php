<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa; // Wajib dipanggil untuk ambil data mahasiswa
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    // Menampilkan halaman profil
    public function index()
    {
        $id_mhs = session('id_mahasiswa');

        // Tendang kalau belum login
        if (!$id_mhs) {
            return redirect('/login')->withErrors(['msg' => 'Silakan login dulu.']);
        }

        // Ambil data mahasiswa berdasarkan session
        $mahasiswa = Mahasiswa::find($id_mhs);
        
        return view('ortu.profil', compact('mahasiswa')); 
    }

    // Memproses ganti password
    public function updatePassword(Request $request)
    {
        $id_mhs = session('id_mahasiswa');
        $mahasiswa = Mahasiswa::find($id_mhs);

        $request->validate([
            'password_lama' => 'required',
            'password_baru' => 'required|min:6',
            'konfirmasi_password' => 'required|same:password_baru'
        ]);

        // Cek password lama
        if (!Hash::check($request->password_lama, $mahasiswa->password)) {
            return back()->with('error', 'Password lama yang Anda masukkan salah!');
        }

        // Simpan password baru
        $mahasiswa->password = Hash::make($request->password_baru);
        $mahasiswa->save();

        return back()->with('success', 'Password berhasil diubah!');
    }
}