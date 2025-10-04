<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserMoviesModel;
use App\Repositories\UserMovieRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserMoviesController extends Controller
{
    private $userMovieRepo;
    public function __construct()
    {
        $this->userMovieRepo = new UserMovieRepository();
    }
    public function favourite(Request $request, $movie): RedirectResponse|Collection
    {
        $user = $request->user();

        $this->userMovieRepo->favouriteMovie($movie, $user);

        return redirect()->back();
    }

    public function unfavourite(Request $request, $movie): RedirectResponse
    {
        $user = $request->user();

       $this->userMovieRepo->unfavouriteMovie($movie, $user);

        return redirect()->back();





    }
}
