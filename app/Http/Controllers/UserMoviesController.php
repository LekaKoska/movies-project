<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserMoviesModel;
use App\Repositories\UserMovieRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserMoviesController extends Controller
{
    private $userMovieRepo;
    public function __construct()
    {
        $this->userMovieRepo = new UserMovieRepository();
    }
    public function favourite(Request $request, $movie)
    {
        $user = Auth::user();
        if($user === null)
        {
            return redirect()->back()->with("error",  "You must be logged if u want to add movie to favourites!");
        }

        $this->userMovieRepo->favouriteMovie($movie, $user);

        return redirect()->back();
    }

    public function unfavourite(Request $request, $movie)
    {
        $user = Auth::user();
        if($user === null)
        {
            return redirect()->back()->with("error",  "You must be logged if u want to add movie to favourites!");
        }

       $this->userMovieRepo->unfavouriteMovie($movie, $user);





        return redirect()->back();





    }
}
