<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRcusTable extends Migration
{
    /**
     * Executa a migração: cria a tabela 'rcus' (Registo Clínico do Utente).
     */
    public function up(): void
    {
        Schema::create('rcus', function (Blueprint $table) {
            $table->id();

            // Chave estrangeira única para ligação 1:1 com a tabela 'utentes'
            $table->foreignId('utente_id')
                  ->unique()
                  ->constrained('utentes')
                  ->onDelete('cascade');

            // Campos clínicos
            $table->text('historico_medico')->nullable()->comment('Doenças anteriores, cirurgias, etc.');
            $table->text('alergias')->nullable()->comment('Reacções alérgicas conhecidas.');
            $table->text('medicamentos_atuais')->nullable()->comment('Medicamentos que o utente está a tomar.');
            $table->text('historia_familiar')->nullable()->comment('Histórico de saúde da família.');
            $table->text('boletim_vacinas')->nullable()->comment('Vacinas recebidas.');
            $table->text('observacoes')->nullable()->comment('Notas adicionais do clínico.');

            $table->timestamps(); // created_at e updated_at
        });
    }

    /**
     * Reverte a migração: elimina a tabela 'rcus'.
     */
    public function down(): void
    {
        Schema::dropIfExists('rcus');
    }
}
