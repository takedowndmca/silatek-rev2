<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SuratIzinPenelitian extends Model
{
    protected $table = 'surat_izin_penelitian';

    protected $fillable = [
        'layanan',
        'pengajuan_id',
        'nomor',
        'mahasiswa',
        'judul_skripsi',
        'tujuan_penelitian',
        'alamat_penelitian',
        'tanggal_surat',
    ];

    public function ttd()
    {
        return $this->morphOne(Tandatangan::class, 'surat')
            ->where('jenis', 'ttd');
    }

    public function pengajuan()
    {
        return $this->belongsTo(Pengajuan::class);
    }
}
