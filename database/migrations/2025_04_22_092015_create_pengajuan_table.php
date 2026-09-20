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
        Schema::create('pengajuan', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->string('layanan');
            $table->string('nim');
            $table->string('nama');
            $table->string('angkatan');
            $table->string('prodi');
            $table->json('data')->nullable();
            $table->string('no_telp');
            $table->string('status')->default('diajukan');
            $table->boolean('ditolak')->default(false);
            $table->string('alasan_ditolak')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengajuan');
    }
};
