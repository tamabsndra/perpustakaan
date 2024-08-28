<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pengembalians', function (Blueprint $table) {
            $table->id('id_pengembalian');
            $table->string('no_anggota');
            $table->foreign('no_anggota')->references('no_anggota')->on('anggotas')->onDelete('cascade');
            $table->unsignedBigInteger('id_buku');
            $table->foreign('id_buku')->references('id_buku')->on('bukus')->onDelete('cascade');
            $table->date('tgl_kembali')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengembalians');
    }
};
