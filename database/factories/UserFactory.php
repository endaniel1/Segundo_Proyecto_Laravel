<?php

use App\User; //aqui llamamos a el model de usuario para usarlo
use Faker\Generator as Faker;

//y aqui se llama a el

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
/*//
$factory->define(App\User::class, function (Faker $faker) {
return [
'name' => $faker->name,
'email' => $faker->unique()->safeEmail,
'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
'remember_token' => str_random(10),
];
});
 */
//AQUI CREAMO UN FACTORY
//utilizamos la varible $factory q viene del modelo Faker arriba defido
//para definer un factoy se uitiliza el metodo define q resive como parametro
//el nombre del modelo c utilizaremos las clases y como segundo parametro un funcion con una varible Faker
//esta funcion retornara un array con el nombre de las colunmas de nuestra table y q se le asignara el valor de la varible $faker q es la q se encarga de hacer el registro aletorio
$factory->define(User::class, function (Faker $faker) {
    return [
        "name"     => $faker->name,
        "email"    => $faker->unique()->email,
        "password" => bcrypt("123456"),
    ];

});