<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class SuratSeminarKPI extends Model
{
    protected $table = 'surat_seminar_kpi';

    protected $fillable = [
        'layanan',
        'pengajuan_id',
        'nomor',
        'pembimbing',
        'penguji',
        'mahasiswa',
        'tempat_kpi',
        'tanggal_ujian',
        'waktu',
        'tempat',
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
