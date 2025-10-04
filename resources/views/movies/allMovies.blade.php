@php use Illuminate\Support\Facades\Session; @endphp
@extends("layout")

@section("content")
    <div class="container mt-4">


        @if(Session::has("error"))
            <div class="alert alert-danger d-flex justify-content-between align-items-center">
                <span>{{ Session::get("error") }}</span>
                <a class="btn btn-sm btn-light" href="/login">Log in</a>
            </div>
        @endif


        <div class="row g-4">
            @foreach($movies as $movie)
                <div class="col-md-4 col-lg-3">
                    <div class="card h-100 shadow-sm border-0">

                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title text-primary">{{ $movie->title }}</h5>
                            <h6 class="card-subtitle mb-2 text-muted">{{ $movie->genre->genre }}</h6>
                            <p class="card-text flex-grow-1">{{ Str::limit($movie->description, 100) }}</p>
                            <small class="text-muted">By {{ $movie->author }}</small>
                        </div>
                        <div class="card-footer bg-white border-0 d-flex justify-content-between">

                            @if(in_array($movie->id, $userFavourites))
                                <a href="{{ route('movies.unfavourite', ['movie' => $movie->id]) }}"
                                   class="btn btn-sm btn-outline-danger">
                                    <i class="fa-solid fa-bookmark"></i> Remove
                                </a>
                            @else
                                <a href="{{ route('movies.favourite', ['movie' => $movie->id]) }}"
                                   class="btn btn-sm btn-outline-primary">
                                    <i class="fa-regular fa-bookmark"></i> Save
                                </a>
                            @endif


                            <a href="{{ route('movies.permalink', ['movie' => $movie->title]) }}"
                               class="btn btn-sm btn-success">
                                Watch
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>


        <div class="mt-4 d-flex justify-content-center">
            {{ $movies->links() }}
        </div>
    </div>
@endsection

