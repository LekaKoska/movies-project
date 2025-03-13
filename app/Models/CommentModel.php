<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CommentModel extends Model
{
    protected $table = "comment";

    protected $fillable  = ['content', 'user_id', 'movie_id'];

    public function movie()
    {
      return  $this->hasOne(MoviesModel::class, 'id', 'movie_id');

    }

    public function user()
    {
      return  $this->hasOne(User::class, 'id', 'user_id');
    }

}

