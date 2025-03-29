<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $libraryID = DB::table('libraries')->pluck('id')->toArray();//lay all id cua bang stores
        foreach(range(1,10) as $index){
            DB::table('books')->insert([                
                'title' => $faker->sentence(3),
                'author' => $faker->name,
                'publication_year' => $faker->year,
                'genre' => $faker->word,
                'library_id' => $libraryID[array_rand($libraryID)],
                'updated_at' => now(),
                'created_at' => now()
            ]);
        }
    }
}