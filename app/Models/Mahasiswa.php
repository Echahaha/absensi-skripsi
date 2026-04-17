<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    // 1. FILLABLE
    // Wajib ada agar kita bisa isi data pakai: Mahasiswa::create([...])
    protected $fillable = [
        'nim',
        'password',
        'nama_lengkap',
        'prodi',
        'semester',
        'fingerprint_id',
        'no_hp_ortu',
        'is_finger_registered'
    ];

    // 2. RELASI (Opsional tapi Bagus)
    // Memberitahu Laravel bahwa Mahasiswa ini punya BANYAK (Has Many) data absen.
    // Berguna kalau nanti mau ambil "Si Budi sudah absen berapa kali?"
    public function absensi()
    {
        return $this->hasMany(Absensi::class);
    }
}