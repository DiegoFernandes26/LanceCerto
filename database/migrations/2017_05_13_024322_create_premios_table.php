<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePremiosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('premios', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('marca');
            $table->string('modelo');
            $table->string('descricao', 500);
            $table->float('preco');
            $table->string('img_caminho');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer('edicao_id')->unsigned();
            $table->foreign('edicao_id')->references('id')->on('edicaos');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('premios');
    }
}
