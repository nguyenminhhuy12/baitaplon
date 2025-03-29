<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LichChieuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (DB::table('lich_chieus')->count() == 0) {
            DB::table('lich_chieus')->insert([
                // Lịch chiếu cho phim 1
                [
                    'MaPhim' => 1,
                    'ThoiGian' => '2025-04-01 18:00:00',
                    'PhongChieu' => 'Phòng 1',
                ],
                [
                    'MaPhim' => 1,
                    'ThoiGian' => '2025-04-02 20:00:00',
                    'PhongChieu' => 'Phòng 2',
                ],
                [
                    'MaPhim' => 1,
                    'ThoiGian' => '2025-04-03 15:30:00',
                    'PhongChieu' => 'Phòng 3',
                ],
                [
                    'MaPhim' => 1,
                    'ThoiGian' => '2025-04-04 21:00:00',
                    'PhongChieu' => 'Phòng 1',
                ],

                // Lịch chiếu cho phim 2
                [
                    'MaPhim' => 2,
                    'ThoiGian' => '2025-04-01 17:00:00',
                    'PhongChieu' => 'Phòng 2',
                ],
                [
                    'MaPhim' => 2,
                    'ThoiGian' => '2025-04-02 19:00:00',
                    'PhongChieu' => 'Phòng 3',
                ],
                [
                    'MaPhim' => 2,
                    'ThoiGian' => '2025-04-03 22:00:00',
                    'PhongChieu' => 'Phòng 1',
                ],

                // Lịch chiếu cho phim 3
                [
                    'MaPhim' => 3,
                    'ThoiGian' => '2025-04-01 16:30:00',
                    'PhongChieu' => 'Phòng 3',
                ],
                [
                    'MaPhim' => 3,
                    'ThoiGian' => '2025-04-02 18:30:00',
                    'PhongChieu' => 'Phòng 1',
                ],
                [
                    'MaPhim' => 3,
                    'ThoiGian' => '2025-04-03 21:30:00',
                    'PhongChieu' => 'Phòng 2',
                ],
                [
                    'MaPhim' => 3,
                    'ThoiGian' => '2025-04-04 19:30:00',
                    'PhongChieu' => 'Phòng 3',
                ],

                // Lịch chiếu cho phim 4
                [
                    'MaPhim' => 4,
                    'ThoiGian' => '2025-04-01 20:00:00',
                    'PhongChieu' => 'Phòng 1',
                ],
                [
                    'MaPhim' => 4,
                    'ThoiGian' => '2025-04-02 21:30:00',
                    'PhongChieu' => 'Phòng 2',
                ],
                [
                    'MaPhim' => 4,
                    'ThoiGian' => '2025-04-03 23:00:00',
                    'PhongChieu' => 'Phòng 3',
                ],
            ]);
        
        }
    }
}
