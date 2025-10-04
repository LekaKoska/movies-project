@extends("layout")

@section("content")
    <div class="container mt-5">
        <h2 class="mb-4 text-primary">Edit Movie</h2>

        <div class="card shadow-sm p-4">
            <form action="{{ route('movie.save', ['movie' => $movie->id]) }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input
                        id="title"
                        name="title"
                        type="text"
                        class="form-control"
                        placeholder="Enter the movie title"
                        value="{{ old('title', $movie->title) }}"
                        required
                    >
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea
                        id="description"
                        name="description"
                        class="form-control"
                        rows="5"
                        placeholder="Enter the description"
                        required
                    >{{ old('description', $movie->description) }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="author" class="form-label">Author</label>
                    <input
                        id="author"
                        name="author"
                        type="text"
                        class="form-control"
                        placeholder="Enter author"
                        value="{{ old('author', $movie->author) }}"
                        required
                    >
                </div>

                <button type="submit" class="btn btn-primary">Save Changes</button>
            </form>
        </div>
    </div>
@endsection
