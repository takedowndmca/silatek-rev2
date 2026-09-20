<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class SuratKeabsahanData extends Model
{
    protected $table = 'surat_keabsahan_data';

    protected $fillable = [
        'layanan',
        'pengajuan_id',
        'nomor',
        'mahasiswa',
        'nim',
        'program_studi',
        'semester',
        'tanggal_surat',
        'penandatangan',
    ];

    protected $casts = [
        'tanggal_surat' => 'date',
    ];

    public function ttd(): MorphOne
    {
        return $this->morphOne(Tandatangan::class, 'surat')
            ->where('jenis', 'ttd');
    }

    public function pengajuan(): BelongsTo
    {
        return $this->belongsTo(Pengajuan::class, 'pengajuan_id');
    }

    public function perubahan(): HasMany
    {
        return $this->hasMany(
            PerubahanData::class,
            'surat_keabsahan_data_id'
        );
    }
}
