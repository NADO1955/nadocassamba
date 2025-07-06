<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Medico;
use App\Models\Especialidade;

class MedicosSeeder extends Seeder
{
    public function run()
    {
        $dados = [
            ['nome' => 'Dr. Bernardo Cassamba',    'especialidade' => 'Cardiologia', 'email' => 'Bernardocassamba@gmail.com'],
            ['nome' => 'Dra. Anária Dias',  'especialidade' => 'Pediatria',    'email' => 'Anariadias@gmail.com'],
            ['nome' => 'Dr. André Rita', 'especialidade' => 'Ortopedia',    'email' => 'AndreRira@gmail.com'],
            ['nome' => 'Dra. Luzia Venancio',   'especialidade' => 'Ginecologia',  'email' => 'Luziavenancio@gmail.com'],
            ['nome' => 'Dr. Miguel Santos', 'especialidade' => 'Neurologia',   'email' => 'miguel.santos@example.com'],
        ];

        foreach ($dados as $dado) {
            $especialidade = Especialidade::where('nome', $dado['especialidade'])->first();

            if ($especialidade) {
                Medico::updateOrCreate(
                    ['email' => $dado['email']], // Critério de unicidade
                    [
                        'nome'             => $dado['nome'],
                        'especialidade_id' => $especialidade->id,
                    ]
                );
            }
        }
    }
}
