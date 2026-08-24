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
        'pembimbing',
        'mahasiswa',
        'tanggal_surat',
    ];

    public function ttd()
    {
        return $this->morphOne(Tandatangan::class, 'surat');
    }

    public function pengajuan()
    {
        return $this->belongsTo(Pengajuan::class);
    }
}
