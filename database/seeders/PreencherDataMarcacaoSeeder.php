<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PreencherDataMarcacaoSeeder extends Seeder
{
    public function run()
    {
        DB::table('marcacoes')
            ->whereNull('data_marcacao')
            ->update([
                'data_marcacao' => DB::raw('DATE(created_at)')
            ]);
    }
}
