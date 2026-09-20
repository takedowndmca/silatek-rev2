<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SuratKetAktifKuliah extends Model
{
    protected $table = 'surat_ket_aktif_kuliah';

    protected $fillable = [
        'pengajuan_id',
        'layanan',
        'semester',
        'alamat',
        'namaortu',
        'nip',
        'pangkatgolongan',
        'instansi',
        'jabatan',
        'nomor',
        'tanggal_surat',
        'penandatangan',
    ];

    protected $casts = [
        'semester' => 'integer',
        'tanggal_surat' => 'date',
    ];

    public function pengajuan()
    {
        return $this->belongsTo(Pengajuan::class);
    }

    public function ttd()
    {
         return $this->morphOne(Tandatangan::class, 'surat')
            ->where('jenis', 'ttd');
    }
}
