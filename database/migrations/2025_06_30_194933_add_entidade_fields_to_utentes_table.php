<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('utentes', function (Blueprint $table) {
            $table->string('entidade_financeira')->nullable()->after('endereco');
            $table->string('numero_utente_entidade')->nullable()->after('entidade_financeira');
        });
    }

    public function down(): void
    {
        Schema::table('utentes', function (Blueprint $table) {
            $table->dropColumn(['entidade_financeira', 'numero_utente_entidade']);
        });
    }
};
