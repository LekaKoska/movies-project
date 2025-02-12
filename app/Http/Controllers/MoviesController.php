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
}
