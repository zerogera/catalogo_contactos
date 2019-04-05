<?php

use Faker\Generator as Faker;

// --- CONTACTO --- ///
$factory->define(\App\Models\Contacto::class, function (Faker $faker) {
    return [
        'nombre' => $faker->firstName,
        'ap_paterno' => $faker->lastName,
        'ap_materno' => $faker->lastName,
        'fecha_nacimiento' => $faker->dateTime,
        'alias' => $faker->userName(10)
    ];
});

// --- EMAIL --- ///
$factory->define(\App\Models\Email::class, function (Faker $faker) {
    return [
        'contacto_id' => \App\Models\Contacto::inRandomOrder()->first()->id,
        'email' => $faker->email
    ];
});

// --- DIRECCION --- ///
$factory->define(\App\Models\Direccion::class, function (Faker $faker) {
    return [
        'contacto_id' => \App\Models\Contacto::inRandomOrder()->first()->id,
        'direccion' => $faker->address
    ];
});

// --- TELEFONO --- ///
$factory->define(\App\Models\Telefono::class, function (Faker $faker) {
    return [
        'contacto_id' => \App\Models\Contacto::inRandomOrder()->first()->id,
        'telefono' => $faker->phoneNumber,
        'descripcion' => $faker->sentence(1)
    ];
});


