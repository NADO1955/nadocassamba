<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class AlterarFkMarcacoesParaClinicos extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('marcacoes', function (Blueprint $table) {
            // Remover com verificação segura
            if (Schema::hasColumn('marcacoes', 'medico_id')) {
                try {
                    DB::statement('ALTER TABLE marcacoes DROP FOREIGN KEY marcacoes_medico_id_foreign');
                } catch (\Throwable $e) {
                    // Ignora se já não existir
                }
            }

            // Adiciona nova foreign key para clinicos(id)
            $table->foreign('medico_id')
                ->references('id')
                ->on('clinicos')
                ->onDelete('cascade')
                ->onUpdate('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('marcacoes', function (Blueprint $table) {
            // Remover a foreign key para clinicos
            if (Schema::hasColumn('marcacoes', 'medico_id')) {
                try {
                    DB::statement('ALTER TABLE marcacoes DROP FOREIGN KEY marcacoes_medico_id_foreign');
                } catch (\Throwable $e) {
                    // Ignora se não existir
                }
            }

            // Restaura a foreign key original para medicos(id)
            $table->foreign('medico_id')
                ->references('id')
                ->on('medicos')
                ->onDelete('cascade')
                ->onUpdate('restrict');
        });
    }
}
