@extends("layout")

@section("content")

    @foreach($movies as $movie)

    <div class="card m-1 container" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title">{{$movie->title}}</h5>
            <h6 class="card-subtitle mb-2 text-muted">{{$movie->genre->genre}}</h6>
            <p class="card-text">{{$movie->description}}</p>
            <p  class="card-text">{{$movie->author}}</p>
            <a href="#" class="card-link">Add to favorites</a>
        </div>
    </div>
    @endforeach
@endsection
