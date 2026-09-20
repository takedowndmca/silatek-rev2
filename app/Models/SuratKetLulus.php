<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SuratKetLulus extends Model
{
    protected $table = 'surat_keterangan_lulus';

    protected $fillable = [
        'layanan',
        'pengajuan_id',
        'nomor',
        'tahun_ajaran',
        'tanggal_ujian_tutup',
        'ipk',
        'predikat_online',
        'judul_penelitian',
        'periode',
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
    
    public function parafWadek()
    {
        return $this->morphOne(Tandatangan::class, 'surat')
            ->where('jenis', 'paraf_wadek');
    }
}
