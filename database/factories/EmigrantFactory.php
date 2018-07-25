<?php

use Faker\Generator as Faker;

use App\Emigrant;

$factory->define(Emigrant::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'surname' => $faker->lastName,
        'gender' => $faker->randomElement(['M', 'W']),
        'occupation' => $faker->word,
        'marital_status' => $faker->randomElement(['S', 'M', 'W', 'U']),
        'age' => random_int(1, 99),
        'address' => $faker->address,
        'apple' => $faker->word,
        'other_information' => $faker->sentence(),
        'documentary_source' => $faker->sentence(),
        'year_of_documentation' => $faker->year(),
        'year_of_birth' => $faker->year(),
        'location_of_birth_id' => function () {
            return factory('App\Location')->create()->id;
        },
        'location_id' => function () {
            return factory('App\Location')->create()->id;
        }
    ];
});