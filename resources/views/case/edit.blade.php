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

<h1 style="margin: 50px 50px">Cập nhật thông tin vụ án</h1>

<form action="{{ route('case.update', $case->id) }}" method="POST" style="margin: 50px 50px">
    @csrf
    @method('PUT')
    <div class="mb-3">
            <label for="lawer_id" class="form-label">Tên luật sư</label>
            <select class="form-control" id="lawer_id" value="{{ $case->lawer_id }}" name="lawer_id" required>
                @foreach($lawyer as $law)
                    <option value="{{ $law->id }}">{{ $law->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="case_number" class="form-label">Số vụ án</label>
            <input type="text" class="form-control" id="case_number" value="{{ $case->case_number }}" name="case_number" required>
        </div>
        <div class="mb-3">
            <label for="title" class="form-label">Tên vụ án</label>
            <input type="text" class="form-control" id="title" value="{{ $case->title }}" name="title" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">mô tả</label>
            <textarea class="form-control" id="description" name="description" rows="3">{{ $case->description }}</textarea>
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">Trạng thái</label>
            <select class="form-control" id="status" value="{{ $case->status }}" name="status" required>
            @foreach($status as $st)
                @if($st === $case->status)
                <option value="{{$st}}" selected>{{$st}}</option>
                @else
                <option value="{{$st}}">{{$st}}</option>
                @endif
                @endforeach
            </select>
        </div>
    <button type="submit" class="btn btn-primary">Cập nhật</button>
</form>

</body>