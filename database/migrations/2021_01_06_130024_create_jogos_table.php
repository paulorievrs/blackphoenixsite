<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJogosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jogos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nomeDoTime');
            $table->date('diaDoJogo');
            $table->time('horaDoJogo');
            $table->string('linkParaAssistir')->nullable();
            $table->string('logoDoTime')->nullable();
            $table->integer('resultadoBlackPhoenix')->nullable();
            $table->integer('resultadoDoTime')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jogos');
    }
}
