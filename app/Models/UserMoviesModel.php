<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserMoviesModel extends Model
{
    const TABLE = 'user_movies';
    protected $table = self::TABLE;

    protected $fillable = ['user_id', 'movie_id'];

    public function movie()
    {
        return $this->hasOne(MoviesModel::class, "id", "movie_id");
    }
}
