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
            $table->id();
            $table->bigInteger('nib')->unique();
            $table->string('nama_perusahaan')->nullable();
            $table->string('uraian_jenis')->nullable();
            $table->text('alamat')->nullable();
            $table->string('kelurahan')->nullable();
            $table->string('kecamatan')->nullable();
            $table->integer('nilai_investasi')->nullable();
            $table->unsignedBigInteger('kode_kbli')->nullable();
            $table->foreign('kode_kbli')->references('id')->on('kblis')->onDelete('restrict');
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
