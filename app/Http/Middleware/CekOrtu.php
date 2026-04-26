<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Mahasiswa;
use Symfony\Component\HttpFoundation\Response;

class CekOrtu
{
    public function handle(Request $request, Closure $next): Response
    {
        $id_mhs = session('id_mahasiswa');

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
                }
            }
        }

        if (!session('id_mahasiswa') || session('role') !== 'ortu') {
            // ✅ FIX: Jika request dari Android/API → JSON, bukan redirect
            if ($request->expectsJson() || $request->is('api/*')) {
                return response()->json(['unauthenticated' => true], 401);
            }
            return redirect('/login');
        }

        return $next($request);
    }
}