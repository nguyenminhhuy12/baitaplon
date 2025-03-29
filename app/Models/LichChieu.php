<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LichChieu extends Model
{
    use HasFactory;

    protected $table = 'lich_chieus'; // Tên bảng

    protected $primaryKey = 'MaLichChieu'; // Khóa chính

    protected $fillable = [
        'MaPhim',
        'ThoiGian',
        'PhongChieu',
    ];

    // Quan hệ với Phim
    public function phim()
    {
        return $this->belongsTo(Phim::class, 'MaPhim');
    }

    // Quan hệ với Vé
    public function ve()
    {
        return $this->hasMany(Ve::class, 'MaLichChieu');
    }
}
