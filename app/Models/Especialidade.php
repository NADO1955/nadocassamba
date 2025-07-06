<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Clinico;

class Especialidade extends Model
{
    use HasFactory;

    // Campos que podem ser atribuídos em massa
    protected $fillable = ['nome', 'descricao'];

    // Relação: uma especialidade tem muitos clínicos
    public function clinicos()
    {
        return $this->hasMany(Clinico::class);
    }
}

