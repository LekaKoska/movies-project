@extends("layout")

@section("content")

    @foreach($movies as $movie)
            <p>Name: {{$movie->title}}</p>
            <p>Description: {{$movie->description}}</p>
            <p>Author: {{$movie->author}}</p>
    @endforeach
@endsection
