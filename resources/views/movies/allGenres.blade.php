@php use App\Models\GenreModel; @endphp
@extends("layout")

@section("content")
    <div class="container mt-5">
        <h2 class="mb-4 text-primary">Genres</h2>

        <div class="row g-3">
            @foreach(GenreModel::GENRE as $genre)
                <div class="col-6 col-md-4 col-lg-3">
                    <a href="{{ route('movies.genreResults', ['genre' => $genre]) }}" class="btn btn-outline-primary w-100 text-truncate">
                        {{ $genre }}
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
