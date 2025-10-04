<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddCommentRequest;
use App\Models\CommentModel;
use App\Models\MoviesModel;
use App\Models\User;
use App\Repositories\CommentRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Comment;

class CommentController extends Controller
{
    private $commentRepo;

    public function __construct()
    {
        $this->commentRepo = new CommentRepository();
    }
    public function comment(AddCommentRequest $request, $movie): Collection|RedirectResponse
    {
        $user = $request->user();

       $this->commentRepo->addComment($request, $user, $movie);

        return redirect()->back()->with("success", "Your comment has been added");

    }

    public function delete(CommentModel $comment): RedirectResponse
    {

      $comment->delete();

      return redirect()->back();
    }
}
