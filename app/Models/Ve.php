<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ve extends Model
{
    use HasFactory;

    protected $table = 'ves'; // Tên bảng

    protected $primaryKey = 'MaVe'; // Khóa chính

    protected $fillable = [
        'MaLichChieu', 'MaGhe', 'TrangThai', 'MaHoaDon'
    ];

    // Quan hệ với bảng Lịch Chiếu
    public function lichChieu()
    {
        return $this->belongsTo(LichChieu::class, 'MaLichChieu');
    }
}
