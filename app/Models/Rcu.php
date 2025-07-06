<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rcu extends Model
{
    use HasFactory;

    protected $table = 'rcus';

    protected $fillable = [
        'utente_id',
        'grupo_sanguineo',
        'historico_medico',
        'historia_familiar',
        'alergias',
        'medicacoes_atuais',
        'boletim_vacinas',
        'observacoes',
    ];

    public function utente()
    {
        return $this->belongsTo(Utente::class);
    }
}
