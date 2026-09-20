<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('surat_keabsahan_data', function (Blueprint $table) {
            $table->id();
            $table->string('layanan');
            $table->foreignId('pengajuan_id')
                ->constrained('pengajuan')
                ->cascadeOnDelete();
            $table->string('nomor')->nullable();
            $table->string('mahasiswa');
            $table->string('nim');
            $table->string('program_studi');
            $table->string('semester');
            $table->date('tanggal_surat');
            $table->enum('penandatangan', ['dekan', 'wakil_dekan'])
                ->default('wakil_dekan');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('surat_keabsahan_data');
    }
};
