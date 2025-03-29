<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class LawerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        foreach(range(1,10) as $index){
            DB::table('lawyers')->insert([
                'name' => $faker->name,
                'email' => $faker->unique()->email,
                'phone' => $faker->phoneNumber,
                'bar_associantion' => $faker->sentence(3),
                'specialization' => $faker->word,
                'updated_at' => now(),
                'created_at' => now()
            ]);
        }
    }
}