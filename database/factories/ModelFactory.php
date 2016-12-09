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

$factory->define(Bookie\Models\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => bcrypt('secret'),
    ];
});

$factory->define(Bookie\Models\CarType::class, function (Faker\Generator $faker) {
    return [
        'manufacturer' => $faker->company,
        'model' => $faker->bothify($faker->word() . ' ??#'),
        'description' => $faker->paragraph(),
    ];
});

$factory->define(Bookie\Models\Car::class, function (Faker\Generator $faker) {
    return [
        'user_id' => $faker->numberBetween(1, 30),
        'cartype_id' => $faker->numberBetween(1, 40),
    ];
});

$factory->define(Bookie\Models\Rental::class, function (Faker\Generator $faker) {
    return [
        'user_id' => $faker->numberBetween(1, 30),
        'car_id' => $faker->unique()->numberBetween(1, 40),
    ];
});