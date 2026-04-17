<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa;

class SimulatorController extends Controller
{
    public function index()
    {
        // Ambil semua mahasiswa urut berdasarkan Nama
        $mahasiswa = Mahasiswa::orderBy('nama_lengkap', 'asc')->get();
        return view('simulator', compact('mahasiswa'));
    }
}