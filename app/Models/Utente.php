<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Utente extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'utentes';

    protected $fillable = [
        'nome',
        'email',
        'telefone',
        'genero',
        'data_nascimento',
        'endereco',
        'documento_identificacao',    // BI ou Passaporte
        'numero_documento',           // Número do documento
        'entidade_financeira',        // Ex: ENSA, Fidelidade
        'numero_utente_entidade',     // N.º de utente na entidade
        'password',
        'ativo',                      // Estado (ativo/inativo)
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Um utente tem um registo clínico (RCU).
     */
    public function rcu()
    {
        return $this->hasOne(Rcu::class, 'utente_id');
    }

    /**
     * Um utente pode ter várias marcações.
     */
    public function marcacoes()
    {
        return $this->hasMany(Marcacao::class, 'utente_id');
    }
}

