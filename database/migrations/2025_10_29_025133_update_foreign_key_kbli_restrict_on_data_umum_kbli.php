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
        Schema::table('data_umum_kbli', function (Blueprint $table) {
            // Hapus foreign key lama
            $table->dropForeign(['kbli_id']);

            // Tambahkan ulang dengan restrict (tidak bisa dihapus kalau dipakai)
            $table->foreign('kbli_id')->references('id_kbli')->on('kblis')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('data_umum_kbli', function (Blueprint $table) {
            // Rollback ke versi sebelumnya (cascade)
            $table->dropForeign(['kbli_id']);
            $table->foreign('kbli_id')->references('id_kbli')->on('kblis')->onDelete('cascade');
        });
    }
};
