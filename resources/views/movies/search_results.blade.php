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
    @foreach($search as $movie)
        <div class="card m-1 container" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">{{$movie->title}}</h5>
                <h6 class="card-subtitle mb-2 text-muted">{{$movie->genre->genre}}</h6>
                <p class="card-text">{{$movie->description}}</p>
                <p  class="card-text">{{$movie->author}}</p>
                @if(in_array($movie->id, $userFavourites))
                    <a href="{{route("movies.unfavourite", ['movie' => $movie->id])}}" class="card-link">
                        <i class="fa-solid fa-bookmark"> </i>  </a>
                @else
                    <a href="{{route("movies.favourite", ['movie' => $movie->id])}}" class="card-link"><i
                            class="fa-regular fa-bookmark"></i> </a>
                @endif
                <a href="{{route("movies.permalink", ['movie' => $movie->title])}}" class="card-link">Watch</a>
            </div>
        </div>
    @endforeach

@endsection
</body>
</html>
