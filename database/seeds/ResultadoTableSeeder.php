<?php

use Illuminate\Database\Seeder;

class ResultadoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Resultado::truncate();

        factory('App\Resultado', 3)->create();
    }
}
