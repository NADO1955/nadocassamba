<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCamposPublicosToRcusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('rcus', function (Blueprint $table) {
            if (!Schema::hasColumn('rcus', 'diagnostico')) {
                $table->text('diagnostico')->nullable()->after('boletim_vacinas');
            }
            if (!Schema::hasColumn('rcus', 'tratamento')) {
                $table->text('tratamento')->nullable()->after('diagnostico');
            }
            if (!Schema::hasColumn('rcus', 'observacoes')) {
                $table->text('observacoes')->nullable()->after('tratamento');
            }
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
            if (Schema::hasColumn('rcus', 'diagnostico')) {
                $table->dropColumn('diagnostico');
            }
            if (Schema::hasColumn('rcus', 'tratamento')) {
                $table->dropColumn('tratamento');
            }
            if (Schema::hasColumn('rcus', 'observacoes')) {
                $table->dropColumn('observacoes');
            }
        });
    }
}
