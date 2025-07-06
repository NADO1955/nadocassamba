<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            EspecialidadesSeeder::class,
            MedicosSeeder::class,
            AdminSeeder::class,
            UtenteSeeder::class, // ✅ Adiciona o seeder de utentes aqui
        ]);
    }
}

