@php use Illuminate\Support\Facades\Session; @endphp
@extends("layout")

@section("content")
    @if(Session::has("error"))
        <p class="text-danger">{{Session::get("error")}}</p>
        <a class="btn btn-primary" href="/login">Log in</a>
    @endif
    @foreach($movies as $movie)

        <div class="card mt-2 container" style="width: 18rem;">

            <div class="card-body">
                <h5 class="card-title">{{$movie->title}}</h5>
                <h6 class="card-subtitle mb-2 text-muted">{{$movie->genre->genre}}</h6>
                <p class="card-text">{{$movie->description}}</p>
                <p class="card-text">{{$movie->author}}</p>
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
