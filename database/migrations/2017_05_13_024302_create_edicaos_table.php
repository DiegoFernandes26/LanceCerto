<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEdicaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('edicaos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('numero')->unique();
            $table->string('name');
            $table->date('dt_apuracao');
            $table->time('hora_apuracao');
            $table->string('tiragem_min');
            $table->string('tiragem_max');
            $table->string('valor_card');
            $table->string('valor_comissao');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::drop('edicaos');
    }
}
