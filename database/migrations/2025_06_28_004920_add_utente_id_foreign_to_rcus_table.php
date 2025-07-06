<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUtenteIdForeignToRcusTable extends Migration
{
    public function up()
    {
        // Verifica fora do Schema::table se a coluna não existe
        if (!Schema::hasColumn('rcus', 'utente_id')) {
            Schema::table('rcus', function (Blueprint $table) {
                $table->unsignedBigInteger('utente_id')->nullable();
            });
        }

        // Adiciona a foreign key com nome explícito
        Schema::table('rcus', function (Blueprint $table) {
            $table->foreign('utente_id', 'fk_rcus_utente_id')
                ->references('id')
                ->on('utentes')
                ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('rcus', function (Blueprint $table) {
            $table->dropForeign('fk_rcus_utente_id'); // nome da constraint personalizada
        });
    }
}

