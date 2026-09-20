<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('perubahan_data', function (Blueprint $table) {
            $table->id();
            $table->foreignId('surat_keabsahan_data_id')
                ->constrained('surat_keabsahan_data')
                ->cascadeOnDelete();
            $table->text('salah')->nullable();
            $table->text('benar');
            $table->string('keterangan');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('perubahan_data');
    }
};
