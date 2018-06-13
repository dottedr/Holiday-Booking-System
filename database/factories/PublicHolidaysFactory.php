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

$factory->define(App\PublicHoliday::class, function (Faker $faker) {
    return array(
        'title' => $faker->word,
        'start' => $faker->dateTimeBetween($startDate = '-1 year', $endDate = 'now', $timezone = null),
        'end' => $faker->$startDate = '-1 year', $endDate = 'now', $timezone = null,
        'color' => $faker->hexColor(),
        'duration' => $faker->numberBetween(1,3)
    );
});
