<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Phim;

class MovieController extends Controller
{
    public function index()
{
    $movies = Phim::select('MaPhim', 'TenPhim', 'path', 'NoiDung')->get();

    if (Auth::check()) {
        return view('auth.user_home', compact('movies')); // Nếu đã đăng nhập
    } else {
        return view('auth.home', compact('movies')); // Nếu chưa đăng nhập
    }
}
    public function show($id)
    {
        $movie = Phim::findOrFail($id);
        if (Auth::check()) {
            return view('auth.movie_detail', compact('movie')); // Người đã đăng nhập
        } else {
            return view('guest.movie_detail', compact('movie')); // Người chưa đăng nhập
        }
    }
}
