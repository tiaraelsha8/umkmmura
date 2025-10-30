<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('data_umums', function (Blueprint $table) {
            $table->id('id_umum');
            $table->bigInteger('nib');
            $table->string('nama_perusahaan', 255);
            $table->string('uraian_jenis', 255)->nullable();
            $table->text('alamat');
            $table->char('kelurahan', 50);
            $table->char('kecamatan', 50);
            $table->bigInteger('nilai_investasi')->nullable();
            $table->boolean('izin_nib')->default(false);
            $table->boolean('izin_usaha')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_umums');
    }
};
