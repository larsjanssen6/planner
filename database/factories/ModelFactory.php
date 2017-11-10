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

$factory->define(App\Domain\User::class, function (Faker $faker) {
    static $password;

    return [
        'name' => $faker->firstName(),
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
        'last_name' => $faker->lastName,
        'birthday' => $faker->date(),
        'gender' => $faker->randomDigit,
    ];
});

$factory->define(App\Domain\Category::class, function (Faker $faker) {
    return [
        'name' => $faker->firstName(),
        'type' => $faker->firstName(),
    ];
});

$factory->define(App\Domain\Vehicle::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'category_id' => Factory(App\Domain\Category::class)->create()->id,
        'maintenance_interval' => $faker->randomDigitNotNull,
        'maintenance_duration' => $faker->randomDigitNotNull,
        'count' => $faker->randomDigitNotNull,
    ];
});

$factory->define(App\Domain\Education::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'duration' => $faker->randomDigitNotNull,
        'category_id' => Factory(App\Domain\Category::class)->create()->id,
        'required_students' => $faker->randomDigitNotNull,
        'required_instructors' => $faker->randomDigitNotNull
    ];
});

$factory->define(App\Domain\Group::class, function (Faker $faker) {
    return [
        'name' => $faker->numerify("Group ##"),
        'peleton_id' => Factory(App\Domain\Peleton::class)->create()->id,
    ];
});

$factory->define(App\Domain\Peleton::class, function (Faker $faker) {
    return [
        'name' => $faker->numerify("Peleton ##"),
    ];
});