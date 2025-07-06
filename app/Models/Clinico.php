<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Clinico extends Authenticatable
{
    use Notifiable;

    protected $guard = 'clinico';

    protected $fillable = [
        'nome',
        'email',
        'telefone',               // ✅ presente na migration
        'ativo',                  // ✅ presente na migration
        'password',
        'especialidade_id',       // ✅ CORREÇÃO AQUI
        'horario_atendimento',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    // ✅ Relação com Especialidade (opcional, mas recomendada)
    public function especialidade()
    {
        return $this->belongsTo(Especialidade::class);
    }
}
