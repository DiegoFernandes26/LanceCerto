<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGanhadorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ganhadors', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('rg', 14);
            $table->string('celular',20);
            $table->string('email');
            $table->string('num_card');
            $table->string('lance');
            $table->string('premio_id');
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
        //
    }
}
