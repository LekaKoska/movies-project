<?php
namespace App\Repositories;

use App\Models\MoviesModel;

class MoviesRespository
{
    private $moviesModel;

    public function __construct()
    {
        $this->moviesModel = new MoviesModel();
    }

    public function searchMovies($name)
    {
        return $this->moviesModel->where('title', 'LIKE', "%$name%")->get();
    }

    public function addMovie($request)
    {
        $this->moviesModel->create($request->all());

    }
}
