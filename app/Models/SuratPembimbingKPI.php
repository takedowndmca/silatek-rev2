<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SuratPembimbingKPI extends Model
{
    protected $table = 'surat_pembimbing_kpi';

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
