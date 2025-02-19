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
                "content" => "required|max:100",
                "user_id" => "required|exist:users, id",
                "movie_id" => "required|exist:movies, id"

            ]);

        CommentModel::create([
            "content" => $request->get("comment"),
            "user_id" => $user->id,
            "movie_id" => $movie

        ]);





    }
}
