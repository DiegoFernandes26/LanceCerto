<?php

use Illuminate\Database\Seeder;

class EdicaoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Edicao::truncate();

        factory('App\Edicao', 4)->create();
    }
}
