<?php

namespace App\Http\Controllers;

use App\Models\GenreModel;
use App\Models\MoviesModel;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    public function genres($genre)
    {
        $results = GenreModel::where(['genre' => $genre])->get();
        return view('movies.genresResults', compact('results'));
    }
}
