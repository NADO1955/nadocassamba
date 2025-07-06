<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Especialidade;

class EspecialidadesSeeder extends Seeder
{
    public function run()
    {
        $especialidades = [
            'Cardiologia',
            'Pediatria',
            'Ginecologia',
            'Ortopedia',
            'Neurologia'
        ];

        foreach ($especialidades as $nome) {
            Especialidade::firstOrCreate(['nome' => $nome]);
        }
    }
}
