<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMarcacoesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('marcacoes', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('utente_id');
            $table->unsignedBigInteger('especialidade_id');
            $table->unsignedBigInteger('medico_id');

            $table->date('data');
            $table->enum('tipo', ['consulta', 'exame']);

            $table->timestamps();

            // Relações com outras tabelas
            $table->foreign('utente_id')->references('id')->on('utentes')->onDelete('cascade');
            $table->foreign('especialidade_id')->references('id')->on('especialidades')->onDelete('cascade');
            $table->foreign('medico_id')->references('id')->on('medicos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('marcacoes');
    }
}
