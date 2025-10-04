<?php
namespace App\Repositories;

use App\Models\MoviesModel;
use Illuminate\Support\Facades\Auth;
use Ramsey\Collection\Collection;

class MoviesRespository
{
    private $moviesModel;

    public function __construct()
    {
        $this->moviesModel = new MoviesModel();
    }

    public function searchMovies($name): \Illuminate\Database\Eloquent\Collection
    {
        return $this->moviesModel->where('title', 'LIKE', "%$name%")->get();
    }

    public function addMovie($request): void
    {
        $this->moviesModel->create($request->validated());

    }

    public function userFavourites(): array
    {
        $userFavourites = [];
        if(Auth::check())
        {
            $userFavourites = Auth::user()->movieFavourites;
            $userFavourites = $userFavourites->pluck("movie_id")->toArray();
        }

        return $userFavourites;
    }
}
