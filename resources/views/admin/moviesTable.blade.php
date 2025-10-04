@extends("layout")

@section("content")
    <div class="container mt-5">
        <h2 class="mb-4 text-primary">Movies</h2>

        <div class="card shadow-sm">
            <div class="card-body">
                <table class="table table-hover table-striped align-middle">
                    <thead class="table-primary">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Description</th>
                        <th scope="col">Author</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($allMovies as $index => $singleMovie)
                        <tr>
                            <th scope="row">{{ $index + 1 }}</th>
                            <td>{{ $singleMovie->title }}</td>
                            <td>{{ Str::limit($singleMovie->description, 50) }}</td>
                            <td>{{ $singleMovie->author }}</td>
                            <td>
                                <a class="btn btn-danger btn-sm" href="{{ route('movie.delete', [$singleMovie->id]) }}">Delete</a>
                                <a class="btn btn-primary btn-sm" href="{{ route('movie.edit', [$singleMovie->id]) }}">Edit</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                <div class="mt-3">
                    {{ $allMovies->links() }}
            </div>
        </div>
    </div>
@endsection
