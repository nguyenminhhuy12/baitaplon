@extends('layout.header')
<body>
<div class="container-xl">
	<div class="table-responsive">
		<div class="table-wrapper">
			<div class="table-title">
				<div class="row">
					<div class="col-sm-6">
						<h2>Quản lý vụ án</h2>
					</div>
					
					<div class="col-sm-6">
						<a href="{{ route('case.create') }}" class="btn btn-success"><i class="material-icons">&#xE147;</i> <span>Thêm vụ án mới</span></a>
						
					</div>
				</div>
			</div>
			@if(session('success'))
				<div class="alert alert-success">
					{{ session('success') }}
				</div>
			@endif
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th>Số vụ án</th>
                        <th>Tên vụ án</th>
                        <th>Mô tả</th>
                        <th> Trạng thái</th>
                        <th>Luật sư</th>
					</tr>
				</thead>
				<tbody>
                    @foreach ($case as $cases)
                        <tr> 
                            <td>{{ $cases->case_number }}</td>
                            <td>{{ $cases->title }}</td>
                            <td>{{ $cases->description }}</td>
                            <td>{{ $cases->status }}</td>
                            <td>{{ $cases->lawer->name }}</td>
                            <td>
                                <a href="{{ route('case.edit', $cases->id) }}" class="btn btn-primary">Sửa</a>
        
                                <!-- Nút xóa kèm modal xác nhận -->
                                <form action="{{ route('case.destroy', $cases->id) }}" method="POST" style="display:inline;" onclick="return confirm('Bạn có chắc muốn xóa');">
									@csrf
									@method('DELETE')
									<button type="submit" class="btn btn-danger">Xóa</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
			</table>
			{{-- Phân trang nếu cần --}}
			<div class="d-flex justify-content-center">
				{{ $case->links('pagination::bootstrap-4') }}
			</div>
		</div>
	</div>        
</div>

</body>
</html>