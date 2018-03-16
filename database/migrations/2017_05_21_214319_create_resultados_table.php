<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResultadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('resultados', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer('edicao_id')->unsigned();
            $table->foreign('edicao_id')->references('id')->on('edicaos');
            $table->integer('pessoa_id')->unsigned();
            $table->foreign('pessoa_id')->references('id')->on('pessoas');
            $table->integer('premio_id')->unsigned();
            $table->foreign('premio_id')->references('id')->on('premios');
            $table->integer('lance_id')->unsigned();
            $table->foreign('lance_id')->references('id')->on('lances');
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
        //
    }
}
