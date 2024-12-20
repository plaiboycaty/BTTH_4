<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initialscale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD"
crossorigin="anonymous">
<title>Cập nhật Vấn Đề</title>
</head>
<body>

<h1 style="margin: 50px 50px">Cập nhật thông tin vấn đề</h1>

<form action="{{ route('issues.update', $issue->id) }}" method="POST" style="margin: 50px 50px">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="computer_id">Máy tính</label>
        <select name="computer_id" class="form-control" required>
            @foreach($computers as $computer)
            <option value="{{ $computer->id }}" {{ $computer->id == $issue->computer_id ? 'selected' : '' }}>{{ $computer->computer_name }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="reported_by">Người báo cáo</label>
        <input type="text" name="reported_by" class="form-control" value="{{ $issue->reported_by }}" required>
    </div>
    <div class="form-group">
        <label for="reported_date">Thời gian báo cáo</label>
        <input type="datetime-local" name="reported_date" class="form-control" value="{{ $issue->reported_date }}" required>
    </div>
    <div class="form-group">
        <label for="description">Mô tả vấn đề</label>
        <textarea name="description" class="form-control" rows="3" required>{{ $issue->description }}</textarea>
    </div>
    <div class="form-group">
        <label for="urgency">Mức độ sự cố</label>
        <select name="urgency" class="form-control" required>
            <option value="Low" {{ $issue->urgency == 'Low' ? 'selected' : '' }}>Thấp</option>
            <option value="Medium" {{ $issue->urgency == 'Medium' ? 'selected' : '' }}>Trung bình</option>
            <option value="High" {{ $issue->urgency == 'High' ? 'selected' : '' }}>Cao</option>
        </select>
    </div>
    <div class="form-group">
        <label for="status">Trạng thái</label>
        <select name="status" class="form-control" required>
            <option value="Open" {{ $issue->status == 'Open' ? 'selected' : '' }}>Mở</option>
            <option value="In Progress" {{ $issue->status == 'In Progress' ? 'selected' : '' }}>Đang xử lý</option>
            <option value="Resolved" {{ $issue->status == 'Resolved' ? 'selected' : '' }}>Đã giải quyết</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Cập nhật</button>
</form>

</body>
</html>
