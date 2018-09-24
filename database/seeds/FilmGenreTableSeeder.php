<?php

use Carbon\Carbon;
use App\Film;
use App\Genre;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FilmGenreTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        $filmIds = Film::pluck('id')->all();
        $genreIds = Genre::pluck('id')->all();
        $time = Carbon::now();

        for ($i = 0; $i < 12; $i++) {                   //Create 12 records
            DB::table('film_genre')->insert([
                'film_id' => $faker->randomElement($filmIds),
                'genre_id' => $faker->randomElement($genreIds),
                'created_at' => $time,
                'updated_at' => $time,
            ]);
        }
    }
}
