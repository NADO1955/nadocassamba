<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRememberTokenToUtentesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('utentes', function (Blueprint $table) {
            $table->rememberToken()->nullable()->after('password'); // adiciona o campo
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('utentes', function (Blueprint $table) {
            $table->dropColumn('remember_token');
        });
    }
}
