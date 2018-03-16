<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lances', function (Blueprint $table) {
            $table->increments('id');
            $table->float('valor_lance');
            $table->string('num_card');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer('pessoa_id')->unsigned();
            $table->foreign('pessoa_id')->references('id')->on('pessoas');
            $table->integer('edicao_id')->unsigned();
            $table->foreign('edicao_id')->references('id')->on('edicaos');
            $table->integer('premio_id')->unsigned();
            $table->foreign('premio_id')->references('id')->on('premios');
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
