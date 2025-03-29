<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Phim extends Model
{
    use HasFactory;

    protected $table = 'phims';
    protected $primaryKey = 'MaPhim';

    protected $fillable = ['TenPhim', 'path', 'NoiDung', 'ThoiLuong', 'NgayCongChieu'];

    // Quan hệ: Một phim có nhiều lịch chiếu
    public function lichChieus()
    {
        return $this->hasMany(LichChieu::class, 'MaPhim');
    }
}
