<?php

namespace App\Http\Controllers;

use App\Models\MoviesModel;
use Illuminate\Http\Request;

class MoviesController extends Controller
{
    public function allMovies()
    {
        $movies = MoviesModel::all();
        return view("movies.allMovies", compact("movies"));
    }

    public function search(Request $request)
    {
        $name = $request->get("search");
       $search =  MoviesModel::where('title', 'LIKE', "%$name%")->get();
       if(empty($name))
       {
           return redirect('/movies');
       }
        return view("movies.search_results", compact("search"))->with("error", "Nismo pronasli zeljeni film");
    }
}
