<?php

// use Illuminate\Database\Migrations\Migration;
// use Illuminate\Database\Schema\Blueprint;
// use Illuminate\Support\Facades\Schema;

// class DropRcusTable extends Migration
// {
//     public function up()
//     {
//         Schema::dropIfExists('rcus');
//     }

//     public function down()
//     {
//         Schema::create('rcus', function (Blueprint $table) {
//             $table->id();
//             $table->foreignId('utente_id')->unique()->constrained('utentes')->onDelete('cascade');
//             $table->date('data_registo')->nullable();
//             $table->text('historia_familiar')->nullable();
//             $table->text('boletim_vacinas')->nullable();
//             $table->text('observacoes')->nullable();
//             $table->timestamps();
//         });
//     }
// }

