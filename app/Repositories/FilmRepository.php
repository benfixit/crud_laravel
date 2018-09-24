<?php
/**
 * Created by PhpStorm.
 * User: emeka
 * Date: 9/22/18
 * Time: 6:09 PM
 */

namespace App\Repositories;

use App\Film;

class FilmRepository
{
    public function save(array $data): int
    {
        $data['slug'] = create_slug($data['name']);
        $genres = $data['genre'];
        unset($data['genre']);

        if($film = Film::create($data)) {
            $film->genres()->sync($genres);
        }

        return (int) $film->id;   //Could return slug here but id is better
    }
}