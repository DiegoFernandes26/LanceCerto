<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

//        //$this->call(UserTableSeeder::class);
//        $this->call(EdicaoTableSeeder::class);
//        $this->call(EnderecoTableSeeder::class);
//        $this->call(LancesTableSeeder::class);
//        $this->call(PessoaTableSeeder::class);
//        $this->call(ResultadoTableSeeder::class);
//        $this->call(PremioTableSeed::class);

        factory('App\User')->create(
            [
                'name' => 'Diego Fernandes',
                'tipo' => 'admin',
                'status' => 1,
                'celular' => 99869962,
                'email' => 'diegotkac@gmail.com',
                'password' => bcrypt(1234567),
                'remember_token' => str_random(10)
            ]
        );

        factory('App\User')->create(
            [
                'name' => 'Francisco Passos',
                'tipo' => 'admin',
                'status' => 1,
                'celular' => 99998888,
                'email' => 'passos.27@gmail.com',
                'password' => bcrypt(1234567),
                'remember_token' => str_random(10)
            ]
        );

        Model::reguard();
    }
}
