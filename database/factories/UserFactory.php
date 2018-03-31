<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(\WebSisMap\Models\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
    ];
});

$factory->state(\WebSisMap\Models\User::class, 'cliente', function (Faker $faker){
   return[
       'role' => \WebSisMap\Models\User::ROLE_CLIENTE,
   ];
});

$factory->state(\WebSisMap\Models\User::class, 'operador', function (Faker $faker){
    return[
        'role' => \WebSisMap\Models\User::ROLE_OPERADOR,
    ];
});

$factory->define(\WebSisMap\Models\Empre::class, function (Faker $faker){
    return[
        'nome' => $faker->company,
        'fantasia' => $faker->company,
        'cnpj' => $faker->numerify('##.###.###/0001-##'),
        'email' => $faker->email,
        'tel' => $faker->phoneNumber,
        'site' => $faker->domainName,
        'end' => $faker->streetName,
        'num' => $faker->numerify('###'),
        'bairro' => $faker->domainWord,
        'cep' => $faker->postcode,
        'cidade' => $faker->city,
        'uf' => $faker->citySuffix,
        'und_princ' => 'Campus',
        'und_sub1' => 'Departamento',
        'und_sub2' => 'Predio',
        'und_sub3' => 'Sala'
    ];
});

$factory->define(\WebSisMap\Models\Predio::class, function (Faker $faker){
    return [
        'nome' => $faker->unique->word,
        'localiz' => $faker->address,
        'empre_id' => 1
    ];
});
$factory->define(\WebSisMap\Models\Setor::class, function (Faker $faker){
    return [
        'nome' => $faker->unique()->words(2, true),
    ];
});