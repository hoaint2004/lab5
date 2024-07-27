<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        for ($i = 0; $i < 100; $i++) {
            DB::table('movies')->insert([
                'title' => fake()->text(25),
                'poster' => fake()->imageUrl(),
                'intro' => fake()->text(),
                'release_date' => fake()->date(),
                'genre_id' => rand(1, 4)
            ]);
        }


    }
}
