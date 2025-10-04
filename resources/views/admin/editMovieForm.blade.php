<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Document</title>
</head>
<body>
    @extends("layout")

@section("content")
    <form action="{{ route('movie.save', ['movie' => $movie->id]) }}" method="POST">
        @csrf
        <input value="{{$movie->title}}" type="text" placeholder="Enter a title" name="title">
        <textarea placeholder="Enter a description" name="description">{{$movie->description}}</textarea>
        <input value="{{$movie->author}}" type="text" placeholder="Enter author" name="author">
        <button type="submit">Edit</button>
    </form>

@endsection
</body>
</html>
