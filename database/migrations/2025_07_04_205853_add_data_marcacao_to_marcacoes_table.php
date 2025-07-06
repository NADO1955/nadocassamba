<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDataMarcacaoToMarcacoesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('marcacoes', function (Blueprint $table) {
            $table->date('data_marcacao')->nullable()->after('utente_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('marcacoes', function (Blueprint $table) {
            $table->dropColumn('data_marcacao');
        });
    }
}

