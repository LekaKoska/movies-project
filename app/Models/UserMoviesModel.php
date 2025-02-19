<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserMoviesModel extends Model
{
    protected $table = "user_movies";

    protected $fillable = ['user_id', 'movie_id'];

    public function movie()
    {
        return $this->hasOne(MoviesModel::class, "id", "movie_id");
    }
}
