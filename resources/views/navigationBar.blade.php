<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Document</title>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo01" >
                <a class="navbar-brand" href="{{route("homepage")}}"><i class="fa-solid fa-video"></i></a>
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{route("movies.all")}}">Movies</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{route("movies.genre")}}">Genre</a>
                    </li>
                    <li>
                        <a class="nav-link active" href="{{route("movies.favourites")}}">Favorites</a>
                    </li>
                    <li>
                        <a class="nav-link active" href="">My profile</a>
                    </li>
                    <li>
                        <a class="nav-link active" href="{{route("movies.addForm")}}">Add movie</a>
                    </li>
                </ul>

                <form class="d-flex" action="{{route("movies.search")}}" method="GET">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search">
                    <button class="btn btn-outline-success" type="submit">Search</button>

                </form>
            </div>
        </div>
    </nav>
    @if(\Illuminate\Support\Facades\Session::has("error"))
        <p class="text-danger">{{\Illuminate\Support\Facades\Session::get("error")}}</p>
    @endif

</body>
</html>
