<?php

namespace Database\Seeders;

use App\Models\MoviesModel;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AddMoviesSeeder extends Seeder
{

    public function run(): void
    {
        $faker = Factory::create();
            for ($i = 0; $i < 20; $i++)
            {
                MoviesModel::create([
                    'title' => ucwords($faker->catchPhrase),
                    'description' => $faker->text(mt_rand(30, 50)),
                    'author' => $faker->name(),
                ]);
            }

    }
}
