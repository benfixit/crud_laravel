<?php

namespace App\Http\Controllers\Comment;

use App\Http\Requests\CommentStoreRequest;
use App\Http\Controllers\Controller;
use App\Repositories\CommentRepository;

class CommentController extends Controller
{
    protected $repository;

    /**
     * CommentController constructor.
     * @param CommentRepository $repository
     */
    public function __construct(CommentRepository $repository)
    {
        $this->middleware('auth');

        $this->repository = $repository;
    }

    public function store(CommentStoreRequest $request)
    {
        $response = ['status' => 0, 'message' => 'Your comment could not be saved. Please try again.'];

        if($this->repository->save($request->validated())){
            $response = ['status' => 1, 'message' => 'You have successfully commented on this film. Thank you.'];
        }

        return response()->json([$response]);
    }
}