<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Bài Thực Hành Số 4</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

<style>
body {
	color: #566787;
	background: #f5f5f5;
	font-family: 'Varela Round', sans-serif;
	font-size: 13px;
}
.table-responsive {
    margin: 30px 0;
}
.table-wrapper {
	background: #fff;
	padding: 20px 25px;
	border-radius: 3px;
	min-width: 1000px;
	box-shadow: 0 1px 1px rgba(0,0,0,.05);
}
.table-title {        
	padding-bottom: 15px;
	background: #435d7d;
	color: #fff;
	padding: 16px 30px;
	min-width: 100%;
	margin: -20px -25px 10px;
	border-radius: 3px 3px 0 0;
}
.table-title h2 {
	margin: 5px 0 0;
	font-size: 24px;
}
.table-title .btn-group {
	float: right;
}
.table-title .btn {
	color: #fff;
	float: right;
	font-size: 13px;
	border: none;
	min-width: 50px;
	border-radius: 2px;
	border: none;
	outline: none !important;
	margin-left: 10px;
}
.table-title .btn i {
	float: left;
	font-size: 21px;
	margin-right: 5px;
}
.table-title .btn span {
	float: left;
	margin-top: 2px;
}
table.table tr th, table.table tr td {
	border-color: #e9e9e9;
	padding: 12px 15px;
	vertical-align: middle;
}
table.table tr th:first-child {
	width: 60px;
}
table.table tr th:last-child {
	width: 100px;
}
table.table-striped tbody tr:nth-of-type(odd) {
	background-color: #fcfcfc;
}
table.table-striped.table-hover tbody tr:hover {
	background: #f5f5f5;
}
table.table th i {
	font-size: 13px;
	margin: 0 5px;
	cursor: pointer;
}	
table.table td:last-child i {
	opacity: 0.9;
	font-size: 22px;
	margin: 0 5px;
}
table.table td a {
	font-weight: bold;
	color: #566787;
	display: inline-block;
	text-decoration: none;
	outline: none !important;
}
table.table td a:hover {
	color: #2196F3;
}
table.table td a.edit {
	color: #FFC107;
}
table.table td a.delete {
	color: #F44336;
}
table.table td i {
	font-size: 19px;
}
table.table .avatar {
	border-radius: 50%;
	vertical-align: middle;
	margin-right: 10px;
}
.pagination {
	float: right;
	margin: 0 0 5px;
}
.pagination li a {
	border: none;
	font-size: 13px;
	min-width: 30px;
	min-height: 30px;
	color: #999;
	margin: 0 2px;
	line-height: 30px;
	border-radius: 2px !important;
	text-align: center;
	padding: 0 6px;
}
.pagination li a:hover {
	color: #666;
}	
.pagination li.active a, .pagination li.active a.page-link {
	background: #03A9F4;
}
.pagination li.active a:hover {        
	background: #0397d6;
}
.pagination li.disabled i {
	color: #ccc;
}
.pagination li i {
	font-size: 16px;
	padding-top: 6px
}
.hint-text {
	float: left;
	margin-top: 10px;
	font-size: 13px;
}    
</style>

<script>
$(document).ready(function(){
	// Activate tooltip
	$('[data-toggle="tooltip"]').tooltip();
	
	// Select/Deselect checkboxes
	var checkbox = $('table tbody input[type="checkbox"]');
	$("#selectAll").click(function(){
		if(this.checked){
			checkbox.each(function(){
				this.checked = true;                        
			});
		} else{
			checkbox.each(function(){
				this.checked = false;                        
			});
		} 
	});
	checkbox.click(function(){
		if(!this.checked){
			$("#selectAll").prop("checked", false);
		}
	});
});
</script>
</head>
<body>
<div class="container-xl">
	<div class="table-responsive">
		<div class="table-wrapper">
			<div class="table-title">
				<div class="row">
					<div class="col-sm-6">
						<h2>Manage <b>Computers</b></h2>
					</div>
					
					<div class="col-sm-6">
						<a href="{{ route('issues.create') }}" class="btn btn-success"><i class="material-icons">&#xE147;</i> <span>Thêm vấn đề mới</span></a>
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
						<th>Mã máy tính</th>
                        <th>Tên máy tính</th>
                        <th>Người báo cáo</th>
                        <th>Ngày báo cáo</th>
                        <th>Mô tả</th>
                        <th>Mức độ sự cố</th>
                        <th>Trạng thái hiện tại</th>
                        <th>Hành động</th>
					</tr>
				</thead>
				<tbody>
				@foreach ($issues as $issue)
					<tr>
						<td>{{ $issue->id }}</td>
						<td>{{ $issue->computer->computer_name }}</td>
						<td>{{ $issue->reported_by }}</td>
						<td>{{ $issue->reported_date }}</td>
						<td>{{ $issue->description }}</td>
						<td>{{ $issue->urgency }}</td>
						<td>{{ $issue->status }}</td>
						<td>
							<!-- Nút sửa với icon nhỏ -->
							<a href="{{ route('issues.edit', $issue->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit" style="font-size: 16px;"></i></a>

							<!-- Nút xóa với icon nhỏ -->
							<button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $issue->id }}">
								<i class="fa fa-trash" style="font-size: 16px;"></i>
							</button>
						</td>		
					<!-- Modal xác nhận xóa -->
					<div class="modal fade" id="deleteModal{{ $issue->id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $issue->id }}" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="deleteModalLabel{{ $issue->id }}">Xác nhận xóa</h5>
									<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
								</div>
								<div class="modal-body">
									Bạn có chắc chắn muốn xóa vấn đề này không?
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
									<form action="{{ route('issues.destroy', $issue->id) }}" method="POST" style="display:inline;">
										@csrf
										@method('DELETE')
										<button type="submit" class="btn btn-danger">Xóa</button>
									</form>
								</div>
							</div>
						</div>
					</div>
				@endforeach

			</table>
			{{-- Phân trang nếu cần --}}
			<div class="d-flex justify-content-center">
				{{ $issues->links('pagination::bootstrap-4') }}
			</div>
		</div>
	</div>        
</div>

</body>
</html>
