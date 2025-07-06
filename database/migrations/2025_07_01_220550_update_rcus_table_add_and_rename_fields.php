<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateRcusTableAddAndRenameFields extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('rcus', function (Blueprint $table) {
            // Adicionar novos campos se não existirem
            if (!Schema::hasColumn('rcus', 'historia_familiar')) {
                $table->text('historia_familiar')->nullable()->after('historico_medico');
            }

            if (!Schema::hasColumn('rcus', 'boletim_vacinas')) {
                $table->text('boletim_vacinas')->nullable()->after('medicamentos_atuais');
            }

            // Renomear o campo medicamentos_atuais para medicacoes_atuais
            if (Schema::hasColumn('rcus', 'medicamentos_atuais')) {
                $table->renameColumn('medicamentos_atuais', 'medicacoes_atuais');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('rcus', function (Blueprint $table) {
            // Reverter o nome do campo
            if (Schema::hasColumn('rcus', 'medicacoes_atuais')) {
                $table->renameColumn('medicacoes_atuais', 'medicamentos_atuais');
            }

            // Remover os campos adicionados
            if (Schema::hasColumn('rcus', 'historia_familiar')) {
                $table->dropColumn('historia_familiar');
            }

            if (Schema::hasColumn('rcus', 'boletim_vacinas')) {
                $table->dropColumn('boletim_vacinas');
            }
        });
    }
}

