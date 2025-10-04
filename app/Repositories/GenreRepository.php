<?php

namespace App\Repositories;

use App\Models\GenreModel;
use Illuminate\Database\Eloquent\Collection;

class GenreRepository
{
    private $genre;

    public function __construct()
    {
        $this->genre = new GenreModel();

    }

    public function getGenreId($id): Collection
    {
        return $this->genre->where(['genre' => $id])->get();
    }
}
