<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateRcusAddGrupoSanguineo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('rcus', function (Blueprint $table) {
            $table->string('grupo_sanguineo')->nullable()->after('utente_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('rcus', function (Blueprint $table) {
            $table->dropColumn('grupo_sanguineo');
        });
    }
}
