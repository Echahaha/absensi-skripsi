<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
public function up()
{
    Schema::create('mahasiswas', function (Blueprint $table) {
        $table->id();
        $table->string('nim', 20)->unique();  // Username Login
        $table->string('password');           // Password Login
        $table->string('nama_lengkap');
        $table->string('prodi', 50);          // Program Studi
        $table->integer('semester')->default(1);
        $table->string('fingerprint_id')->unique()->nullable(); // ID Alat (bisa huruf/angka)
        $table->string('no_hp_ortu', 20);     // No WA Ortu
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mahasiswas');
    }
};
