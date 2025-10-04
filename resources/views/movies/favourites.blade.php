@extends("layout")

@section("content")
    <div class="container mt-5">
        <h2 class="mb-4 text-primary">My Favourite Movies</h2>

        @if($userFavourites->isEmpty())
            <p class="text-muted">You have no favourite movies yet.</p>
        @else
            <div class="row g-3">
                @foreach($userFavourites as $userFavourite)
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="card h-100 shadow-sm">
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title">{{ $userFavourite->movie->title }}</h5>
                                <h6 class="card-subtitle mb-2 text-muted">{{ $userFavourite->movie->genre->genre }}</h6>
                                <p class="card-text flex-grow-1">{{ Str::limit($userFavourite->movie->description, 100) }}</p>
                                <p class="card-text"><strong>Author:</strong> {{ $userFavourite->movie->author }}</p>
                                <div class="mt-auto d-flex justify-content-between">
                                    <a href="{{ route('movies.unfavourite', ['movie' => $userFavourite->movie->id]) }}" class="btn btn-outline-danger btn-sm">
                                        <i class="fa-solid fa-bookmark"></i> Remove
                                    </a>
                                    <a href="{{ route('movies.permalink', ['movie' => $userFavourite->movie->title]) }}" class="btn btn-primary btn-sm">
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
