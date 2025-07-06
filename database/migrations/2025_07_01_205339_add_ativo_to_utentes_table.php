<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAtivoToUtentesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('utentes', function (Blueprint $table) {
            $table->boolean('ativo')->default(true)->after('telefone'); // ou ajusta a posição conforme quiseres
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
            $table->dropColumn('ativo');
        });
    }
}
