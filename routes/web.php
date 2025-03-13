<?php

use App\Http\Controllers\AdminMoviesController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\MoviesController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserMoviesController;
use App\Http\Middleware\AdminCheckMiddleware;
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



Route::get("/movies", [MoviesController::class, "allMovies"])
->name("movies.all");
Route::get("/search", [MoviesController::class, "search"])
    ->name("movies.search");

Route::get("movies/{movie:title}", [MoviesController::class, "permalink"])
    ->name("movies.permalink");
Route::post("/add/new", [MoviesController::class, "add"])
    ->name("movies.add");

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
})
->name("movies.favourites");

Route::view("/genres", "movies.allGenres")
->name("movies.genre");

Route::get("/genres/results/{genre:genre}", [GenreController::class, "genres"])
    ->name("movies.genreResults");



Route::post("movies/comment/{movie}", [CommentController::class, "comment"])
->name("movies.comment");

Route::view("/movies/add", 'movies.addMovies')
->name("movies.addForm");



Route::get("/movies/addFavourite/{movie}", [UserMoviesController::class, "favourite"])
->name("movies.favourite");

Route::get("/movies/unfavourite/{movie}", [UserMoviesController::class, "unfavourite"])
    ->name("movies.unfavourite");


Route::middleware(['auth', AdminCheckMiddleware::class])->prefix("admin")->group(function ()
{
    Route::controller(AdminMoviesController::class)->prefix("/movies")->group(function ()
    {
        Route::get("/all", "allMovies");
        Route::get("/delete/{id}",  "delete")
            ->name("movie.delete");
        Route::get("/edit/{movie}",  "edit")
        ->name("movie.edit");
        Route::get("/save/{saveMovie}",  "save")
            ->name("movie.edit");
        Route::get("/all-users", "users");

    });

});


require __DIR__.'/auth.php';
