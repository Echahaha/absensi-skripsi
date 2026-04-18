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

            return back()->withErrors(['msg' => 'Login Gagal! Email atau Password salah.']);
        }

        // SKENARIO 2: Login ORANG TUA (NIM)
        else {
            $mhs = Mahasiswa::where('nim', $input)->first();

            if ($mhs && Hash::check($password, $mhs->password)) {

                // Flush session lama sebelum set yang baru
                session()->flush();
                session()->regenerate(true);

                session([
                    'id_mahasiswa' => $mhs->id,
                    'nama_mahasiswa' => $mhs->nama_lengkap,
                    'nim' => $mhs->nim,
                    'role' => 'ortu'
                ]);

                // Hapus cookie lama, lalu set cookie baru
                $forgetCookie = cookie()->forget('ortu_id');

                $cookie = cookie(
                    'ortu_id',  // nama
                    $mhs->id,   // value
                    120,        // 120 menit
                    '/',        // path
                    null,       // domain
                    false,      // secure (false karena http)
                    true,       // httpOnly (true lebih aman)
                    false,      // raw
                    'lax'       // sameSite
                );

                return redirect()->intended('dashboard')
                    ->withoutCookie('ortu_id')
                    ->withCookie($forgetCookie)
                    ->withCookie($cookie);
            }

            return back()->withErrors(['msg' => 'Login Gagal! NIM atau Password salah.']);
        }
    }

    public function logout()
    {
        Auth::logout();
        session()->flush();
        session()->regenerate(true);

        $cookie = cookie()->forget('ortu_id');

        return redirect('/login')->withCookie($cookie);
    }
}