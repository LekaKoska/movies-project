<?php

namespace App\Repositories;

use App\Models\UserMoviesModel;

class UserMovieRepository
{
    private $userMovieModel;

    public function __construct()
    {
        $this->userMovieModel = new UserMoviesModel();
    }

    public function favouriteMovie($movie, $user)
    {
        $this->userMovieModel->create([
            'movie_id' => $movie,
            'user_id' => $user->id]);
    }

    public function unfavouriteMovie($movie, $user)
    {
      $userFavourite =   $this->userMovieModel->where([
            'movie_id' => $movie,
            'user_id' => $user->id])->first();

      $userFavourite->delete();
    }
}
