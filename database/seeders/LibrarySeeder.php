<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class LibrarySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        foreach(range(1,10) as $index){
            DB::table('libraries')->insert([
                'name' => 'Thư viện' . $faker->unique()->name,
                'address' => $faker->address,
                'contact_number' => $faker->phoneNumber,
                'updated_at' => now(),
                'created_at' => now()
            ]);
        }
    }
}