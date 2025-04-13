<?php

namespace App\Http\Controllers;
use App\Models\Phim;
use App\Models\Ve;
use App\Models\LichChieu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log; // Thêm để debug

class BookingController extends Controller
{
    public function getBookedSeats($maLichChieu)
        {
            $gheDaDat = Ve::where('MaLichChieu', $maLichChieu)->pluck('MaGhe')->toArray();

            return response()->json($gheDaDat);
        }
    // Hiển thị trang đặt vé
    public function show($MaPhim)
    {
        // Lấy phim theo MaPhim
        $phim = Phim::findOrFail($MaPhim);

        // Lấy danh sách lịch chiếu của phim đó
        $lichChieus = LichChieu::where('MaPhim', $MaPhim)->get();

        // Lấy danh sách ghế đã đặt cho tất cả các lịch chiếu
        $gheDaDat = Ve::whereIn('MaLichChieu', $lichChieus->pluck('MaLichChieu'))->pluck('MaGhe')->toArray();

        // Trả về view với dữ liệu cần thiết
        return view('auth.booking', compact('phim', 'lichChieus', 'gheDaDat'));
    }


    // Xử lý đặt vé
    public function store(Request $request)
{
    try {
        $validated = $request->validate([
            'ma_lich_chieu' => 'required|exists:lich_chieus,MaLichChieu',
            'ghe_da_chon' => 'required|array',
            'ghe_da_chon.*' => 'string',
        ]);

        $maLichChieu = $validated['ma_lich_chieu'];
        $gheDaChon = $validated['ghe_da_chon'];

        foreach ($gheDaChon as $maGhe) {
            Ve::create([
                'MaLichChieu' => $maLichChieu,
                'MaGhe' => $maGhe,
                'TrangThai' => 'Đã đặt', // Bạn có thể thay đổi trạng thái này
                'MaHoaDon' => null
            ]);
        }

        return response()->json(['success' => true, 'message' => 'Đặt vé thành công!']);
    } catch (\Exception $e) {
        Log::error("Lỗi khi đặt vé: " . $e->getMessage());
        return response()->json(['success' => false, 'error' => 'Lỗi khi đặt vé!'], 500);
    }
}
  
        
}
    


