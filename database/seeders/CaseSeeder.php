<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class CaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $lawyerID = DB::table('lawyers')->pluck('id')->toArray();//lay all id cua bang lawyer
        foreach (range(1, 50) as $index) { 
            DB::table('cases')->insert([
                'lawer_id' => $lawyerID[array_rand($lawyerID)],
                'case_number' => $faker->unique()->numberBetween(1, 100),
                'title' => $faker->text,
                'description' => $faker->sentence,
                'status' => $faker->randomElement(['in_progress', 'closed', 'appealed']),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
