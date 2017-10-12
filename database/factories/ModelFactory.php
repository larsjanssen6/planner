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

$factory->define(App\User::class, function (Faker $faker) {
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

//factory(App\Category::class, 100)->create();
$factory->define(App\Category::class, function (Faker $faker) {
    return [
        'name' => $faker->firstName(),
        'type' => $faker->firstName(),
    ];
});

$factory->define(App\Vehicle::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'category_id' => Factory(App\Category::class)->create()->id,
        'maintenance_interval' => $faker->randomDigitNotNull,
        'maintenance_duration' => $faker->randomDigitNotNull,
    ];
});

$factory->define(App\Education::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'duration' => $faker->randomDigitNotNull,
        'category_id' => Factory(App\Category::class)->create()->id,
        'required_students' => $faker->randomDigitNotNull,
        'required_instructors' => $faker->randomDigitNotNull,
        'vehicle_id' => Factory(App\Vehicle::class)->create()->id,
    ];
});

$factory->define(App\Group::class, function (Faker $faker) {
    return [
        'name' => $faker->numerify("Group ##"),
    ];
});

$factory->define(App\Peleton::class, function (Faker $faker) {
    return [
        'name' => $faker->numerify("Peleton ?"),
    ];
});

