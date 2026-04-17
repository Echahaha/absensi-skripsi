<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;      // Model untuk Dosen/Admin
use App\Models\Mahasiswa; // Model untuk Mahasiswa
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // 1. Buat Akun DOSEN (Admin)
        User::create([
            'name' => 'Pak Dosen Admin',
            'email' => 'admin@kampus.com', // Username Login Dosen
            'password' => Hash::make('123456'),
        ]);

        // 2. Buat Akun MAHASISWA 1 (Si Rajin)
        Mahasiswa::create([
            'nim' => '2025001',           // Username Login Ortu
            'password' => Hash::make('123456'),
            'nama_lengkap' => 'Budi Santoso',
            'prodi' => 'Teknik Informatika',
            'semester' => 5,
            'fingerprint_id' => 101,      // ID Alat: 101
            'no_hp_ortu' => '628123456789',
        ]);

        // 3. Buat Akun MAHASISWA 2 (Si Sering Telat)
        Mahasiswa::create([
            'nim' => '2025002',
            'password' => Hash::make('123456'),
            'nama_lengkap' => 'Siti Aminah',
            'prodi' => 'Sistem Informasi',
            'semester' => 3,
            'fingerprint_id' => 102,      // ID Alat: 102
            'no_hp_ortu' => '628987654321',
        ]);
    }
}