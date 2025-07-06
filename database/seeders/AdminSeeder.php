<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        Admin::updateOrCreate(
            ['email' => 'Bernardocassamba@gmail.com'],
            [
                'nome' => 'NADO CASSAMBA', // <- corrigido aqui
                'password' => Hash::make('1955'),
            ]
        );
    }
}
