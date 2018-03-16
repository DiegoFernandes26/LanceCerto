<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'cpf' => $faker->randomNumber(9),
        'tipo' => $faker->randomElement(['admin','consultor']),
        'status' => $faker->randomElement(['0','1','2']),
        'celular' => $faker->phoneNumber,
        'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10)
    ];
});

$factory->define(App\Pessoa::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'cpf' => $faker->randomNumber(9),
        'rg' => $faker->randomNumber(8),
        'celular' => $faker->phoneNumber,
        'email' => $faker->safeEmail,
        'user_id' => $faker->randomNumber(1)
    ];
});

$factory->define(App\Lances::class, function (Faker\Generator $faker) {
    return [
        'valor_lance' => $faker->randomFloat(3),
        'num_card' => $faker->randomNumber(5),
        'user_id' => $faker->randomNumber(2),
        'pessoa_id' => $faker->randomNumber(2),
        'edicao_id' => $faker->randomNumber(1)
    ];
});

$factory->define(App\Premio::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->randomElement(['Maquina de lava', 'carro', 'iphone 8', 'moto', 'tv 55" smart']),
        'marca' => $faker->randomElement(['eletrolux', 'chevrolet', 'apple', 'honda', 'sansung']),
        'descricao' =>$faker->sentence,
        'preco' => $faker->randomFloat(),
        'user_id' => $faker->randomNumber(2)
        ];
});

$factory->define(App\Edicao::class, function (Faker\Generator $faker) {
    return [
        'numero' => $faker->randomElement(['1', '2', '3', '4', '5', '6', '7', '8', '9', '10']),
        'name' => $faker->sentence,
        'dt_apuracao' => '2017/05/28 20:30:00',
        'user_id' => $faker->randomNumber(2)
    ];
});

$factory->define(App\Endereco::class, function (Faker\Generator $faker) {
    return [
        'cep' => '69.909-202',
        'endereco' => $faker->streetName,
        'bairro' => $faker->word,
        'cidade' => $faker->city,
        'estado' => $faker->randomElement(['AC','RO','RJ','MT','AM','TO','RR','AP','SP','SC']),
        'complemento' => $faker->paragraph
    ];
});

$factory->define(App\Resultado::class, function (Faker\Generator $faker) {
    return [
        'user_id' => $faker->randomNumber(2),
        'pessoa_id' => $faker->randomNumber(2),
        'edicao_id' => $faker->randomNumber(1),
        'premio_id' => $faker->randomNumber(1),
        'lance_id' => $faker->randomFloat(3)

    ];
});
