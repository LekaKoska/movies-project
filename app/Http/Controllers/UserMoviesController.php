<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserMoviesModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserMoviesController extends Controller
{
    public function favourite(Request $request, $movie)
    {
        $user = Auth::user();
        if($user === null)
        {
            return redirect()->back()->with("error",  "You must be logged if u want to add movie to favourites!");
        }

        UserMoviesModel::create([
            'movie_id' => $movie,
            'user_id' => $user->id
        ]);
        return redirect()->back();
    }

    public function unfavourite(Request $request, $movie)
    {
        $user = Auth::user();
        if($user === null)
        {
            return redirect()->back()->with("error",  "You must be logged if u want to add movie to favourites!");
        }

       $userFavourite = UserMoviesModel::where([
           'movie_id' => $movie,
           'user_id' => $user->id
       ])->first();

        $userFavourite->delete();

        return redirect()->back();





    }
}
