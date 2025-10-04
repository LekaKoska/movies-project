@extends("layout")

@section("content")
    <div class="container mt-5">
        {{-- Movie Section --}}
        <div class="card mb-5 shadow-sm">
            <div class="card-body">
                <h2 class="card-title text-center mb-4">{{ $movie->title }}</h2>

                <div class="row">
                    {{-- Video --}}
                    <div class="col-12 col-md-6 mb-3">
                        <div class="ratio ratio-16x9">
                            <iframe src="https://www.youtube.com/embed/pQab51QNjAU?si=iO_MEwJmxFVj7ZGx"
                                    title="YouTube video player" frameborder="0" allowfullscreen>
                            </iframe>
                        </div>
                    </div>

                    {{-- Comment Form --}}
                    <div class="col-12 col-md-6">
                        <form action="{{ route('movies.comment', ['movie' => $movie->id]) }}" method="POST">
                            @csrf
                            <input type="hidden" name="user_id" value="{{ $user->id }}">
                            <input type="hidden" name="movie_id" value="{{ $movie->id }}">

                            <div class="mb-3">
                                <textarea class="form-control" rows="6" placeholder="Enter a comment for this movie.." name="comment"></textarea>
                            </div>

                            <button class="btn btn-info w-100">Send</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        {{-- Comments Section --}}
        <div class="mb-5">
            <h3 class="mb-3">Comments</h3>

            @if(Session::has("success"))
                <div class="alert alert-success">
                    {{ Session::get("success") }}
                </div>
            @endif

            @forelse($movie->comments as $comment)
                <div class="card mb-3 shadow-sm">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <div>
                                <i class="fa-regular fa-circle-user"></i>
                                <strong>{{ $comment->user->name }}</strong>
                                <small class="text-muted ms-2">{{ $comment->created_at->format('d M Y H:i') }}</small>
                            </div>

                            @if($comment->user_id === $user->id)
                                <form action="{{ route('movies.comment.delete', ['comment' => $comment]) }}" method="GET">
                                    <button class="btn btn-sm btn-danger"><i class="fa-solid fa-trash"></i> Delete</button>
                                </form>
                            @endif
                        </div>
                        <p class="mb-0">{{ $comment->content }}</p>
                    </div>
                </div>
            @empty
                <p class="text-muted">No comments yet. Be the first to comment!</p>
            @endforelse
        </div>
    </div>
@endsection
