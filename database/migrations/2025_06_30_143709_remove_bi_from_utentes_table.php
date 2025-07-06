<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveBiFromUtentesTable extends Migration
{
    public function up()
    {
        Schema::table('utentes', function (Blueprint $table) {
            if (Schema::hasColumn('utentes', 'bi')) {
                $table->dropColumn('bi');
            }
        });
    }

    public function down()
    {
        Schema::table('utentes', function (Blueprint $table) {
            $table->string('bi')->unique()->nullable();
        });
    }
}
