<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
    use HasFactory;

    protected $fillable = [
        'clinico_id',
        'data',
        'hora_inicio',
        'hora_fim',
    ];

    public function clinico()
    {
        return $this->belongsTo(Clinico::class);
    }
}
