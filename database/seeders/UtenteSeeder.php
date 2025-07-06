<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Utente;
use App\Models\RCU;
use Illuminate\Support\Facades\Hash;

class UtenteSeeder extends Seeder
{
    public function run(): void
    {
        $utentes = [
            [
                'nome' => 'Joana Manuel',
                'email' => 'joana@example.com',
                'telefone' => '923456789',
                'genero' => 'F',
                'data_nascimento' => '1995-08-20',
                'endereco' => 'Huambo',
                'documento_identificacao' => 'BI',
                'numero_documento' => '002345678LA045',
                'entidade_financeira' => 'ENSA',
                'numero_utente_entidade' => 'UT123456',
                'password' => Hash::make('senha123'),
                'ativo' => true,
            ],
            [
                'nome' => 'Carlos Mateus',
                'email' => 'carlos@example.com',
                'telefone' => '922223344',
                'genero' => 'M',
                'data_nascimento' => '1988-03-15',
                'endereco' => 'Benguela',
                'documento_identificacao' => 'Passaporte',
                'numero_documento' => 'P00998877',
                'entidade_financeira' => 'Fidelidade',
                'numero_utente_entidade' => 'FID99887',
                'password' => Hash::make('senha123'),
                'ativo' => true,
            ],
            [
                'nome' => 'Laura Pinto',
                'email' => 'laura@example.com',
                'telefone' => '924567890',
                'genero' => 'F',
                'data_nascimento' => '2000-11-10',
                'endereco' => 'Lubango',
                'documento_identificacao' => 'BI',
                'numero_documento' => '004412235HH78',
                'entidade_financeira' => 'Mutue',
                'numero_utente_entidade' => 'MT123900',
                'password' => Hash::make('senha123'),
                'ativo' => true,
            ],
        ];

        foreach ($utentes as $utenteData) {
            $utente = Utente::create($utenteData);

            // Criar RCU associado
            RCU::create([
                'utente_id' => $utente->id,
                'grupo_sanguineo' => 'O+',
                'historico_medico' => 'Sem histórico relevante.',
                'alergias' => 'Nenhuma conhecida.',
                'medicacoes_atuais' => 'Nenhuma.',
                'historia_familiar' => 'Hipertensão na família.',
                'boletim_vacinas' => 'Vacinas em dia.',
                'diagnostico' => null,
                'tratamento' => null,
                'observacoes' => 'Criado automaticamente pelo seeder.',
            ]);
        }
    }
}
