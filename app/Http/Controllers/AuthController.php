<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Mahasiswa;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'identity' => 'required',
            'password' => 'required'
        ]);

        $input = $request->identity;
        $password = $request->password;

        // SKENARIO 1: Login DOSEN (Email)
        if (filter_var($input, FILTER_VALIDATE_EMAIL)) {
            if (Auth::attempt(['email' => $input, 'password' => $password], true)) {
                return redirect()->intended('admin/dashboard');
            }
        }

        // SKENARIO 2: Login ORANG TUA (NIM)
        else {
            $mhs = Mahasiswa::where('nim', $input)->first();

            if ($mhs && Hash::check($password, $mhs->password)) {
                session([
                    'id_mahasiswa' => $mhs->id,
                    'nama_mahasiswa' => $mhs->nama_lengkap,
                    'role' => 'ortu'
                ]);

                request()->session()->regenerate();

                // ✅ FIX: Secure=false karena pakai http (ngrok),
                // SameSite=lax lebih kompatibel dari none
                $cookie = cookie(
                    'ortu_id',      // nama
                    $mhs->id,       // value
                    525600,         // 1 tahun dalam menit
                    '/',            // path
                    null,           // domain
                    false,          // secure (false karena http)
                    false,          // httpOnly (false agar WebView bisa baca)
                    false,          // raw
                    'lax'           // ✅ ganti dari 'none' ke 'lax'
                );

                return redirect()->intended('dashboard')->withCookie($cookie);
            }
        }

        return back()->withErrors(['msg' => 'Login Gagal! NIM atau Password salah.']);
    }

    public function logout()
    {
        Auth::logout();
        session()->flush();

        $cookie = cookie()->forget('ortu_id');

        return redirect('/login')->withCookie($cookie);
    }
}