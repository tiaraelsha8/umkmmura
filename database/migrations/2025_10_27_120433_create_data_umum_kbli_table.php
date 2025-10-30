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
        Schema::create('data_umum_kbli', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('data_umum_id');
            $table->unsignedBigInteger('kbli_id');

            $table->foreign('data_umum_id')->references('id_umum')->on('data_umums')->onDelete('cascade');

            $table->foreign('kbli_id')->references('id_kbli')->on('kblis')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_umum_kbli');
    }
};
