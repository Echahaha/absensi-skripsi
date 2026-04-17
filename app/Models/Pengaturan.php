<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengaturan extends Model
{
    use HasFactory;

    protected $table = 'pengaturans';

    protected $fillable = [
        'batas_waktu',
        'mode_alat',  // ✅ ditambahkan — dipakai Arduino polling
        'id_enroll',  // ✅ ditambahkan — ID jari yang sedang di-enroll
        'sesi_aktif',  // ← tambah ini
        'nama_matkul',
    ];
    protected $casts = [
        'target_prodi' => 'array', // ← tambah ini, agar otomatis encode/decode JSON
    ];
}