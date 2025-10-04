@extends("layout")

@section("content")
    <div class="container mt-5">
        <div class="text-center">
            <h1 class="display-4 animate__animated animate__fadeInDown">Welcome to Movie Browser</h1>
            <p class="lead mt-3 animate__animated animate__fadeInUp animate__delay-1s">
                This project allows you to explore and watch movies easily.
                Mark your favorites, leave comments, and enjoy.
            </p>

            <div class="mt-4">
                <a href="{{ route('movies.all') }}" class="btn btn-primary btn-lg animate__animated animate__zoomIn animate__delay-2s">
                    Browse Movies
                </a>
            </div>
        </div>
    </div>

    <!-- Optional: include Animate.css for animations -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
@endsection
