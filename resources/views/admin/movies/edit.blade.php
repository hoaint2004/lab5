<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Thêm phim</title>
    <link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container w-50">
        <h1>Update Film</h1>
        <a href="{{route('movie.index')}}" class="btn btn-secondary">List</a>
        @if (session('message'))
            <div class="alert alert-success">{{ session('message') }}</div> 
        @endif
        <form action="{{route('movie.update',$movie)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="form-label">Title</label>
                <input type="text" class="form-control" name="title" value="{{$movie->title}}">
            </div>
            <div class="mb-3">
                <label class="form-label">Poster</label>
                <div class="row">
                    <div class="col-4">
                        <img width="150" src="{{asset('/storage/'.$movie->poster)}}" alt="{{$movie->title}}" id="poster">
                    </div>
                    <div class="col-8">
                        <input type="file" class="form-control" name="poster" value="{{$movie->poster}}" id="filePoster">
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label">Intro</label>
                <input type="text" class="form-control" name="intro" value="{{$movie->intro}}">
            </div>
            <div class="mb-3">
                <label class="form-label">Release date</label>
                <input type="date" class="form-control" name="release_date" value="{{$movie->release_date}}">
            </div>
            <div class="mb-3">
                <label class="form-label">Genre name</label>
                <select name="genre_id" id="">
                    @foreach($genres as $genre){
                        <option value="{{$genre->id}}" 
                        @if ($genre->id == $movie->genre_id)
                            selected
                        @endif
                        >{{$genre->name}}</option>
                    }
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
    <script>
    var filePoster = document.querySelector('#filePoster');
    var poster = document.querySelector('#poster');
    filePoster.addEventListener('change', function(){
        filePoster.addEventListener('change',function(e){
            e.preventDefault();
            poster.src = URL.createObjectURL(this.files[0]);
        })
    })
</script>
</body>
</html>