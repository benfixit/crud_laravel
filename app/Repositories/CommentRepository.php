<?php
/**
 * Created by PhpStorm.
 * User: emeka
 * Date: 9/22/18
 * Time: 7:05 PM
 */

namespace App\Repositories;

use App\Comment;

class CommentRepository
{
    protected $entity;

    public function __construct(Comment $comment)
    {
        $this->entity = $comment;
    }

    public function save(array $data): bool
    {
        $this->entity->user_id = $data['user_id'];
        $this->entity->film_id = $data['film_id'];
        $this->entity->content = $data['content'];

        return $this->entity->save();
    }
}