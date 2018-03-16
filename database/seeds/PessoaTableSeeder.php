<?php

use Illuminate\Database\Seeder;

class PessoaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Pessoa::truncate();

        factory('App\Pessoa', 15)->create();
    }
}
