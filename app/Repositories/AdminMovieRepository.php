<?php
namespace App\Repositories;

use App\Models\MoviesModel;

class AdminMovieRepository
{
    private $adminMovieModel;

    public function __construct()
    {
        $this->adminMovieModel = new MoviesModel();

    }
    public function editMovieSave($saveMovie, $request): void
    {

        $saveMovie->title = $request->get("title");
        $saveMovie->description = $request->get("description");
        $saveMovie->author = $request->get("author");
        $saveMovie->save();
    }
}
