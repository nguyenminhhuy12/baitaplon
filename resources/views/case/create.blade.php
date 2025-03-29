<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initialscale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-
alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
integrity="sha384-
GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD"
crossorigin="anonymous">
<title>Posts</title>
</head>
<body>


    <h1 style="margin: 50px 50px">Thêm vụ án mới</h1>
    <form action="{{ route('case.store') }}" method="POST" style="margin: 50px 50px">
        @csrf
        <div class="mb-3">
            <label for="lawer_id" class="form-label">Tên luật sư</label>
            <select class="form-control" id="lawer_id" name="lawer_id" required>
                @foreach($lawyer as $law)
                    <option value="{{ $law->id }}">{{ $law->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="case_number" class="form-label">Số vụ án</label>
            <input type="text" class="form-control" id="case_number" name="case_number" required>
        </div>
        <div class="mb-3">
            <label for="title" class="form-label">Tên vụ án</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">mô tả</label>
            <textarea class="form-control" id="description" name="description" rows="3" ></textarea>
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">Trạng thái</label>
            <select class="form-control" id="status" name="status" required>
                @foreach($status as $st)
                <option value="{{$st}}">{{$st}}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Thêm</button>
    </form>

</body>