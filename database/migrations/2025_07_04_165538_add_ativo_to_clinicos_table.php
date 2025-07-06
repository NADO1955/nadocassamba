<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAtivoToClinicosTable extends Migration
{
    public function up()
    {
        // Verifica se a coluna não existe antes de tentar criar
        if (!Schema::hasColumn('clinicos', 'ativo')) {
            Schema::table('clinicos', function (Blueprint $table) {
                $table->boolean('ativo')->default(false)->after('email');
            });
        }
    }

    public function down()
    {
        Schema::table('clinicos', function (Blueprint $table) {
            $table->dropColumn('ativo');
        });
    }
}

