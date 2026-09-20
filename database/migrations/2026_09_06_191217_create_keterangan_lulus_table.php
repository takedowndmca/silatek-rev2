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
        Schema::create('surat_keterangan_lulus', function (Blueprint $table) {
            $table->id();
            $table->string('layanan');
            $table->foreignId('pengajuan_id')->constrained('pengajuan')->cascadeOnDelete();
            $table->string('nomor');
            $table->string('tahun_ajaran');
            $table->string('tanggal_ujian_tutup');
            $table->string('ipk');
            $table->string('predikat_online');
            $table->string('judul_penelitian');
            $table->enum('periode', ['awal', 'akhir']);
            $table->date('tanggal_surat');
            $table->enum('penandatangan', ['dekan', 'wakil_dekan'])->default('dekan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surat_keterangan_lulus');
    }
};
