<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddHorarioToClinicosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('clinicos', function (Blueprint $table) {
            $table->date('data_inicio')->nullable()->after('telefone');
            $table->time('hora_inicio')->nullable()->after('data_inicio');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('clinicos', function (Blueprint $table) {
            $table->dropColumn(['data_inicio', 'hora_inicio']);
        });
    }
}
