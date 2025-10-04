<?php

use App\Http\Controllers\AdminMoviesController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\MoviesController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RecommendedController;
use App\Http\Controllers\UserMoviesController;
use App\Http\Middleware\AdminCheckMiddleware;
use App\Models\MoviesModel;
use App\Models\UserMoviesModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::view('/',  'welcome')
->name("homepage");

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get("/movies/favourites", function ()
{
    $userFavourites = [];

    $user = Auth::user();

    if($user !== null)
    {
        $userFavourites = UserMoviesModel::where(
            [
                'user_id' => $user->id
            ]
        )->get();
    }
    return view("movies.favourites", compact("userFavourites"));
})->name("movies.favourites");

Route::controller(MoviesController::class)->middleware('auth')->group(function ()
{
    Route::get("/movies",  "allMovies")->name("movies.all");
    Route::get("/search",  "search")->name("movies.search");
    Route::get("movies/{movie:title}",  "permalink")->name("movies.permalink");
});

Route::view("/genres", "movies.allGenres")->name("movies.genre");

Route::get("/genres/results/{genre:genre}", [GenreController::class, "genres"])->name("movies.genreResults");


Route::controller(CommentController::class)->prefix('movies/comment')->name('movies.')->middleware('auth')->group(function ()
{
    Route::post("{movie}",  "comment")->name("comment");
    Route::get("{comment}/delete", "delete")->name("comment.delete");

});

Route::controller(UserMoviesController::class)->prefix('movies')->name('movies.')->middleware('auth')->group(function ()
{
    Route::get("/addFavourite/{movie}",  "favourite")->name("favourite");
    Route::get("/unfavourite/{movie}",  "unfavourite")->name("unfavourite");
});

Route::middleware(['auth', AdminCheckMiddleware::class])->prefix("admin")->group(function () {
    Route::controller(AdminMoviesController::class)->prefix("/movies")->group(function () {
        Route::get("/all", "allMovies")->name('movie.all');
        Route::get("/delete/{id}",  "delete")->name("movie.delete");
        Route::get("/edit/{movie}",  "edit")->name("movie.edit");
        Route::post("/edit/{movie}", "save")->name("movie.save");
        Route::get("/all-users", "users");
        Route::view("/add", 'movies.addMovies')->name("movies.addForm");
        Route::post("/add/new", [MoviesController::class, "add"])->name("movies.add");
    });
});



require __DIR__.'/auth.php';
