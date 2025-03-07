<?php

namespace App\Http\Controllers;

use App\Models\GenreModel;
use App\Models\MoviesModel;
use App\Repositories\GenreRepository;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    private $genreRepo;

    public function __construct()
    {
        $this->genreRepo = new GenreRepository();
    }
    public function genres($genre)
    {
        $results = $this->genreRepo->getGenreId($genre);
        return view('movies.genresResults', compact('results'));
    }
}
