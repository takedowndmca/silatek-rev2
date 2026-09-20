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
        'data',
        'no_telp',
        'status',
        'ditolak',
        'alasan_ditolak',
    ];

    protected $casts = [
        'data' => 'array',
        'ditolak' => 'boolean',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->uuid = (string) Str::uuid();
        });
    }

    public function getField(string $name, $default = null)
{
    return data_get($this->data, $name, $default);
}
public function suratKetAktifKuliah()
{
    return $this->hasOne(SuratKetAktifKuliah::class);
}
public function suratKetLulus()
{
    return $this->hasOne(SuratKetLulus::class);
}
public function suratKeabsahanData()
    {
        return $this->hasOne(SuratKeabsahanData::class);
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
    public function suratPembimbingKPI()
    {
        return $this->hasOne(SuratPembimbingKPI::class);
    }
    public function suratIzinPenelitian()
    {
        return $this->hasOne(SuratIzinPenelitian::class);
    }
    public function SuratPengusulanTempatKPI()
    {
        return $this->hasOne(SuratPengusulanTempatKPI::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'nim', 'nim');
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
                    case 'pembimbing-kpi':
                        return $this->suratPembimbingKPI;
                    case 'izin-penelitian':
                        return $this->suratIzinPenelitian;
                    case 'aktif-kuliah':
                        return $this->suratKetAktifKuliah;
                    case 'keterangan-lulus':
                        return $this->suratKetLulus;
                    case 'pengusulan-tempat-kpi':
                        return $this->SuratPengusulanTempatKPI;
                    case 'keabsahan-data':
                        return $this->suratKeabsahanData;
                    default:
                        return null;
                }
            }
        );
    }
}
