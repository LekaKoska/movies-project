<?php

namespace App\Http\Controllers;

use App\Models\MoviesModel;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\AssignOp\Mod;

class AdminMoviesController extends Controller
{
    public function allMovies()
    {
        $allMovies = MoviesModel::all();
        return view("admin.moviesTable", compact("allMovies"));
    }

    public function delete(MoviesModel $id)
    {
        if($id === null)
        {
            die("This movie doesn't exist!");
        }

        $id->delete();
        return redirect()->back();
    }

    public function edit(MoviesModel $id)
    {
        return view("moviesTable", compact("id"));
    }
}
