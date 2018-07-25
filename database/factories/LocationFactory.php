<?php

use Faker\Generator as Faker;

use App\Location;

$factory->define(Location::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'country_id' => function () {
            return factory('App\Country')->create()->id;
        }
    ];
});