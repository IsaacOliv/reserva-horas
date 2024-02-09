<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHorarioReservadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('horario_reservados', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_horario');
            $table->unsignedInteger('id_usuario');
            $table->timestamps();

            $table->foreign('id_horario')->references('id')->on('horarios');
            $table->foreign('id_usuario')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('horario_reservados');
    }
}
