<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserMoviesModel extends Model
{
    protected $table = "user_movies";

    protected $fillable = ['user_id', 'movie_id'];
}
