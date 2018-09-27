<?php

use App\Genre;
use Faker\Generator as Faker;

$factory->define(Genre::class, function (Faker $faker) {
    $movieGenres = ['Thriller', 'Horror', 'Sci-Fi', 'Romance', 'Family'];
    return [
        'name' => $faker->unique()->randomElement($movieGenres),
    ];
});
