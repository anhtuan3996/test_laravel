<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use Faker\Generator as Faker;
use Illuminate\Support\Str;

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


$factory->define(\App\Model\Nation::class, function (Faker $faker) {
    $country = $faker->unique()->countryCode.time();
    return [
        'name' => $faker->country,
        'code' => $country
    ];
});

$factory->define(\App\Model\City::class, function ($faker) {
    return [
        'name' => $faker->city,
        'code' => $faker->randomDigit,
        'nation_id' => factory(\App\Model\Nation::class),
    ];
});

$factory->define(\App\Model\District::class, function ($faker) {
    return [
        'name' => $faker->state,
        'code' => $faker->randomDigit,
        'city_id' => factory(\App\Model\City::class),
    ];
});

$factory->define(\App\Model\Commune::class, function ($faker) {
    return [
        'name' => $faker->address,
        'code' => $faker->unique()->randomDigit,
        'district_id' => factory(\App\Model\District::class),
    ];
});
