<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MoviesModel extends Model
{
    const TABLE = 'movies';
    protected $table = self::TABLE;

    protected $fillable = ["title", "description", "author"];

    public function genre()
    {
        return $this->hasOne(GenreModel::class, "movie_id", "id");
    }

    public function comments()
    {
        return $this->hasMany(CommentModel::class, "movie_id" , "id");
    }



}
