<?php

use Illuminate\Database\Seeder;

class LancesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Lances::truncate();

        factory('App\Lances', 20)->create();
    }
}
