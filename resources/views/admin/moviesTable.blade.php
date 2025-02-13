<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Document</title>
</head>
<body>
@extends("layout")
@section("content")
    <h2>Movies</h2>
        <table class="table">
            <thead>
            <tr>

                <th scope="col">Tittle</th>
                <th scope="col">Description</th>
                <th scope="col">Author</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($allMovies as $singleMovie)
                <tr>
                    <td>{{$singleMovie->title}}</td>
                    <td>{{$singleMovie->description}}</td>
                    <td>{{$singleMovie->author}}</td>
                    <td>
                        <a class="btn btn-danger" href="{{route("movie.delete", [$singleMovie->id])}}">Delete</a>
                        <a class="btn btn-primary" href="{{route("movie.edit", [$singleMovie->id])}}">Edit</a>
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>


@endsection

</body>
</html>
