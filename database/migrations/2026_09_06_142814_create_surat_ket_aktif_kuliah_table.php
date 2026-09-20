<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('surat_ket_aktif_kuliah', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pengajuan_id')
                ->constrained('pengajuan')
                ->cascadeOnDelete();
            $table->string('layanan');
            $table->unsignedTinyInteger('semester');
            $table->text('alamat');
            $table->string('namaortu');
            $table->string('nip')->nullable();
            $table->string('pangkatgolongan')->nullable();
            $table->string('instansi')->nullable();
            $table->string('jabatan')->nullable();
            $table->string('nomor')->nullable();
            $table->date('tanggal_surat')->nullable();
            $table->enum('penandatangan', ['dekan', 'wakil_dekan'])->default('wakil_dekan');
            $table->timestamps();
            $table->unique('pengajuan_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('surat_ket_aktif_kuliah');
    }
};
