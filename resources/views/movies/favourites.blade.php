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
    @foreach($userFavourites as $userFavourite)
        <div class="card m-1 container" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">{{$userFavourite->movie->title}}</h5>
                <h6 class="card-subtitle mb-2 text-muted">{{$userFavourite->movie->genre->genre}}</h6>
                <p class="card-text">{{$userFavourite->movie->description}}</p>
                <p  class="card-text">{{$userFavourite->movie->author}}</p>
                <a href="{{route("movies.unfavourite", ['movie' => $userFavourite->movie->id])}}" class="card-link">
                        <i class="fa-solid fa-bookmark"> </i>  </a>
                <a href="{{route("movies.permalink", ['movie' => $userFavourite->movie->title])}}" class="card-link">Watch</a>




            </div>
        </div>


    @endforeach
@endsection
</body>
</html>
