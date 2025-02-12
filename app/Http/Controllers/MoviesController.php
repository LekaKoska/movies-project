<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MoviesController extends Controller
{
    public function allMovies()
    {
        return view("movies.allMovies");
    }
}
