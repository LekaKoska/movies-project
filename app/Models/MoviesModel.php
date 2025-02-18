<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MoviesModel extends Model
{
    protected $table = "movies";

    protected $fillable = ["title", "description", "author"];

    public function genre()
    {
        return $this->hasOne(GenreModel::class, "movie_id", "id");
    }



}
