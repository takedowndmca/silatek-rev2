<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class SuratPengusulanTempatKPI extends Model
{
    protected $table = 'surat_pengusulan_tempat_kpi';

    protected $fillable = [
        'layanan',
        'pengajuan_id',
        'nomor',
        'tujuan_instansi',
        'alamat_tujuan',
        'waktu',
        'pembimbing',
        'mahasiswa',
        'tanggal_surat',
        'penandatangan',
    ];

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
    
    public function pengajuan()
    {
        return $this->belongsTo(Pengajuan::class);
    }
}
