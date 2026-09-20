<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PerubahanData extends Model
{
    protected $table = 'perubahan_data';

    protected $fillable = [
        'surat_keabsahan_data_id',
        'salah',
        'benar',
        'keterangan',
    ];

    public function surat()
    {
        return $this->belongsTo(
            SuratKeabsahanData::class,
            'surat_keabsahan_data_id'
        );
    }
}
