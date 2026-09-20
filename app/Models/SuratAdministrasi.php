<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class SuratAdministrasi extends Model
{
    protected $table = 'surat_administrasi';

    protected $fillable = [
        'layanan',
        'pengajuan_id',
        'nomor',
        'tahun_ajaran',
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
