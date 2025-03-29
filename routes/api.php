<?
use App\Http\Controllers\BookingController;
use Illuminate\Support\Facades\Route;

Route::get('/get-booked-seats/{maLichChieu}', [BookingController::class, 'getBookedSeats']);

