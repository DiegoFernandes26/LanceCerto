<?php

use Illuminate\Database\Seeder;

class PremioTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Premio::truncate();

        factory('App\Premio', 3)->create();
    }
}
