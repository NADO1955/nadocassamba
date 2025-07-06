<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marcacao extends Model
{
    use HasFactory;

    protected $table = 'marcacoes';

    protected $fillable = [
        'utente_id',
        'especialidade_id',
        'medico_id',
        'data',
        'tipo',
    ];

    public function utente()
    {
        return $this->belongsTo(Utente::class);
    }

    public function especialidade()
    {
        return $this->belongsTo(Especialidade::class);
    }

    public function medico()
    {
        return $this->belongsTo(Medico::class, 'medico_id');
    }

    // ✅ Alias opcional
    public function clinico()
    {
        return $this->medico();
    }
}


