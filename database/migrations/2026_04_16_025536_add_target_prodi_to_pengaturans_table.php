<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('pengaturans', function (Blueprint $table) {
            $table->json('target_prodi')->nullable()->after('nama_matkul');
            // Disimpan sebagai JSON karena bisa multi-prodi
            // Contoh isi: ["Teknik Informatika", "Sistem Informasi"]
        });
    }

    public function down()
    {
        Schema::table('pengaturans', function (Blueprint $table) {
            $table->dropColumn('target_prodi');
        });
    }
};
