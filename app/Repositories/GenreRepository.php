<?php

namespace App\Repositories;

use App\Models\GenreModel;

class GenreRepository
{
    private $genre;

    public function __construct()
    {
        $this->genre = new GenreModel();

    }

    public function getGenreId($id)
    {
        return $this->genre->where(['genre' => $id])->get();
    }
}
