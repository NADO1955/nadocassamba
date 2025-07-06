<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicosTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('medicos', function (Blueprint $table) {
            $table->id(); // Chave primária
            $table->string('nome');
            $table->string('email')->unique();
            $table->string('telefone')->nullable();

            // Correção: relação com tabela 'especialidades'
            $table->unsignedBigInteger('especialidade_id');
            $table->foreign('especialidade_id')
                  ->references('id')
                  ->on('especialidades')
                  ->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('medicos');
    }
}

