<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use Notifiable;

    // Campos que podem ser preenchidos em massa
    protected $fillable = [
        'nome',
        'email',
        'password',
    ];

    // Campos ocultos na serialização
    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Conversões de tipo
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}

