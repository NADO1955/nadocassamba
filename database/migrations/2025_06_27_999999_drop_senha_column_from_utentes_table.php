<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('utentes', function (Blueprint $table) {
            if (Schema::hasColumn('utentes', 'senha')) {
                $table->dropColumn('senha');
            }
        });
    }

    public function down()
    {
        Schema::table('utentes', function (Blueprint $table) {
            if (!Schema::hasColumn('utentes', 'senha')) {
                $table->string('senha')->nullable(); // ou ->string('senha')->notNullable() conforme necessário
            }
        });
    }
};


