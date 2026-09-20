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
        Schema::create('surat_izin_penelitian', function (Blueprint $table) {
            $table->id();
            $table->string('layanan');
            $table->foreignId('pengajuan_id')
                ->constrained('pengajuan')
                ->cascadeOnDelete();
            $table->string('nomor');
            $table->text('mahasiswa');
            $table->text('tujuan_penelitian');
            $table->text('alamat_penelitian');
            $table->string('judul_skripsi');
            $table->text('tanggal_surat');
            $table->enum('penandatangan', ['dekan', 'wakil_dekan'])
                ->default('wakil_dekan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surat_izin_penelitian');
    }
};
