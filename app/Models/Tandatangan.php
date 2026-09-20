<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tandatangan extends Model
{
    protected $table = 'tandatangan';

    protected $fillable = [
        'jenis',
        'nuptk',
        'nama',
    ];

    public function surat()
    {
        return $this->morphTo();
    }
}
