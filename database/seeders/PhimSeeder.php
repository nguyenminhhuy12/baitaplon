<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PhimSeeder extends Seeder
{
    public function run()
    {
        DB::table('phims')->insert([
            [
                'TenPhim' => 'Avengers: Endgame',
                'path' => 'avengers.jpg',
                'NoiDung' => 'Siêu anh hùng chiến đấu chống Thanos.',
                'ThoiLuong' => 181,
                'NgayCongChieu' => '2019-04-26',
                'TrangThai' => 1, // Trạng thái phim (1: Sắp chiếu, 0: Ngừng chiếu)
            ],
            [
                'TenPhim' => 'Inception',
                'path' => 'inception.jpg',
                'NoiDung' => 'Một cuộc phiêu lưu trong giấc mơ.',
                'ThoiLuong' => 148,
                'NgayCongChieu' => '2010-07-16',
                'TrangThai' => 1,
            ],
            [
                'TenPhim' => 'Interstellar',
                'path' => 'interstellar.jpg',
                'NoiDung' => 'Cuộc hành trình khám phá vũ trụ.',
                'ThoiLuong' => 169,
                'NgayCongChieu' => '2014-11-07',
                'TrangThai' => 1,
            ],
            [
                'TenPhim' => 'Joker',
                'path' => 'joker.jpg',
                'NoiDung' => 'Joker xoay quanh Arthur Fleck...',
                'ThoiLuong' => 152,
                'NgayCongChieu' => '2008-07-18',
                'TrangThai' => 1,
            ],
        ]);
    }
}
