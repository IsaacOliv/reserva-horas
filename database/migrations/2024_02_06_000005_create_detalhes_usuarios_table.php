<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetalhesUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalhes_usuarios', function (Blueprint $table) {
            $table->increments('id');
            $table->string('sobrenome')->nullable();
            $table->string('imagem_time')->nullable();
            $table->string('cpf', 14);
            $table->string('telefone', 14);
            $table->string('endereco')->nullable();
            $table->date('dt_nascimento');
            $table->unsignedBigInteger('id_usuario');
            $table->timestamps();

            $table->foreign('id_usuario')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detalhes_usuarios');
    }
}
