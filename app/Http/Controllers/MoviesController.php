<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddMovieRequest;
use App\Models\MoviesModel;
use App\Repositories\MoviesRespository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MoviesController extends Controller
{
    private $movieRepo;

    public function __construct()
    {
        $this->movieRepo = new MoviesRespository();
    }
    public function allMovies()
    {
        $movies = MoviesModel::all();
       $userFavourites = [];
        if(Auth::check())
        {
            $userFavourites = Auth::user()->movieFavourites;
            $userFavourites = $userFavourites->pluck("movie_id")->toArray();
        }

        return view("movies.allMovies", compact("movies", "userFavourites"));

    }

    public function search(Request $request)
    {
        $name = $request->get("search");
       $search = $this->movieRepo->searchMovies($name);
       if(count($search) == 0)
       {
           return redirect('/')->with("error", "This movie doesn't exist!");
       }
        $userFavourites = [];
        if(Auth::check())
        {
            $userFavourites = Auth::user()->movieFavourites;
            $userFavourites = $userFavourites->pluck("movie_id")->toArray();
        }


        return view("movies.search_results", compact("search", "userFavourites"));
    }

    public function permalink(MoviesModel $movie)
    {
        $user = Auth::user();
        return view("movies.moviePermalink", compact("movie", "user"));
  }
    public function add(AddMovieRequest $request)
    {

       $this->movieRepo->addMovie($request);

        return redirect()->back()->with("success", "Movie successfully added!");


    }
}
