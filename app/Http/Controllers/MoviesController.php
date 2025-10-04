<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddMovieRequest;
use App\Http\Requests\SearchRequest;
use App\Models\MoviesModel;
use App\Repositories\MoviesRespository;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class MoviesController extends Controller
{
    private $movieRepo;

    public function __construct()
    {
        $this->movieRepo = new MoviesRespository();
    }
    public function allMovies(): array|View
    {
        $movies = MoviesModel::paginate();
       $userFavourites = [];
        if(Auth::check())
        {
            $userFavourites = Auth::user()->movieFavourites;
            $userFavourites = $userFavourites->pluck("movie_id")->toArray();
        }

        return view("movies.allMovies", compact("movies", "userFavourites"));

    }

    public function search(SearchRequest $request): array|View|RedirectResponse
    {
        $name = $request->get("search");
       $search = $this->movieRepo->searchMovies($name);
       if(count($search) == 0)
       {
           return redirect('/')->with("error", "This movie doesn't exist!");
       }

       $userFavourites = $this->movieRepo->userFavourites();

        return view("movies.search_results", compact("search", "userFavourites"));
    }

    public function permalink(MoviesModel $movie): RedirectResponse|View
    {
        $user = Auth::user();
       return ($user === null)
           ? redirect()->back()->with("error", "You must be logged to watch this movie")
           : view("movies.moviePermalink", compact("movie", "user"));

  }
    public function add(AddMovieRequest $request): MoviesModel|RedirectResponse
    {

       $this->movieRepo->addMovie($request);

        return redirect()->back()->with("success", "Movie successfully added!");


    }
}
