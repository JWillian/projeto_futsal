<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  
    public function up()
    {
        Schema::create('partidas', function (Blueprint $table) {
            $table->id();
            $table->date('data');
            $table->time('horario_inicio');
            $table->time('horario_termino');
            $table->string('time_1');
            $table->string('time_2');
            $table->integer('placar_time_1');
            $table->integer('placar_time_2');
            $table->timestamps();

            $table->foreign('time1_id')->references('id')->on('times');
            $table->foreign('time2_id')->references('id')->on('times');
        });
    }

    public function down()
    {
        Schema::dropIfExists('partidas');
    }
};
