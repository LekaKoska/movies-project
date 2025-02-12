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

        <table class="table">
            <thead>
            <tr>

                <th scope="col">Email</th>
                <th scope="col">Subject</th>
                <th scope="col">Message</th>
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
                        <a class="btn btn-primary" href="">Edit</a>
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>


@endsection

</body>
</html>
