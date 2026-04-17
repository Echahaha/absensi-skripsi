<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('pengaturans', function (Blueprint $table) {
            $table->boolean('sesi_aktif')->default(false)->after('batas_waktu');
            $table->string('nama_matkul')->nullable()->after('sesi_aktif');
        });
    }

    public function down()
    {
        Schema::table('pengaturans', function (Blueprint $table) {
            $table->dropColumn(['sesi_aktif', 'nama_matkul']);
        });
    }
};
