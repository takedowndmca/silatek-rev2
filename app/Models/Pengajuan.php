<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Pengajuan extends Model
{
    protected $table = 'pengajuan';

    protected $fillable = [
        'layanan',
        'nim',
        'nama',
        'angkatan',
        'prodi',
        'no_telp',
        'status',
        'ditolak',
        'alasan_ditolak',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->uuid = (string) Str::uuid();
        });
    }

    public function berkas()
    {
        return $this->hasMany(PengajuanBerkas::class);
    }

    public function suratAdministrasi()
    {
        return $this->hasOne(SuratAdministrasi::class);
    }

    public function suratSeminarTA()
    {
        return $this->hasOne(SuratSeminarTA::class);
    }

    public function suratSeminarKPI()
    {
        return $this->hasOne(SuratSeminarKPI::class);
    }

    public function suratPembimbingTA()
    {
        return $this->hasOne(SuratPembimbingTA::class);
    }

    public function SuratPengusulanTempatKPI()
    {
        return $this->hasOne(SuratPengusulanTempatKPI::class);
    }

    public function surat(): Attribute
    {
        return Attribute::make(
            get: function () {
                $layanan = config('layanan')[$this->layanan];

                switch ($layanan['tipe']) {
                    case 'administrasi':
                        return $this->suratAdministrasi;
                    case 'seminar-ta':
                        return $this->suratSeminarTA;
                    case 'seminar-kpi':
                        return $this->suratSeminarKPI;
                    case 'pembimbing-ta':
                        return $this->suratPembimbingTA;
                    case 'pengusulan-tempat-kpi':
                        return $this->SuratPengusulanTempatKPI;
                    default:
                        return null;
                }
            }
        );
    }
}
