<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Thêm phim</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container w-50">
        <h1>Thêm Mới Phim</h1>
        <form action="{{route('movie.create')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label class="form-label">Tiêu Đề</label>
                <input type="text" class="form-control" name="title">
            </div>
            <div class="mb-3">
                <label class="form-label">Hình Ảnh</label>
                <input type="file" class="form-control" name="poster">
            </div>
            <div class="mb-3">
                <label class="form-label">Mô tả</label>
                <input type="text" class="form-control" name="intro">
            </div>
            <div class="mb-3">
                <label class="form-label">Ngày xuất bản</label>
                <input type="date" class="form-control" name="release_date">
            </div>
            <div class="mb-3">
                <label class="form-label">Loại Phim</label>
                <select name="genre_id" id="">
                    @foreach($genres as $genre){
                        <option value="{{$genre->id}}">{{$genre->name}}</option>
                    }
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Lưu</button>
            </div>
        </form>
    </div>
</body>
</html>