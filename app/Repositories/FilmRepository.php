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
    protected $entity;

    public function __construct(Film $film)
    {
        $this->entity = $film;
    }

    public function save(array $data): bool
    {
        $this->entity->name = $data['user_id'];
        $this->entity->description = $data['film_id'];
        $this->entity->release_date = $data['content'];
        $this->entity->rating = $data['user_id'];
        $this->entity->ticket_price = $data['film_id'];
        $this->entity->country = $data['content'];
        $this->entity->genre = $data['genre'];
        //handle files
        //$this->entity->photo = $data['photo'];

        return $this->entity->save($data);
    }
}