<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $movie->TenPhim }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-4">
    <h2 class="text-center">{{ $movie->TenPhim }}</h2>
    <div class="row">
        <div class="col-md-6">
            <img src="{{ asset('images/' . $movie->path) }}" class="img-fluid rounded" alt="{{ $movie->TenPhim }}">
        </div>
        <div class="col-md-6">
            <h4>Nội dung phim:</h4>
            <p>{{ $movie->NoiDung }}</p>
            <p><strong>Thời lượng:</strong> {{ $movie->ThoiLuong }} phút</p>
            <p><strong>Ngày công chiếu:</strong> {{ $movie->NgayCongChieu }}</p>

            <!-- Chỉ hiển thị nút quay lại -->
            <a href="{{ route('home') }}" class="btn btn-secondary mt-3">Quay lại</a>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
