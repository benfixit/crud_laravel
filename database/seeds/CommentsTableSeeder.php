<?php

use Carbon\Carbon;
use App\Film;
use App\User;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommentsTableSeeder extends Seeder
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
        $userIds = User::pluck('id')->all();
        $count = count($filmIds);
        $time = Carbon::now();

        for ($i = 0; $i < $count ; $i++) {
            DB::table('comments')->insert([
                'film_id' => $filmIds[$i],
                'user_id' => $userIds[$i],
                'content' => $faker->sentence,
                'created_at' => $time,
                'updated_at' => $time,
            ]);
        }
    }
}
