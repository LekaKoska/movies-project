<?php
namespace App\Repositories;

use App\Models\CommentModel;

class CommentRepository
{
    private $commentModel;

    public function __construct()
    {
        $this->commentModel = new CommentModel();
    }

    public function addComment($request, $user, $movie)
    {
        $this->commentModel->create([
            "content" => $request->get("comment"),
            "user_id" => $user->id,
            "movie_id" => $movie

        ]);
    }
}
