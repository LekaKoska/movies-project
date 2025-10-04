@extends("layout")

@section("content")
    <div class="container mt-5">
        <h2 class="mb-4 text-primary">Search Results</h2>

        @if($search->isEmpty())
            <p class="text-muted">No movies found matching your search.</p>
        @else
            <div class="row g-3">
                @foreach($search as $movie)
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="card h-100 shadow-sm">
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title">{{ $movie->title }}</h5>
                                <h6 class="card-subtitle mb-2 text-muted">{{ $movie->genre->genre }}</h6>
                                <p class="card-text flex-grow-1">{{ Str::limit($movie->description, 100) }}</p>
                                <p class="card-text"><strong>Author:</strong> {{ $movie->author }}</p>

                                <div class="mt-auto d-flex justify-content-between">
                                    @if(in_array($movie->id, $userFavourites))
                                        <a href="{{ route('movies.unfavourite', ['movie' => $movie->id]) }}" class="btn btn-outline-danger btn-sm">
                                            <i class="fa-solid fa-bookmark"></i> Remove
                                        </a>
                                    @else
                                        <a href="{{ route('movies.favourite', ['movie' => $movie->id]) }}" class="btn btn-outline-primary btn-sm">
                                            <i class="fa-regular fa-bookmark"></i> Favourite
                                        </a>
                                    @endif
                                    <a href="{{ route('movies.permalink', ['movie' => $movie->title]) }}" class="btn btn-primary btn-sm">
                                        Watch
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection
