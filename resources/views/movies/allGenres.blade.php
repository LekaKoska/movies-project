@php use App\Models\GenreModel; @endphp
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
    @foreach(GenreModel::GENRE as $genre)

        <p><a href="{{route("movies.genreResults", ["genre" => $genre])}}">{{$genre}}</a></p>

    @endforeach

@endsection
</body>
</html>
