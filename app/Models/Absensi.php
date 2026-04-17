<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    use HasFactory;

    protected $fillable = [
        'mahasiswa_id',
        'waktu_masuk',
        'status',
        'nama_matkul'
    ];

    // --- TAMBAHKAN BAGIAN INI ---
    // Ini memberitahu Laravel: "Setiap data absen, MILIK (Belongs To) satu Mahasiswa"
    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class);
    }
}