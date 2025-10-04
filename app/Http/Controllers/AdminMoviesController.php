<?php

namespace App\Http\Controllers;

use App\Models\MoviesModel;
use App\Models\User;
use App\Repositories\AdminMovieRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use PhpParser\Node\Expr\AssignOp\Mod;

class AdminMoviesController extends Controller
{
    private $adminMovieRepo;
    public function __construct()
    {
        $this->adminMovieRepo = new AdminMovieRepository();
    }
    public function allMovies(): Collection|View
    {
        $allMovies = MoviesModel::paginate();
        return view("admin.moviesTable", compact("allMovies"));
    }

    public function delete(MoviesModel $id): RedirectResponse
    {
        $id->delete();
        return redirect()->back();
    }

    public function edit(Request $request, MoviesModel $movie): View
    {

        return view("admin.editMovieForm", compact("movie"));
    }
    public function save(Request $request, MoviesModel $movie): RedirectResponse
    {
        $this->adminMovieRepo->editMovieSave($movie, $request);

        return redirect()->route('movie.all')
            ->with('success', 'Movie updated successfully');
    }

    public function users(): Collection|View
    {
        $users = User::paginate();

        return view("admin.allUsers", compact("users"));
    }

}
