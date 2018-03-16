<?php

use Illuminate\Database\Seeder;

class EnderecoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Endereco::truncate();

        factory('App\Endereco', 15)->create();
    }
}
