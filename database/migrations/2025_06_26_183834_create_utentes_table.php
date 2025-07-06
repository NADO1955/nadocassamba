<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUtentesTable extends Migration
{
    public function up()
    {
        Schema::create('utentes', function (Blueprint $table) {
            $table->id(); // Chave primária

            $table->string('nome');
            $table->string('email')->unique();
            $table->string('password'); // CAMPO ESSENCIAL PARA LOGIN
            $table->string('telefone')->nullable();

            $table->string('genero')->nullable(); // Masculino, Feminino, Outro
            $table->date('data_nascimento')->nullable();
            $table->string('endereco')->nullable();

            // Adicionando o campo 'bi'
            $table->string('bi')->unique();  // Bi obrigatório e único
            $table->string('documento_identificacao')->nullable();
            $table->string('numero_documento')->nullable();

            $table->text('historia_familiar')->nullable();
            $table->text('boletim_vacinas')->nullable();
            $table->text('observacoes')->nullable();

            $table->timestamps(); // created_at e updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('utentes');
    }
}

