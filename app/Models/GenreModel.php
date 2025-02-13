<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GenreModel extends Model
{
    protected $table = "genre";

    const GENRE = ["comedy", "crime", "horror", "drama", "sci-fi"];
    protected $fillable = ["genre", "movie_id"];
}
