<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hub Cinemas - Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="#">Hub Cinemas</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="#">Phim</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Đặt vé</a></li>
                
                <!-- Avatar và dropdown -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown">
                        <img src="https://via.placeholder.com/40" class="rounded-circle" alt="User Avatar"> <!-- Placeholder Avatar -->
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                        <li><span class="dropdown-item-text fw-bold">{{ auth()->user()->name }}</span></li>
                        <li><span class="dropdown-item-text text-muted">{{ auth()->user()->email }}</span></li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="dropdown-item text-danger">Đăng xuất</button>
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Danh sách phim -->
<div class="container mt-4">
    <h2 class="text-center mb-4">Danh sách phim</h2>
    <div class="row">
        @foreach($movies as $movie)
            <div class="col-md-4">
                <div class="card mb-4">
                    <img src="{{ asset('images/' . $movie->path) }}" class="card-img-top" alt="{{ $movie->TenPhim }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $movie->TenPhim }}</h5>
                        <p class="card-text">{{ Str::limit($movie->NoiDung, 100) }}</p>
                        <a href="{{ route('phim.show', $movie->MaPhim) }}" class="btn btn-primary">Xem chi tiết</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
