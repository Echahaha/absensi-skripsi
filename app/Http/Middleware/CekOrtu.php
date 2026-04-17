<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Mahasiswa;
use Symfony\Component\HttpFoundation\Response; // Tambahkan ini

class CekOrtu
{
    // Tambahkan return type : Response agar tidak error di Laravel 11
    public function handle(Request $request, Closure $next): Response 
    {
        $id_mhs = session('id_mahasiswa');

        // Cek cookie sebagai backup (ini sudah benar)
        if (!$id_mhs) {
            $id_mhs = $request->cookie('ortu_id');

            if ($id_mhs) {
                $mhs = Mahasiswa::find($id_mhs);
                if ($mhs) {
                    session([
                        'id_mahasiswa' => $mhs->id,
                        'nama_mahasiswa' => $mhs->nama_lengkap,
                        'role' => 'ortu'
                    ]);
                    // Jangan pakai regenerate() di dalam middleware karena bisa bikin loop redirect
                    // $request->session()->regenerate(); 
                }
            }
        }

        if (!session('id_mahasiswa') || session('role') !== 'ortu') {
            return redirect('/login');
        }

        return $next($request);
    }
}