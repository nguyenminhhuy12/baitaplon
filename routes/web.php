<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\BookingController;

// Route mặc định: Hiển thị trang home (danh sách phim)
Route::get('/', [MovieController::class, 'index'])->name('home');

// Hiển thị trang đăng nhập
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');

// Xử lý đăng nhập
Route::post('/login', [AuthController::class, 'login']);

// Trang Dashboard (cần đăng nhập)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth')->name('dashboard');

// Đăng xuất
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
//chi tiet phim
Route::get('/phim/{id}', [MovieController::class, 'show'])->name('phim.show');
//dat ve:
Route::get('/dat-ve/{MaPhim}', [BookingController::class, 'show'])->name('dat-ve.show');
Route::post('/dat-ve', [BookingController::class, 'store'])->name('dat-ve');

Route::get('/get-booked-seats/{maLichChieu}', [BookingController::class, 'getBookedSeats']);
