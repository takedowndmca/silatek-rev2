<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class SuratPembimbingTA extends Model
{
    protected $table = 'surat_pembimbing_ta';

    protected $fillable = [
        'layanan',
        'pengajuan_id',
        'semester',
        'tahun_ajaran',
        'nomor',
        'pembimbing',
        'judul_skripsi',
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
