<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
    <h1>Chào mừng, {{ Auth::user()->name }}!</h1>
    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-danger">Đăng xuất</button>
    </form>
</body>
</html>
