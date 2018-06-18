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
    return array(
        'name' => $faker->name,
        'isadmin'=>$faker->regexify('[0,1]'),
        'email' => $faker->unique()->safeEmail,
        'holiday_allowance' => $faker->numberBetween(30,32),
        'holiday_taken' =>$faker->numberBetween(2,30),
        'comment' =>$faker->text(1000),
        'role'  =>$faker->text(255),
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
    );
});
