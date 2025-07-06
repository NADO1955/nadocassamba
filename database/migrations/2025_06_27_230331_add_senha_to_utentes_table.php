<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSenhaToUtentesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('utentes', function (Blueprint $table) {
            $table->string('senha'); // ✅ Adiciona a coluna 'senha'
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('utentes', function (Blueprint $table) {
            $table->dropColumn('senha'); // ✅ Remove a coluna caso se faça rollback
        });
    }
}
