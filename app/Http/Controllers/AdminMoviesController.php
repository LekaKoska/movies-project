<?php

namespace App\Http\Controllers;

use App\Models\MoviesModel;
use App\Models\User;
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

    public function edit(Request $request, MoviesModel $movie)
    {

        return view("admin.editMovieForm", compact("movie"));
    }
    public function save(Request $request, MoviesModel $saveMovie)
    {
        $saveMovie->title = $request->get("title");
        $saveMovie->description = $request->get("description");
        $saveMovie->author = $request->get("author");
        $saveMovie->save();
        return redirect("/admin/all-movies");
    }

    public function users()
    {
        $users = User::all();

        return view("admin.allUsers", compact("users"));
    }

}
