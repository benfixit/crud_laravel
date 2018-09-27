<?php

use App\Country;
use App\Film;
use Faker\Generator as Faker;

$factory->define(Film::class, function (Faker $faker) {
    $num = $faker->numberBetween(1, 5);
    $countryIds = Country::pluck('id')->all();
    $name = $faker->unique()->sentence(2);

    return [
        'name' => $name,
        'slug' => create_slug($name),
        'description' => $faker->sentence(240),
        'release_date' => $faker->date(),
        'rating' => $num,
        'ticket_price' => $num * 100,   //The idea is that the ticket price should reflect on the rating
        'country_id' => $faker->randomElement($countryIds),
        'photo' => $faker->image(
            storage_path('app/public/films'), 800, 250, 'abstract', false
        ),
    ];
});