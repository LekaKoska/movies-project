@php
    use App\Models\UserMoviesModel;
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\Session;
@endphp

    <!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Movie Manager</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Animate.css for subtle animations -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <style>
        /* Hover effect for nav links */
        .navbar-nav .nav-link:hover {
            color: #0d6efd;
            transform: scale(1.05);
            transition: all 0.2s ease-in-out;
        }

        .navbar-brand i {
            font-size: 1.8rem;
            color: #0d6efd;
            transition: transform 0.2s;
        }

        .navbar-brand i:hover {
            transform: rotate(15deg) scale(1.2);
        }

        .navbar {
            box-shadow: 0 2px 6px rgba(0,0,0,0.1);
            backdrop-filter: blur(10px);
            background-color: rgba(255, 255, 255, 0.95);
        }

        .form-control:focus {
            border-color: #0d6efd;
            box-shadow: 0 0 0 0.2rem rgba(13, 110, 253, 0.25);
        }

        .btn-outline-success {
            transition: all 0.2s;
        }

        .btn-outline-success:hover {
            background-color: #0d6efd;
            border-color: #0d6efd;
            color: #fff;
        }

        /* Flash error message */
        .flash-error {
            margin-top: 0.5rem;
            text-align: center;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light sticky-top">
    <div class="container">
        <a class="navbar-brand animate__animated animate__bounceIn" href="{{ route('homepage') }}">
            <i class="fa-solid fa-video"></i>
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggler"
                aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarToggler">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 animate__animated animate__fadeInLeft">
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('movies.all') }}">Movies</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('movies.genre') }}">Genre</a>
                </li>

                @auth
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('movies.favourites') }}">Favorites</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('profile.edit') }}">My Profile</a>
                    </li>
                @endauth
            </ul>

            <form class="d-flex animate__animated animate__fadeInRight" action="{{ route('movies.search') }}" method="GET">
                <input class="form-control me-2" type="search" placeholder="Search movies..." aria-label="Search" name="search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
    </div>
</nav>

@if(Session::has("error"))
    <div class="flash-error text-danger animate__animated animate__shakeX">
        {{ Session::get("error") }}
    </div>
@endif

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
