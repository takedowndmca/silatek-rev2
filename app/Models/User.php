<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'nim',
        'nama',
        'email',
        'password',
        'prodi_id',
        'no_telp',
        'angkatan',
    ];

    public function prodi(): BelongsTo
    {
        return $this->belongsTo(Prodi::class, 'prodi_id');
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'terverifikasi' => 'boolean',
        ];
    }

    public function checkPassword(string $password): bool
    {
        return password_verify($password, $this->password);
    }

    public function pengajuan()
    {
        return $this->hasMany(Pengajuan::class);
    }
}
