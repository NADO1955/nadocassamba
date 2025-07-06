<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddClinicoIdToMarcacoesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('marcacoes', function (Blueprint $table) {
            // Adiciona a coluna clinico_id e a chave estrangeira
            $table->unsignedBigInteger('clinico_id')->nullable()->after('id');

            // Cria chave estrangeira para a tabela clinicos (certifique-se de que a tabela existe)
            $table->foreign('clinico_id')->references('id')->on('clinicos')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('marcacoes', function (Blueprint $table) {
            // Remove a foreign key e a coluna clinico_id
            $table->dropForeign(['clinico_id']);
            $table->dropColumn('clinico_id');
        });
    }
}
