<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MoviesModel extends Model
{
    protected $table = "movies_project";

    protected $fillable = ["title", "description", "author"];
}
