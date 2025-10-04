<?php

namespace App\Repositories;

use App\Models\UserMoviesModel;
use Illuminate\Support\Facades\Auth;

class UserMovieRepository
{
    private $userMovieModel;

    public function __construct()
    {
        $this->userMovieModel = new UserMoviesModel();
    }

    public function favouriteMovie($movie, $user): void
    {
        $this->userMovieModel->create([
            'movie_id' => $movie,
            'user_id' => $user->id]);
    }

    public function unfavouriteMovie($movie, $user): void
    {
      $userFavourite =   $this->userMovieModel->firstWhere([
            'movie_id' => $movie,
            'user_id' => $user->id]);

      $userFavourite->delete();
    }
}
