<?php

use App\Http\Controllers\AdminMoviesController;
use App\Http\Controllers\MoviesController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\AdminCheckMiddleware;
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

Route::view("/genres", "movies.allGenres")
->name("movies.genre");

Route::get("/search", [MoviesController::class, "search"])
->name("movies.search");

Route::middleware(['auth', AdminCheckMiddleware::class])->prefix("admin")->group(function ()
{
    Route::get("/all-movies",[AdminMoviesController::class, "allMovies"]);
    Route::get("/delete-movie/{id}", [AdminMoviesController::class, "delete"])
    ->name("movie.delete");
    Route::get("/edit-movie/{movie}", [AdminMoviesController::class, "edit"]);
    Route::post("/save-movie/{saveMovie}", [AdminMoviesController::class, "save"])
    ->name("movie.edit");
});


require __DIR__.'/auth.php';
