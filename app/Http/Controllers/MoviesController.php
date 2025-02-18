<?php

namespace App\Http\Controllers;

use App\Models\MoviesModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MoviesController extends Controller
{
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
       $search =  MoviesModel::where('title', 'LIKE', "%$name%")->get();
       if(count($search) == 0)
       {
           return redirect('/')->with("error", "This movie doesn't exist!");
       }
        return view("movies.search_results", compact("search"));
    }

    public function permalink(MoviesModel $movie)
    {
        return view("movies.moviePermalink", compact("movie"));
  }
    public function add(Request $request)
    {
       $request->validate(
           [   'title' => 'required',
               'description' => 'required|max:50',
               'author' => 'required'
           ]
       );

        MoviesModel::created($request->all());


    }
}
