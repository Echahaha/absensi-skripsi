<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    public function up()
    {
        Schema::table('pengaturans', function (Blueprint $table) {
            // Tambah kolom batas_waktu dengan default 08:00:00
            $table->time('batas_waktu')->default('08:00:00')->after('id_enroll');
        });

        // Update baris pertama yang sudah ada agar langsung terisi
        DB::table('pengaturans')->where('id', 1)->update([
            'batas_waktu' => '08:00:00'
        ]);
    }

    public function down()
    {
        Schema::table('pengaturans', function (Blueprint $table) {
            $table->dropColumn('batas_waktu');
        });
    }
};