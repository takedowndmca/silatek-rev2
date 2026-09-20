<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class SuratSeminarTA extends Model
{
    protected $table = 'surat_seminar';

    protected $fillable = [
        'layanan',
        'pengajuan_id',
        'nomor_sk',
        'ketua_sekertaris',
        'pembimbing',
        'penguji',
        'judul_skripsi',
        'nomor_undangan',
        'tanggal_ujian',
        'waktu',
        'tempat',
        'tanggal_surat',
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

    public function parafWadek()
    {
        return $this->morphOne(Tandatangan::class, 'surat')
            ->where('jenis', 'paraf_wadek');
    }
}
