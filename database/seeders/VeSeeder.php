<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('ves')->insert([
            [
                'MaLichChieu' => 1, 
                'MaGhe' => 'G1',
                'TrangThai' => 'Đã đặt',
            ],
            [
                'MaLichChieu' => 1,
                'MaGhe' => 'G2',
                'TrangThai' => 'Trống',
            ],
            [
                'MaLichChieu' => 2,
                'MaGhe' => 'G3',
                'TrangThai' => 'Trống',
            ],
        ]);
        
    }
}

