<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Kaprodi extends Authenticatable
{
    use Notifiable;

    protected $table = 'kaprodi';

    protected $fillable = [
        'nuptk',
        'nama',
        'email',
        'password',
        'prodi_id',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'password' => 'hashed',
        ];
    }

    public function checkPassword($password)
    {
        return password_verify($password, $this->password);
    }

    public function prodi()
    {
        return $this->belongsTo(Prodi::class);
    }
}
