<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     * (Fungsi untuk membuat tabel)
     */
    public function up()
    {
        Schema::create('pengaturans', function (Blueprint $table) {
            $table->id();
            $table->string('mode_alat')->default('scan'); // scan atau enroll
            $table->integer('id_enroll')->default(0);
            $table->timestamps();
        });
        // Isi data awal otomatis
        DB::table('pengaturans')->insert(['mode_alat' => 'scan', 'id_enroll' => 0]);
    }

    /**
     * Reverse the migrations.
     * (Fungsi untuk menghapus tabel jika di-rollback)
     */
    public function down()
    {
        Schema::dropIfExists('pengaturans');
    }
};