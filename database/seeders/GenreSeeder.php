<?php

namespace Database\Seeders;

use App\Models\GenreModel;
use App\Models\MoviesModel;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $movies = MoviesModel::all();

        foreach ($movies as $singleMovie)
        {
            $genre = GenreModel::GENRE[rand(0, 4)];

            GenreModel::create([
                'genre' => $genre,
                'movie_id' => $singleMovie->id,
            ]);
        }



    }
}
