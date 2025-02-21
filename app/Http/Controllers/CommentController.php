<?php

namespace App\Http\Controllers;

use App\Models\CommentModel;
use App\Models\MoviesModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function comment(Request $request, $movie)
    {
        $user = Auth::user();
        if($user === null)
        {
            return redirect()->back()->with(['error' => 'You must be logged to comment!!']);
        }

        $request->validate(
            [
                "comment" => "required|max:50",
                "user_id" => "required|exists:users, id",
                "movie_id" => "required|exists:movies, id"
            ]
        );
        CommentModel::create([
            "content" => $request->get("comment"),
            "user_id" => $user->id,
            "movie_id" => $movie

        ]);

        return redirect()->back()->with("success", "Your comment has been added");




    }
}
