<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClinicosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clinicos', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('telefone')->nullable(); // ✅ campo usado nos formulários
            $table->unsignedBigInteger('especialidade_id'); // ✅ referência à tabela especialidades
            $table->boolean('ativo')->default(true); // ✅ permite ativar/desativar
            $table->string('horario_atendimento')->nullable(); // Ex: "Seg-Sex 08:00-16:00"
            $table->rememberToken();
            $table->timestamps();

            // ✅ Chave estrangeira
            $table->foreign('especialidade_id')->references('id')->on('especialidades')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clinicos');
    }
}
