<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medico extends Model
{
    use HasFactory;

    // Exemplo de estrutura básica
    protected $table = 'medicos';

    protected $fillable = [
        'nome',
        'email',
        'especialidade_id',
        // outros campos...
    ];

    public function especialidade()
    {
        return $this->belongsTo(Especialidade::class);
    }
}
